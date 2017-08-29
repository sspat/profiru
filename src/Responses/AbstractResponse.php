<?php
namespace sspat\ProfiRu\Responses;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Exceptions\ErrorResponseException;

abstract class AbstractResponse implements Response
{
    /** @var string */
    private $responseRaw;

    /** @var object */
    private $responseArray;

    /**
     * AbstractResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->responseRaw = $response;
        $this->responseArray = json_decode($this->responseRaw, true);
        $this->parseErrors();
    }

    /** @inheritdoc */
    public function getRaw()
    {
        return $this->responseRaw;
    }

    /** @inheritdoc */
    public function getArray()
    {
        return $this->responseArray;
    }

    /**
     * Parses API response for errors, throws exception with API errors if there were any
     *
     * @throws ErrorResponseException
     */
    private function parseErrors()
    {
        $errors = [];

        if (isset($this->responseArray['message'])) {
            $errors[] = $this->responseArray['message'];
        }

        if (isset($this->responseArray['errors'])) {
            $errors = array_merge($errors, $this->responseArray['errors']);
        }

        if (!empty($errors)) {
            $exception = new ErrorResponseException('Profi.ru API returned '.count($errors).' errors.');
            $exception->setErrors($errors);
            throw $exception;
        }
    }
}
