<?php
namespace sspat\ProfiRu\Tests\Requests;

use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Requests\SpecialistsRequest;

class SpecialistsRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testRequestBodyDefaultFilter()
    {
        $request = new SpecialistsRequest(array_rand(Domains::getSupportedDomains()));

        self::assertArraySubset(
            [
                'filter' => [
                    'static' => [
                        'models' => array_map(
                            function ($model) {
                                return ['model' => $model];
                            },
                            Models::getSupportedSpecialistModels()
                        )
                    ]
                ]
            ],
            $request->getBody()
        );
    }
}
