<?php
namespace sspat\ProfiRu\Contracts;

interface ProfilesRequest extends Request
{
    /** @return array       Profile types that can be retrieved using current request class */
    public static function getSupportedModels();
}
