<?php
    session_start();
    include '../classes/Topic.php';
    $topic = new Topic();
    $res = $topic->topicByUser($_SESSION['username']);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bienvenue - accueil</title>
        <link href="../bootstrap-4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="accueil.css">
    </head>
    <body>
    <div class="container-fluid">
        <header id="entete">
            <div class="nav-head row">
                <h1 class="nom offset-lg-1 col-lg-3"><a href="#">Mon forum</a></h1>
                <p>
                <ul class="nav-head-ul offset-lg-3">
                    <li ><a class="col-lg-1" href="#">Rechercher</a></li>
                    <li ><a class="col-lg-1" href="#">Déconnexion</a></li>
                    <li ><a class="col-lg-2" href="#">Mon profil</a></li>
                </ul>
                </p>
            </div>
        </header>


            <div class="row">
                <section class="col-lg-4">
                    <p>Ma liste de topics</p>
                    <div>
                        <ul>
                            <?php
                            foreach ($res as $elem) {
                                ?>
                                <li class="col-lg-offset-1 col-lg-10 col-lg-offset-1 lien">
                                    <a href="../topic/topic.php?nom=<?= $elem ?>"><?php  echo $elem;  ?></a>
                                </li>
                            <?php   }
                            ?>
                        </ul>
                    </div>
                </section>
                <div class="aligner col-lg-8">
                    <h1>Bienvenue <?php echo $_SESSION['username']; ?> </h1>



                    <p id="lien"><a id="new-topic" href="../topic/creerTopic.html">Créer un nouveau topic !</a></p>
                    <h2>Mes discussions</h2>

                    <div>
                        <ul class="row">
                            <?php
                            foreach ($res as $elem) {
                                ?>
                                <li class="col-lg-3 offset-lg-1 lien">
                                    <a href="../topic/topic.php?nom=<?= $elem ?>"><?php  echo $elem;  ?></a>
                                </li>
                            <?php   }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>








