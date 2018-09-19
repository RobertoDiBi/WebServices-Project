<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 8/5/2018
 * Time: 12:30 PM
 */
include "classes/getComicsBySeriesID.php";
$series = $_SESSION['current_series'];
?>

<hr style="border: 3px solid #6d1a0b; margin-top: 0;">
<div class="container">
    <a class="btn btn-outline-danger" href="index.php?content=home">Home</a>
    <button class="btn btn-outline-danger" onclick="goBack()">Go Back</button>
</div>
<hr style="border: 3px solid #6d1a0b; margin-bottom: 0;">
<div class="jumbotron">
    <div class="row">
        <div class="col-sm-auto">
            <img style="height:250px;" src="<?php echo $series->getThumbnail(); ?>" />
        </div>
        <div class="col-sm-9" style="padding-top: 50px; padding-bottom: 50px;">
            <h1><?php echo $series->getTitle(); ?></h1>
            <p><?php
                if ($series->getDescription() == "") {
                    echo "No description available.";
                } else {
                    echo $series->getDescription();
                }
                ?></p>
            <h6>Total issues: <?php echo $series->getNumberOfIssues(); ?></h6>
        </div>
    </div>
</div>
<?php
$comics_data = $_SESSION['comics'];
$comics_array = array();
foreach ($comics_data as $comic_data):
    $comic = new Comic();
    $comic->setId($comic_data['id']);
    $comic->setTitle($comic_data['title']);
    $comic->setIssueNumber($comic_data['issueNumber']);
    $comic->setDescription($comic_data['description']);
    $comic->setThumbnail($comic_data['thumbnail']['path'] . "." . $comic_data['thumbnail']['extension']);
    array_push($comics_array, $comic);
endforeach;
?>
<div class="container">
    <div class="table-hover" style="margin-left: 10px; margin-right: 10px;">
        <div class="row">
            <?php foreach ($comics_array as $comicIssue): ?>
                <div class="col-sm-3" style="text-align: center; padding:10px;">
                    <form action="index.php?content=videos" method="post" style="display:inline">
                        <img src="<?php echo $comicIssue->getThumbnail(); ?>" height="300" width="220"/>
                        <h5 style="color:#6d1a0b;"><?php echo $comicIssue->getTitle(); ?></h5>
                        <button class="btn btn-outline-danger btn-sm" type="submit" >
                            Search for videos</button>
                        <input type="hidden" name="vidSearchString" value="<?php echo $comicIssue->getTitle(); ?>">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<hr style="border: 3px solid #6d1a0b; margin-bottom: 0;">
