<?php
namespace sspat\ProfiRu\Tests\Requests;

use sspat\ProfiRu\Constants\Dictionaries;
use sspat\ProfiRu\Requests\LocationsRequest;

class LocationsRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testRequestBody()
    {
        $request = new LocationsRequest();

        self::assertEquals(
            $request->getBody(),
            [
                Dictionaries::LOCATIONS
            ]
        );
    }
}
