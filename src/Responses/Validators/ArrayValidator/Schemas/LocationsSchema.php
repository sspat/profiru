<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas;

final class LocationsSchema
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            "timestamp" => 1470298688,
            "dictionaries" => [
                "mmetros" => [
                    "id" => "mmetros",
                    "books" => [
                        "_numeric" => [
                            "timestamp" => 1467708668,
                            "label" => [
                                "project" => [
                                    "id" => "profi"
                                ]
                            ],
                            "data" => [
                                "_numeric" => [
                                    "id" => 1,
                                    "city_id" => "msk",
                                    "name" => "Алтуфьево",
                                    "nametr" => "altufevo",
                                    "status" => 0,
                                    "txt" => "Новгородская, Алтуфьевское ш., Шенкурский пр.",
                                    "areas" => [
                                        "_numeric" => [
                                            "id" => "9s"
                                        ]

                                    ],
                                    "regions" => [
                                        "_numeric" => [
                                            "id" => 7
                                        ]
                                    ],
                                    "typ" => "metro",
                                    "lines" => [
                                        "_numeric" => [
                                            "id" => "msk_9"
                                        ]

                                    ],
                                    "okrai" => [
                                        "_numeric" => [
                                            "value" => "3"
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
