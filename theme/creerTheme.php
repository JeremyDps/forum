<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="creerTheme.css">
</head>
<body>

    <?php  if($_SESSION['connecte'] == true){  ?>

    <h1>Creer un nouveau thème</h1>
    <div class="container">
        <div class="text-block">
            <form class="offset-lg-3 col-lg-6" method="post" action="../classes/essai.php">
                <div class="form-group">
                    <label name="nom">Nom du thème</label>
                    <input type="text" name="nom" class="form-control" aria-describedby="emailHelp" placeholder="Nom du thème" required>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="theme" value="creer le nouveau thème">
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