<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="connexion.css">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <h1>Mon forum</h1>
        <form method="post" action="classes/essai.php">
            <div class="form-group">
                <label name="nom">Nom :</label>
                <input name="user" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label name="pass">Mot de passe :</label>
                <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" name="connexion" class="btn btn-primary" value="se connecter">
            </div>
        </form>
    </body>
</html>