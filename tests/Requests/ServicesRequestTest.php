<?php
namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Dictionaries;
use sspat\ProfiRu\Requests\ServicesRequest;

class ServicesRequestTest extends TestCase
{
    public function testRequestBody()
    {
        $request = new ServicesRequest();

        $this->assertEquals(
            $request->getBody(),
            [
                Dictionaries::SERVICES
            ]
        );
    }
}
