<?php
    require_once('../classes/Theme.php');
    require_once('../classes/post.php');

    $theme = new Theme();
    $post = new Post();

    $res = $theme->themeByName($_GET['nom']);

    $_SESSION['idTheme'] = $res;

    $mess = $post->messageByTheme($_SESSION['idTheme']);

    $_SESSION['nomTheme'] = $_GET['nom'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<form method="post" action="../classes/essai.php">
    <?php
        echo $_GET['nom'] . " " . $res . "<br>";
        foreach ($mess as $message) {
    ?> <p> <?php echo $message . " ";?> </p> <?php
        }
    ?>
    <label name="message">Votre message :</label>
    <input type="text" name="message">
    <input type="submit" name="discussion" value="envoyer">
</form>
</body>
</html>

