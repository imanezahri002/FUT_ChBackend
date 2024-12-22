<?php
include 'connexion.php';
include 'aside.php';
?>


        <!-- Contenu principal -->
        <div class="mainContent">
            <header>
                <h1>Bienvenue sur votre tableau de bord</h1>
            </header>
            <div class="globals">
                <button id="btn1"  onclick="ajouterPlayer()" class="parent">Joueur <i class="fa-solid fa-plus fa-lg" style="color:rgb(198, 227, 172);"></i></button>
            </div>
        <div class="formulaire" id="form">
            <div class="titre">
                <h4 id="infoPlayer">Information des joeurs</h4>
                <i class="fa-solid fa-xmark fa-2xl" style="color: #000000;" id="close"></i>
            </div>
            
            <form action="" method="POST" class="contentforms">
                <div class="tous">
                    <input type="text" required placeholder="nom" id="name" name="nomP">
                    <!-- <input type="text" required placeholder="nationalité" id="nationality" name="nationality"> -->
                    <select name="nationality" id="">
                        <?php
                        $sql = "SELECT nationality_id,nationality_name FROM nationalité";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                 ?>
                            
                                <option ><?php echo $row['nationality_name'] ?></option>
                        <?php
                            }}
                        ?>
                    </select>
                    <select name="club" id="">
                    <?php
                        $sql = "SELECT club_id,club_name FROM clubs";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) { ?>

                            <option ><?php echo $row['club_name'] ?></option>
                        <?php
                            }}
                        ?>
                    </select>
                    <input type="url" required placeholder="profile" id="profile" name="profile">
                    <input type="url" required placeholder="flag" id="flag" name="drapeau">
                    <input type="url" required placeholder="logo" id="logo_club" name="logoC">
                    <select name="position" id="position">
                        <option value="choisir">position</option>
                        <option value="ST">ST</option>
                        <option value="RW">RW</option>
                        <option value="LW">LW</option>
                        <option value="CM1">CM1</option>
                        <option value="CM2">CM2</option>
                        <option value="CM3">CM3</option>
                        <option value="RB">RB</option>
                        <option value="LB">LB</option>
                        <option value="CB1">CB1</option>
                        <option value="CB2">CB2</option>
                        <option value="GK">GK</option>
                    </select>
                    <input type="number" placeholder="rating" id="rating" name="rating">
                    <input type="number" placeholder="pace" id="pace"  class="normal-joueur" name="pace">
                    <input type="number" placeholder="shooting" id="shooting" class="normal-joueur" name="shoot">
                    <input type="number" placeholder="passing" id="passing" class="normal-joueur" name="pass">
                    <input type="number" placeholder="driblling" id="driblling" class="normal-joueur" name="drib">
                    <input type="number" placeholder="defending" id="defending" class="normal-joueur" name="defend">
                    <input type="number" placeholder="physical" id="physical" class="normal-joueur" name="phys">
                    <!-- statistique du goal -->
                    <input type="number" placeholder="diving" id="diving"  class="goal-joueur" hidden name="div">
                    <input type="number" placeholder="handling" id="handling" class="goal-joueur" hidden name="handl">
                    <input type="number" placeholder="kicking" id="kicking" class="goal-joueur" hidden  name="kick">
                    <input type="number" placeholder="reflexes" id="reflexes" class="goal-joueur" hidden  name="reflexe">
                    <input type="number" placeholder="speed" id="speed" class="goal-joueur" hidden name="speed">
                    <input type="number" placeholder="positioning" id="positioning" class="goal-joueur" hidden name="positionning">
                </div>
              <div class="ajout-btn"><button id="btn4" name="envoyer" type="submit">AJOUTER</button></div>
              </form>

    </div>
    <?php
    if(isset($_POST["envoyer"])){
        $nomj=$_POST["nomP"];
        $nationality=$_POST["nationality"];
        $club=$_POST["club"];
        $profile=$_POST["profile"];
        $drapeau=$_POST["drapeau"];
        $logoC=$_POST["logoC"];
        $position=$_POST["position"];
        $rating=$_POST["rating"];
        $pace=$_POST["pace"];
        $shoot=$_POST["shoot"];
        $pass=$_POST["pass"];
        $drib=$_POST["drib"];
        $defend=$_POST["defend"];
        $phys=$_POST["phys"];

        $stmt = $conn->prepare("INSERT INTO joueurs (joueur_name,position,nationality_id,club_id,rating,paceAndDiv,shootAndHandl,pasAndKick,dribAndRef,defAndSpeed,physAndPos,profile_joueur) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssiiiiiiiiis",$nomj,$position,$nationality,$club,$rating,$pace,$shoot,$pass,$drib,$defend,$phys,$profile);
        $stmt->execute();
        $stmt->close();
        mysqli_close($conn);
    }
    
    ?>
    <div class="container mt-5">
    <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      
                    <tr>
                    <th>Prenom </th>
                    <th>Nationalité</th>
                    <th>Profile</th>
                    <th>Position</th>
                    <th>Club</th>
                    <th>Rating</th>
                    <th>Pace</th>
                    <th>Shoot</th>
                    <th>Pass</th>
                    <th>Drib</th>
                    <th>Des</th>
                    <th>Phy</th>
                    <th>options</th>

                    </tr>
    </thead>
    <tbody>
                <?php
                $sql = "SELECT profile_joueur,joueur_name,position,nationality_name,club_name,rating,paceAndDiv,shootAndHandl,pasAndKick,dribAndRef,defAndSpeed,physAndPos FROM Joueurs j 
                INNER JOIN clubs c ON j.club_id=c.club_id
                INNER JOIN nationalité n ON j.nationality_id=n.nationality_id 
                WHERE position <> 'GK'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                    
                    <td><?php echo $row['joueur_name']?></td>
                    <td><?php echo $row['nationality_name']?></td>
                    <td><img src="$row['profile_joueur']" alt="" ></td>
                    <td><?php echo $row['position']?></td>
                    <td><?php echo $row['club_name']?></td>
                    <td><?php echo $row['rating']?></td>
                    <td><?php echo $row['paceAndDiv']?></td>
                    <td><?php echo $row['shootAndHandl']?></td>
                    <td><?php echo $row['pasAndKick']?></td>
                    <td><?php echo $row['dribAndRef']?></td>
                    <td><?php echo $row['defAndSpeed']?></td>
                    <td><?php echo $row['physAndPos']?></td>
                    <td>
                    <i class="fa-regular fa-pen-to-square fa-lg" style="color: #046402;"></i>
                    <i class="fa-solid fa-trash fa-lg" style="color: #f86868;"></i>
                    </td>
                    </tr>
                <?php
                }
            }
            ?>
                    
                </tbody>
    </table>
        
     
    <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      
                    <tr>
                    <th>Prenom </th>
                    <th>Nationalité</th>
                    <th>Profile</th>
                    <th>Position</th>
                    <th>Club</th>
                    <th>Rating</th>
                    <th>Div</th>
                    <th>Handl</th>
                    <th>Kic</th>
                    <th>Ref</th>
                    <th>Speed</th>
                    <th>Pos</th>
                    <th>options</th>

                    </tr>
    </thead>
                <tbody>
                <?php
                $sql = "SELECT profile_joueur,joueur_name,position,nationality_name,club_name,rating,paceAndDiv,shootAndHandl,pasAndKick,dribAndRef,defAndSpeed,physAndPos FROM Joueurs j 
                INNER JOIN clubs c ON j.club_id=c.club_id
                INNER JOIN nationalité n ON j.nationality_id=n.nationality_id 
                WHERE position = 'GK'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                    
                    <td><?php echo $row['joueur_name']?></td>
                    <td><?php echo $row['nationality_name']?></td>
                    <td><img src="$row['profile_joueur']" alt="" ></td>
                    <td><?php echo $row['position']?></td>
                    <td><?php echo $row['club_name']?></td>
                    <td><?php echo $row['rating']?></td>
                    <td><?php echo $row['paceAndDiv']?></td>
                    <td><?php echo $row['shootAndHandl']?></td>
                    <td><?php echo $row['pasAndKick']?></td>
                    <td><?php echo $row['dribAndRef']?></td>
                    <td><?php echo $row['defAndSpeed']?></td>
                    <td><?php echo $row['physAndPos']?></td>
                    <td>
                    <i class="fa-regular fa-pen-to-square fa-lg" style="color: #046402;"></i>
                    <i class="fa-solid fa-trash fa-lg" style="color: #f86868;"></i>
                    </td>
                    </tr>
                <?php
                }
            }
            ?>
                    
                </tbody>
    </table>
                </div>
        </div>
    </div>
                    
    
            <!-- Cartes d'information -->
            <!-- <div class="cards">
                <div class="card">
                    <h3>Ventes</h3>
                    <p>1,245</p>
                </div>
                <div class="card">
                    <h3>Utilisateurs</h3>
                    <p>589</p>
                </div>
                <div class="card">
                    <h3>Revenus</h3>
                    <p>€10,450</p>
                </div>
            </div> -->

            <!-- Section Graphiques -->
            <!-- <div class="charts">
                <div class="chart">
                    <h3>Graphique 1</h3>
                    <div class="fake-chart"></div>
                </div>
                <div class="chart">
                    <h3>Graphique 2</h3>
                    <div class="fake-chart"></div>
                </div>
            </div> -->
        <!-- </div>
    </div> -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="script.js?v=9.0"></script>
  
</body>
</html>
