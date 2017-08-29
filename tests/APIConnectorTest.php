<?php
namespace sspat\ProfiRu\Tests;

use sspat\ProfiRu\APIConnector;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Contracts\HTTPClient;
use sspat\ProfiRu\Responses\LocationsResponse;
use sspat\ProfiRu\Responses\OrganizationsResponse;
use sspat\ProfiRu\Responses\ServicesResponse;
use sspat\ProfiRu\Responses\SpecialistsResponse;

class APIConnectorTest extends \PHPUnit_Framework_TestCase
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
        self::assertInstanceOf(
            LocationsResponse::class,
            $this->connector->getLocations()
        );
    }

    public function testGetServices()
    {
        self::assertInstanceOf(
            ServicesResponse::class,
            $this->connector->getServices()
        );
    }

    public function testGetSpecialists()
    {
        self::assertInstanceOf(
            SpecialistsResponse::class,
            $this->connector->getSpecialists(Domains::HEALTHCARE)
        );
    }

    public function testGetOrganizations()
    {
        self::assertInstanceOf(
            OrganizationsResponse::class,
            $this->connector->getOrganizations(Domains::HEALTHCARE)
        );
    }
}
