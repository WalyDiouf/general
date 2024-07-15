<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un joueur</title>
</head>
<body>
    <h1>Ajouter un joueur</h1>
    <form action="create.blade.php" method="post">
        Nom: <input type="text" name="nom"><br>
        Position: <input type="text" name="position"><br>
        Nationalité: <input type="text" name="nationalité"><br>
        Mot de passe: <input type="password" name="mot_de_passe"><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>