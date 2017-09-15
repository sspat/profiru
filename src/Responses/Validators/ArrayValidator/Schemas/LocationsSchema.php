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
            'timestamp' => 1470298688,
            'dictionaries' => [
                'mmetros' => [
                    'id' => 'mmetros',
                    'books' => [
                        [
                            'timestamp' => 1467708668,
                            'label' => [
                                'project' => [
                                    'id' => 'profi'
                                ]
                            ],
                            'data' => [
                                [
                                    'id' => 1,
                                    'city_id' => 'msk',
                                    'name' => 'Алтуфьево',
                                    'nametr' => 'altufevo',
                                    'status' => 0,
                                    'txt' => 'Новгородская, Алтуфьевское ш., Шенкурский пр.',
                                    'areas' => [
                                        [
                                            'id' => '9s'
                                        ]

                                    ],
                                    'regions' => [
                                        [
                                            'id' => 7
                                        ]
                                    ],
                                    'typ' => 'metro',
                                    'lines' => [
                                        [
                                            'id' => 'msk_9'
                                        ]

                                    ],
                                    'okrai' => [
                                        [
                                            'value' => '3'
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
