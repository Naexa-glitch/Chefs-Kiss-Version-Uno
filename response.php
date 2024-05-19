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

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    
    // array -> $items = [];
    if(isset($_POST)){
        //var_dump($_POST);

        if(isset($_FILES["recipe_image"])){
            $errors = array();
            $file_name = $_FILES["recipe_image"]["name"];
            $file_size = $_FILES["recipe_image"]["size"];
            $file_tmp = $_FILES["recipe_image"]["tmp_name"];
            $file_type = $_FILES["recipe_image"]["type"];
            $file_ext_arr = explode(".", $_FILES["recipe_image"]["name"]);

            $file_ext = end($file_ext_arr);
            $img_ext = array("jpeg", "png", "jpg", "gif");

            if(!in_array($file_ext, $img_ext)){
                $errors[] = "File type is not supported";
            }

            if(empty($errors)){ 
                $img = "recipe-upload-".generateRandomString().".".$file_ext;
                move_uploaded_file($file_tmp, "imgs/".$img);

            }

            $database->insert("tb_recipes", [
                "recipe_name" => $_POST["namerecipe"],
                "id_recipe_category" => $_POST["category"],
                "recipe_prep_time" => $_POST["preparationtime"],
                "recipe_cook_time" => $_POST["cookingtime"],
                "recipe_total_time" => $_POST["totaltime"],
                "recipe_yields" => $_POST["portions"],
                "id_recipe_complex" => $_POST["complexity"],
                //"is_featured" => $_POST["featured"],
                "recipe_description" => $_POST["description"],
                "recipe_ingredients" => $_POST["ingredients"],
                "recipe_instructions" => $_POST["instructions"],
                "id_recipe_date" => $_POST["date"],
                "recipe_img" => $img
            ]);
    
            header("location: user.php");
              
            }


    }

       /* $database->insert("tb_recipes", [
            "recipe_name" => $_POST["namerecipe"],
            "id_recipe_category" => $_POST["category"],
            "recipe_prep_time" => $_POST["preparationtime"],
            "recipe_cook_time" => $_POST["cookingtime"],
            "recipe_total_time" => $_POST["totaltime"],
            "recipe_yields" => $_POST["portions"],
            "id_recipe_complex" => $_POST["complexity"],
            //"is_featured" => $_POST["featured"],
            "recipe_description" => $_POST["description"],
            "recipe_ingredients" => $_POST["ingredients"],
            "recipe_instructions" => $_POST["instructions"],
            "id_recipe_date" => $_POST["date"],
            "recipe_img" => $img
        ]);

    header("location: user.php");
    }*/

?>