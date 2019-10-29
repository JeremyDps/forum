<?php

require_once ('classes/Topic.php');

$topic = new Topic();

$res = $topic->descByName($_GET['nom']);

?>

<h1>
    Nom : <?php echo $res[0]; ?>
</h1>

<h2>
    Description : <?php echo $res[1]; ?>
</h2>

<h3>
    Crée le : <?php echo $res[2]; ?>
</h3>

<h3>
     nombres de membres : <?php echo $res[3]; ?>
</h3>
