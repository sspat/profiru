<?php
namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Cities;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Constants\Scopes;
use sspat\ProfiRu\Tests\Stubs\Requests\ProfilesRequestStub;

class ProfilesRequestParametersTest extends TestCase
{
    public function testCityParameter()
    {
        $domain = Domains::HEALTHCARE;
        $city = Cities::ST_PETERSBURG;
        $request = new ProfilesRequestStub($domain, ['city' => $city]);

        $this->assertArraySubset(
            [
                'inbound' => [
                    [
                        'domain' => $city.'.'.$domain
                    ]
                ]
            ],
            $request->getBody()
        );
    }

    public function testFromParameter()
    {
        $from = 20;
        $request = new ProfilesRequestStub(Domains::HEALTHCARE, ['from' => $from]);

        $this->assertArraySubset(
            [
                'bound' => [
                    'from' => $from
                ]
            ],
            $request->getBody()
        );
    }

    public function testCountParameter()
    {
        $count = 15;
        $request = new ProfilesRequestStub(Domains::HEALTHCARE, ['count' => $count]);

        $this->assertArraySubset(
            [
                'bound' => [
                    'count' => $count
                ]
            ],
            $request->getBody()
        );
    }

    public function testScopeParameter()
    {
        $scope = Scopes::SCOPE_FULL;
        $request = new ProfilesRequestStub(Domains::HEALTHCARE, ['scope' => $scope]);

        $this->assertArraySubset(
            [
                'bound' => [
                    'scope' => $scope
                ]
            ],
            $request->getBody()
        );
    }

    public function testIPParameter()
    {
        $ipAddress = '127.0.0.2';
        $request = new ProfilesRequestStub(Domains::HEALTHCARE, ['ip' => $ipAddress]);

        $this->assertArraySubset(
            [
                'client' => [
                    'ip' => $ipAddress
                ]
            ],
            $request->getBody()
        );
    }

    public function testModelsParameter()
    {
        $models = [Models::ASSOCIATION_STRUCTURE_UNIT];
        $request = new ProfilesRequestStub(Domains::HEALTHCARE, ['models' => $models]);

        $this->assertArraySubset(
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
            $request->getBody()
        );
    }
}
