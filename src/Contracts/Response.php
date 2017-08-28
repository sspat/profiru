<?php
namespace sspat\ProfiRu\Contracts;

interface Response
{
    /**
     * @return string       API Response in raw form as a string
     */
    public function getRaw();

    /**
     * @return object       API Response decoded to a JSON object
     */
    public function getObject();
}
