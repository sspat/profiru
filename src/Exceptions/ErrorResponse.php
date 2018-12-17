<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Exceptions;

final class ErrorResponse extends ProfiApiError
{
    /** @var string[] */
    private $errorMessages;

    /**
     * @param string[] $errors
     */
    public function setErrors(array $errors) : void
    {
        $this->errorMessages = $errors;
    }

    /** @return string[] */
    public function getErrors() : array
    {
        return $this->errorMessages;
    }
}
