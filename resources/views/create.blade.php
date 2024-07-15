<?php
include 'testPlayer.blade.php';

$gestionPlayers = new GestionPlayers("localhost:3307", "root", "", "hello");

$nom = $_POST['nom'];
$position = $_POST['position'];
$nationalité = $_POST['nationalité'];
$mot_de_passe = $_POST['mot_de_passe'];

$gestionPlayers->creerPlayer($nom, $position, $nationalité $mot_de_passe);

header("Location: liste.blade.php");
exit;
?>