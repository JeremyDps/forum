<?php
require_once('DBClass.php');

class Theme {

    //creation d'un nouveau theme
    public function create($name) {
        $db = new DBClass('forum');

        $var =  $db->createTheme($name);
        echo $var;
        header('Location: http://localhost/forum/topic/topic.php?nom='.$var);
        exit();
    }

    //selection des themes en fonction des topics
    public function selectByTopic($name){
        $db = new DBClass('forum');

        return $db->selectThemeByTopic($name);
    }

    //recherche l'id du theme
    public function themeByName($nomTheme) {
        $db = new DBClass('forum');

        return $db->selectIdBytheme($nomTheme);
    }
}

?>