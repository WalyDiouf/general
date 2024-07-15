<?php
include 'testPlayer.blade.php';

$gestionPlayers = new GestionPlayers("localhost:3307", "root", "", "hello");

$id = $_GET['id'];

$gestionPlayers->supprimerPlayer($id);

header("Location: liste.blade.php");
exit;
?>