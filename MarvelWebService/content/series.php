<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 8/4/2018
 * Time: 6:41 PM
 */
include "classes/getSeriesByID.php";
$character = $_SESSION['current_character'];
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
                <img style="height:250px;" src="<?php echo $character->getImage(); ?>" />
            </div>
            <div class="col-sm-auto" style="padding-top: 50px; padding-bottom: 50px;">
                <h1><?php echo $character->getName(); ?></h1>
                <h4>Comic Series appearances</h4>
            </div>
        </div>
    </div>
<div class="container">
    <?php
    $series = $_SESSION['series'];
    $seriesArray = array();
    foreach ($series as $serie):
        $comicSerie = new Series();
        $comicSerie->setId($serie['id']);
        $comicSerie->setTitle($serie['title']);
        $comicSerie->setDescription($serie['description']);
        $comicSerie->setThumbnail($serie['thumbnail']['path'] . "." . $serie['thumbnail']['extension']);
        $comicSerie->setNumberOfIssues($serie['comics']['available']);
        array_push($seriesArray, $comicSerie);
    endforeach;
    ?>
    <div class="table-hover" style="margin-left: 10px; margin-right: 10px;">
        <div class="row">
            <?php foreach ($seriesArray as $comicSeries): ?>
                <div class="col-sm-3" style="text-align: center; padding:10px;">
                    <form action="index.php?content=comics" method="post">
                        <button type="submit" style="cursor: pointer;"><img src="<?php echo $comicSeries->getThumbnail(); ?>" height="300" width="220"/></button>
                        <input type="hidden" name="seriesID" value="<?php echo $comicSeries->getId(); ?>"/>
                        <input type="hidden" name="seriesTitle" value="<?php echo $comicSeries->getTitle(); ?>"/>
                        <input type="hidden" name="seriesDescription" value="<?php echo $comicSeries->getDescription(); ?>"/>
                        <input type="hidden" name="seriesIssues" value="<?php echo $comicSeries->getNumberOfIssues(); ?>"/>
                        <input type="hidden" name="seriesThumbnail" value="<?php echo $comicSeries->getThumbnail(); ?>"/>
                        <h5 style="color:#6d1a0b;"><?php echo $comicSeries->getTitle(); ?></h5>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<hr style="border: 3px solid #6d1a0b; margin-bottom: 0;">