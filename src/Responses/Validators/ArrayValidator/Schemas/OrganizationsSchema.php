<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas;

final class OrganizationsSchema
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            "statistics" => [
                "total" => 4849,
                "timestamp" => 1469193480440,
                "timetable" => [
                    "start" => 1469193480396,
                    "prepare" => 20,
                    "complete" => 44
                ]
            ],
            "entries" => [
                [
                    "id" => "DiagStolitsaMedArbat",
                    "definition" => [
                        "id" => "DiagStolitsaMedArbat",
                        "prices" => [
                            [
                                "edizm_id" => 0,
                                "price4quantum" => 2300,
                                "pservice" => [
                                    "edizm_id" => 0,
                                    "top_id" => 0,
                                    "altname" => "ультразвуковое исследование",
                                    "language" => [
                                        "ru" => [
                                            "adjective" => [
                                                "formal" => [
                                                    "subject" => [
                                                        "plural" => [
                                                            "dative" => "ревматологическим",
                                                            "accusative" => "ревматологические",
                                                            "ablative" => "ревматологическими",
                                                            "genitive" => "ревматологических",
                                                            "prepositional" => "ревматологических",
                                                            "nominative" => "ревматологические"
                                                        ],
                                                        "singular" => [
                                                            "dative" => "ревматологическому",
                                                            "accusative" => "ревматологический",
                                                            "ablative" => "ревматологическим",
                                                            "genitive" => "ревматологического",
                                                            "prepositional" => "ревматологическом",
                                                            "nominative" => "ревматологический"
                                                        ]
                                                    ]
                                                ]
                                            ],
                                            "name" => [
                                                "formal" => [
                                                    "specialist" => [
                                                        "plural" => [
                                                            "dative" => "ревматологам",
                                                            "accusative" => "ревматологов",
                                                            "ablative" => "ревматологами",
                                                            "genitive" => "ревматологов",
                                                            "prepositional" => "ревматологах",
                                                            "nominative" => "ревматологи",
                                                            "flags" => [
                                                                "D" => true
                                                            ]
                                                        ],
                                                        "singular" => [
                                                            "dative" => "ревматологу",
                                                            "accusative" => "ревматолога",
                                                            "ablative" => "ревматологом",
                                                            "genitive" => "ревматолога",
                                                            "prepositional" => "ревматологе",
                                                            "nominative" => "ревматолог",
                                                            "flags" => [
                                                                "D" => true
                                                            ]
                                                        ]
                                                    ],
                                                    "subject" => [
                                                        "singular" => [
                                                            "dative" => "УЗИ диагностике",
                                                            "accusative" => "УЗИ диагностику",
                                                            "ablative" => "УЗИ диагностикой",
                                                            "flags" => [
                                                                "D" => true,
                                                                "X" => true
                                                            ],
                                                            "genitive" => "УЗИ диагностики",
                                                            "prepositional" => "УЗИ диагностике",
                                                            "nominative" => "УЗИ диагностика"
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ],
                                    "typ" => "",
                                    "srch" => "",
                                    "folder" => "uzi",
                                    "spname" => "",
                                    "u_id" => "",
                                    "composite" => "",
                                    "parent_id" => 0,
                                    "popularity" => 1184,
                                    "name" => "УЗИ",
                                    "z_id" => "dktr",
                                    "arithmop" => "",
                                    "id" => 61100,
                                    "allnames" => "УЗИ диагностика\nультразвуковая диагностика\nультразвук\nультразвуковое исследование внутренних органов\nУЗИ внутренних органов\nврач ультразвукового исследования\nврач ультразвуковой диагностики\nультразвуковой диагностики",
                                    "status" => 1
                                ],
                                "edizm" => [
                                    "nquanta" => 1,
                                    "name" => "усл.",
                                    "quantum_id" => 1,
                                    "id" => 1,
                                    "allnames" => "услуга"
                                ],
                                "prep_id" => "DiagStolitsaMedArbat",
                                "ttl" => "",
                                "edizmDefault" => [
                                    "nquanta" => 1,
                                    "name" => "сеанс",
                                    "quantum_id" => 1,
                                    "id" => 102,
                                    "allnames" => ""
                                ],
                                "pservice_id" => 61100,
                                "ckat" => 4,
                                "price" => 2300,
                                "pcrank" => 60,
                                "rank" => 0,
                                "comment" => "",
                                "spread_over" => 0,
                                "price2" => 4600
                            ]
                        ],
                        "name" => "Диагностическое отделение МЦ «Столица» на Арбате",
                        "images" => [
                            "avatars" => [
                                [
                                    "protocols" => [
                                        "http"
                                    ],
                                    "url" => "\/\/infodoctor.ru\/prep\/DiagStolitsaMedArbat_652f7554.jpg",
                                    "tags" => [
                                        "square"
                                    ]
                                ]
                            ],
                            "portfolio" => [
                                [
                                    "original" => "\/pfiles\/HromovDV\/6efbf9e46eea7085ef1c37463b5ba3ff.jpg",
                                    "mode_url" => "\/\/cdn.infodoctor.ru\/pfiles\/HromovDV\/9af0dbf53db297e454bd90c73594dbf6",
                                    "ptags" => [],
                                    "pservices" => [
                                        [
                                            "pserviceId" => [
                                                "value" => 1000860
                                            ]
                                        ]
                                    ],
                                    "title" => "",
                                    "url" => "\/\/cdn.infodoctor.ru\/pfiles\/HromovDV\/6efbf9e46eea7085ef1c37463b5ba3ff.jpg",
                                    "cdt" => "2015-09-04T16:54:59.000Z",
                                    "host" => "cdn.infodoctor.ru",
                                    "rank" => 0,
                                    "furl" => "\/pfiles\/HromovDV\/9af0dbf53db297e454bd90c73594dbf6",
                                    "producer" => "Overseer v1.4.4 (PROFI-1599]",
                                    "category" => "photo",
                                    "protocols" => [
                                        "http"
                                    ],
                                    "seo" => ""
                                ]
                            ]
                        ],
                        "info" => [
                            "general" => [
                                "common" => [
                                    [
                                        "raw" => "В диагностическом отделении МЦ «Столица» на Арбате проводится ультразвуковое обследование беременных женщин, эндоскопические исследования, Холтеровское мониторирование ЭКГ, триплексное сканирование, эхокардиография, суточный мониторинг АД, МРТ и КТ. Компьютерную и магнитно-резонансную томографию можно провести круглосуточно. КТ и МРТ обследование для детей возможно с шестилетнего возраста, для КТ нужно иметь назначение врача. Магнитно-резонансная томография костно-суставной системы и головного мозга производится на открытом аппарате мощностью 0,35 Тесла с ограничением по весу до 120 килограмм. Компьютерную томографию внутренних органов, щитовидной железы, надпочечников, почек, органов малого таза и брюшной полости делают на аппарате, производящем до 16 срезов"
                                    ]
                                ]
                            ],
                            "sport" => [],
                            "experience" => []
                        ],
                        "parents" => [
                            "topology" => [
                                [
                                    "default" => "true",
                                    "provider" => [
                                        "model" => "provider.association",
                                        "definition" => [
                                            "geo" => [
                                                "addresses" => [
                                                    "work" => [
                                                        [
                                                            "address" => "Россия, г. Москва, ул. Габричевского, д. 5, корп. 3",
                                                            "maps" => [
                                                                "yandex" => [
                                                                    "coding" => [
                                                                        "country" => [
                                                                            "name" => "Россия"
                                                                        ],
                                                                        "coprs" => "1",
                                                                        "locality" => [
                                                                            "name" => "Москва"
                                                                        ],
                                                                        "thoroughfare" => [
                                                                            "name" => "улица Габричевского"
                                                                        ],
                                                                        "house" => 5,
                                                                        "building" => "Б"
                                                                    ],
                                                                    "coordinates" => [
                                                                        "37.456864, 55.815231"
                                                                    ],
                                                                    "randomisedCoordinates" => [
                                                                        "37.45682067428803, 55.815243226848956"
                                                                    ]
                                                                ],
                                                                "google" => [
                                                                    "coordinates" => [
                                                                        "37.456761, 55.815223"
                                                                    ],
                                                                    "randomisedCoordinates" => [
                                                                        "37.45681067356364, 55.81526475311576"
                                                                    ]
                                                                ]
                                                            ],
                                                            "comment" => "бизнес-центр «Дарья», 4 этаж",
                                                            "id" => 11827
                                                        ]
                                                    ],
                                                    "producer" => "Overseer v1.4.4 (PROFI-1599]",
                                                    "residence" => []
                                                ],
                                                "areas" => [
                                                    "leave" => [
                                                        "countries" => [
                                                            [
                                                                "cities" => [
                                                                    [
                                                                        "all" => "true",
                                                                        "regions" => [
                                                                            [
                                                                                "id" => 662
                                                                            ]
                                                                        ],
                                                                        "id" => "msk",
                                                                        "ttl" => "false"
                                                                    ]
                                                                ],
                                                                "id" => "ru"
                                                            ]
                                                        ]
                                                    ],
                                                    "producer" => "Overseer v1.4.4 (PROFI-1599]",
                                                    "location" => [
                                                        "countries" => [
                                                            [
                                                                "cities" => [
                                                                    [
                                                                        "regions" => [
                                                                            [
                                                                                "id" => 11,
                                                                                "stations" => [
                                                                                    [
                                                                                        "regions" => [
                                                                                            [
                                                                                                "id" => 11
                                                                                            ]
                                                                                        ],
                                                                                        "city" => [
                                                                                            "id" => "msk"
                                                                                        ],
                                                                                        "translations" => [
                                                                                            [
                                                                                                "lang" => "english",
                                                                                                "value" => [
                                                                                                    "name" => "Schukinskaya"
                                                                                                ]
                                                                                            ]
                                                                                        ],
                                                                                        "name" => "Щукинская",
                                                                                        "active" => "true",
                                                                                        "areas" => [
                                                                                            [
                                                                                                "id" => "7z"
                                                                                            ]
                                                                                        ],
                                                                                        "language" => [
                                                                                            "ru" => [
                                                                                                "streets" => "Новощукинская, Академика Бочвара, Максимова"
                                                                                            ]
                                                                                        ],
                                                                                        "id" => 120,
                                                                                        "lines" => [
                                                                                            [
                                                                                                "color" => "b5188d",
                                                                                                "name" => "Таганско-Краснопресненская",
                                                                                                "id" => "msk_7"
                                                                                            ]
                                                                                        ],
                                                                                        "url" => "shukinskaya"
                                                                                    ]
                                                                                ]
                                                                            ]
                                                                        ],
                                                                        "id" => "msk"
                                                                    ]
                                                                ],
                                                                "id" => "ru"
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ],
                                            "images" => [
                                                "avatars" => [
                                                    [
                                                        "protocols" => [
                                                            "http"
                                                        ],
                                                        "url" => "//infodoctor.ru/prep/Puls_3f0ff861.jpg",
                                                        "tags" => [
                                                            "square"
                                                        ]
                                                    ]
                                                ]
                                            ],
                                            "name" => "Диагностическое отделение медицинского центра «Столица»",
                                            "status" => [
                                                "hide" => "active",
                                                "statuses" => [
                                                    "activdate" => "1899-11-29T21:00:00.000Z",
                                                    "viz" => 0,
                                                    "wants" => -1,
                                                    "activ" => -1,
                                                    "n" => 0
                                                ],
                                                "producer" => "Overseer v1.4.4 (PROFI-1599]",
                                                "id" => "active"
                                            ],
                                            "parents" => [
                                                "topology" => [
                                                    [
                                                        "default" => "true",
                                                        "provider" => [
                                                            "id" => "StolitsaMed"
                                                        ]
                                                    ]
                                                ],
                                                "billing" => [
                                                    [
                                                        "provider" => [
                                                            "id" => "StolitsaMed"
                                                        ],
                                                        "id" => 5539
                                                    ]
                                                ]
                                            ]
                                        ],
                                        "id" => "DiagStolitsa"
                                    ]
                                ]
                            ]
                        ],
                        "status" => [
                            "hide" => "active",
                            "statuses" => [
                                "activdate" => "1899-11-29T21:00:00.000Z",
                                "viz" => 0,
                                "wants" => 1,
                                "activ" => 1,
                                "n" => 0
                            ],
                            "producer" => "Overseer v1.4.4 (PROFI-1599]",
                            "id" => "active"
                        ],
                        "geo" => [
                            "areas" => [
                                "leave" => [
                                    "countries" => [
                                        [
                                            "cities" => [
                                                [
                                                    "all" => "true",
                                                    "regions" => [
                                                        [
                                                            "name" => "Москва",
                                                            "id" => 662,
                                                            "url" => "dolgoprudnyi"
                                                        ]
                                                    ],
                                                    "name" => [
                                                        "dative" => "Москве",
                                                        "genitive" => "Москвы",
                                                        "prepositional" => "Москве",
                                                        "nominative" => "Москва"
                                                    ],
                                                    "id" => "msk",
                                                    "ttl" => "false"
                                                ]
                                            ],
                                            "id" => "ru"
                                        ]
                                    ]
                                ],
                                "producer" => "Overseer v1.4.4 (PROFI-1599]",
                                "location" => [
                                    "countries" => [
                                        [
                                            "cities" => [
                                                [
                                                    "regions" => [
                                                        [
                                                            "name" => "Северо-Запад",
                                                            "id" => 11,
                                                            "stations" => [
                                                                [
                                                                    "regions" => [
                                                                        [
                                                                            "id" => 11
                                                                        ]
                                                                    ],
                                                                    "city" => [
                                                                        "id" => "msk"
                                                                    ],
                                                                    "translations" => [
                                                                        [
                                                                            "lang" => "english",
                                                                            "value" => [
                                                                                "name" => "Schukinskaya"
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    "name" => "Щукинская",
                                                                    "active" => "true",
                                                                    "areas" => [
                                                                        [
                                                                            "id" => "7z"
                                                                        ]
                                                                    ],
                                                                    "language" => [
                                                                        "ru" => [
                                                                            "streets" => "Новощукинская, Академика Бочвара, Максимова"
                                                                        ]
                                                                    ],
                                                                    "id" => 120,
                                                                    "lines" => [
                                                                        [
                                                                            "color" => "b5188d",
                                                                            "name" => "Таганско-Краснопресненская",
                                                                            "id" => "msk_7"
                                                                        ]
                                                                    ],
                                                                    "url" => "shukinskaya"
                                                                ]
                                                            ],
                                                            "url" => "7z"
                                                        ]
                                                    ],
                                                    "name" => [
                                                        "dative" => "Москве",
                                                        "genitive" => "Москвы",
                                                        "prepositional" => "Москве",
                                                        "nominative" => "Москва"
                                                    ],
                                                    "id" => "msk"
                                                ]
                                            ],
                                            "id" => "ru"
                                        ]
                                    ]
                                ]
                            ],
                            "addresses" => [
                                "work" => [
                                    [
                                        "address" => "Россия, г. Москва, ул. Габричевского, д. 5, корп. 3",
                                        "maps" => [
                                            "yandex" => [
                                                "coding" => [
                                                    "country" => [
                                                        "name" => "Россия"
                                                    ],
                                                    "coprs" => "1",
                                                    "locality" => [
                                                        "name" => "Москва"
                                                    ],
                                                    "thoroughfare" => [
                                                        "name" => "улица Габричевского"
                                                    ],
                                                    "house" => 5,
                                                    "building" => "Б"
                                                ],
                                                "coordinates" => [
                                                    "37.456864, 55.815231"
                                                ],
                                                "randomisedCoordinates" => [
                                                    "37.45682067428803, 55.815243226848956"
                                                ]
                                            ],
                                            "google" => [
                                                "coordinates" => [
                                                    "37.456761, 55.815223"
                                                ],
                                                "randomisedCoordinates" => [
                                                    "37.45681067356364, 55.81526475311576"
                                                ]
                                            ]
                                        ],
                                        "comment" => "бизнес-центр «Дарья», 4 этаж",
                                        "id" => 11827
                                    ]
                                ]
                            ]
                        ],
                        "feedback" => [
                            "reviews" => [
                                [
                                    "ord_site_id" => 200,
                                    "aim" => "консультация",
                                    "subjects" => [
                                        [
                                            "folder" => "revmatology",
                                            "subsubjects" => [
                                                [
                                                    "id" => 3842
                                                ]
                                            ],
                                            "name" => [
                                                "guild" => "рентгенологи",
                                                "occupation" => "рентгенология",
                                                "specialist" => "рентгенолог"
                                            ],
                                            "id" => 69210
                                        ]
                                    ],
                                    "aimi" => 0,
                                    "name" => "клиент",
                                    "model" => "feedback.review.written",
                                    "id" => 68963,
                                    "text" => "Очень доволен консультацией. Доктор очень понравилась =>  доброжелательная и внимательная, дала рекомендации, лечение сейчас принимаю. Планирую еще обратиться к доктору. Рекомендую врача посетителям портала ИнфоДоктор. \r\nБольшая благодарность Анне Павловне за ее работу!",
                                    "order_id" => 1278845,
                                    "fake_order_id" => "null",
                                    "mark" => "5",
                                    "city_id" => "dktr",
                                    "status" => 60,
                                    "confidential" => "null",
                                    "date_txt" => "29 августа",
                                    "explication" => [
                                        "text" => [
                                            "value" => "Здравствуйте, Наталья Владимировна. При формировании стоимости мы учитываем профессиональные навыки наших специалистов, сервис и гарантию качества. В сети наших клиник действует система скидок и постоянно обновляются специальные предложения. С уважением, служба по работе с претензиями сети клиник мануальной терапии \"Здравствуйте»."
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        "phone" => [
                            "redirects" => [
                                "plakunova" => [
                                    [
                                        "dn" => "74954882035"
                                    ]
                                ]
                            ]
                        ],
                        "pinfs" => [
                            [
                                "typ_id" => "promo_text",
                                "comments" => "Консультация ортопеда + изготовление ортопедических стелек со скидкой 10%.rn------rnКонсультация врача-ортопеда + ЛФК со скидкой 10%.",
                                "key_id" => 1
                            ]
                        ]
                    ],
                    "ratings" => [
                        "default" => 2198
                    ],
                    "ranks" => [
                        "default" => 5.2
                    ],
                    "domain" => "dktr",
                    "metas" => [
                        [
                            "domain" => "dktr",
                            "id" => "doctor"
                        ]
                    ]
                ]
            ],
            "clouds" => [
                [
                    [
                        "id" => "price",
                        "cloud" => [
                            [
                                "static" => [
                                    "price" => [
                                        [
                                            "percentage" => 100,
                                            "count" => 3828,
                                            "from" => 200,
                                            "to" => 20859,
                                            "histogram" => [
                                                "intervals" => [
                                                    [
                                                        "from" => 200,
                                                        "to" => 1001,
                                                        "count" => 475
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ],
                                    "gender" => [
                                        [
                                            "count" => 0,
                                            "female" => 0,
                                            "male" => 0
                                        ]
                                    ],
                                    "model" => [
                                        [
                                            "total" => 6652,
                                            "totalSpecialist" => 5819,
                                            "totalAssociation" => 833,
                                            "provider.specialist" => 5819,
                                            "provider.association" => 268,
                                            "provider.association.branch" => 144,
                                            "provider.association.organization-unit" => 49,
                                            "provider.association.structure-unit" => 47
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
