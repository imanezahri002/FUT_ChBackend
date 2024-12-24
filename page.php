<?php
$servername="localhost";
$username="root";
$password="";
$dbname = "fut_db";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
        $sql = "SELECT joueur_name,position,nationality_name,club_name,rating FROM joueurs j 
        INNER JOIN clubs c ON j.club_id=c.club_id
        INNER JOIN nationalité n ON j.nationality_id=n.nationality_id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            echo "name: " . $row["joueur_name"]. " - position: " . $row["position"]. "-nationality " . $row["nationality_name"]."-club " . $row["club_name"]. "-rating " . $row["rating"]. "<br>";
            }
        }
mysqli_close($conn);
?>