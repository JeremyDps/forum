<?php



// CE FICHIER SERT AU TRAITEMENT DES FORMULAIRES




require_once('Utilisateur.php');
require_once('Topic.php');
require_once ('Theme.php');
require_once('post.php');

$user = new Utilisateur();
$topic = new Topic();
$theme = new Theme();
$post = new Post();

    if(isset($_POST['connexion'])) {
        $mail = $_POST['user'];
        $pass = $_POST['pass'];
        $user->login($mail, $pass);
        //require "accueil.php";
    }

    if(isset($_POST['inscription'])){
        $firstName = $_POST['nom'];
        $lastName = $_POST['prenom'];
        $userName = $_POST['username'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $user->create($firstName, $lastName, $userName, $mail, $password);
    }

    if(isset($_POST['topic'])){
        $name = $_POST['nom'];
        $description = $_POST['desc'];

        $topic->create($name, $description);
    }

    if(isset($_POST['theme'])){
        $name = $_POST['nom'];

        $theme->create($name);
    }

    if(isset($_POST['discussion'])){
        $message = $_POST['message'];

        $post->create($message);
    }

    if(isset($_POST['changeUsername'])) {
        if(strlen($_POST['newUsername']) != 0) {
            $user->setUsername($_POST['newUsername']);
        }else{
            echo "erreur";
        }
    }

    if(isset($_POST['updateMail'])) {
        if(strlen($_POST['newMail']) != 0) {
            $user->setMail($_POST['newMail']);
        }else{
            echo "erreur";
        }
    }

    if(isset($_POST['changePassword'])) {
        if(strlen($_POST['newPassword']) != 0 && strlen($_POST['actualPassword']) != 0){
            $user->setPassword($_POST['actualPassword'], $_POST['newPassword']);
        }else{
            echo "erreur";
        }
}


?>