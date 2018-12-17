<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Contracts;

interface ApiRequest
{
    public function getUrl() : string;

    /**
     * @return string[]
     */
    public function getHeaders() : array;

    /**
     * @return array[][]
     */
    public function getBody() : array;
}
