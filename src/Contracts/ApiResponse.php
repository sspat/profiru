<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Contracts;

use Psr\Http\Message\ResponseInterface;

interface ApiResponse
{
    public function response() : ResponseInterface;

    /**
     * @return array[][]
     */
    public function asArray() : array;
}
