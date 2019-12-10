<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>creer topic</title>
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="creerTopic.css">
</head>
<body>

    <?php  if($_SESSION['connecte'] == true) {  ?>

    <h1>Creer un nouveau topic</h1>
    <div class="container">
        <div class="text-block">
            <form class="offset-lg-3 col-lg-6" method="post" action="../classes/essai.php">
                <div class="form-group">
                    <label name="nom">Nom du topic</label>
                    <input type="text" name="nom" class="form-control" aria-describedby="emailHelp" placeholder="Nom du topic" required>
                </div>
                <div class="form-group">
                    <label name="desc">Description</label>
                    <input type="text" name="desc" class="form-control" aria-describedby="emailHelp" placeholder="Description" required><br>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="topic" value="creer mon topic">
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