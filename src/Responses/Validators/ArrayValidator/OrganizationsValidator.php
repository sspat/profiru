<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Contracts\SchemaValidator;
use sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas\OrganizationsSchema;

final class OrganizationsValidator extends AbstractArrayValidator implements SchemaValidator
{
    /**
     * @inheritdoc
     * @param \sspat\ProfiRu\Responses\OrganizationsResponse $response
     */
    public function __invoke(Response $response, $schema = null)
    {
        if ($schema === null) {
            $defaultSchema = new OrganizationsSchema();
        }
        self::compareSchemas(
            $response,
            isset($defaultSchema) ? $defaultSchema() : $schema
        );
    }
}
