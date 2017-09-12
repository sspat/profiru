<?php
namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Models;

final class SpecialistsRequest extends ProfilesRequest
{
    /** @inheritdoc */
    public static function getSupportedModels()
    {
        return Models::getSupportedSpecialistModels();
    }
}
