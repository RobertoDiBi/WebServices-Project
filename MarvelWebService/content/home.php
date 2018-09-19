<?php
include 'classes/searchByName.php';
include 'classes/searchCharactersByLetter.php';

if (!empty($_SESSION['hero'])) {
    $heroes = $_SESSION['hero'];
    $superheroes = array();

    foreach ($heroes as $hero) {
        $superhero = new Superhero();
        $superhero->setId($hero["id"]);
        $superhero->setName($hero["name"]);
        if (!empty($hero["description"])) {
            $superhero->setDescription($hero["description"]);
        } else {
            $superhero->setDescription("No description available");
        }

        $image = $hero["thumbnail"]["path"] . "." . $hero["thumbnail"]["extension"];
        $superhero->setImage($image);
        $superhero->setComicsAvailable($hero["comics"]["available"]);
        array_push($superheroes, $superhero);
    }
}
if (!empty($_SESSION['name'])) {
    $name = $_SESSION['name'];
}
?>

<section class="clean-block clean-info dark">
    <hr style="border: 3px solid #6d1a0b; margin: 0;">
    <div class="container">
        <div class="clean-block clean-info dark">

            <div class="container">
                <div class="block-heading">
                    <h1 style="color:#6d1a0b;">Search for your favorite Marvel superhero! </h1>
                    <h2 style="color:#6d1a0b;">Choose a superhero letter... </h2>
                    <p></p>
                </div>
                <div class="scrolling-wrapper">
                    <form action="index.php?content=home#hero" method="GET">
                        <button class="card" type="submit" name="searchLetter" value="a" style="display: inline; cursor:pointer;"><img src="assets/img/A.png" alt="A" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="b" style="display: inline; cursor:pointer;"><img src="assets/img/B.png" alt="B" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="c" style="display: inline; cursor:pointer;"><img src="assets/img/C.png" alt="C" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="d" style="display: inline; cursor:pointer;"><img src="assets/img/D.png" alt="D" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="e" style="display: inline; cursor:pointer;"><img src="assets/img/E.png" alt="E" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="f" style="display: inline; cursor:pointer;"><img src="assets/img/F.png" alt="F" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="g" style="display: inline; cursor:pointer;"><img src="assets/img/G.png" alt="G" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="h" style="display: inline; cursor:pointer;"><img src="assets/img/H.png" alt="H" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="i" style="display: inline; cursor:pointer;"><img src="assets/img/I.png" alt="I" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="j" style="display: inline; cursor:pointer;"><img src="assets/img/J.png" alt="J" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="k" style="display: inline; cursor:pointer;"><img src="assets/img/K.png" alt="K" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="l" style="display: inline; cursor:pointer;"><img src="assets/img/L.png" alt="L" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="m" style="display: inline; cursor:pointer;"><img src="assets/img/M.png" alt="M" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="n" style="display: inline; cursor:pointer;"><img src="assets/img/N.png" alt="N" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="o" style="display: inline; cursor:pointer;"><img src="assets/img/O.png" alt="O" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="p" style="display: inline; cursor:pointer;"><img src="assets/img/P.png" alt="P" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="q" style="display: inline; cursor:pointer;"><img src="assets/img/Q.png" alt="Q" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="r" style="display: inline; cursor:pointer;"><img src="assets/img/R.png" alt="R" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="s" style="display: inline; cursor:pointer;"><img src="assets/img/S.png" alt="S" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="t" style="display: inline; cursor:pointer;"><img src="assets/img/T.png" alt="T" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="u" style="display: inline; cursor:pointer;"><img src="assets/img/U.png" alt="U" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="v" style="display: inline; cursor:pointer;"><img src="assets/img/V.png" alt="V" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="w" style="display: inline; cursor:pointer;"><img src="assets/img/W.png" alt="W" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="x" style="display: inline; cursor:pointer;"><img src="assets/img/X.png" alt="X" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="y" style="display: inline; cursor:pointer;"><img src="assets/img/Y.png" alt="Y" height="200"/></button>
                        <button class="card" type="submit" name="searchLetter" value="z" style="display: inline; cursor:pointer;"><img src="assets/img/Z.png" alt="Z" height="200"/></button>
                    </form>
                </div>
            </div>
            <form action="index.php?content=home#hero" method="POST">
                <div class="block-heading">
                    <h2 style="color:#6d1a0b;">...Or Search by Name </h2>
                    <p>This matches the specified full character name (e.g. Black Panther, Spider-Man, Captain America, Iron Man)</p>
                </div>
                <div class="form-group">
                    <input class="form-control" type="search" placeholder="Type superhero name here..." name="searchName" id="searchName">          
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark btn-block" type="submit">Search&nbsp;&nbsp;&nbsp;<i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <?php if (!empty($superheroes)):
            foreach ($superheroes as $superhero):
                ?>
                <div class="clean-blog-post" id="hero">
                    <div class="row">
                        <div class="col-lg-5" style="text-align: center"><img class="rounded img-fluid" src="<?php echo $superhero->getImage(); ?>" width="350" alt="<?php echo $superhero->getName() . " - poster image"; ?>"></div>
                        <div class="col-lg-7">
                            <br/><br/><br/><br/>
                            <h1 style="color:#6d1a0b;"><?php echo $superhero->getName(); ?></h1>
                            <div class="info"><span class="text-muted"><?php echo "Comics Available: " . $superhero->getComicsAvailable(); ?></span></div>
                            <p><?php echo $superhero->getDescription(); ?></p>
                            <?php if($superhero->getComicsAvailable() != 0):?>
                            <form action="index.php?content=series" method="post" style="display:inline">
                                <input type="hidden" name="characterID" value="<?php echo $superhero->getId();?>"/>
                                <button class="btn btn-outline-danger btn-sm" type="submit" >
                                    Comics</button>
                            </form>
                            <?php endif;?>
                            <form action="index.php?content=videos" method="post" style="display:inline">
                                <input type="hidden" name="vidSearchString" value="<?php echo $superhero->getName(); ?>">
                                <button class="btn btn-outline-danger btn-sm" type="submit" >
                                    Videos</button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach;
        elseif (!empty($name)):
            ?>
            <div class="clean-blog-post" id="hero">
                <div class="row">
                    <div class="col-lg-5" style="text-align: center"><img class="rounded img-fluid" src="assets/img/videoNotFound.jpg" width="400" alt="Not Found"></div>
                    <div class="col-lg-7"><br/><br/><br/><br/>
                        <h2 style="color:#6d1a0b;">No Marvel Superhero could be seen!</h2>
                        <p>Not even the eye of Uatu sees your request for "<?php echo $name;?>"</p>
                    </div>
                </div>
            </div>
<?php endif; ?>
    </div>
</section>
<hr style="border: 3px solid #6d1a0b; margin: 0">

