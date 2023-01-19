<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>chadpad 2</title>
</head>
<body>
    <?php 
        include_once 'config.php';

        if(isset($_POST['submit'])){

        
            extract($_POST);
            
            if(isset($_POST['email']) && isset($_POST['password']))
            {
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                $password = hash('md5' , $password);
                $req = $dbb->prepare("SELECT * FROM utilisateurs WHERE email = '$email 'AND password ='$password'");
                $req->execute();
                $row = $req->rowCount();
                
                if($row > 0)
                {

                    $_SESSION['user'] = $email;
                    header("location:chat.php");

                 
                    unset($_SESSION['message']);
                }
                else{
                    $error = "Email ou Mots de passe Incorrecte(s) !";
                }
            }else{
                $error = "veuillez remplir tous les champs !";
            }
        }else{
            $error = "";
        }
        
    ?>

    <form method="POST" enctype="multipart/form-data" class="form_connexion_inscription">
        <h1>CONNEXION</h1>
        <?php
            if(isset($_SESSION['message']))
            {
              echo  $_SESSION['message'];
            }
        ?>
        <p class="message_error">
            <?php
            if(isset($error)){
                echo $error;
            }
            ?>
        </p>
        <label for=""> Email</label>
        <input type="email" name="email" id="" class="password">
        <label for="">Mots de passe</label>
        <input type="password" name="password" id="" class="re_password">
        <input type="submit" value="Connexion" name="submit">
        <p class="link">vous avez pas un compte ?  <a href="inscription.php">Cree un compte</a></p>
    
    </form>
    

    
</body>
</html>