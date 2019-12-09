<?php
    require_once('../classes/Theme.php');
    require_once('../classes/post.php');
    require_once('../classes/Topic.php');

    $theme = new Theme();
    $post = new Post();
    $topic = new Topic();

    $res = $theme->themeByName($_GET['nom']);

    $_SESSION['idTheme'] = $res;

    $mess = $post->messageByTheme($_SESSION['idTheme']);

    $_SESSION['nomTheme'] = $_GET['nom'];

    $res = $topic->topicByUser($_SESSION['username']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Title</title>
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="discussion.css">
</head>
<body>


    <?php

    if($_SESSION['connecte'] == true) {

        ?>

    <div class="container-fluid">



    <!--Entete de la page-->

    <header id="entete">
        <div class="nav-head row">
            <h1 class="nom offset-lg-1 col-lg-3"><a href="../accueil/accueil.php">Mon forum</a></h1>
            <p>
            <ul class="nav-head-ul offset-lg-3">
                <li><a class="col-lg-1 monlien" href="../search/search.php">Rechercher</a></li>
                <li><a class="col-lg-1" href="../logout/logout.php">Déconnexion</a></li>
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

        <div class="col-lg-8">
            <section>
                <div class="col-lg-12 block_messages">
                    <div class="row">
                        <?php

                        foreach ($mess as $message) {
                            ?>
                                    <div class="col-lg-3 message"><strong> <?php echo $_SESSION['username'];  ?> : </strong></div>
                                    <div class="col-lg-9 message_text message"> <?php echo $message . " ";?> </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="col-lg-12 block_form">
                    <form method="post" action="../classes/essai.php" class="formulaire">

                            <label name="message"><strong>Votre message :</strong></label>
                            <input type="text" name="message" class="form_message form-control">

                            <input type="submit" name="discussion" value="envoyer" class="btn btn-primary">
                    </form>
                </div>

                <?php  }else{
                    header('Location: ../erreur/erreur.php');
                }
                ?>
            </section>
        </div>
    </div>
</body>
</html>

