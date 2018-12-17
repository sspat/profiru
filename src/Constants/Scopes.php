<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Constants;

final class Scopes
{
    /** Scope for basic profile data set */
    public const SCOPE_MINI = 'profile.mini';

    /** Scope for full profile data set */
    public const SCOPE_FULL = 'profile.full';

    /** @return string[] Scopes currently supported by this library */
    public static function getSupportedScopes() : array
    {
        return [
            self::SCOPE_MINI,
            self::SCOPE_FULL,
        ];
    }
}
