<?php
namespace sspat\ProfiRu\Tests\Stubs\Requests;

use sspat\ProfiRu\Requests\DictionaryRequest;

class DictionaryRequestStub extends DictionaryRequest
{
    protected static function getDictionary()
    {
        return '';
    }
}
