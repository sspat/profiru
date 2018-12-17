<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Constants;

final class Domains
{
    /** API domain for healthcare */
    public const HEALTHCARE = 'dktr';

    /** API domain for beauty */
    public const BEAUTY = 'krst';

    /** @return array[][] Domains currently supported by this library, with supported cities for each */
    public static function getSupportedDomains() : array
    {
        return [
            self::HEALTHCARE => [
                Cities::MOSCOW,
                Cities::ST_PETERSBURG,
            ],
            self::BEAUTY => [
                Cities::MOSCOW,
                Cities::ST_PETERSBURG,
            ],
        ];
    }
}
