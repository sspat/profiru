<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Endpoints;
use sspat\ProfiRu\Tests\Stubs\Requests\DictionaryRequestStub;

class DictionaryRequestTest extends TestCase
{
    /** @var DictionaryRequestStub */
    private $request;

    protected function setUp() : void
    {
        $this->request = new DictionaryRequestStub();
    }

    protected function tearDown() : void
    {
        $this->request = null;
    }

    public function testRequestHeaders() : void
    {
        $this->assertEquals(
            $this->request->getHeaders(),
            ['API' => Endpoints::DICTIONARIES]
        );
    }

    public function testRequestURL() : void
    {
        $this->assertSame(
            $this->request->getUrl(),
            Endpoints::API_URL . Endpoints::DICTIONARIES
        );
    }
}
