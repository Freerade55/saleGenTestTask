<?php

const ROOT = __DIR__ . "/..";

require ROOT . "/functions/require.php";

$link = "https://" . "sgtestramblerru" . ".amocrm.ru/oauth2/access_token";


$data = [
    "client_id" => "3b830886-c539-40ec-be42-30fffa054c34",
    "client_secret" => "hWUC7CyxxNVkaoLzHIJYHGmHpBeDA2WKIbiastNq8b8HoTdTwo0qJQxCjJcRMcXI",
    "grant_type" => "authorization_code",
    "code" => "def50200ecba1ea2c2fb819cb9d14cae6bf09e3e23174973dcb3b2a42b2dd72ce1ee621b8f7ba101aff857d5bba6f66c124d968701a41a3d9c0152edeea4647ac49220a094c7c86a68539fe4181daeaf8c1a8ae55c77bebc2f7383317e0ef04ab9ef56f9ad48c292613fb24cd6e68720dfd2420382faed100d4c854f68b030d8daa7b18cffa23dde92ed48d6710834051d8a967593f60e19e041c2075375b6079ebf9957bef75a4b713565dd48cdfc3334578baf4878b0ab5c099e6083aedbfa2084ad314818eb8d8cf6f064aab18bffbd6188ec16114b698024bb7107dda37876e34478d276b261601ed4416283b2a217626d8f3db7e34a0c96ca8ef81921b852ba41d7050da475e34f94d88793c2074e158a95481fef8d515006f974e0f256a7acfe9c57a79a63cae119ed07d3497d90462d6600eae6d8db1494920ca061e43877c433b225b46ed0f4d0137cf9bc4db3dabf9cc60489fb8be9d95d0119f46c8f844c018a6080afafaed49f461bdc19321410a5e6c82ba9b7087375e27bb43eab664e4d3acad92e273c62004977bfd127845cf3f9ead688d858b2782494826b99d28fb7207c77228a5986d47e6099e5a8b2661150948da96440145493dcfcddf562e4b7a1c52bf072108fe4b97f969d9c8a515949adf735fea2d5ecbbac9edb63d5a1ba6be74e06dfd85b2faf109e971c0d18770266a98bef14f582",
    "redirect_uri" => "https://freerade.ru/testTask/php/test.php"
];


$curl = curl_init();

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, "amoCRM-oAuth-client/1.0");
curl_setopt($curl, CURLOPT_URL, $link);
curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-Type:application/json"]);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
$out = curl_exec($curl);
curl_close($curl);

echo "<pre>";
print_r($out);


$response = json_decode($out, true);

$start_project[0]["rToken"] = $response["refresh_token"];
$start_project[0]["aToken"] = $response["access_token"];

$jsonData = json_encode($start_project);
file_put_contents(ROOT . "/Tokens.json", $jsonData);



