<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas\SpecialistsSchema;

final class SpecialistsValidator extends AbstractArrayValidator
{
    /**
     * @inheritdoc
     * @param \sspat\ProfiRu\Responses\SpecialistsResponse $response
     */
    public static function validate(Response $response, $schema = null)
    {
        if ($schema === null) {
            $schema = new SpecialistsSchema();
        }

        self::compareSchemas($response, $schema());
    }
}
