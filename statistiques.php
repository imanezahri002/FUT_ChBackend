<?php
include 'connexion.php';
include 'aside.php';

?>
<!-- Cartes d'information  -->
<div class="container mt-5">
             <div class="cards">
                <div class="card" id="c1">
                    <h3>Clubs</h3>
                    <p><?php 
                    $sql="SELECT COUNT(*) AS  FROM clubs";
                    $result=mysqli_query($conn,$sql);
                    print_r($result);
                    ?></p>
                </div>
                <div class="card" id="c2">
                    <h3>Nationalité</h3>
                    <p><?php 
                    $sql="SELECT COUNT(*) as nbr_n FROM nationalité";
                    $result=mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);
                    print_r($row['nbr_n']);
                    ?></p>
                </div>
                <div class="card" id="c3">
                    <h3>Joueurs</h3>
                    <p><?php 
                    $sql="SELECT COUNT(*) FROM joueurs";
                    $result=mysqli_query($conn,$sql);
                    ?></p>
                </div>
            </div>
</div>





















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="script.js?v=9.0"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
</body>
</html>