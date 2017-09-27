<?php
namespace sspat\ProfiRu\Tests\Stubs\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Contracts\SchemaValidator;
use sspat\ProfiRu\Responses\Validators\ArrayValidator\AbstractArrayValidator;
use sspat\ProfiRu\Tests\Stubs\Responses\Validators\ArrayValidator\Schemas\TestSchema;

final class ArrayValidatorStub extends AbstractArrayValidator implements SchemaValidator
{
    /** @inheritdoc */
    public function __invoke(Response $response, $schema = null)
    {
        if ($schema === null) {
            $defaultSchema = new TestSchema();
        }
        self::compareSchemas(
            $response,
            isset($defaultSchema) ? $defaultSchema() : $schema
        );
    }
}
