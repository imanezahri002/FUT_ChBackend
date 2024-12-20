<?php 
     include ('connexion.php');
     $id=$_GET["id"];
     $sql = "SELECT * FROM clubs WHERE club_id=$id";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $id=$row["club_id"];
            echo json_encode($row);
        }}
    ?>