<?php
namespace sspat\ProfiRu\Contracts;

interface SchemaValidator
{
    /**
     * Validates the API Response JSON Schema.
     * Implementations should provide a way of describing the expected JSON schema of the API response
     * and compare it to the actual response schema.
     *
     * ResponseSchemaValidationException should be thrown if the actual schema contains fields not described in
     * the expected schema or if the actual response schema lacks fields marked as required in the expected schema.
     * The second requirement is optional, depends on actual implementation.
     *
     * All of this is necessary because the Profi.ru API lacks any schema documentation and changelog, so changes
     * to the response schema can be unexpected.
     *
     * @param Response $response
     * @param mixed $schema
     * @throws \sspat\ProfiRu\Exceptions\ResponseSchemaValidationException
     * @return void
     */
    public function __invoke(Response $response, $schema = null);
}
