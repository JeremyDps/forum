<?php
session_start();

require_once('../classes/Topic.php');
require_once('../classes/Theme.php');

$topic = new Topic();
$theme = new Theme();

$res = $topic->descByName($_GET['nom']);

$res_topic = $topic->topicByUser($_SESSION['username']);

$res_theme = $theme->selectByTopic($_GET['nom']);

$_SESSION['idTopic'] = $res[0];



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>topic</title>
        <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="topic.css">
    </head>
    <body>
    <div class="container-fluid">
        <header id="entete">
            <div class="nav-head row">
                <h1 class="nom offset-lg-1 col-lg-3"><a href="../accueil/accueil.php">Mon forum</a></h1>
                <p>
                    <ul class="nav-head-ul offset-lg-3">
                        <li><a class="col-lg-1" href="#">Rechercher</a></li>
                        <li><a class="col-lg-1" href="#">Déconnexion</a></li>
                        <li><a class="col-lg-2" href="../profil/profil.php?nom=<?= $_SESSION['username'] ?>">Mon profil</a></li>
                    </ul>
                </p>
            </div>
        </header>

        <div class="row">
            <div class="col-lg-4">
                <section id="section_1">
                    <div class="col-lg-12">
                        <h2>Liste des topics</h2>
                        <div class="row">
                            <?php
                            foreach($res_topic as $elem){
                                ?>
                                <div class="offset-lg-1 col-lg-10" id="list_topic">
                                    <a class="list_topic_section" href="../topic/topic.php?nom=<?= $elem ?>"><?php echo $elem; ?></a>
                                </div>
                            <?php  }  ?>
                        </div>
                    </div>
                </section>
            </div>

            <!--Section avec la description du profil connecté-->

            <div class="col-lg-8" id="section_2">
                <section>
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10">
                            <h1 id="welcome"><?php echo $res[1] ?></h1>
                        </div>
                        <div class="col-lg-12">
                            <p><strong>Description : </strong><?php echo $res[2]; ?></p>
                            <p><strong>Date de création : </strong><?php echo $res[3]; ?></p>
                            <p><strong>Membres : </strong><?php echo $res[4]; ?></p>
                        </div>
                        <div class="offset-lg-1 col-lg-4">
                            <h2>Mes thèmes :</h2>
                        </div>
                        <div class="offset-lg-3 col-lg-4">
                            <p id="link_new_topic"><a id="new-topic" href="../theme/creerTheme.html">Créer un nouveau thème !</a></p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="offset-lg-2"></div>
                        <?php
                        $retour_ligne  = 0;
                        foreach ($res_theme as $elem) {
                            $retour_ligne++;
                            ?>
                            <div class="col-lg-2 topics">
                                <a href="../discussion/discussion.php?nom=<?= $elem ?>"><?php  echo $elem; ?></a>
                            </div>
                            <div class="offset-lg-1"></div>
                            <?php  if($retour_ligne == 3){
                                $retour_ligne = 0; ?>
                                <div class="offset-lg-2"></div>
                            <?php  }  ?>
                        <?php  }  ?>
                    </div>
                </section>
            </div>
        </div>
        </div>
    </body>
</html>