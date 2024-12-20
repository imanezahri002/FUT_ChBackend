<?php
    include 'connexion.php';
    $id=$_GET["id"];
    $sql = "DELETE FROM clubs WHERE club_id=$id";
    $result = mysqli_query($conn, $sql);
    header("location:./Club.php");
?>