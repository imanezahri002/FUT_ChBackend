<?php
include 'connexion.php';
$id=$_GET["id"];
$sql = "DELETE FROM nationalité WHERE nationality_id=$id";
$result = mysqli_query($conn, $sql);
header("location:./nationality.php");
?>