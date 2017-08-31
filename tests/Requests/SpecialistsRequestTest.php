<?php
namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Requests\SpecialistsRequest;

class SpecialistsRequestTest extends TestCase
{
    public function testRequestBodyDefaultFilter()
    {
        $request = new SpecialistsRequest(array_rand(Domains::getSupportedDomains()));

        $this->assertArraySubset(
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
