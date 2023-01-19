<?php
session_start();
require_once 'config.php';

if(isset($_POST['submit'])){

    extract($_POST);
    
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
    }else{
        $error = "veuillez remplir tous les champs !";
    }
}else{
    $error = "veuillez remplir tous les champs !";
}



?>