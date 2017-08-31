<?php
namespace sspat\ProfiRu\Tests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\APIConnector;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Contracts\HTTPClient;

class APIConnectorTest extends TestCase
{
    /** @var APIConnector */
    private $connector;

    protected function setUp()
    {
        $httpClientStub = $this->createMock('sspat\ProfiRu\Contracts\HTTPClient');
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
            'sspat\ProfiRu\Responses\LocationsResponse',
            $this->connector->getLocations()
        );
    }

    public function testGetServices()
    {
        $this->assertInstanceOf(
            'sspat\ProfiRu\Responses\ServicesResponse',
            $this->connector->getServices()
        );
    }

    public function testGetSpecialists()
    {
        $this->assertInstanceOf(
            'sspat\ProfiRu\Responses\SpecialistsResponse',
            $this->connector->getSpecialists(Domains::HEALTHCARE)
        );
    }

    public function testGetOrganizations()
    {
        $this->assertInstanceOf(
            'sspat\ProfiRu\Responses\OrganizationsResponse',
            $this->connector->getOrganizations(Domains::HEALTHCARE)
        );
    }
}
