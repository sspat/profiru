<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Cities;
use sspat\ProfiRu\Constants\Defaults;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Endpoints;
use sspat\ProfiRu\Constants\Scopes;
use sspat\ProfiRu\Contracts\ApiRequest;
use sspat\ProfiRu\Contracts\SIDGenerator;
use sspat\ProfiRu\Exceptions\InvalidRequestParameter;
use sspat\ProfiRu\Exceptions\InvalidRequestParameterValue;
use sspat\ProfiRu\SIDGenerators\UniqidSIDGenerator;
use const FILTER_VALIDATE_IP;
use function array_keys;
use function array_map;
use function filter_var;
use function implode;
use function in_array;
use function method_exists;
use function ucfirst;

abstract class ProfilesRequest implements ApiRequest
{
    /** @var string */
    private $sid;

    /** @var string */
    private $domain;

    /** @var string */
    private $city;

    /** @var int */
    private $from;

    /** @var int */
    private $count;

    /** @var string */
    private $scope;

    /** @var string */
    private $ipAddress;

    /** @var string[] */
    private $models;

    /**
     * @see \sspat\ProfiRu\Constants\Domains
     *
     * @param array[][] $parameters
     */
    public function __construct(string $domain, ?array $parameters = null, ?SIDGenerator $SIDGenerator = null)
    {
        $parameters = $parameters ?: [];

        $this->setDomain($domain);
        $this->sid = $SIDGenerator ? $SIDGenerator->generate() : (new UniqidSIDGenerator())->generate();
        $this->setDefaultRequestParameters();
        $this->setAdditionalParameters($parameters);
    }

    public function getUrl() : string
    {
        return Endpoints::API_URL;
    }

    /**
     * @return string[]
     */
    public function getHeaders() : array
    {
        return ['API' => Endpoints::PROFILES];
    }

    /**
     * @return array[][]
     */
    public function getBody() : array
    {
        return [
            'filter' => [
                'static' => [
                    'models' => $this->getFormattedModels(),
                ],
            ],
            'bound' => [
                'from' => $this->from,
                'count' => $this->count,
                'scope' => $this->scope,
            ],
            'client' => [
                'ip' => $this->ipAddress,
                'sid' => $this->sid,
            ],
            'inbound' => [
                [
                    'domain' => $this->getFullDomain(),
                ],
            ],
        ];
    }

    protected function setDefaultRequestParameters() : void
    {
        $this->city      = Cities::MOSCOW;
        $this->from      = Defaults::SKIP_PROFILES;
        $this->count     = Defaults::MIN_PROFILES_PER_PAGE;
        $this->scope     = Scopes::SCOPE_MINI;
        $this->ipAddress = Defaults::IP;
        $this->models    = static::getSupportedModels();
    }

    /**
     * @param array[][] $parameters
     */
    protected function setAdditionalParameters(array $parameters) : void
    {
        foreach ($parameters as $parameter => $value) {
            $setterMethod = 'set' . ucfirst($parameter);

            if (! method_exists($this, $setterMethod)) {
                throw new InvalidRequestParameter('Invalid request parameter: ' . $parameter);
            }

            $this->$setterMethod($value);
        }
    }

    protected function setDomain(string $domain) : void
    {
        if ($this->domain) {
            throw new InvalidRequestParameterValue(
                'Domain is already set for this request and cannot be changed.'
            );
        }

        if (! isset(Domains::getSupportedDomains()[$domain])) {
            throw new InvalidRequestParameterValue(
                'Incorrect domain. Supported domains: ' . implode(', ', array_keys(Domains::getSupportedDomains()))
            );
        }

        $this->domain = $domain;
    }

    protected function setCity(string $city) : void
    {
        if (! in_array($city, Domains::getSupportedDomains()[$this->domain])) {
            throw new InvalidRequestParameterValue(
                'City not supported for domain ' . $this->domain . '. 
                Supported cities: ' . implode(', ', Domains::getSupportedDomains()[$this->domain]) .
                ' (or empty string for Moscow)'
            );
        }

        $this->city = $city;
    }

    protected function setFrom(int $from) : void
    {
        if ($from < 0) {
            throw new InvalidRequestParameterValue('Parameter "from" must be an integer of 0 or greater');
        }

        $this->from = $from;
    }

    protected function setCount(int $count) : void
    {
        if ($count < Defaults::MIN_PROFILES_PER_PAGE ||
            $count > Defaults::MAX_PROFILES_PER_PAGE
        ) {
            throw new InvalidRequestParameterValue(
                'Parameter "count" must be an integer between ' .
                Defaults::MIN_PROFILES_PER_PAGE . ' and ' . Defaults::MAX_PROFILES_PER_PAGE
            );
        }

        $this->count = $count;
    }

    protected function setScope(string $scope) : void
    {
        if (! in_array($scope, Scopes::getSupportedScopes(), true)) {
            throw new InvalidRequestParameterValue(
                'Parameter "scope" must be one of the following values: ' . implode(', ', Scopes::getSupportedScopes())
            );
        }

        $this->scope = $scope;
    }

    protected function setIP(string $ipAddress) : void
    {
        if (filter_var($ipAddress, FILTER_VALIDATE_IP) === false) {
            throw new InvalidRequestParameterValue('Parameter "ip" must be a valid IP address');
        }

        $this->ipAddress = $ipAddress;
    }

    /**
     * @param string[] $models
     */
    protected function setModels(array $models) : void
    {
        $newModels = [];

        foreach ($models as $model) {
            if (! in_array($model, static::getSupportedModels(), true)) {
                throw new InvalidRequestParameterValue(
                    'Parameter "model" must be one of the following values: ' .
                    implode(', ', static::getSupportedModels())
                );
            }

            $newModels[] = $model;
        }

        $this->models = $newModels;
    }

    /**
     * @return array[][]
     */
    protected function getFormattedModels() : array
    {
        return array_map(
            static function (string $value) : array {
                return ['model' => $value];
            },
            $this->models
        );
    }

    protected function getFullDomain() : string
    {
        return ($this->city ? $this->city . '.' : '') . $this->domain;
    }

    /**
     * @return string[]
     */
    abstract protected static function getSupportedModels() : array;
}
