<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Constants;

final class Cities
{
    /** API city sub-domain for Moscow */
    public const MOSCOW = '';

    /** Real city code for Moscow in API, sometimes it uses it instead of an empty string */
    public const MOSCOW_REAL = 'msk';

    /** API city sub-domain for Saint-Petersburg */
    public const ST_PETERSBURG = 'spb';

    /** @return string[] Cities currently supported by this library */
    public static function getSupportedCities() : array
    {
        return [
            self::MOSCOW,
            self::ST_PETERSBURG,
        ];
    }
}
