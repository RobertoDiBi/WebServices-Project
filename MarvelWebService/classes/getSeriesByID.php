<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST["characterID"];
    $ts = time();
    $public_key = 'cf7f5b10bbf6f8bc72334114a8029ff9';
    $private_key = '92ecbb0ceb7c9b92b385b47b799e3c4508b46a8a';
    $hash = md5($ts . $private_key . $public_key);

    $query_params = [
        'apikey' => $public_key,
        'ts' => $ts,
        'hash' => $hash
    ];

    $query = http_build_query($query_params);

    $url = ('https://gateway.marvel.com:443/v1/public/characters/' . $id . "/series?" . $query);
    $response = file_get_contents($url);

    $response_data = json_decode($response, true);

    if ($response_data["data"]["count"] != 0) {
        $series = $response_data["data"]["results"];
        $_SESSION['series'] = $series;
    }

    $character_url = 'https://gateway.marvel.com:443/v1/public/characters/' . $id . "?" . $query;
    $character_response = file_get_contents($character_url);
    $character_data = json_decode($character_response, true);
    $character = $character_data["data"]["results"][0];
    $marvel_character = new Superhero();
    $marvel_character->setId($character['id']);
    $marvel_character->setName($character['name']);
    $marvel_character->setImage($character["thumbnail"]["path"] . "." . $character["thumbnail"]["extension"]);
    $marvel_character->setDescription($character['description']);
    $_SESSION['current_character'] = $marvel_character;
}

