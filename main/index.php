<?php 
    require_once "functions.php";
    require_once "functions_draw.php";
    require_once "functions_game.php";
    require_once "functions_save.php";
?>
<!DOCTYPE HTML>

<html>
    <head>
        <title>XO Game</title>
        <link rel="shortcut icon" href="background/unnamed.png">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="CSS-master/ermile.css">
        <!-- <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    </head>
    <body>
        <div id="container">
            <!-- <button onclick="swal('Oops!', 'Something went wrong on the page!', 'success');" -->
            <form method='POST' id='form'>
                <?php echo game_start();?>
            </form>
            <footer id='footer'>
                Desined by <a href="https://jobinja.ir/user/PL-2257876" target="_blank">Mohamadreza Abdolah</a>
            </footer>
        </div>
    </body>
</html>