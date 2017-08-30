<?php
namespace sspat\ProfiRu\Contracts;

interface Connector
{
    /**
     * Returns API response containing services dictionary
     *
     * @return Response         Services dictionary
     */
    public function getServices();

    /**
     * Returns API response containing locations dictionary. This dictionary is shared by all domains.
     *
     * @return Response         Locations dictionary
     */
    public function getLocations();

    /**
     * Returns API response containing specialists from the selected domain
     *
     * @param string $domain                        API domain to get specialists from
     * @param array $parameters                     Additional request parameters
     * @param SIDGenerator|null $SIDGenerator       Generates SID for the request
     * @return Response                             Specialists
     */
    public function getSpecialists($domain, array $parameters = [], $SIDGenerator = null);

    /**
     * Returns API response containing organizations from the selected domain
     *
     * @param string $domain                        API domain to get organizations from
     * @param array $parameters                     Additional request parameters
     * @param SIDGenerator|null $SIDGenerator       Generates SID for the request
     * @return Response                             Organizations
     */
    public function getOrganizations($domain, array $parameters = [], $SIDGenerator = null);
}
