<?php
session_start();

require_once("../classes/Utilisateur.php");

$profil_user =  new Utilisateur();

$profil = $profil_user->selectProfile($_GET['nom']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="profil.css">
</head>
<body>
    <div>
        <p><strong>Nom :</strong><?php  echo $profil[0];  ?></p>
        <br>
    </div>
    <div>
        <p><strong>Prenom :</strong><?php  echo $profil[1];  ?></p>
        <br>
    </div>
    <div>
        <p><strong>Nom d'utilisateur :</strong><?php  echo $profil[2];
        if($profil[4] == 1){  ?>
            <a href="changeUsername.html">changer de nom d'utilisateur</a>
        <?php  }  ?></p>
        <br>
    </div>
    <div>
        <p><strong>Adresse mail :</strong><?php  echo $profil[3];  ?></p>
        <p><a href="changeMail.html">Changer l'adresse mail</a> </p>
        <br>
    </div>
    <div>
        <p><a href="changePassword.html">Changer le mot de passe</a></p>
    </div>
    <div>
        <p><strong>Nombre de connexions :</strong><?php  echo $profil[5];  ?></p>
        <br>
    </div>
    <div>
        <p><strong>Dernière connexion :</strong><?php  echo $profil[6];  ?></p>
    </div>
</body>
</html>
