<?php
namespace sspat\ProfiRu\Contracts;

interface Connector
{
    /**
     * Returns API response containing services dictionary
     *
     * If provided SSL certificate has access to multiple API domains (dktr, krst etc.), all their services will be
     * returned. Currently there is no way to request services for chosen domains only.
     *
     * @see \sspat\ProfiRu\Constants\Domains
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
     * @see \sspat\ProfiRu\Constants\Domains
     *
     * @param string $domain                        API domain to get specialists from
     * @param SIDGenerator|null $SIDGenerator       Generates SID for the request
     * @return Response                             Specialists
     */
    public function getSpecialists($domain, $SIDGenerator = null);

    /**
     * Returns API response containing organizations from the selected domain
     *
     * @see \sspat\ProfiRu\Constants\Domains
     *
     * @param string $domain                        API domain to get organizations from
     * @param SIDGenerator|null $SIDGenerator       Generates SID for the request
     * @return Response                             Organizations
     */
    public function getOrganizations($domain, $SIDGenerator = null);
}
