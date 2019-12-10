<?php
    session_start();

    require_once('../classes/Topic.php');

    $topics = new Topic();

    $allTopics = $topics->allTopics();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Title</title>
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="forums.css">
</head>
<body>
<?php  if($_SESSION['connecte'] == true)   {  ?>


<div class="container-fluid">
    <!--Entete de la page-->

    <header id="entete">
        <div class="nav-head row">
            <h1 class="nom offset-lg-1 col-lg-3"><a href="#">Mon forum</a></h1>
            <p>
            <ul class="nav-head-ul offset-lg-3">
                <li><a class="col-lg-1 monlien" href="../forums/forums.php">Forums</a></li>
                <li><a class="col-lg-1" href="../logout/logout.php">Déconnexion</a></li>
                <li><a class="col-lg-2" href="../profil/profil.php?nom=<?= $_SESSION['username'] ?>">Mon profil</a></li>
            </ul>
            </p>
        </div>
    </header>


    <!--affichage de tous les topics présent en base-->
    <div class="row">
        <div class="col-lg-12">
            <section>
                <div class="row">
                    <?php
                    foreach($allTopics as $tab){
                        ?>
                        <div class="offset-lg-1 col-lg-2 bloc_forum">
                            <p id="title">
                                <strong><?php echo $tab['name'];  ?></strong>
                            </p>
                            <ul>
                                <li><strong>Description : </strong><?php  echo $tab['desc']  ?></li>
                                <li><strong>Crée par : </strong><?php  echo $tab['creation']  ?></li>
                            </ul>
                            <p id="link_new_topic"><a id="new-topic" href="../topic/topic.php?nom=<?= $tab['name'] ?>">Consulter</a></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>
    <?php  }else{
        header('Location: ../erreur/erreur.php');
    }  ?>
</body>
</html>
