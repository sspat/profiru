<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas\LocationsSchema;

final class LocationsValidator extends AbstractArrayValidator
{
    /**
     * @inheritdoc
     * @param \sspat\ProfiRu\Responses\LocationsResponse $response
     */
    public static function validate(Response $response, $schema = null)
    {
        if ($schema === null) {
            $schema = new LocationsSchema();
        }

        self::compareSchemas($response, $schema());
    }
}
