<?php
require_once('DBClass.php');

class Topic {

    function __construct() {
    }

    //creation d'un nouveau topic
    function create($name, $description) {
        $db = new DBClass('forum');

        if($db->createTopic($name, $description)){
            header('Location: http://localhost/forum/accueil/accueil.php');
            exit();
        }else{
            echo 'erreur dans la creation du topic';
        }
    }

    //afficher les topics de l'utilisateur
    function topicByUser($username) {
        $db = new DBClass('forum');

        return $db->selectTopicByUser($username);
    }

    //rechercher tous les topics
    function allTopics() {
        $db = new DBClass('forum');

        return $db->selectAllTopics();
    }

    //rechercher la description du topic
    function descByName($name) {
        $db = new DBClass('forum');

        return $db->selectDescByName($name);
    }

    //modifier le titre
    function setTitle($newTitre) {
        $this->titre = $newTitre;
    }

    //modifier la description
    function setDescription($desc) {
        $this->description = $desc;
    }
}

?>