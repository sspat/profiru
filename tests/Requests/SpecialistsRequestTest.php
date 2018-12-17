<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Requests\SpecialistsRequest;
use function array_map;
use function array_rand;

class SpecialistsRequestTest extends TestCase
{
    public function testRequestBodyDefaultFilter() : void
    {
        $request = new SpecialistsRequest(array_rand(Domains::getSupportedDomains()));

        $this->assertArraySubset(
            [
                'filter' => [
                    'static' => [
                        'models' => array_map(
                            static function (string $model) : array {
                                return ['model' => $model];
                            },
                            Models::getSupportedSpecialistModels()
                        ),
                    ],
                ],
            ],
            $request->getBody()
        );
    }
}
