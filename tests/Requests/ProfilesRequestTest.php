<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;
use sspat\ProfiRu\Constants\Defaults;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Endpoints;
use sspat\ProfiRu\Constants\Scopes;
use sspat\ProfiRu\Contracts\SIDGenerator;
use sspat\ProfiRu\Tests\Stubs\Requests\ProfilesRequestStub;
use function array_rand;
use function uniqid;

class ProfilesRequestTest extends TestCase
{
    /** @var ProfilesRequestStub */
    private $request;

    /** @var string */
    private $domain;

    /** @var string */
    private $sid;

    protected function setUp() : void
    {
        $this->domain = array_rand(Domains::getSupportedDomains());
        $this->sid    = uniqid('', true);

        /** @var SIDGenerator|PHPUnit_Framework_MockObject_MockObject $sidGeneratorMock */
        $sidGeneratorMock = $this->createMock(SIDGenerator::class);
        $sidGeneratorMock->method('generate')->willReturn($this->sid);

        $this->request = new ProfilesRequestStub($this->domain, [], $sidGeneratorMock);
    }

    protected function tearDown() : void
    {
        $this->request = null;
        $this->domain  = null;
    }

    public function testRequestHeaders() : void
    {
        $this->assertEquals(
            $this->request->getHeaders(),
            ['API' => Endpoints::PROFILES]
        );
    }

    public function testRequestURL() : void
    {
        $this->assertSame(
            $this->request->getUrl(),
            Endpoints::API_URL
        );
    }

    public function testRequestBodyDefaultBoundFrom() : void
    {
        $this->assertArraySubset(
            [
                'bound' => [
                    'from' => Defaults::SKIP_PROFILES,
                ],
            ],
            $this->request->getBody()
        );
    }

    public function testRequestBodyDefaultBoundCount() : void
    {
        $this->assertArraySubset(
            [
                'bound' => [
                    'count' => Defaults::MIN_PROFILES_PER_PAGE,
                ],
            ],
            $this->request->getBody()
        );
    }

    public function testRequestBodyDefaultBoundScope() : void
    {
        $this->assertArraySubset(
            [
                'bound' => [
                    'scope' => Scopes::SCOPE_MINI,
                ],
            ],
            $this->request->getBody()
        );
    }

    public function testRequestBodyDefaultClientIp() : void
    {
        $this->assertArraySubset(
            [
                'client' => [
                    'ip' => Defaults::IP,
                ],
            ],
            $this->request->getBody()
        );
    }

    public function testRequestBodyDefaultClientSID() : void
    {
        $this->assertArraySubset(
            [
                'client' => [
                    'sid' => $this->sid,
                ],
            ],
            $this->request->getBody()
        );
    }

    public function testRequestBodyInbound() : void
    {
        $this->assertArraySubset(
            [
                'inbound' => [
                    [
                        'domain' => $this->domain,
                    ],
                ],
            ],
            $this->request->getBody()
        );
    }
}
