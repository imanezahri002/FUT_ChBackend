<?php
include 'connexion.php';
$id=$_GET["id"];
$sql = "DELETE FROM joueurs WHERE joueur_id = $id";

$result=mysqli_query($conn,$sql);
header("location:./admin.php");
?>