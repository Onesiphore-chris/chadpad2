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

        include_once "config.php";


        if(isset($_POST['button_inscription'])){
            extract($_POST);
            
            if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['re_password'])){
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $re_password = htmlspecialchars($_POST['re_password']);

                if($password != $re_password){
                    $error = "Les Mots de passes sont Differents !";
                }else{
                    $req = $dbb->prepare("SELECT * FROM utilisateurs WHERE email = '$email'");
                    $req->execute();
                    $data = $req->fetch();
                    $row = $req->rowCount();

                if($row == 0){
                    $password = hash('md5' , $password);
                    $req = $dbb->prepare("INSERT INTO `utilisateurs`(pseudo, email, password) VALUES('{$pseudo}', '{$email}', '{$password}')");
                    $req->execute(array(
                        $pseudo => 'pseudo',
                        $email => 'email',
                        $password => 'password'
                    ));

                    $_SESSION['message'] ="<p class='message_inscription'>Votre compte a ete cree avec success !</p>";

                    header('location:index.php');

                }else{
                    $error = "Votre inscription a echouer !";
                }
                }
                
             }
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data" class="form_connexion_inscription">
        <h1>INSCRIPTION</h1>
        <p class="message_error">
        <?php
            if(isset($error)){
                echo $error;
            }
            ?>
        </p>
        <label for="">Pseudo</label>
        <input type="text" name="pseudo" autocomplete="none" required>
        <label for=""> Email</label>
        <input type="email" name="email" autocomplete="none" required >
        <label for="">Mots de passe</label>
        <input type="password" name="password"  class="password" required>
        <label for="">re_password</label>
        <input type="password" name="re_password" id="" class="re_password" required>
        <input type="submit" value="Inscription" name="button_inscription">
        <p class="link">vous avez un compte ? <a href="index.php">Connexion</a></p>
    
    </form>
    
    <script src="script.js"></script>
</body>
</html>