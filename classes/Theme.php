<?php
require_once('DBClass.php');

class Theme {
    protected $id;
    protected $title;
    protected $createdBy;
    protected $createdOn;

    public function create($name) {
        $db = new DBClass('forum');


        $var =  $db->createTheme($name);
        echo $var;
        header('Location: http://localhost/forum/topic/topic.php?nom='.$var);
        exit();
    }

    public function selectByTopic($name){
        $db = new DBClass('forum');

        return $db->selectThemeByTopic($name);
    }

    public function getTopics() {}
}

?>