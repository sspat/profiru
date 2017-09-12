<?php
namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Endpoints;

abstract class DictionaryRequest implements \sspat\ProfiRu\Contracts\DictionaryRequest
{
    /** @inheritdoc */
    public function getHeaders()
    {
        return ['API' => Endpoints::DICTIONARIES];
    }

    /** @inheritdoc */
    public function getURL()
    {
        return Endpoints::API_URL . Endpoints::DICTIONARIES;
    }

    /** @inheritdoc */
    public function getBody()
    {
        return [static::getDictionary()];
    }
}
