<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
    
?>
<?php include_once "header.php"; ?>
    <body>
        <div class="block">
            <section class="users">
                <header>
                <?php
                    include_once "php/config.php";
                    $sql = mysqli_query($bdd, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql) >0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                    <div class="content">
                       <img src="php/images/<?php echo $row['img'] ?>" alt=""> 
                       <div class="details">
                           <span><?php echo $row['nom'] ." ". $row['prenom']?></span>
                           <p><?php echo $row['etat'] ?></p>
                       </div>
                    </div>
                    <a href="php/deconnexion.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Deconnexion</a>
                </header>
                <div class="search">
                    <span class="text">Choisissez un utilisateur pour communiquer</span>
                    <input type="text" placeholder="Entrer le nom d'utilisateur pour chercher...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">
                    
                </div>
            </section>
        </div>
        <script src="js\user.js"></script>
    </body>
</html>