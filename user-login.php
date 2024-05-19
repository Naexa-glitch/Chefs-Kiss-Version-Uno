<?php



    $pass = password_hash("userpassword", PASSWORD_DEFAULT, ['cost' => 12]);

    require 'database.php';
    // array -> $items = [];
    if(isset($_POST)){
        //var_dump($_POST);
        $database->insert("tb_user", [
            "username" => "username",
            "password" => $pass
            
            
        ]);

        header("location: login.php");
    }

?>