<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas\ServicesSchema;

final class ServicesValidator extends AbstractArrayValidator
{
    /**
     * @inheritdoc
     * @param \sspat\ProfiRu\Responses\ServicesResponse $response
     */
    public static function validate($response, $schema = null)
    {
        if ($schema === null) {
            $schema = new ServicesSchema();
        }

        self::compareSchemas($response, $schema());
    }
}
