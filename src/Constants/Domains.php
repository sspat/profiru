<?php
namespace sspat\ProfiRu\Constants;

class Domains
{
    /** @var string         API domain for healthcare */
    const HEALTHCARE = 'dktr';

    /** @var string         API domain for beauty */
    const BEAUTY = 'krst';

    /** @return string[]    Domains currently supported by this library, with supported cities for each */
    public static function getSupportedDomains()
    {
        return [
            self::HEALTHCARE => [
                Cities::MOSCOW,
                Cities::ST_PETERSBURG
            ],
            self::BEAUTY => [
                Cities::MOSCOW,
                Cities::ST_PETERSBURG
            ]
        ];
    }
}
