<?php

require_once('../classes/Topic.php');

$topic = new Topic();

$res = $topic->descByName($_GET['nom']);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>topic</title>
        <link href="../bootstrap-4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="topic.css">
    </head>
    <body>
    <div class="container-fluid">
        <header id="entete">
            <div class="nav-head row">
                <h1 class="nom offset-lg-1 col-lg-3"><a href="#">Mon forum</a></h1>
                <p>
                    <ul class="nav-head-ul offset-lg-3">
                        <li><a class="col-lg-1" href="#">Rechercher</a></li>
                        <li><a class="col-lg-1" href="#">Déconnexion</a></li>
                        <li><a class="col-lg-2" href="#">Mon profil</a></li>
                    </ul>
                </p>
            </div>
        </header>

            <div class="row" id="topic-description">
                <div class="col-lg-2">
                    ma liste de topics
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10 col-lg-offset-1">
                             topic 1
                        </div>
                        <div class="offset-lg-1 col-lg-10 col-lg-offset-1">
                            topic 2
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                     <div class="row">
                         <div class="col-lg-4">
                             <h1>
                                 <?php echo $res[0]; ?>
                             </h1>
                         </div>
                         <div class="col-lg-8">
                             <h2 id="info-topic">
                                 Description : <?php echo $res[1]; ?>
                             </h2>
                             <h3>
                                 Crée le : <?php echo $res[2]; ?>
                             </h3>
                             <h3>
                                 nombres de membres : <?php echo $res[3]; ?>
                             </h3>
                         </div>
                         <div class="col-lg-12">
                             <h2>Thèmes</h2>
                             <p>blablablablablabla</p>
                             <p id="lien"><a id="new-topic" href="../theme/creerTheme.html">Créer un nouveau thème !</a></p>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </body>
</html>


