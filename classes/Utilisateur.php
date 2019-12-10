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

    //creation d'un nouvel utilisateur (inscription)
    function create($firstName, $lastName, $userName, $mail, $password) {
        $db = new DBClass('forum');

        if($db->inscription($firstName, $lastName, $userName, $mail, $password) === true){
            header('Location: http://localhost/forum/accueil/accueil.php');
            exit();
        }else{
            echo "erreur dans l'inscription, vérifiez votre adresse mail";
        }
    }

    //connexion
    function login($mail, $pass) {
        $db = new DBClass('forum');

        if($db->connection($mail, $pass) === true){
            header('Location: http://localhost/forum/accueil/accueil.php');
            exit();
        }else{
            header('Location: http://localhost/forum/accueil/accueil.php');
            exit();
        }
    }

    //affichage du profil
    function selectProfile($name){
            $db = new DBClass('forum');

            return $db->selectProfileByUser($name);
    }

    //modifier le nom d'utilisateur
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

    //modifier le mot de passe
    function setPassword($new, $old){
        $db = new DBClass('forum');

        if($db->updatePassword($old, $new)){
            header('Location: http://localhost/forum/accueil/accueil.php');
            exit();
        }
    }
}

?>