<?php

require_once('DBClass.php');

class Post {

    //creation d'un nouveau message
    public function create($message) {
        session_start();
        $db = new DBClass('forum');

        $idTheme = $_SESSION['nomTheme'];

        $db->createMessage($message);
        header('Location: http://localhost/forum/discussion/discussion.php?nom='.$idTheme);
    }

    //selection des message en fonction du theme
    public function messageByTheme($idTheme) {
        $db = new DBClass('forum');

        return $db->selectMessageByTheme($idTheme);
    }

}
?>