<?php
namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Dictionaries;

final class LocationsRequest extends DictionaryRequest
{
    /** @inheritdoc */
    public static function getDictionary()
    {
        return Dictionaries::LOCATIONS;
    }
}
