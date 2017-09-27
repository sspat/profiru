<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Contracts\SchemaValidator;
use sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas\ServicesSchema;

final class ServicesValidator extends AbstractArrayValidator implements SchemaValidator
{
    /**
     * @inheritdoc
     * @param \sspat\ProfiRu\Responses\ServicesResponse $response
     */
    public function __invoke(Response $response, $schema = null)
    {
        if ($schema === null) {
            $defaultSchema = new ServicesSchema();
        }
        self::compareSchemas(
            $response,
            isset($defaultSchema) ? $defaultSchema() : $schema
        );
    }
}
