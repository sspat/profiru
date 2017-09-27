<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas\ServicesSchema;

final class ServicesValidator extends AbstractArrayValidator
{
    /**
     * @inheritdoc
     * @param \sspat\ProfiRu\Responses\ServicesResponse $response
     */
    public static function validate(Response $response, $schema = null)
    {
        if ($schema === null) {
            $schema = new ServicesSchema();
        }

        self::compareSchemas($response, $schema());
    }
}
