<?php
namespace sspat\ProfiRu;

use sspat\ProfiRu\Contracts\Connector;
use sspat\ProfiRu\Contracts\HTTPClient;
use sspat\ProfiRu\Requests\LocationsRequest;
use sspat\ProfiRu\Requests\OrganizationsRequest;
use sspat\ProfiRu\Requests\ServicesRequest;
use sspat\ProfiRu\Requests\SpecialistsRequest;
use sspat\ProfiRu\Responses\LocationsResponse;
use sspat\ProfiRu\Responses\OrganizationsResponse;
use sspat\ProfiRu\Responses\ServicesResponse;
use sspat\ProfiRu\Responses\SpecialistsResponse;

final class APIConnector implements Connector
{
    /** @var HTTPClient */
    private $httpClient;

    /**
     * APIConnector constructor.
     * @param HTTPClient $client
     */
    public function __construct(HTTPClient $client)
    {
        $this->httpClient = $client;
    }

    /** @inheritdoc */
    public function getServices()
    {
        return new ServicesResponse(
            $this->httpClient->getResponse(new ServicesRequest())
        );
    }

    /** @inheritdoc */
    public function getLocations()
    {
        return new LocationsResponse(
            $this->httpClient->getResponse(new LocationsRequest())
        );
    }

    /** @inheritdoc */
    public function getSpecialists($domain, $SIDGenerator = null)
    {
        return new SpecialistsResponse(
            $this->httpClient->getResponse(
                new SpecialistsRequest($domain, $SIDGenerator)
            )
        );
    }

    /** @inheritdoc */
    public function getOrganizations($domain, $SIDGenerator = null)
    {
        return new OrganizationsResponse(
            $this->httpClient->getResponse(
                new OrganizationsRequest($domain, $SIDGenerator)
            )
        );
    }
}
