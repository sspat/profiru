<?php
namespace sspat\ProfiRu\Constants;

class Cities
{
    /** @var string         API city sub-domain for Moscow */
    const MOSCOW = '';

    /** @var string         Real city code for Moscow in API, sometimes it uses it instead of an empty string */
    const MOSCOW_REAL = 'msk';

    /** @var string         API city sub-domain for Saint-Petersburg */
    const ST_PETERSBURG = 'spb';

    /** @return string[]       Cities currently supported by this library */
    public static function getSupportedCities()
    {
        return [
            self::MOSCOW,
            self::ST_PETERSBURG
        ];
    }
}
