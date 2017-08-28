<?php
namespace sspat\ProfiRu\SIDGenerators;

use sspat\ProfiRu\Contracts\SIDGenerator;

final class UniqidSIDGenerator implements SIDGenerator
{
    /** @inheritdoc */
    public function generate()
    {
        return uniqid();
    }
}
