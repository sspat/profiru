<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Dictionaries;

final class ServicesRequest extends DictionaryRequest
{
    protected static function getDictionary() : string
    {
        return Dictionaries::SERVICES;
    }
}
