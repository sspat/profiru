<?php
namespace sspat\ProfiRu\Tests\Requests;

use sspat\ProfiRu\Constants\Dictionaries;
use sspat\ProfiRu\Requests\ServicesRequest;

class ServicesRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testRequestBody()
    {
        $request = new ServicesRequest();

        self::assertEquals(
            $request->getBody(),
            [
                Dictionaries::SERVICES
            ]
        );
    }
}
