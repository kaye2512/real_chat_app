<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($bdd, $_POST['email']);
    $password = mysqli_real_escape_string($bdd, $_POST['password']);

    if(!empty($email) and !empty($password)){
        // verifions si l'email est correct
        $sql = mysqli_query($bdd, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            // verifions si le mot de passe hasher est correct
           $sql2 = mysqli_query($bdd, "SELECT password FROM users WHERE email = '{$email}' ");
           $row = mysqli_fetch_array($sql2, MYSQL_ASSOC);
           $pass = $row['password'];
           if(password_verify($password, $pass)){
            $row = mysqli_fetch_assoc($sql);
            $etat = "En ligne";
            //mettre le statut en ligne
            $sql3 = mysqli_query($bdd, "UPDATE users SET etat = '{$etat}' WHERE unique_id = {$row['unique_id']}");
                if($sql3){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "bon";
                }
           }else{
               echo "Mot de passe invalide!";
           }
           
        }else{
            echo "Email ou le mot de passe invalid";
        }
    }else{
        echo "remplissez tous les champs!";
    }
?>