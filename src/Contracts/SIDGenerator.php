<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Contracts;

interface SIDGenerator
{
    public function generate() : string;
}
