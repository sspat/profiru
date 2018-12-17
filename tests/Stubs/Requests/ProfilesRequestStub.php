<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\Stubs\Requests;

use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Requests\ProfilesRequest;

class ProfilesRequestStub extends ProfilesRequest
{
    /**
     * @return array[][]
     */
    public static function getSupportedModels() : array
    {
        return [Models::ASSOCIATION_STRUCTURE_UNIT];
    }
}
