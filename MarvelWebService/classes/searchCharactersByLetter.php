<?php
if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    if(!empty($_GET['searchLetter'])){
        $letter = $_GET['searchLetter'];
        $limit = 100;
        $ts = time();
        $public_key = 'cf7f5b10bbf6f8bc72334114a8029ff9';
        $private_key = '92ecbb0ceb7c9b92b385b47b799e3c4508b46a8a';
        $hash = md5($ts . $private_key . $public_key);

        $query_params = [
            'nameStartsWith' => $letter,
            'limit'=> $limit,
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash
        ];

        $query = http_build_query($query_params);

        $url = ('https://gateway.marvel.com:443/v1/public/characters?' . $query);
        $response = file_get_contents($url);

        $response_data = json_decode($response, true);

        if ($response_data["data"]["count"] != 0) {
            $superheroes = $response_data["data"]["results"];
            $_SESSION['hero'] = $superheroes;
        }
    }
}