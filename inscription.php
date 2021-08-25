<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>

<?php include_once "header.php"; ?>
    <body>
        <div class="block">
            <section class="form signup">
                <header>Realtime Chat App</header>
                <form action="#" enctype="multipart/form-data">
                    <div class="erreur-txt"></div>
                    <div class="name-details">
                        <div class="field input">
                            <label>First Name</label>
                            <input type="text" name="nom" placeholder="First Name" required>
                        </div>
                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text" name="prenom" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="field input">
                            <label>Email Address</label>
                            <input type="text" name="email" placeholder="Entrez votre Email" required>
                    </div>
                    <div class="field input">
                            <label>Mot de passe</label>
                            <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
                            <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                            <label>Choissez une image</label>
                            <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Confirmez">
                    </div>
                </form>
                <div class="link">Avez vous deja un compte? <a href="login.php">Connectez-vous!</a></div>
            </section>
        </div>
        <script src="js/pass-show-hide.js"></script>
        <script src="js/signup.js"></script>
    </body>
</html>