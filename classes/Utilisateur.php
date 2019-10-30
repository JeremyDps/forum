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
            header('Location: http://localhost/forum/connexion/erreurConnexion.html');
            exit();
        }
    }

    function unLog() {}

    function envoyerMessage() {

    }

    function modifierMessage() {

    }

    function supprimerMessage() {

    }

    function setMail($mail) {
        $this->adrMail = $mail;
    }

    function setUsername($user) {
        if($this->modifierUsername == 1) {
            $this->username = $user;
            $this->modifierUsername--;
        }else{
            echo "Vous ne pouvez plus changer votre nom d'utilisateur";
        }
    }
}

?>