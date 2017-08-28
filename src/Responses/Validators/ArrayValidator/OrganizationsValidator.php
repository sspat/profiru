<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas\OrganizationsSchema;

final class OrganizationsValidator extends AbstractArrayValidator
{
    /**
     * @inheritdoc
     * @param \sspat\ProfiRu\Responses\OrganizationsResponse $response
     */
    public static function validate($response, $schema = null)
    {
        if ($schema === null) {
            $schema = new OrganizationsSchema();
        }

        self::compareSchemas($response, $schema());
    }
}
