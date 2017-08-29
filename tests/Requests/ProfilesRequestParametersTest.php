<?php
namespace sspat\ProfiRu\Tests\Requests;

use sspat\ProfiRu\Constants\Cities;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Constants\Scopes;
use sspat\ProfiRu\Tests\Stubs\Requests\ProfilesRequestStub;

class ProfilesRequestParametersTest extends \PHPUnit_Framework_TestCase
{
    /** @var ProfilesRequestStub */
    private $request;

    /** @var string */
    private $domain;

    protected function setUp()
    {
        $this->domain = Domains::HEALTHCARE;
        $this->request = new ProfilesRequestStub($this->domain);
    }

    protected function tearDown()
    {
        $this->request = null;
        $this->domain = null;
    }

    public function testCityParameter()
    {
        $city = Cities::ST_PETERSBURG;
        $this->request->setCity($city);

        self::assertArraySubset(
            [
                'inbound' => [
                    [
                        'domain' => $city.'.'.$this->domain
                    ]
                ]
            ],
            $this->request->getBody()
        );
    }

    public function testFromParameter()
    {
        $from = 20;
        $this->request->setFrom($from);

        self::assertArraySubset(
            [
                'bound' => [
                    'from' => $from
                ]
            ],
            $this->request->getBody()
        );
    }

    public function testCountParameter()
    {
        $count = 15;
        $this->request->setCount($count);

        self::assertArraySubset(
            [
                'bound' => [
                    'count' => $count
                ]
            ],
            $this->request->getBody()
        );
    }

    public function testScopeParameter()
    {
        $scope = Scopes::SCOPE_FULL;
        $this->request->setScope($scope);

        self::assertArraySubset(
            [
                'bound' => [
                    'scope' => $scope
                ]
            ],
            $this->request->getBody()
        );
    }

    public function testIPParameter()
    {
        $ipAddress = '127.0.0.2';
        $this->request->setIP($ipAddress);

        self::assertArraySubset(
            [
                'client' => [
                    'ip' => $ipAddress
                ]
            ],
            $this->request->getBody()
        );
    }

    public function testModelsParameter()
    {
        $models = [
            Models::ASSOCIATION_STRUCTURE_UNIT
        ];
        $this->request->setModels($models);

        self::assertArraySubset(
            [
                'filter' => [
                    'static' => [
                        'models' => array_map(
                            function ($model) {
                                return ['model' => $model];
                            },
                            $models
                        )
                    ]
                ]
            ],
            $this->request->getBody()
        );
    }
}
