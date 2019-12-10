<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Forum - Inscription</title>
    <link rel="stylesheet" href="inscription.css">
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Mon forum</h1>
    <div class="container">
        <div class="text-block">
            <form class="offset-lg-3 col-lg-6" method="post" action="../classes/essai.php">
                <div class="form-group">
                    <label name="nom">Nom :</label>
                    <input name="nom" type="text" class="form-control" placeholder="Entrez votre nom" required>
                </div>
                <div class="form-group">
                    <label name="prenom">Prénom :</label>
                    <input name="prenom" type="text" class="form-control" placeholder="Entrez votre prénom" required>
                </div>

                <div class="form-group">
                    <label name="username">Votre nom d'utilisateur</label>
                    <input name="username" type="text" class="form-control" placeholder="Entrez votre nom d'utilisateur" required>
                </div>

                <div class="form-group">
                    <label name="mail">Votre adresse mail :</label>
                    <input name="mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label name="password">Mot de passe :</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input type="submit" name="inscription" class="btn btn-primary" value="S'inscrire">
                </div>
            </form>
        </div>
    </div>
</body>
</html>