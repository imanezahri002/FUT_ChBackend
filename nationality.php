<?php
include 'aside.php';
include 'connexion.php';
?>
<div class="container mt-5">
            <div class="title">
                <h4 id="infoPlayer">Information des nationalités</h4>
            </div>
            <form action="" method="POST" class="formClub">
                <div class="twoinput">
                    <input type="text" required placeholder="name Nationality" id="nameNatio" name="nomN">
                    <input type="url" required placeholder="image drapeau" id="logoNatio" name="logoN">
                    <button id="btn7" name="ajouterN" type="submit">AJOUTER</button>
                </div>
            </form>
            <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nomNat=$_POST["nomN"];
        $logoNat=$_POST["logoN"];
    if(isset($_POST["ajouterN"])){

        $stmt = $conn->prepare("INSERT INTO nationalité (nationality_name,nationality_image) VALUES (?,?)");
        $stmt->bind_param("ss",$nomNat,$logoNat);
    }else {
        $id = $_POST["id"];
        $stmt = $conn->prepare("UPDATE nationalité SET nationality_name = ? , nationality_image = ?   where nationality_id = ?");
        $stmt->bind_param("ssi",$nomNat,$logoNat,$id);
    }
    $stmt->execute();
    $stmt->close();
    }
    ?>
    <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      
                    <tr>
                    <th>Nom Nationalité </th>
                    <th>Drapeau</th>
                    <th>options</th>
                    </tr>
    </thead>
    <tbody>
              <?php
                $sql = "SELECT nationality_id ,nationality_name,nationality_image FROM nationalité";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $id=$row["nationality_id"];
                ?>
                    
                    <tr>
                    <td><?php echo $row["nationality_name"] ?></td>
                    <td><img src="<?php echo $row['nationality_image'] ?>" alt="" style="width:100px;height:70px"></td>
                    <td class="option">
                    <button onclick="stockerDataEdit(<?= $id; ?>)" id="btnModif"><i class="fa-regular fa-pen-to-square fa-2xl" style="color: #046402;"></i></button>
                    <a href="supprimerNationality.php?id=<?php echo $id; ?>"><i class="fa-solid fa-trash fa-2xl" style="color: #f86868;"></i></a>
                    </td>
                    </tr>
                    <?php 
                        }};
                        
                    ?>
    </tbody>
    </table>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="script.js?v=7.0"></script>
</body>
</html>