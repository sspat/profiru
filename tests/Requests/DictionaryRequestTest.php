<?php
namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Endpoints;
use sspat\ProfiRu\Tests\Stubs\Requests\DictionaryRequestStub;

class DictionaryRequestTest extends TestCase
{
    /** @var DictionaryRequestStub */
    private $request;

    protected function setUp()
    {
        $this->request = new DictionaryRequestStub();
    }

    protected function tearDown()
    {
        $this->request = null;
    }

    public function testRequestHeaders()
    {
        $this->assertEquals(
            $this->request->getHeaders(),
            [
                'API' => Endpoints::DICTIONARIES
            ]
        );
    }

    public function testRequestURL()
    {
        $this->assertSame(
            $this->request->getURL(),
            Endpoints::API_URL.Endpoints::DICTIONARIES
        );
    }
}
