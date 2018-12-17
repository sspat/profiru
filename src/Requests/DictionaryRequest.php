<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Endpoints;
use sspat\ProfiRu\Contracts\ApiRequest;

abstract class DictionaryRequest implements ApiRequest
{
    public function getUrl() : string
    {
        return Endpoints::API_URL . Endpoints::DICTIONARIES;
    }

    /**
     * @return string[]
     */
    public function getHeaders() : array
    {
        return ['API' => Endpoints::DICTIONARIES];
    }

    /**
     * @return array[][]
     */
    public function getBody() : array
    {
        return [static::getDictionary()];
    }

    abstract protected static function getDictionary() : string;
}
