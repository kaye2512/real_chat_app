<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>
<?php include_once "header.php"; ?>
    <body>
        <div class="block">
            <section class="form login">
                <header>Realtime Chat App</header>
                <form action="#">
                    <div class="erreur-txt"> ceci est un message d'erreur</div>
                    <div class="field input">
                            <label>Email Address</label>
                            <input type="text" name="email" placeholder="Entrez votre Email">
                    </div>
                    <div class="field input">
                            <label>Mot de passe</label>
                            <input type="password" name="password" placeholder="Entrez votre mot de passe">
                            <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Confirmez">
                    </div>
                </form>
                <div class="link">Vous avez pas encore de compte? <a href="inscription.php">Créer un compte!</a></div>
            </section>
        </div>
        <script src="js/pass-show-hide.js"></script>
        <script src="js/login.js"></script>
    </body>
</html>