<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recherche</title>
    </head>
    <body>

        <?php if ($_SESSION['connecte'] == true) {  ?>

        <form>

        </form>

        <?php  }else{
            header('Location: ../erreur/erreur.php');
        }
        ?>
    </body>
</html>
