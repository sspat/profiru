<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Exceptions;

final class InvalidResponseSchema extends ProfiApiError
{
    /** @var array[][] */
    private $newFields;

    /**
     * @param array[][] $newFields
     */
    public function setNewFields(array $newFields) : void
    {
        $this->newFields = $newFields;
    }

    /** @return array[][] */
    public function getNewFields() : array
    {
        return $this->newFields;
    }
}
