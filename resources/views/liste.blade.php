<?php
include 'testPlayer.blade.php';

$gestionPlayers = new GestionPlayers("localhost:3307", "root", "", "hello");

$players = $gestionPlayers->listerPlayers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des joueurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            margin-right: 10px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            color: #333;
        }
        a:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h1>Liste des joueurs</h1>
    
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Position</th>
            <th>Nationalité</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($players as $players): ?>
        <tr>
            <td><?php echo $player['name']; ?></td>
            <td><?php echo $player['position']; ?></td>
            <td><?php echo $player['nationality']; ?></td>
            <td>
                <a href="form_update.php?id=<?php echo $player['id']; ?>">Modifier</a>
                <a href="delete.php?id=<?php echo $player['id']; ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="form_create.blade.php">Ajouter un joueur</a>
</body>
</html>