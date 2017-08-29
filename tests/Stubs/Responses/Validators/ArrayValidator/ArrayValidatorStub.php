<?php
namespace sspat\ProfiRu\Tests\Stubs\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Responses\Validators\ArrayValidator\AbstractArrayValidator;
use sspat\ProfiRu\Tests\Stubs\Responses\Validators\ArrayValidator\Schemas\TestSchema;

final class ArrayValidatorStub extends AbstractArrayValidator
{
    /** @inheritdoc */
    public static function validate($response, $schema = null)
    {
        if ($schema === null) {
            $schema = new TestSchema();
        }

        self::compareSchemas($response, $schema());
    }
}
