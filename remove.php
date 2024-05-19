<?php 
    require 'database.php';

    // Reference: https://medoo.in/api/delete
    $database->delete("tb_recipes",[
        "id_recipe"=>$_POST["id"]
    ]);

    header("location: user.php");
?>