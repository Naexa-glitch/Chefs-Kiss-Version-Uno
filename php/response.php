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

    require 'database.php';
    // array -> $items = [];
    if(isset($_POST)){
        //var_dump($_POST);
        $database->insert("tb_recipes", [
            "recipe_name" => $_POST["recipe"],
            "id_recipe_category" => $_POST["category"],
            "recipe_prep_time" => $_POST["prep time"],
            "recipe_cook_time" => $_POST["cook time"],
            "recipe_total_time" => $_POST["total time"],
            "recipe_yields" => $_POST["yields"],
            "id_recipe_complex" => $_POST["complex"],
            "is_featured" => $_POST["featured"],
            "recipe_description" => $_POST["description"],
            "recipe_ingredients" => &_POST["ingredients"],
            "recipe_img" => "recipe-placeholder.png"
        ]);

        header("location: recipes.php");
    }

?>