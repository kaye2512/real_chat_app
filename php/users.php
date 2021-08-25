<?php 
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($bdd, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
    $output = "";
    if(mysqli_num_rows($sql) == 1){
        $output .= "aucun utilisateur est autorisé à écrire";
    }elseif(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            include "data.php";
        }
    }
    echo $output;
?>