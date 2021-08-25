<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($bdd, $_GET['logout_id']);
        if(isset($logout_id)){
            $statut = "Hors ligne";
            //une fois que l'utilisateur se deco on modifie son statut dans la base
            // on modifi si il se connecte encore
            $sql = mysqli_query($bdd, "UPDATE users SET etat = '{$statut}' WHERE unique_id = {$logout_id}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../users.php");
        }
    }else{
        header("location: ../login.php");
    }
?>