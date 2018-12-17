<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Constants;

final class Dictionaries
{
    /** API dictionary for locations */
    public const LOCATIONS = 'mmetros';

    /** API dictionary for services */
    public const SERVICES = 'pservices';

    /** @return string[] Dictionaries currently supported by this library */
    public static function getSupportedDictionaries() : array
    {
        return [
            self::LOCATIONS,
            self::SERVICES,
        ];
    }
}
