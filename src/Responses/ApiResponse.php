<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Responses;

use Psr\Http\Message\ResponseInterface;
use sspat\ProfiRu\Contracts\ApiResponse as ApiResponseInterface;
use sspat\ProfiRu\Exceptions\ErrorResponse;
use function array_merge;
use function count;
use function json_decode;

abstract class ApiResponse implements ApiResponseInterface
{
    /** @var array[][] */
    private $responseBodyArray;

    /** @var ResponseInterface */
    private $response;

    /**
     * @throws ErrorResponse
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response          = $response;
        $this->responseBodyArray = json_decode((string) $response->getBody(), true);
        $this->parseErrors();
    }

    public function response() : ResponseInterface
    {
        return $this->response;
    }

    /**
     * @return array[][]
     */
    public function asArray() : array
    {
        return $this->responseBodyArray;
    }

    /**
     * Parses API response for errors, throws exception with API errors if there were any
     *
     * @throws ErrorResponse
     */
    private function parseErrors() : void
    {
        $errors = [];

        if (isset($this->responseBodyArray['message'])) {
            $errors[] = $this->responseBodyArray['message'];
        }

        if (isset($this->responseBodyArray['errors'])) {
            $errors = array_merge($errors, $this->responseBodyArray['errors']);
        }

        if (! empty($errors)) {
            $exception = new ErrorResponse('Profi.ru API returned ' . count($errors) . ' errors.');
            $exception->setErrors($errors);

            throw $exception;
        }
    }
}
