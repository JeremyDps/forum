<?php
require_once('DBClass.php');

class Topic {
    protected $titre;
    protected $description;
    protected $dateCreation;
    protected $nbrMembres;

    function __construct() {
    }



    function create($name, $description) {
        $db = new DBClass('forum');

        if($db->createTopic($name, $description)){
            header('Location: http://localhost/forum/accueil.php');
            exit();
        }else{
            echo 'erreur dans la creation du topic';
        }
    }

    function topicByUser($username) {
        $db = new DBClass('forum');

        return $db->selectTopicByUser($username);
    }

    function descByName($name) {
        $db = new DBClass('forum');

        return $db->selectDescByName($name);
    }

    function delete() {}

    function setTitle($newTitre) {
        $this->titre = $newTitre;
    }

    function setDescription($desc) {
        $this->description = $desc;
    }
}

?>