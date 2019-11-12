<?php


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
        session_start();
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
        session_start();

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
        session_start();

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



    public function selectTopicByUser($username) {
        $i = 0;
        $tabTopic = array();
        $req = $this->getPDO()->prepare("select id, name, description, createdAt from topic where createdBy = ?");
        $req->execute(array($username));

        while($isConnecte = $req->fetch()) {
            $tabTopic[$i] = $isConnecte['name'];
            $i++;
        }
        $req->closeCursor();
        //print_r($tabTopic);

        return $tabTopic;
    }

    public function selectDescByName($name) {
        $tabTopic = array();

        $req = $this->getPDO()->prepare("select * from topic where name = ?");
        $req->execute(array($name));
        $isConnecte = $req->fetch();

        $tabTopic[0] = $isConnecte['id'];
        $tabTopic[1] = $isConnecte['name'];
        $tabTopic[2] = $isConnecte['description'];
        $tabTopic[3] = $isConnecte['createdAt'];
        $tabTopic[4] = $isConnecte['nbrMembres'];


        return $tabTopic;
    }

    public function createTheme($name){
        session_start();

        $dateTime = date('Y-m-d, H:i:s');

        $req = $this->getPDO()->prepare("insert into theme(id, idTopic, name, createdBy, createdAt) values(default, :idTopic, :name, :createdBy, :createdAt)");

        echo $_SESSION['idTopic'];
        $req->execute(array(
            'idTopic' => $_SESSION['idTopic'],
            'name' => $name,
            'createdBy' => $_SESSION['username'],
            'createdAt' => $dateTime
        ));

        $req = $this->getPDO()->prepare("select * from topic where id = ?");
        $req->execute(array($_SESSION['idTopic']));

        $isConnecte = $req->fetch();
        echo $isConnecte['name'];
        echo "  bjr";
        $req->closeCursor();
        return $isConnecte['name'];
    }

    public function selectThemeByTopic($name){
        $tabTheme = array();
        $i = 0;

        $req = $this->getPDO()->prepare("select theme.name from theme inner join topic on topic.id = theme.idTopic where topic.name = ?");

        $req->execute(array($name));

        while($isConnecte = $req->fetch()){
            $tabTheme[$i] = $isConnecte['name'];
            $i++;
        }

        $req->closeCursor();

        return $tabTheme;
    }
}

    ?>