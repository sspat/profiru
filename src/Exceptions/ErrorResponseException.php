<?php
namespace sspat\ProfiRu\Exceptions;

class ErrorResponseException extends ProfiRuException
{
    /** @var string[] */
    private $errorMessages;

    /**
     * @param string[] $errors
     */
    public function setErrors(array $errors)
    {
        $this->errorMessages = $errors;
    }

    /** @return string[] */
    public function getErrors()
    {
        return $this->errorMessages;
    }
}
