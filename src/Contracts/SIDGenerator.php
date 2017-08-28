<?php
namespace sspat\ProfiRu\Contracts;

interface SIDGenerator
{
    /**
     * @return string       SID for the request
     */
    public function generate();
}
