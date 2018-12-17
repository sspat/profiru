<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Requests\OrganizationsRequest;
use function array_map;
use function array_rand;

class OrganizationsRequestTest extends TestCase
{
    public function testRequestBodyDefaultFilter() : void
    {
        $request = new OrganizationsRequest(array_rand(Domains::getSupportedDomains()));

        $this->assertArraySubset(
            [
                'filter' => [
                    'static' => [
                        'models' => array_map(
                            static function (string $model) : array {
                                return ['model' => $model];
                            },
                            Models::getSupportedOrganizationModels()
                        ),
                    ],
                ],
            ],
            $request->getBody()
        );
    }
}
