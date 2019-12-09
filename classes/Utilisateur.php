<?php
require_once('DBClass.php');

class Utilisateur {
    protected $id;
    protected $prenom;
    protected $nom;
    protected $username;
    protected $avatar;
    protected $adrMail;
    protected $numTel;
    protected $modifierUsername = 1;
    protected $nbConnexion;
    protected $lastConnexionDatetime;
    
    function __construct() {
        
    }

    function create($firstName, $lastName, $userName, $mail, $password) {
        $db = new DBClass('forum');

        if($db->inscription($firstName, $lastName, $userName, $mail, $password) === true){
            //echo ' vous etes inscris';
            header('Location: http://localhost/forum/accueil/accueil.php');
            exit();
        }else{
            header('Location: http://localhost/forum/inscription/erreurInscription.html');
            exit();
        }
         //echo $db->inscription($firstName, $lastName, $userName, $mail, $password);

    }

    function login($mail, $pass) {
        $db = new DBClass('forum');

        if($db->connection($mail, $pass) === true){
            header('Location: http://localhost/forum/accueil/accueil.php');
            exit();
        }else{
            //header('Location: http://localhost/forum/connexion/erreurConnexion.html');
            header('Location: http://localhost/forum/accueil/accueil.php');
            exit();
        }
    }

    function selectProfile($name){
            $db = new DBClass('forum');

            return $db->selectProfileByUser($name);
    }

    function unLog() {}

    function envoyerMessage() {

    }

    function modifierMessage() {

    }

    function supprimerMessage() {

    }

    function setMail($mail) {
        $db = new DBClass('forum');
        $db->updateMail($mail);
        header('Location: http://localhost/forum/profil/profil.php?nom='.$_SESSION['username']);
        exit();
    }

    function setUsername($user) {
        if($this->modifierUsername == 1) {
            $db = new DBClass('forum');
            $db->updateUsername($user);
            header('Location: http://localhost/forum/accueil/accueil.php');
            exit();
        }else{
            echo "Vous ne pouvez plus changer votre nom d'utilisateur";
        }
    }

    function setPassword($new, $old){
        $db = new DBClass('forum');

        if($db->updatePassword($old, $new)){
            header('Location: http://localhost/forum/accueil/accueil.php');
            exit();
        }
    }

    /*function getConnecte(){
        return $this->connecte;
    }

    function setConnecte($boolean) {
        $this->connecte = $boolean;
    }*/
}

?>