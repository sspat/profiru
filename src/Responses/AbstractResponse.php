<?php
namespace sspat\ProfiRu\Responses;

use sspat\ProfiRu\Contracts\Response;
use sspat\ProfiRu\Exceptions\ErrorResponseException;

abstract class AbstractResponse implements Response
{
    /** @var string */
    private $responseRaw;

    /** @var object */
    private $responseObject;

    /**
     * AbstractResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->responseRaw = $response;
        $this->responseObject = json_decode($this->responseRaw);
        $this->parseErrors();
    }

    /** @inheritdoc */
    public function getRaw()
    {
        return $this->responseRaw;
    }

    /** @inheritdoc */
    public function getObject()
    {
        return $this->responseObject;
    }

    /**
     * Parses API response for errors, throws exception with API errors if there were any
     *
     * @throws ErrorResponseException
     */
    private function parseErrors()
    {
        $errors = [];

        if (property_exists($this->responseObject, 'message')) {
            $errors[] = $this->responseObject->message;
        }

        if (property_exists($this->responseObject, 'errors')) {
            $errors = array_merge($errors, $this->responseObject->errors);
        }

        if (!empty($errors)) {
            $exception = new ErrorResponseException('Profi.ru API returned '.count($errors).' errors.');
            $exception->setErrors($errors);
            throw $exception;
        }
    }
}
