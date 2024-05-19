<?php
    require 'db.php';

    $levels = $database->select("tb_recipe_levels","*");
    $categories = $database->select("tb_recipe_category","*");
    $ocassions = $database->select("tb_recipe_ocassions","*");

    //featured recipes
    $featured_recipes = $database->select("tb_recipes","*",[
        "recipe_is_featured" => 1
    ]);

    //all recipes
    $recipes = $database->select("tb_recipes","*");

    //var_dump($ocassions);
    
    //top 10
    $popular_recipes = $database->select("tb_recipes","*",[
        "ORDER" => [
            "recipe_likes" => "DESC"
        ],
        'LIMIT' => 10
    ]);
   
?>