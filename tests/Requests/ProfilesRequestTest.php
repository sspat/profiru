<?php
namespace sspat\ProfiRu\Tests\Requests;

use sspat\ProfiRu\Constants\Defaults;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Endpoints;
use sspat\ProfiRu\Constants\Scopes;
use sspat\ProfiRu\Contracts\SIDGenerator;
use sspat\ProfiRu\Tests\Stubs\Requests\ProfilesRequestStub;

class ProfilesRequestTest extends \PHPUnit_Framework_TestCase
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
        $this->sid = uniqid();

        $sidGeneratorMock = $this->createMock(SIDGenerator::class);
        $sidGeneratorMock->method('generate')->willReturn($this->sid);

        $this->request = new ProfilesRequestStub($this->domain, $sidGeneratorMock);
    }

    protected function tearDown()
    {
        $this->request = null;
        $this->domain = null;
    }

    public function testRequestHeaders()
    {
        self::assertEquals(
            $this->request->getHeaders(),
            [
                'API' => Endpoints::PROFILES
            ]
        );
    }

    public function testRequestURL()
    {
        self::assertEquals(
            $this->request->getURL(),
            Endpoints::API_URL
        );
    }

    public function testRequestBodyDefaultBoundFrom()
    {
        self::assertArraySubset(
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
        self::assertArraySubset(
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
        self::assertArraySubset(
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
        self::assertArraySubset(
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
        self::assertArraySubset(
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
        self::assertArraySubset(
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
