<?php
namespace sspat\ProfiRu\Tests\Stubs\Responses\Validators\ArrayValidator\Schemas;

final class TestSchema
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            "property" => "value",
            "nested" => [
                [
                    "property" => "value",
                    "nested" => [
                        "nested" => [
                            "property" => "value"
                        ]
                    ]
                ]
            ]
        ];
    }
}
