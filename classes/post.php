<?php

require_once('DBClass.php');

class Post {
    protected $id;
    protected $title;
    protected $createdBy;
    protected $createdOn;

    public function create($message) {
        session_start();
        $db = new DBClass('forum');

        $idTheme = $_SESSION['nomTheme'];

        $db->createMessage($message);
        header('Location: http://localhost/forum/discussion/discussion.php?nom='.$idTheme);
    }

    public function messageByTheme($idTheme) {
        $db = new DBClass('forum');

        return $db->selectMessageByTheme($idTheme);
    }

    public function getTopics() {}
}


?>