<?php
include 'testPlayer.blade.php';

$gestionPlayers = new GestionPlayers("localhost:3307", "root", "", "hello");

$id = $_GET['id'];
$player = $gestionPlayers->getPlayerParID($id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un joueur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Modifier un joueur</h1>
    <form action="update.blade.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Nom: <input type="text" name="nom" value="<?php echo $utilisateur['username']; ?>"><br>
        Position: <input type="text" name="position" value="<?php echo $player['position']; ?>"><br>
        Nationalité: <input type="text" name="nationalité" value="<?php echo $player['ntionality']; ?>"><br>
        Mot de passe: <input type="password" name="mot_de_passe" value="<?php echo $player['password']; ?>"><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>