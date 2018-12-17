<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Models;

final class SpecialistsRequest extends ProfilesRequest
{
    /**
     * @return string[]
     */
    protected static function getSupportedModels() : array
    {
        return Models::getSupportedSpecialistModels();
    }
}
