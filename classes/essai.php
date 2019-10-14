<?php
include 'Utilisateur.php';
include 'Topic.php';

$user = new Utilisateur();
$topic = new Topic();

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

?>