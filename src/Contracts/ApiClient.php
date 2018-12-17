<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Contracts;

use sspat\ProfiRu\Responses\LocationsResponse;
use sspat\ProfiRu\Responses\OrganizationsResponse;
use sspat\ProfiRu\Responses\ServicesResponse;
use sspat\ProfiRu\Responses\SpecialistsResponse;

interface ApiClient
{
    public function getServices() : ServicesResponse;

    public function getLocations() : LocationsResponse;

    /**
     * @param mixed[]|null $parameters
     */
    public function getSpecialists(
        string $domain,
        ?array $parameters = null,
        ?SIDGenerator $SIDGenerator = null
    ) : SpecialistsResponse;

    /**
     * @param mixed[]|null $parameters
     */
    public function getOrganizations(
        string $domain,
        ?array $parameters = null,
        ?SIDGenerator $SIDGenerator = null
    ) : OrganizationsResponse;
}
