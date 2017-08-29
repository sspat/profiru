<?php
namespace sspat\ProfiRu\Contracts;

interface Response
{
    /**
     * @return string       Raw API response in JSON format
     */
    public function getRaw();

    /**
     * @return array        API Response decoded to an array
     */
    public function getArray();
}
