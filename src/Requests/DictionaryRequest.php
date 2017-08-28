<?php
namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Endpoints;
use sspat\ProfiRu\Contracts\Request;

abstract class DictionaryRequest implements Request
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

    /** @return string      API dictionary ID */
    abstract protected static function getDictionary();
}
