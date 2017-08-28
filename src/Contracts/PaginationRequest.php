<?php
namespace sspat\ProfiRu\Contracts;

use sspat\ProfiRu\Exceptions\InvalidRequestParameterValueException;

interface PaginationRequest extends Request
{
    /**
     * @param string $domain                             API domain to send request to
     * @throws InvalidRequestParameterValueException     If $domain is not an allowed domain
     * @see \sspat\ProfiRu\Constants\Domains
     */
    public function setDomain($domain);

    /**
     * @param string $city                               API city to get data for
     * @throws InvalidRequestParameterValueException     If $city is not an allowed city for the set domain
     * @see \sspat\ProfiRu\Constants\Cities
     */
    public function setCity($city);

    /**
     * @param int $from                                  Number of profiles to skip
     * @throws InvalidRequestParameterValueException     If $from is not an integer greater than 0
     */
    public function setFrom($from);

    /**
     * @param int $count                                 Number of profiles to return
     * @throws InvalidRequestParameterValueException     If $count is not a number between 1 and 20
     */
    public function setCount($count);

    /**
     * @param string $scope                              Defines amount of profile information returned
     *                                                   from API (profile.mini|profile.full)
     * @throws InvalidRequestParameterValueException     If $scope is not allowed
     * @see \sspat\ProfiRu\Constants\Scopes
     */
    public function setScope($scope);

    /**
     * @param string $ipAddress                          Client IP
     * @throws InvalidRequestParameterValueException     If $ipAddress is not a valid IP
     */
    public function setIP($ipAddress);

    /**
     * @param string[] $models                          Profile types that will be retrieved
     * @throws InvalidRequestParameterValueException    If $models contains a model that is not supported
     * @see \sspat\ProfiRu\Constants\Models
     */
    public function setModels($models);
}
