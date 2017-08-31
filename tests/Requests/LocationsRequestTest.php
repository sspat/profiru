<?php
namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Dictionaries;
use sspat\ProfiRu\Requests\LocationsRequest;

class LocationsRequestTest extends TestCase
{
    public function testRequestBody()
    {
        $request = new LocationsRequest();

        $this->assertEquals(
            $request->getBody(),
            [
                Dictionaries::LOCATIONS
            ]
        );
    }
}
