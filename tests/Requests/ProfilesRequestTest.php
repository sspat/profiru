<?php
namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Defaults;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Endpoints;
use sspat\ProfiRu\Constants\Scopes;
use sspat\ProfiRu\Tests\Stubs\Requests\ProfilesRequestStub;

class ProfilesRequestTest extends TestCase
{
    /** @var ProfilesRequestStub */
    private $request;

    /** @var string */
    private $domain;

    /** @var string */
    private $sid;

    protected function setUp()
    {
        $this->domain = array_rand(Domains::getSupportedDomains());
        $this->sid = uniqid('', true);

        $sidGeneratorMock = $this->createMock('sspat\ProfiRu\Contracts\SIDGenerator');
        $sidGeneratorMock->method('generate')->willReturn($this->sid);

        $this->request = new ProfilesRequestStub($this->domain, [], $sidGeneratorMock);
    }

    protected function tearDown()
    {
        $this->request = null;
        $this->domain = null;
    }

    public function testRequestHeaders()
    {
        $this->assertEquals(
            $this->request->getHeaders(),
            [
                'API' => Endpoints::PROFILES
            ]
        );
    }

    public function testRequestURL()
    {
        $this->assertSame(
            $this->request->getURL(),
            Endpoints::API_URL
        );
    }

    public function testRequestBodyDefaultBoundFrom()
    {
        $this->assertArraySubset(
            [
                'bound' => [
                    'from' => Defaults::SKIP_PROFILES
                ]
            ],
            $this->request->getBody()
        );
    }

    public function testRequestBodyDefaultBoundCount()
    {
        $this->assertArraySubset(
            [
                'bound' => [
                    'count' => Defaults::MIN_PROFILES_PER_PAGE
                ]
            ],
            $this->request->getBody()
        );
    }

    public function testRequestBodyDefaultBoundScope()
    {
        $this->assertArraySubset(
            [
                'bound' => [
                    'scope' => Scopes::SCOPE_MINI
                ]
            ],
            $this->request->getBody()
        );
    }

    public function testRequestBodyDefaultClientIp()
    {
        $this->assertArraySubset(
            [
                'client' => [
                    'ip' => Defaults::IP
                ]
            ],
            $this->request->getBody()
        );
    }

    public function testRequestBodyDefaultClientSID()
    {
        $this->assertArraySubset(
            [
                'client' => [
                    'sid' => $this->sid
                ]
            ],
            $this->request->getBody()
        );
    }

    public function testRequestBodyInbound()
    {
        $this->assertArraySubset(
            [
                'inbound' => [
                    [
                        'domain' => $this->domain
                    ]
                ]
            ],
            $this->request->getBody()
        );
    }
}
