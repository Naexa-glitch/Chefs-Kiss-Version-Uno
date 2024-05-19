<?php

    /*namespace Medoo;
    require 'Medoo.php';

    $database = new Medoo([
        // [required]
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'recipes',
        'username' => 'root',
        'password' => ''
    ]);*/

    $pass = password_hash($_POST["username"], PASSWORD_DEFAULT, ['cost' => 12]);

    require 'database.php';
    // array -> $items = [];
    if(isset($_POST)){
        //var_dump($_POST);
        $database->insert("tb_user", [
            "fullname" => $_POST["fullname"],
            "email" => $_POST["email"],
            "username" => $_POST["username"],
            "password" => $pass
            
            
        ]);

        header("location: login.php");
    }

?>