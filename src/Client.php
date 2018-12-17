<?php

declare(strict_types=1);

namespace sspat\ProfiRu;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use sspat\ProfiRu\Contracts\ApiClient;
use sspat\ProfiRu\Contracts\ApiRequest;
use sspat\ProfiRu\Contracts\SIDGenerator;
use sspat\ProfiRu\Requests\LocationsRequest;
use sspat\ProfiRu\Requests\OrganizationsRequest;
use sspat\ProfiRu\Requests\ServicesRequest;
use sspat\ProfiRu\Requests\SpecialistsRequest;
use sspat\ProfiRu\Responses\LocationsResponse;
use sspat\ProfiRu\Responses\OrganizationsResponse;
use sspat\ProfiRu\Responses\ServicesResponse;
use sspat\ProfiRu\Responses\SpecialistsResponse;
use const JSON_THROW_ON_ERROR;
use function json_encode;

final class Client implements ApiClient
{
    /** @var ClientInterface */
    private $httpClient;

    public function __construct(ClientInterface $client)
    {
        $this->httpClient = $client;
    }

    /**
     * If provided SSL certificate has access to multiple API domains (dktr, krst etc.), all their services will be
     * returned. Currently there is no way to request services for chosen domains only.
     *
     * @see \sspat\ProfiRu\Constants\Domains
     */
    public function getServices() : ServicesResponse
    {
        return new ServicesResponse(
            $this->httpClient->sendRequest(
                $this->getPsrRequestObject(new ServicesRequest())
            )
        );
    }

    /**
     * Returns API response containing locations dictionary. This dictionary is shared by all domains.
     */
    public function getLocations() : LocationsResponse
    {
        return new LocationsResponse(
            $this->httpClient->sendRequest(
                $this->getPsrRequestObject(new LocationsRequest())
            )
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
     *     'ip'     => '144.135.23.1',
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
     * @param mixed[]|null $parameters
     */
    public function getSpecialists(
        string $domain,
        ?array $parameters = null,
        ?SIDGenerator $SIDGenerator = null
    ) : SpecialistsResponse {
        return new SpecialistsResponse(
            $this->httpClient->sendRequest(
                $this->getPsrRequestObject(
                    new SpecialistsRequest($domain, $parameters, $SIDGenerator)
                )
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
     *     'ip'     => '144.135.23.1',
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
     * @param mixed[]|null $parameters
     */
    public function getOrganizations(
        string $domain,
        ?array $parameters = null,
        ?SIDGenerator $SIDGenerator = null
    ) : OrganizationsResponse {
        return new OrganizationsResponse(
            $this->httpClient->sendRequest(
                $this->getPsrRequestObject(
                    new OrganizationsRequest($domain, $parameters, $SIDGenerator)
                )
            )
        );
    }

    private function getPsrRequestObject(ApiRequest $request) : RequestInterface
    {
        return new Request(
            'POST',
            $request->getUrl(),
            $request->getHeaders(),
            json_encode($request->getBody(), JSON_THROW_ON_ERROR)
        );
    }
}
