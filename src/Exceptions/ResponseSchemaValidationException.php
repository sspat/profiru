<?php
namespace sspat\ProfiRu\Exceptions;

class ResponseSchemaValidationException extends ProfiRuException
{
    /** @var array[] */
    private $newFields;

    /**
     * @param array[] $newFields
     */
    public function setNewFields(array $newFields)
    {
        $this->newFields = $newFields;
    }

    /** @return array[] */
    public function getNewFields()
    {
        return $this->newFields;
    }
}
