<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Contracts\SchemaValidator;
use sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas\LocationsSchema;

final class LocationsValidator extends AbstractArrayValidator implements SchemaValidator
{
    /**
     * @inheritdoc
     * @param \sspat\ProfiRu\Responses\LocationsResponse $response
     */
    public function __invoke(Response $response, $schema = null)
    {
        if ($schema === null) {
            $defaultSchema = new LocationsSchema();
        }
        self::compareSchemas(
            $response,
            isset($defaultSchema) ? $defaultSchema() : $schema
        );
    }
}
