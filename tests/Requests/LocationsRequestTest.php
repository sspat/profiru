<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Dictionaries;
use sspat\ProfiRu\Requests\LocationsRequest;

class LocationsRequestTest extends TestCase
{
    public function testRequestBody() : void
    {
        $this->assertEquals(
            (new LocationsRequest())->getBody(),
            [Dictionaries::LOCATIONS]
        );
    }
}
