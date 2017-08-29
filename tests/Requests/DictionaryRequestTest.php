<?php
namespace sspat\ProfiRu\Tests\Requests;

use sspat\ProfiRu\Constants\Endpoints;
use sspat\ProfiRu\Tests\Stubs\Requests\DictionaryRequestStub;

class DictionaryRequestTest extends \PHPUnit_Framework_TestCase
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
        self::assertEquals(
            $this->request->getHeaders(),
            [
                'API' => Endpoints::DICTIONARIES
            ]
        );
    }

    public function testRequestURL()
    {
        self::assertEquals(
            $this->request->getURL(),
            Endpoints::API_URL.Endpoints::DICTIONARIES
        );
    }
}
