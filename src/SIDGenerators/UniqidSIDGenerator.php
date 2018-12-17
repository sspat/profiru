<?php

declare(strict_types=1);

namespace sspat\ProfiRu\SIDGenerators;

use sspat\ProfiRu\Contracts\SIDGenerator;
use function uniqid;

final class UniqidSIDGenerator implements SIDGenerator
{
    public function generate() : string
    {
        return uniqid('', true);
    }
}
