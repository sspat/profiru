<?php
namespace sspat\ProfiRu\Tests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\APIConnector;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Contracts\HTTPClient;
use sspat\ProfiRu\Responses\LocationsResponse;
use sspat\ProfiRu\Responses\OrganizationsResponse;
use sspat\ProfiRu\Responses\ServicesResponse;
use sspat\ProfiRu\Responses\SpecialistsResponse;

class APIConnectorTest extends TestCase
{
    /** @var APIConnector */
    private $connector;

    protected function setUp()
    {
        $httpClientStub = $this->createMock(HTTPClient::class);
        $httpClientStub->method('getResponse')->willReturn(json_encode([]));

        /** @var HTTPClient $httpClientStub */
        $this->connector = new APIConnector($httpClientStub);
    }

    protected function tearDown()
    {
        $this->connector = null;
    }

    public function testGetLocations()
    {
        $this->assertInstanceOf(
            LocationsResponse::class,
            $this->connector->getLocations()
        );
    }

    public function testGetServices()
    {
        $this->assertInstanceOf(
            ServicesResponse::class,
            $this->connector->getServices()
        );
    }

    public function testGetSpecialists()
    {
        $this->assertInstanceOf(
            SpecialistsResponse::class,
            $this->connector->getSpecialists(Domains::HEALTHCARE)
        );
    }

    public function testGetOrganizations()
    {
        $this->assertInstanceOf(
            OrganizationsResponse::class,
            $this->connector->getOrganizations(Domains::HEALTHCARE)
        );
    }
}
