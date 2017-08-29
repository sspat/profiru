<?php
namespace sspat\ProfiRu\Tests\Requests;

use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Requests\OrganizationsRequest;

class OrganizationsRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testRequestBodyDefaultFilter()
    {
        $request = new OrganizationsRequest(array_rand(Domains::getSupportedDomains()));

        self::assertArraySubset(
            [
                'filter' => [
                    'static' => [
                        'models' => array_map(
                            function ($model) {
                                return ['model' => $model];
                            },
                            Models::getSupportedOrganizationModels()
                        )
                    ]
                ]
            ],
            $request->getBody()
        );
    }
}
