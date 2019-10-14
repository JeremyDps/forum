<?php

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
            echo 'topic cree';
        }else{
            echo 'erreur dans la creation du topic';
        }
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