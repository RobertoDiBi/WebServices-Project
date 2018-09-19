<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = trim(filter_input(INPUT_POST, "vidSearchString", FILTER_SANITIZE_STRING));
    //$search = "Spiderman";
    $part = "snippet";
    $maxResults = "50";
    $type = "video";
    $public_key = 'AIzaSyBH39-kbcvAoSEd7z_b4edBPQahdMkdpnE';


    $query_params = [
        'part' => $part,
        'maxResults' => $maxResults,
        'q' => $search . " marvel",
        'type' => $type,
        'key' => $public_key
    ];

    //convert array into query parameters
    $query = http_build_query($query_params);

    $url = ('https://www.googleapis.com/youtube/v3/search?' . $query);
    $response = file_get_contents($url);

    $response_data = json_decode($response, true);

    $videos = $response_data["items"];

    $allResults = array();

    foreach ($videos as $video) {
        $v = new Video();
        $v->setTitle($video["snippet"]["title"]);
        $v->setDescription($video["snippet"]["description"]);
        $v->setVideoLink("https://www.youtube.com/embed/" . $video["id"]["videoId"]);

        array_push($allResults, $v);
    }
}
?>
<?php if (!empty($allResults)): ?>


    <hr style="border: 3px solid #6d1a0b;margin-top: 0;">
    <div class="container">
        <a class="btn btn-outline-danger" href="index.php?content=home">Home</a>
        <button class="btn btn-outline-danger" onclick="goBack()">Go Back</button>
    </div>
    <hr style="border: 3px solid #6d1a0b; ">

    <div class="container">
        <div class="clean-blog-post" id="hero">
            <div class="row">
                <?php foreach ($allResults as $v):
                    ?>
                    <div class="col-lg-4" style="text-align: center">
                        <div class="container-flex" id="video" style="height: 300px;">
                            <iframe width="100%" height="100%"
                                    src="<?php echo $v->getVideoLink(); ?>">
                            </iframe>
                        </div>
                        <div class="container">
                            <h3 style="color:#6d1a0b;"><?php echo $v->getTitle(); ?></h3> <a href="<?php echo $v->getVideoLink(); ?>" target="_blank"><i class="fas fa-desktop"></i> Full screen</a>
                            <p><?php echo $v->getDescription(); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>      
    </div>
<?php else: ?>
    <div class="clean-blog-post" id="hero">
        <div class="row">
            <div class="col-lg-5" style="text-align: center"><img class="rounded img-fluid" src="assets/img/notFound.png" width="350" alt="Not Found"></div>
            <div class="col-lg-7"><br/><br/><br/><br/>
                <h2 style="color:#6d1a0b;">Ops!! No video found!</h2>
                <p>Iron man broke looking for it</p>
            </div>
        </div>
    </div>
<?php endif; ?>
<div>
    <hr style="border: 3px solid #6d1a0b; margin-bottom: 0;">
</div>



