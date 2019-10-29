<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forum - Inscription</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="inscription.css">
</head>
<body>
<h1>Mon forum</h1>
    <form method="post" action="classes/essai.php">
        <div class="form-group">
            <label name="nom">Nom :</label>
            <input name="nom" type="text" class="form-control" placeholder="Entrez votre nom">
        </div>

        <div class="form-group">
            <label name="prenom">Prénom :</label>
            <input name="prenom" type="text" class="form-control" placeholder="Entrez votre prénom">
        </div>

        <div class="form-group">
            <label name="username">Votre nom d'utilisateur</label>
            <input name="username" type="text" class="form-control" placeholder="Entrez votre nom d'utilisateur">
        </div>

        <div class="form-group">
            <label name="mail">Votre adresse mail :</label>
            <input name="mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label name="password">Mot de passe :</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <div class="form-group">
            <input type="submit" name="inscription" class="btn btn-primary" value="S'inscrire">
        </div>
    </form>
</body>
</html>