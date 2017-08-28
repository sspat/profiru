<?php
namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Dictionaries;

final class ServicesRequest extends DictionaryRequest
{
    /** @inheritdoc */
    protected static function getDictionary()
    {
        return Dictionaries::SERVICES;
    }
}
