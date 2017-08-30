<?php
namespace sspat\ProfiRu\Tests\Requests;

use sspat\ProfiRu\Constants\Cities;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Constants\Scopes;
use sspat\ProfiRu\Tests\Stubs\Requests\ProfilesRequestStub;

class ProfilesRequestParametersTest extends \PHPUnit_Framework_TestCase
{
    public function testCityParameter()
    {
        $domain = Domains::HEALTHCARE;
        $city = Cities::ST_PETERSBURG;
        $request = new ProfilesRequestStub($domain, ['city' => $city]);

        self::assertArraySubset(
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

        self::assertArraySubset(
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

        self::assertArraySubset(
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

        self::assertArraySubset(
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

        self::assertArraySubset(
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
            $request->getBody()
        );
    }
}
