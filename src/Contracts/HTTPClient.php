<?php
namespace sspat\ProfiRu\Contracts;

interface HTTPClient
{
    /**
     * @param Request $request      Object containing request to send to the API
     * @return string               API response to the request
     */
    public function getResponse(Request $request);
}
