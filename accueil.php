<?php

    session_start();
    include 'classes/Topic.php';

    echo "Bienvenue " . $_SESSION['username'];

    $topic = new Topic();
    $res = $topic->topicByUser($_SESSION['username']);
    ?>

<a href="creerTopic.html">Créez un nouveau topic !</a>
<p>Mes discussions</p>

<?php
    foreach ($res as $elem) {
?>
        <ul>
            <li>
                <a href="topic.php?nom=<?= $elem ?>"><?php  echo $elem;  ?></a>
            </li>
        </ul>
 <?php   }
?>

