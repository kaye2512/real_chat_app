<?php
     session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $serchTerm = mysqli_real_escape_string($bdd, $_POST['searchTerm']);
    $output= "";
    $sql = mysqli_query($bdd, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (nom LIKE '%{$serchTerm}%' OR prenom LIKE '%{$serchTerm}%')");
    if(mysqli_num_rows($sql) > 0){
        include "data.php";
    }else{
        $output .= "aucun utilisateur trouvé";
    }
    echo $output;
?>