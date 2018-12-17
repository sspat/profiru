<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Constants;

final class Endpoints
{
    /** Base url for Profi.ru API */
    public const API_URL = 'https://api.profi.ru/web/client/v1/';

    /** API endpoint for dictionaries */
    public const DICTIONARIES = 'dictionary';

    /** API endpoint for organizations and specialists */
    public const PROFILES = 'pagination';

    /** @return string[] Endpoints currently supported by this library */
    public static function getSupportedEndpoints() : array
    {
        return [
            self::DICTIONARIES,
            self::PROFILES,
        ];
    }
}
