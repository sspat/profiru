<?php
namespace sspat\ProfiRu\Constants;

class Scopes
{
    /** @var string         Scope for basic profile data set */
    const SCOPE_MINI = 'profile.mini';

    /** @var string         Scope for full profile data set */
    const SCOPE_FULL = 'profile.full';

    /** @return string[]    Scopes currently supported by this library */
    public static function getSupportedScopes()
    {
        return [
            self::SCOPE_MINI,
            self::SCOPE_FULL
        ];
    }
}
