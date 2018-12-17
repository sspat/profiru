<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Cities;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Constants\Scopes;
use sspat\ProfiRu\Tests\Stubs\Requests\ProfilesRequestStub;
use function array_map;

class ProfilesRequestParametersTest extends TestCase
{
    public function testCityParameter() : void
    {
        $domain  = Domains::HEALTHCARE;
        $city    = Cities::ST_PETERSBURG;
        $request = new ProfilesRequestStub($domain, ['city' => $city]);

        $this->assertArraySubset(
            [
                'inbound' => [
                    ['domain' => $city . '.' . $domain],
                ],
            ],
            $request->getBody()
        );
    }

    public function testFromParameter() : void
    {
        $from    = 20;
        $request = new ProfilesRequestStub(Domains::HEALTHCARE, ['from' => $from]);

        $this->assertArraySubset(
            [
                'bound' => ['from' => $from],
            ],
            $request->getBody()
        );
    }

    public function testCountParameter() : void
    {
        $count   = 15;
        $request = new ProfilesRequestStub(Domains::HEALTHCARE, ['count' => $count]);

        $this->assertArraySubset(
            [
                'bound' => ['count' => $count],
            ],
            $request->getBody()
        );
    }

    public function testScopeParameter() : void
    {
        $scope   = Scopes::SCOPE_FULL;
        $request = new ProfilesRequestStub(Domains::HEALTHCARE, ['scope' => $scope]);

        $this->assertArraySubset(
            [
                'bound' => ['scope' => $scope],
            ],
            $request->getBody()
        );
    }

    public function testIPParameter() : void
    {
        $ipAddress = '127.0.0.2';
        $request   = new ProfilesRequestStub(Domains::HEALTHCARE, ['ip' => $ipAddress]);

        $this->assertArraySubset(
            [
                'client' => ['ip' => $ipAddress],
            ],
            $request->getBody()
        );
    }

    public function testModelsParameter() : void
    {
        $models  = [Models::ASSOCIATION_STRUCTURE_UNIT];
        $request = new ProfilesRequestStub(Domains::HEALTHCARE, ['models' => $models]);

        $this->assertArraySubset(
            [
                'filter' => [
                    'static' => [
                        'models' => array_map(
                            static function (string $model) : array {
                                return ['model' => $model];
                            },
                            $models
                        ),
                    ],
                ],
            ],
            $request->getBody()
        );
    }
}
