<?php

////токен и рефреш токен, рефреш токен сейвится в rToken.json
function getTokens(string $linkFromConnect, string $method, array $queryData, int $try)
{


    $rToken = file_get_contents(ROOT . "/Tokens.json");
    $rToken = json_decode($rToken, true);

    $link = "https://" . "sgtestramblerru" . ".amocrm.ru/oauth2/access_token";

    $data = [
        "client_id" => "3b830886-c539-40ec-be42-30fffa054c34",
        "client_secret" => "hWUC7CyxxNVkaoLzHIJYHGmHpBeDA2WKIbiastNq8b8HoTdTwo0qJQxCjJcRMcXI",
        "grant_type" => "refresh_token",
        "refresh_token" => $rToken[0]["rToken"],
        "redirect_uri" => "https://freerade.ru/testTask/php/test.php",
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


    $res = json_decode($out, true);

    $tokens = file_get_contents(ROOT . "/Tokens.json");
    $tokens = json_decode($tokens, true);

    $tokens[0]["aToken"] = $res["access_token"];
    $tokens[0]["rToken"] = $res["refresh_token"];
    $tokens = json_encode($tokens, JSON_UNESCAPED_UNICODE);
    file_put_contents(ROOT . "/Tokens.json", $tokens);

    $try++;

    
    return connect($linkFromConnect, $method, $queryData, $try);


}
