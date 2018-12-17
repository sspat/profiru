<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use sspat\ProfiRu\Client;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Responses\LocationsResponse;
use sspat\ProfiRu\Responses\OrganizationsResponse;
use sspat\ProfiRu\Responses\ServicesResponse;
use sspat\ProfiRu\Responses\SpecialistsResponse;
use function json_encode;

class APIConnectorTest extends TestCase
{
    /** @var Client */
    private $client;

    protected function setUp() : void
    {
        $httpClient = $this->createMock(ClientInterface::class);
        $httpClient
            ->method('sendRequest')
            ->willReturn(
                new Response(200, [], json_encode([]))
            );

        /** @var ClientInterface $httpClient */
        $this->client = new Client($httpClient);
    }

    protected function tearDown() : void
    {
        $this->client = null;
    }

    public function testGetLocations() : void
    {
        $this->assertInstanceOf(
            LocationsResponse::class,
            $this->client->getLocations()
        );
    }

    public function testGetServices() : void
    {
        $this->assertInstanceOf(
            ServicesResponse::class,
            $this->client->getServices()
        );
    }

    public function testGetSpecialists() : void
    {
        $this->assertInstanceOf(
            SpecialistsResponse::class,
            $this->client->getSpecialists(Domains::HEALTHCARE)
        );
    }

    public function testGetOrganizations() : void
    {
        $this->assertInstanceOf(
            OrganizationsResponse::class,
            $this->client->getOrganizations(Domains::HEALTHCARE)
        );
    }
}
