<?php
namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Models;

final class OrganizationsRequest extends ProfilesRequest
{
    /** @inheritdoc */
    public static function getSupportedModels()
    {
        return Models::getSupportedOrganizationModels();
    }
}
