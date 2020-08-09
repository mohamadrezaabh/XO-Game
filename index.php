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
    </head>
    <body>
        <div id="container">
            <form method='POST' id='form'>
                <?php echo game_start();?>
            </form>
            <footer id='footer'>
                Desined by <a href="https://jobinja.ir/user/PL-2257876" target="_blank">Mohamadreza Abdolah</a>
            </footer>
        </div>
    </body>
</html>
