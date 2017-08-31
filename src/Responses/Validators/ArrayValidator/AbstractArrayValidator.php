<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Contracts\SchemaValidator;
use sspat\ProfiRu\Exceptions\ResponseSchemaValidationException;

/**
 * Class AbstractArrayValidator
 * Validates response schema without any external dependencies by using schema descriptions in form of an array.
 *
 * This implementation detects only new fields not defined in the schema, it cannot detect required fields
 * missing in the actual response JSON.
 */
abstract class AbstractArrayValidator implements SchemaValidator
{
    /**
     * @param Response $response
     * @param array|null $schema
     * @throws ResponseSchemaValidationException
     */
    public function __invoke($response, $schema = null)
    {
        static::validate($response, $schema);
    }

    /** @inheritdoc */
    abstract public static function validate($response, $schema = null);

    /**
     * Compares the API response schema with the schema definition.
     * If new the response contains new fields a ResponseSchemaValidationException will be thrown,
     * populated with information on the new fields.
     *
     * @see ResponseSchemaValidationException::getNewFields()
     *
     * @param Response $response                    API response
     * @param array $schema                         Schema definition
     * @throws ResponseSchemaValidationException    If response contains fields not defined in the schema
     */
    protected static function compareSchemas($response, array $schema)
    {
        $newFields = self::findNewFieldsRecursive(
            $response->getArray(),
            $schema
        );

        if (count($newFields) > 0) {
            $exception = new ResponseSchemaValidationException(
                'The response contains fields not defined in the schema'
            );
            $exception->setNewFields($newFields);
            throw $exception;
        }
    }

    /**
     * @param array $fields
     * @param array $schema
     * @param string|null $trace
     * @return array
     */
    protected static function findNewFieldsRecursive(array $fields, array $schema, $trace = null)
    {
        $newFields = [];
        $isAssoc = self::isAssoc($fields);

        foreach ($fields as $inputField => $inputFieldValue) {
            // Set field name to search in the schema
            $schemaField = $isAssoc ? $inputField : 0;
            // Check if field is defined in schema
            if (!isset($schema[$schemaField])) {
                $newFields[] = [
                    'trace' => $trace.'["'.$inputField.'"]',
                    'value' => $inputFieldValue
                ];
            // If input field is an array (contains other fields) and is not a new field itself,
            // then continue the check recursively
            } elseif (is_array($inputFieldValue)) {
                $innerSchema = isset($schema[$schemaField]) ? $schema[$schemaField] : [];
                $innerTrace = $trace.'["'.$inputField.'"]';
                $innerNewFields = self::findNewFieldsRecursive($inputFieldValue, $innerSchema, $innerTrace);
            }
        }

        if (!empty($innerNewFields)) {
            $newFields = array_merge($innerNewFields, $newFields);
        }

        return $newFields;
    }

    /**
     * Checks if input array is associative or not. Empty arrays are handled as non-associative.
     *
     * @param array $arr
     * @return bool
     */
    private static function isAssoc(array $arr)
    {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}
