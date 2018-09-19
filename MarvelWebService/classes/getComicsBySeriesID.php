<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 8/5/2018
 * Time: 12:19 PM
 */
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST["seriesID"];
    $ts = time();
    $public_key = 'cf7f5b10bbf6f8bc72334114a8029ff9';
    $private_key = '92ecbb0ceb7c9b92b385b47b799e3c4508b46a8a';
    $hash = md5($ts . $private_key . $public_key);

    $query_params = [
        'orderBy'=> "issueNumber",
        'apikey' => $public_key,
        'ts' => $ts,
        'hash' => $hash
    ];

    $query = http_build_query($query_params);

    $url = ('https://gateway.marvel.com:443/v1/public/series/' . $id . "/comics?" . $query);
    $response = file_get_contents($url);

    $response_data = json_decode($response, true);

    if ($response_data["data"]["count"] != 0) {
        $comics = $response_data["data"]["results"];
        $_SESSION['comics'] = $comics;
    }

    $seriesTitle = $_POST['seriesTitle'];
    $seriesDescription = $_POST['seriesDescription'];
    $seriesIssues = $_POST['seriesIssues'];
    $seriesThumbnail = $_POST['seriesThumbnail'];

    $series = new Series();
    $series->setId($id);
    $series->setTitle($seriesTitle);
    $series->setDescription($seriesDescription);
    $series->setNumberOfIssues($seriesIssues);
    $series->setThumbnail($seriesThumbnail);
    $_SESSION['current_series'] = $series;
}