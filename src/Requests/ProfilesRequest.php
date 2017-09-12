<?php
namespace sspat\ProfiRu\Requests;

use sspat\ProfiRu\Constants\Cities;
use sspat\ProfiRu\Constants\Defaults;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Endpoints;
use sspat\ProfiRu\Constants\Scopes;
use sspat\ProfiRu\Contracts\SIDGenerator;
use sspat\ProfiRu\Exceptions\InvalidRequestParameterException;
use sspat\ProfiRu\Exceptions\InvalidRequestParameterValueException;
use sspat\ProfiRu\SIDGenerators\UniqidSIDGenerator;

abstract class ProfilesRequest implements \sspat\ProfiRu\Contracts\ProfilesRequest
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
     * ProfilesRequest constructor.
     *
     * @param string $domain                     API domain to send request to
     * @see \sspat\ProfiRu\Constants\Domains
     * @param array|null $parameters                  Additional request parameters
     * @param SIDGenerator|null $SIDGenerator    SID Generator
     *
     * @throws InvalidRequestParameterValueException
     * @throws InvalidRequestParameterException
     */
    public function __construct($domain, $parameters = null, $SIDGenerator = null)
    {
        $parameters = $parameters ?: [];
        $this->setDomain($domain);
        $this->sid = $SIDGenerator ? $SIDGenerator->generate() : (new UniqidSIDGenerator())->generate();
        $this->setDefaultRequestParameters();
        $this->setAdditionalParameters($parameters);
    }

    /** @inheritdoc */
    public function getHeaders()
    {
        return ['API' => Endpoints::PROFILES];
    }

    /** @inheritdoc */
    public function getURL()
    {
        return Endpoints::API_URL;
    }

    /** @inheritdoc */
    public function getBody()
    {
        return [
            'filter' => [
                'static' => [
                    'models' => $this->getFormattedModels()
                ]
            ],
            'bound' => [
                'from' => $this->from,
                'count' => $this->count,
                'scope' => $this->scope
            ],
            'client' => [
                'ip' => $this->ipAddress,
                'sid' => $this->sid
            ],
            'inbound' => [
                [
                    'domain' => $this->getFullDomain()
                ]
            ]
        ];
    }

    protected function setDefaultRequestParameters()
    {
        $this->city = Cities::MOSCOW;
        $this->from = Defaults::SKIP_PROFILES;
        $this->count = Defaults::MIN_PROFILES_PER_PAGE;
        $this->scope = Scopes::SCOPE_MINI;
        $this->ipAddress = Defaults::IP;
        $this->models = static::getSupportedModels();
    }

    /**
     * @param array $parameters
     *
     * @throws InvalidRequestParameterException
     */
    protected function setAdditionalParameters(array $parameters)
    {
        foreach ($parameters as $parameter => $value) {
            $setterMethod = 'set'.ucfirst($parameter);

            if (!method_exists($this, $setterMethod)) {
                throw new InvalidRequestParameterException('Invalid request parameter: '.$parameter);
            }

            $this->$setterMethod($value);
        }
    }

    /**
     * @param string $domain
     *
     * @throws InvalidRequestParameterValueException
     */
    protected function setDomain($domain)
    {
        if ($this->domain) {
            throw new InvalidRequestParameterValueException(
                'Domain is already set for this request and cannot be changed.'
            );
        }

        if (!isset(Domains::getSupportedDomains()[$domain])) {
            throw new InvalidRequestParameterValueException(
                'Incorrect domain. Supported domains: '.implode(', ', array_keys(Domains::getSupportedDomains()))
            );
        }

        $this->domain = $domain;
    }

    /**
     * @param string $city
     *
     * @throws InvalidRequestParameterValueException
     */
    protected function setCity($city)
    {
        if (!in_array($city, Domains::getSupportedDomains()[$this->domain], true)) {
            throw new InvalidRequestParameterValueException(
                'City not supported for domain ' . $this->domain . '. 
                Supported cities: ' . implode(', ', Domains::getSupportedDomains()[$this->domain]) .
                ' (or empty string for Moscow)'
            );
        }

        $this->city = $city;
    }

    /**
     * @param int $from
     *
     * @throws InvalidRequestParameterValueException
     */
    protected function setFrom($from)
    {
        if (!is_int($from) || $from < 0) {
            throw new InvalidRequestParameterValueException('Parameter "from" must be an integer of 0 or greater');
        }

        $this->from = $from;
    }

    /**
     * @param int $count
     *
     * @throws InvalidRequestParameterValueException
     */
    protected function setCount($count)
    {
        if (!is_int($count) ||
            $count < Defaults::MIN_PROFILES_PER_PAGE ||
            $count > Defaults::MAX_PROFILES_PER_PAGE
        ) {
            throw new InvalidRequestParameterValueException(
                'Parameter "count" must be an integer between '.
                Defaults::MIN_PROFILES_PER_PAGE.' and '.Defaults::MAX_PROFILES_PER_PAGE
            );
        }

        $this->count = $count;
    }

    /**
     * @param int $scope
     *
     * @throws InvalidRequestParameterValueException
     */
    protected function setScope($scope)
    {
        if (!in_array($scope, Scopes::getSupportedScopes(), true)) {
            throw new InvalidRequestParameterValueException(
                'Parameter "scope" must be one of the following values: '.implode(', ', Scopes::getSupportedScopes())
            );
        }

        $this->scope = $scope;
    }

    /**
     * @param string $ipAddress
     *
     * @throws InvalidRequestParameterValueException
     */
    protected function setIP($ipAddress)
    {
        if (filter_var($ipAddress, FILTER_VALIDATE_IP) === false) {
            throw new InvalidRequestParameterValueException('Parameter "ip" must be a valid IP address');
        }

        $this->ipAddress = $ipAddress;
    }

    /**
     * @param string[] $models
     *
     * @throws InvalidRequestParameterValueException
     */
    protected function setModels(array $models)
    {
        $newModels = [];

        foreach ($models as $model) {
            if (!in_array($model, static::getSupportedModels(), true)) {
                throw new InvalidRequestParameterValueException(
                    'Parameter "model" must be one of the following values: '.
                    implode(', ', static::getSupportedModels())
                );
            }

            $newModels[] = $model;
        }

        $this->models = $newModels;
    }

    /**
     * @return array
     */
    protected function getFormattedModels()
    {
        return array_map(
            function ($value) {
                return ['model' => $value];
            },
            $this->models
        );
    }

    /**
     * @return string      Full API domain with city
     */
    protected function getFullDomain()
    {
        return ($this->city ? $this->city.'.' : '') . $this->domain;
    }
}
