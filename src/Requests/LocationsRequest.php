<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Dictionaries;

final class LocationsRequest extends DictionaryRequest
{
    protected static function getDictionary() : string
    {
        return Dictionaries::LOCATIONS;
    }
}
