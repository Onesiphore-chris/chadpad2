<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header('location:index.php');

        }
        $user = $_SESSION['user'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">          
    <link rel="stylesheet" href="style.css">
    <title> <?= $user ?></title>
</head>
<body>
        <div class="chat">
                    <div class="button-email">
                        <span> <?= $user?></span>
                        <a href="deconnexion.php" class="Deconnexion_btn">Deconnexion</a>
                    </div>
                

            <div class="message_box">
                    <?php
                    include "messages.php";
                   ?>
                 
            </div>
           
            <form action="send.php" method="POST" class="send_message">
                <textarea name="message" cols="30" rows="4" placeholder="Votre message"></textarea>
                <input type="submit" value="lest go" name="send">
            </form>
        </div>
</body>
</html>