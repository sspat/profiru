<?php
namespace sspat\ProfiRu\Constants;

class Endpoints
{
    /** @var string         Base url for Profi.ru API */
    const API_URL = 'https://api.profi.ru/web/client/v1/';

    /** @var string         API endpoint for dictionaries */
    const DICTIONARIES = 'dictionary';

    /** @var string         API endpoint for organizations and specialists */
    const PROFILES = 'pagination';

    /** @return string[]    Endpoints currently supported by this library */
    public static function getSupportedEndpoints()
    {
        return [
            self::DICTIONARIES,
            self::PROFILES
        ];
    }
}
