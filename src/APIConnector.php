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

    /**
     * If provided SSL certificate has access to multiple API domains (dktr, krst etc.), all their services will be
     * returned. Currently there is no way to request services for chosen domains only.
     *
     * @see \sspat\ProfiRu\Constants\Domains
     *
     * @return ServicesResponse
     */
    public function getServices()
    {
        return new ServicesResponse(
            $this->httpClient->getResponse(new ServicesRequest())
        );
    }

    /**
     * Returns API response containing locations dictionary. This dictionary is shared by all domains.
     *
     * @return LocationsResponse    Locations dictionary
     */
    public function getLocations()
    {
        return new LocationsResponse(
            $this->httpClient->getResponse(new LocationsRequest())
        );
    }

    /**
     * Returns API response containing specialists from the selected domain
     *
     * Request can be further configured with the $parameters property:
     * [
     *     'city'   => Cities::MOSCOW,
     *     'from'   => 220,
     *     'count'  => 10,
     *     'scope'  => Scopes::SCOPE_FULL,
     *     'ip'     => '127.0.0.2',
     *     'models' => [
     *         Models::SPECIALIST
     *     ]
     * ]
     *
     * @see \sspat\ProfiRu\Constants\Domains
     * @see \sspat\ProfiRu\Constants\Cities
     * @see \sspat\ProfiRu\Constants\Scopes
     * @see \sspat\ProfiRu\Constants\Models
     *
     * @param string $domain                                                 API domain to get specialists from
     * @param array $parameters                                              Additional request parameters
     * @param \sspat\ProfiRu\Contracts\SIDGenerator|null $SIDGenerator       Generates SID for the request
     * @return SpecialistsResponse                                           Specialists
     */
    public function getSpecialists($domain, array $parameters = [], $SIDGenerator = null)
    {
        return new SpecialistsResponse(
            $this->httpClient->getResponse(
                new SpecialistsRequest($domain, $parameters, $SIDGenerator)
            )
        );
    }

    /**
     * Returns API response containing organizations from the selected domain
     *
     * Request can be further configured with the $parameters property:
     * [
     *     'city'   => Cities::MOSCOW,
     *     'from'   => 220,
     *     'count'  => 10,
     *     'scope'  => Scopes::SCOPE_FULL,
     *     'ip'     => '127.0.0.2',
     *     'models' => [
     *         Models::ASSOCIATION,
     *         Models::ASSOCIATION_STRUCTURE_UNIT
     *     ]
     * ]
     *
     * @see \sspat\ProfiRu\Constants\Domains
     * @see \sspat\ProfiRu\Constants\Cities
     * @see \sspat\ProfiRu\Constants\Scopes
     * @see \sspat\ProfiRu\Constants\Models
     *
     * @param string $domain                                                 API domain to get organizations from
     * @param array $parameters                                              Additional request parameters
     * @param \sspat\ProfiRu\Contracts\SIDGenerator|null $SIDGenerator       Generates SID for the request
     * @return OrganizationsResponse                                         Organizations
     */
    public function getOrganizations($domain, array $parameters = [], $SIDGenerator = null)
    {
        return new OrganizationsResponse(
            $this->httpClient->getResponse(
                new OrganizationsRequest($domain, $parameters, $SIDGenerator)
            )
        );
    }
}
