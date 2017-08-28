<?php
namespace sspat\ProfiRu\Constants;

class Dictionaries
{
    /** @var string         API dictionary for locations */
    const LOCATIONS = 'mmetros';

    /** @var string         API dictionary for services */
    const SERVICES = 'pservices';

    /** @return string[]    Dictionaries currently supported by this library */
    public static function getSupportedDictionaries()
    {
        return [
            self::LOCATIONS,
            self::SERVICES
        ];
    }
}
