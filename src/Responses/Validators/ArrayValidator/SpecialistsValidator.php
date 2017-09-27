<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Contracts\SchemaValidator;
use sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas\SpecialistsSchema;

final class SpecialistsValidator extends AbstractArrayValidator implements SchemaValidator
{
    /**
     * @inheritdoc
     * @param \sspat\ProfiRu\Responses\SpecialistsResponse $response
     */
    public function __invoke(Response $response, $schema = null)
    {
        if ($schema === null) {
            $defaultSchema = new SpecialistsSchema();
        }
        self::compareSchemas(
            $response,
            isset($defaultSchema) ? $defaultSchema() : $schema
        );
    }
}
