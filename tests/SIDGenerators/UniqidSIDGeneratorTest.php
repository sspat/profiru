<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\SIDGenerators;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\SIDGenerators\UniqidSIDGenerator;

class UniqidSIDGeneratorTest extends TestCase
{
    public function testSIDUnique() : void
    {
        $sidGenerator = new UniqidSIDGenerator();

        self::assertNotEquals(
            $sidGenerator->generate(),
            $sidGenerator->generate()
        );
    }
}
