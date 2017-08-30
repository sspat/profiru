<?php
namespace sspat\ProfiRu\Responses\Validators\ArrayValidator\Schemas;

final class SpecialistsSchema
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
                    "id" => "MalkovaAP",
                    "definition" => [
                        "id" => "MalkovaAP",
                        "prices" => [
                            [
                                "edizm_id" => 0,
                                "price4quantum" => 3000,
                                "pservice" => [
                                    "edizm_id" => 0,
                                    "top_id" => 0,
                                    "altname" => "",
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
                                                            "dative" => "ревматологии",
                                                            "accusative" => "ревматологию",
                                                            "ablative" => "ревматологией",
                                                            "flags" => [
                                                                "D" => true,
                                                                "X" => true
                                                            ],
                                                            "genitive" => "ревматологии",
                                                            "prepositional" => "ревматологии",
                                                            "nominative" => "ревматология"
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ],
                                    "typ" => "",
                                    "srch" => "",
                                    "folder" => "revmatology",
                                    "spname" => "ревматолог",
                                    "u_id" => "",
                                    "composite" => "",
                                    "parent_id" => 0,
                                    "popularity" => 292,
                                    "name" => "ревматология",
                                    "z_id" => "dktr",
                                    "arithmop" => "",
                                    "id" => 55600,
                                    "allnames" => "",
                                    "status" => 1
                                ],
                                "edizm" => [
                                    "nquanta" => 1,
                                    "name" => "усл.",
                                    "quantum_id" => 1,
                                    "id" => 1,
                                    "allnames" => "услуга"
                                ],
                                "prep_id" => "MalkovaAP",
                                "ttl" => "",
                                "edizmDefault" => [
                                    "nquanta" => 1,
                                    "name" => "сеанс",
                                    "quantum_id" => 1,
                                    "id" => 102,
                                    "allnames" => ""
                                ],
                                "pservice_id" => 55600,
                                "ckat" => 3,
                                "price" => 3000,
                                "pcrank" => 9020,
                                "rank" => 0,
                                "comment" => "",
                                "spread_over" => 0,
                                "price2" => "null"
                            ]
                        ],
                        "name" => [
                            "patronymic" => "Родриго",
                            "last" => "Виера",
                            "first" => "Андрес",
                            "full" => "Виера Санчес Андрес Родриго",
                            "maiden" => "Санчес"
                        ],
                        "images" => [
                            "avatars" => [
                                [
                                    "protocols" => [
                                        "http"
                                    ],
                                    "url" => "//infodoctor.ru/prep/MalkovaAP_f57bf1e7.jpg",
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
                                                "value" => 55720
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
                            "category" => [
                                [
                                    "description" => "Врач высшей квалификационной категории"
                                ]
                            ],
                            "education" => [
                                [
                                    "description" => "Физиотерапия, Институт последипломного профессионального образования ФМБЦ им. А.И. Бурназяна ФМБА (2012 г.]"
                                ]
                            ],
                            "academic" => [
                                "degree" => [
                                    [
                                        "description" => "Кандидат медицинских наук"
                                    ]
                                ]
                            ],
                            "general" => [
                                "common" => [
                                    [
                                        "raw" => "Кандидат медицинских наук, ревматолог с высшей категорией, имеет дополнительное образование по физиотерапии. Её научная деятельность направлена на изучение гипоксии (интервальные гипоксические тренировки], а также на лечение ревматоидного артрита. При лечении пациентов пользуется внутрисуставными и периартикулярными инъекциями и физиотерапевтическими процедурами, дополняющими медикаментозное лечение. Внедряет метод гипоксических интервальных тренировок в лечение заболеваний суставов. Оказывает помощь при функциональных нарушениях (синдроме первичной фибромиалгии] и заболеваниях суставов и позвоночника (остеоартроз, дегенеративные заболевания позвоночника, ревматоидный, реактивный, псориатический артриты, подагра]."
                                    ]
                                ]
                            ],
                            "sport" => [],
                            "experience" => [
                                "common" => [
                                    [
                                        "months" => 192,
                                        "description" => "Медицинский опыт – 16 лет",
                                        "years" => 16
                                    ]
                                ]
                            ]
                        ],
                        "parents" => [
                            "reception" => [
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
                                                                        "coprs" => 3,
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
                                                ],
                                                "interier" => [
                                                    [
                                                        "original" => "/pfiles/TsarskayaKlinika/9faf400b7cd8e03217922a8c44318f19.jpg",
                                                        "mode_url" => "//cdn.infodoctor.ru/pfiles/TsarskayaKlinika/0f3a395cd8eb44466e3f1f843509fa8f",
                                                        "ptags" => [

                                                        ],
                                                        "pservices" => [

                                                        ],
                                                        "title" => "",
                                                        "url" => "//cdn.infodoctor.ru/pfiles/TsarskayaKlinika/9faf400b7cd8e03217922a8c44318f19.jpg",
                                                        "cdt" => "2016-10-17T18:59:36.000Z",
                                                        "host" => "cdn.infodoctor.ru",
                                                        "rank" => 200,
                                                        "furl" => "/pfiles/TsarskayaKlinika/0f3a395cd8eb44466e3f1f843509fa8f",
                                                        "producer" => "Overseer v1.4.4 (PROFI-1599]",
                                                        "category" => "interier",
                                                        "protocols" => [
                                                            "http"
                                                        ],
                                                        "seo" => "«Царская клиника» Москва — фотогалерея"
                                                    ]
                                                ]
                                            ],
                                            "name" => "Клиника функциональных нарушений",
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
                                            "parents" => [
                                                "billing" => [
                                                    [
                                                        "provider" => [
                                                            "id" => "Puls"
                                                        ],
                                                        "id" => 4233
                                                    ]
                                                ],
                                                "topology" => [
                                                    [
                                                        "default" => "true",
                                                        "provider" => [
                                                            "id" => "KlinikaSemeinaya"
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ],
                                        "id" => "Puls"
                                    ],
                                    "id" => 18639
                                ]
                            ],
                            "topology" => [
                                [
                                    "id" => 83939,
                                    "provider" => [
                                        "model" => "provider.association.branch",
                                        "definition" => [
                                            "name" => "«Клиника Семейная» у м. Площадь Ильича, Римская",
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
                                            "parents" => [
                                                "topology" => [
                                                    [
                                                        "default" => true,
                                                        "provider" => [
                                                            "id" => "KlinikaSemeinaya"
                                                        ]
                                                    ]
                                                ],
                                                "billing" => [
                                                    [
                                                        "provider" => [
                                                            "id" => "KlinikaSemeinaya"
                                                        ],
                                                        "id" => 4029
                                                    ]
                                                ]
                                            ],
                                            "geo" => [
                                                "addresses" => [
                                                    "work" => [
                                                        [
                                                            "address" => "Россия, Москва, ул. Сергия Радонежского, д. 5/2, стр. 1",
                                                            "maps" => [
                                                                "yandex" => [
                                                                    "coordinates" => [
                                                                        [
                                                                            37.674049,
                                                                            55.747165
                                                                        ]
                                                                    ],
                                                                    "randomisedCoordinates" => [
                                                                        [
                                                                            37.674054287687,
                                                                            55.747204937766
                                                                        ]
                                                                    ]
                                                                ]
                                                            ],
                                                            "comment" => "От ст. м. «Площадь Ильича»: идти в сторону центра по ул. С. Радонежского примерно 10 мин. ",
                                                            "id" => 11959
                                                        ]
                                                    ],
                                                    "producer" => "Overseer v1.4.4 (PROFI-1599]",
                                                    "residence" => [
                                                        [
                                                        ]
                                                    ]
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
                                                            [
                                                                "http"
                                                            ]
                                                        ],
                                                        "url" => "//infodoctor.ru/prep/KlinikaSemeinayaRimskaya_ac1e0f4ed99120a395ed18ae6f08b809.jpg",
                                                        "tags" => [
                                                            [
                                                                "square"
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ],
                                        "id" => "KlinikaSemeinayaRimskaya"
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
                                                    "id" => 5705
                                                ]
                                            ],
                                            "name" => [
                                                "guild" => "ревматологи",
                                                "occupation" => "ревматология",
                                                "specialist" => "ревматолог"
                                            ],
                                            "id" => 55600
                                        ]
                                    ],
                                    "aimi" => 10,
                                    "name" => "клиент",
                                    "model" => "feedback.review.verbal",
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
                                            "value" => "Здравствуйте, Инна Захаровна. Мы рады, что визит в нашу клинику оправдал ваши ожидания. Спасибо за отзыв. Берегите себя и будьте здоровы. С уважением, служба по работе с претензиями сети клиник мануальной терапии \"Здравствуйте»."
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
                        "gender" => 'female',
                        "pinfs" => [
                            [
                                "typ_id" => "skidka",
                                "comments" => "",
                                "key_id" => -1
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
                                            "count" => 4763,
                                            "female" => 2964,
                                            "male" => 1799
                                        ]
                                    ],
                                    "model" => [
                                        [
                                            "total" => 5271,
                                            "totalSpecialist" => 4763,
                                            "totalAssociation" => 508,
                                            "provider.specialist" => 4763,
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
