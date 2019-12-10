<?php
session_start();

require_once("../classes/Utilisateur.php");
require_once('../classes/Topic.php');

$profil_user =  new Utilisateur();
$topic = new Topic();

$profil = $profil_user->selectProfile($_GET['nom']);
$res = $topic->topicByUser($_SESSION['username']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <meta charset="utf-8">
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="profil.css">
</head>
<body>

<?php  if($_SESSION['connecte'] == true)   {  ?>

<div class="container-fluid">



    <!--Entete de la page-->

    <header id="entete">
        <div class="nav-head row">
            <h1 class="nom offset-lg-1 col-lg-3"><a href="../accueil/accueil.php">Mon forum</a></h1>
            <p>
            <ul class="nav-head-ul offset-lg-3">
                <li><a class="col-lg-1 monlien" href="../forums/forums.php">Forums</a></li>
                <li><a class="col-lg-1" href="../logout/logout.php">Déconnexion</a></li>
                <li><a class="col-lg-2" href="../profil/profil.php?nom=<?= $_SESSION['username'] ?>">Mon profil</a></li>
            </ul>
            </p>
        </div>
    </header>

    <!--selection des topics su le cote-->
    <div class="row">
        <div class="col-lg-4">
            <section id="section_1">
                <div class="col-lg-12">
                    <h2>Liste des topics</h2>
                    <div class="row">
                        <?php
                        foreach($res as $elem){
                            ?>
                            <div class="offset-lg-1 col-lg-10" id="list_topic">
                                <a class="list_topic_section" href="../topic/topic.php?nom=<?= $elem ?>"><?php echo $elem; ?></a>
                            </div>
                        <?php  }  ?>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-lg-8 block_profile">
            <div class="offset-lg-3 col-lg-6">
                <div>
                    <p><strong>Nom :</strong><?php  echo $profil[0];  ?></p>
                    <br>
                </div>
                <div>
                    <p><strong>Prenom :</strong><?php  echo $profil[1];  ?></p>
                    <br>
                </div>
                <div  class="coordonnee">
                    <p><strong>Nom d'utilisateur :</strong><?php  echo $profil[2];
                        if($profil[4] == 1){  ?>
                            <a id="new_topic" href="changeUsername.php">changer de nom d'utilisateur</a>
                        <?php  }  ?></p>
                    <br>
                </div>
                <div  class="coordonnee">
                    <p><strong>Adresse mail :</strong><?php  echo $profil[3];  ?></p>
                    <br>
                </div>
                <div>
                    <p id="link_new_topic"><a href="changePassword.php" id="new_topic">Changer le mot de passe</a></p>
                </div>
                <div>
                    <p><strong>Nombre de connexions :</strong><?php  echo $profil[5];  ?></p>
                    <br>
                </div>
                <div>
                    <p><strong>Dernière connexion :</strong><?php  echo $profil[6];  ?></p>
                </div>
            </div>


        </div>
    </div>
    </div>

    <?php  }else{
        header('Location: ../erreur/erreur.php');
    }
    ?>
</body>
</html>
