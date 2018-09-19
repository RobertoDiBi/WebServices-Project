<?php
//
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //session_start();
    $name = trim(filter_input(INPUT_POST, "searchName", FILTER_SANITIZE_STRING));
    //$name = "Spider-man";
    $ts = time();
    $public_key = '72969ea502e43933174355b782e7ea07';
    $private_key = '0dcd707b35488a64aa9b3f79f629cb852e463978';
    $hash = md5($ts . $private_key . $public_key);

    $query_params = [
        'name' => $name,
        'apikey' => $public_key,
        'ts' => $ts,
        'hash' => $hash
    ];

    //convert array into query parameters
    $query = http_build_query($query_params);

    $url = ('https://gateway.marvel.com:443/v1/public/characters?' . $query);
    $response = file_get_contents($url);

    $response_data = json_decode($response, true);

    if ($response_data["data"]["count"] != 0) {
        $superhero = $response_data["data"]["results"];
        $_SESSION['hero'] = $superhero;
    } else {
        $_SESSION['name'] = $name;
    }
}
