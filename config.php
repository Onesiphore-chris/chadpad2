<?php

    try {
        $dbb = new PDO('mysql:host=localhost;dbname=chat_2;charset=UTF8', 'root', '');

        $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $th) {
        die('error'.$th->getMessage());
    }


?>