<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>changer le nom d'utilisateur</title>
    <link rel="stylesheet" href="changePassword.css">
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php  if($_SESSION['connecte'] == true){  ?>

    <h1>Attention ! Vous pourrez modifier votre nom d'utilisateur qu'une seule fois.</h1>

        <div class="container">
            <div class="text-block">
                <form class="offset-lg-3 col-lg-6" method="post" action="../classes/essai.php">
                    <div class="form-group">
                        <label name="newUsername">Votre nouveau nom d'utilisateur : </label>
                        <input type="text" name="newUsername" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="changeUsername" value="Modifier le nom d'utilisateur" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>


    <?php  }else{
        header('Location: ../erreur/erreur.php');
    }
    ?>
</body>
</html>