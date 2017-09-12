<?php
namespace sspat\ProfiRu\Contracts;

interface DictionaryRequest extends Request
{
    /** @return string      API dictionary ID */
    public static function getDictionary();
}
