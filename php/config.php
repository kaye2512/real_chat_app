<?php
   $bdd = mysqli_connect("localhost", "root", "", "chat");
   if(!$bdd){
       echo "Database connected" . mysqli_connect_error();
   }
?>
