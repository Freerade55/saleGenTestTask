<?php


function getEntity(int $id): array
{
    $link = "https://" . "sgtestramblerru" . ".amocrm.ru/api/v4/leads/$id";
    $result = json_decode(connect($link), true);

    if (empty($result)) {
        return [];
    } else {
        return $result;
    }


}










function addNerasbor($phone, $email) {

    $link = "https://" . "sgtestramblerru" . ".amocrm.ru/api/v4/leads/unsorted/forms";



    $queryData = [

        [
            "source_name" => "form",
            "source_uid" => "a1fee7c0fc436088e64ba2e8822ba2b3",
            "_embedded" => [

                "leads" => [

                    [
                        "name" => "Заявка Неровных",


                    ],


                ],
                "contacts" => [
                    [
                        "name" => "$phone $email + Nerovnyh",
                        "custom_fields_values" => [
                            [
                                "field_id" => 2337437,
                                "values" => [
                                    [
                                        "value" => $email
                                    ]
                                ]
                            ],
                            [
                                "field_id" => 2337435,
                                "values" => [
                                    [
                                        "value" => $phone
                                    ]
                                ]
                            ]



                        ]



                    ],



                ]


            ],

            "metadata" => [
                "ip" => "123.222.2.22",
                "form_id" => "a1fee7c0fc436088e64ba2e8822ba2b3ewrw",
                "form_sent_at" => 1590830520,
                "form_name" => "Форма",
                "form_page" =>  "$phone $email + Nerovnyh",
                "referer" => "https://www.google.com/",



            ]
        ]
    ];




    return json_decode(connect($link, "POST", $queryData), true);




}
















