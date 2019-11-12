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
    <title>Title</title>
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="accueil.css">
</head>
<body>
<div class="container-fluid">

    <!--Entete de la page-->

    <header id="entete">
        <div class="nav-head row">
            <h1 class="nom offset-lg-1 col-lg-3"><a href="#">Mon forum</a></h1>
            <p>
            <ul class="nav-head-ul offset-lg-3">
                <li><a class="col-lg-1 monlien" href="#">Rechercher</a></li>
                <li><a class="col-lg-1" href="#">Déconnexion</a></li>
                <li><a class="col-lg-2" href="#">Mon profil</a></li>
            </ul>
            </p>
        </div>
    </header>

    <!--Section avec la liste des topic pour l'utilisateur-->

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

        <!--Section avec la description du profil connecté-->

        <div class="col-lg-8" id="section_2">
            <section>
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <h1 id="welcome">Bienvenue <?php echo $_SESSION['username']?> !</h1>
                    </div>
                    <div class="offset-lg-1 col-lg-4">
                        <h2>Mes discussions :</h2>
                    </div>
                    <div class="offset-lg-3 col-lg-4">
                        <p id="link_new_topic"><a id="new-topic" href="../topic/creerTopic.html">Créer un nouveau topic !</a></p>
                    </div>
                </div>
                <div class="row">

                    <div class="offset-lg-2"></div>
                    <?php
                        $retour_ligne  = 0;
                        foreach ($res as $elem) {
                            $retour_ligne++;
                    ?>
                    <div class="col-lg-2 topics">
                        <a href="../topic/topic.php?nom=<?= $elem ?>"><?php  echo $elem; ?></a>
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








