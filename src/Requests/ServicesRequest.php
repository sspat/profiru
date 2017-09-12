<?php
namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Dictionaries;

final class ServicesRequest extends DictionaryRequest
{
    /** @inheritdoc */
    public static function getDictionary()
    {
        return Dictionaries::SERVICES;
    }
}
