<?php
namespace sspat\ProfiRu\Tests\SIDGenerators;

use sspat\ProfiRu\SIDGenerators\UniqidSIDGenerator;

class UniqidSIDGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testSIDUnique()
    {
        $sidGenerator = new UniqidSIDGenerator();

        self::assertNotEquals(
            $sidGenerator->generate(),
            $sidGenerator->generate()
        );
    }
}
