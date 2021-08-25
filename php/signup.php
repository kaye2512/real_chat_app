<?php
    session_start();
    include_once "config.php";
    $nom = mysqli_real_escape_string($bdd, $_POST['nom']);
    $prenom = mysqli_real_escape_string($bdd, $_POST['prenom']);
    $email = mysqli_real_escape_string($bdd, $_POST['email']);
    $password = mysqli_real_escape_string($bdd, $_POST['password']);

    if(!empty($nom) and !empty($prenom) and !empty($email) and !empty($password)){

        if($password > 0){
            $options = [
                'cost' => 12,
                ];
            $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);
            

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //si l'email existe
                //verifions si l'email existe deja dans la base ou pas
                $sql = mysqli_query($bdd, "SELECT email FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($sql) > 0){
                    echo "$email - cette email existe déja!";
                }else{
                    //
                    if(isset($_FILES['image'])){// si l'image est télécharger
                        $img_name = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];
    
    
    
                        $img_explode = explode('.', $img_name);
                        $img_ext = end($img_explode);
    
    
                        $extensions = ['png', 'jpeg', 'jpg'];
                        if(in_array($img_ext, $extensions) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
    
                            if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                                $etat = "En ligne";
                                $random_id = rand(time(), 10000000);
    
    
                                $sql2 = mysqli_query($bdd, "INSERT INTO users (unique_id, nom, prenom, email, password, img, etat) 
                                                        VALUES ({$random_id}, '{$nom}', '{$prenom}', '{$email}', '{$hashpass}', '{$new_img_name}', '{$etat}')");
                                if($sql2){
                                    $sql3 = mysqli_query($bdd, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($sql3) > 0){
                                        $row = mysqli_fetch_assoc($sql3);
                                        $_SESSION['unique_id'] = $row['unique_id'];
                                        echo "bon";
                                    }
                                }else{
                                    echo "il y a une erreur!";
                                }
                            }
                            
                        }else{
                            echo "choisissez une image de type - jpeg, jpg, png!";
                        }
                    }else{
                        echo "choisissez un fichier";
                    }
                }
            }else{
                echo "$email - cette email n'est pas valide!";
            }

        }
        
    }else{
        echo "remplissez tous les champs!";
    }
?>