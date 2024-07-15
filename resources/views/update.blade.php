<?php
include 'testUser.blade.php';

$gestionUPlayers = new GestionPlayers("localhost:3307", "root", "", "hello");

$id = $_POST['id'];
$nouveau_nom = $_POST['nom'];
$nouvel_position = $_POST['position'];
$nouvel_nationalité = $_POST['nationalité'];
$nouveau_mot_de_passe = $_POST['mot_de_passe'];

$gestionPlayers->mettreAJourPlayer($id, $nouveau_nom, $nouvel_position, $nouvel_nationalité, $nouveau_mot_de_passe);

header("Location: liste.blade.php");
exit;
?>