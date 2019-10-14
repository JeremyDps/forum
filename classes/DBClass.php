<?php

session_start();

class DBClass
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /*
     *
     * */

    public function getPDO() {
        if($this->pdo === null) {
            try {
                $pdo = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.';charset=utf8', 'root', '');
                $this->pdo = $pdo;
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
        return $this->pdo;
    }

    public function connection($mail, $pass){
        $dateTime = date('Y-m-d, H:i:s');

        $req = $this->getPDO()->prepare("select * from user where adrMail = ? and password = ?");
        $req->execute(array($mail, $pass));
        $isConnecte = $req->fetch();

        $_SESSION['username'] = $isConnecte['username'];

        if ($isConnecte['adrMail'] === $mail && $isConnecte['password']) {
            $nbConnection = $isConnecte['nbConnexion'] + 1;

            $req = $this->getPDO()->prepare("update user set nbConnexion = ?, lastConnexionDatetime = ? where adrMail = ?");
            $req->execute(array($nbConnection, $dateTime, $mail));

            $req->closeCursor();

            return true;
        }else{
            $req->closeCursor();
            return false;
        }
    }

    public function inscription($firstName, $lastName, $userName, $mail, $password) {
        $dateTime = date('Y-m-d, H:i:s');
        /*$req = $this->getPDO()->query("select adrMail from user");
        while($datas = $req->fetch()){
            if($datas['adrMail'] === $mail){
                echo "erreur : votre adresse mail existe déjà";
                return 0;
            }
        }*/
        $req = $this->getPDO()->prepare("insert into user(id, prenom, nom, username, adrMail, password, modifierUsername, nbConnexion, lastConnexionDatetime) values (default, :prenom, :nom, :username, :adrMail, :password, 1, 1, :lastConnexionDatetime)");

        if($req->execute(array(
           'prenom' => $firstName,
           'nom' => $lastName,
           'username' => $userName,
           'adrMail' => $mail,
            'password' => $password,
            'lastConnexionDatetime' => $dateTime
        ))){
            $_SESSION['username'] = $userName;
            $req->closeCursor();
            return true;
        }else{
            $req->closeCursor();
            return false;
        }

    }

    public function signOut(){}

    public function update(){}

    public function delete(){}

    public function createTopic($name, $description) {
        $dateTime = date('Y-m-d, H:i:s');

        $req = $this->getPDO()->prepare("insert into topic(id, name, description, createdAt, createdBy, nbrMembres) values (default, :name, :description, :createdAt, :createdBy, 1)");

        if($req->execute(array(
            'name' => $name,
            'description' => $description,
            'createdAt' => $dateTime,
            'createdBy' => $_SESSION['username']
        ))){
            $req->closeCursor();
            return true;
        }else{
            $req->closeCursor();
            return false;
        }

    }
}

    ?>