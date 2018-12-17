<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\Stubs\Requests;

use sspat\ProfiRu\Requests\DictionaryRequest;

class DictionaryRequestStub extends DictionaryRequest
{
    public static function getDictionary() : string
    {
        return '';
    }
}
