<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>changement du mot de passe</title>
    <link rel="stylesheet" href="changePassword.css">
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <?php  if($_SESSION['connecte'] == true){  ?>
        <h1>Modifier mon mot de passe</h1>
        <div class="container">
            <div class="text-block">
                <form class="offset-lg-3 col-lg-6" method="post" action="../classes/essai.php">
                    <div class="form-group">
                        <label name="actualPassword">Votre mot de passe actuel</label>
                        <input type="password" name="actualPassword" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label name="newPassword" >Votre nouveau mot de passe</label>
                        <input type="password" name="newPassword" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="changePassword" class="btn btn-primary" value="changer mon mot de passe">
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