<?php
include 'classes/Superhero.php';
include 'classes/Series.php';
include 'classes/Video.php';
include 'classes/Comic.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Marvel
            <?php
            if (isset($_GET['content'])) {
                switch ($_GET['content']) {
                    case 'home':
                        echo '| Home';
                        break;
                }
            } else {
                echo '| Home';
            }
            ?>
        </title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/main-style.css">
        <script>
            function goBack() {
                window.history.back();
            }
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

            window.onscroll = function () {
                scrollFunction();
            };

            function scrollFunction() {
                if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 20) {
                    document.getElementById("myBtn").style.display = "block";
                } else {
                    document.getElementById("myBtn").style.display = "none";
                }
            }
        </script>
        <style>
            #myBtn {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 30px;
                z-index: 99;
                font-size: 18px;
                border: none;
                outline: none;
                background-color: red;
                color: white;
                cursor: pointer;
                padding: 15px;
                border-radius: 4px;
            }
        </style>
    </head>
    <body>
        <section class="jumbotron jumbotron-fluid" style="background-image:url(&quot;assets/img/banner3.png&quot;);background-position: center; color:rgba(9, 162, 255, 0); height: 400px; background-repeat: no-repeat; background-size: auto 400px; background-color: #6d1a0b; margin:0;">
        </section>
        <main>
            <?php
            $content = '';
            if (isset($_GET['content'])) {
                $content = $_GET['content'];
                //sanitize it for security reasons
                $content = filter_var($content, FILTER_SANITIZE_STRING);
            }
            //set up the home page as default
            $content = (empty($content)) ? "home" : $content;
            //include the chosen page
            include 'content/' . $content . '.php';
            ?>
        </main><!-- end content -->


        <footer class="page-footer dark ">
            <div class="footer-copyright">
                <p>© 2018 Copyright - Developed By: Roberto Di Biase & Brandon Lauer</p>
                <p>Data Developed by Marvel. © 2016 Marvel </p>
            </div>
        </footer>
        <div>
            <button class="btn btn-outline-danger" onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-alt-circle-up"></i> &nbsp;Top</button>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="assets/js/mainScript.js" type="text/javascript"></script>

    </body>
</html>
