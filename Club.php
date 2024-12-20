<?php 
 include 'connexion.php';
 include 'aside.php';
?>
          
<div class="container mt-5">
            <div class="title">
                <h4 id="infoPlayer">Information des clubs</h4>
            </div>
            <form action="" method="POST" class="formClub">
                <div class="twoinput">
                    <input type="text" required placeholder="nomClub" id="nameClub" name="nomC">
                    <input type="url" required placeholder="logoClub" id="logoClub" name="logoClub">
                    <button id="btn6" name="ajouter" type="submit">AJOUTER</button>
                </div>
            </form>
            <?php

    if(isset($_POST["ajouter"])){
        $nomClub=$_POST["nomC"];
        $profileClub=$_POST["logoClub"];

        $stmt = $conn->prepare("INSERT INTO clubs (club_name,club_image) VALUES (?,?)");
        $stmt->bind_param("ss",$nomClub,$profileClub);
        $stmt->execute();
        $stmt->close();
        // mysqli_close($conn);
    }

    ?>
    <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      
                    <tr>
                    <th>Nom Club </th>
                    <th>Logo Club</th>
                    <th>options</th>
                    </tr>
    </thead>
    <tbody>
              <?php
                $sql = "SELECT club_id ,club_name,club_image FROM Clubs";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $id=$row["club_id"];
                ?>
                    
                    <tr>
                    <td><?php echo $row["club_name"] ?></td>
                    <td><img src="<?php echo $row["club_image"] ?>" alt="" style="width:70px;height:70px"></td>
                    <td class="option">
                        
                    <a href="modifierClub.php?id=<?php echo $id; ?>"><i class="fa-regular fa-pen-to-square fa-2xl" style="color: #046402;"></i></a>
                    <a href="supprimerClub.php?id=<?php echo $id; ?>"><i class="fa-solid fa-trash fa-2xl" style="color: #f86868;"></i></a>
                        
                    </td>
                    </tr>
                    <?php 
                        }}
                    ?>
                  
    </tbody>
    </table>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="script.js?v=2.5"></script>
</body>
</html>