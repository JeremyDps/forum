<?php
session_start();

if ($_SESSION['connecte'] == true) {

    // Supression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

    // Supression des cookies de connexion automatique
    setcookie('login', '');
    setcookie('pass_hache', '');

    header('Location: ../accueil_base/accueil.html');

}else{ // Dans le cas contraire on t'empêche d'accéder à cette page en te redirigeant vers la page que tu veux.

    header('Location: ../connexion/connexion.php');

}

?>
