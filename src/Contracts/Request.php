<?php
namespace sspat\ProfiRu\Contracts;

interface Request
{
    /** @return string[]    Array of headers to send with the HTTP request, keys are the headers names */
    public function getHeaders();

    /** @return string      URL of the API endpoint */
    public function getURL();

    /** @return array       Array that will be converted to JSON and sent as the body of the HTTP request */
    public function getBody();
}
