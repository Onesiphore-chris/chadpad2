<?php
         include 'config.php';
         session_start();

         if(isset($_POST['send'])){
            
             $message = htmlspecialchars($_POST['message']);
             
             $email = $_SESSION['user'];

             if(!empty($message) && $message != ""){

                 $req = $dbb->prepare("INSERT INTO messages (mgs , email) VALUES ('$message' ,'$email')");
                 $req->execute();
                 
                 header('location:chat.php');

             }else{
                 header('location:chat.php');
             }
         }
 ?>

