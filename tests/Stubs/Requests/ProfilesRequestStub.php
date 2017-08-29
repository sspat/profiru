<?php
namespace sspat\ProfiRu\Tests\Stubs\Requests;

use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Requests\ProfilesRequest;

class ProfilesRequestStub extends ProfilesRequest
{
    protected static function getSupportedModels()
    {
        return [
            Models::ASSOCIATION_STRUCTURE_UNIT
        ];
    }
}
