<?php
    require 'database.php';

    //$data = $database->select("tb_recipes", "*");

    $data= $database->select("tb_recipes",[
        "[>]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"]
    ],[
        "tb_recipes.id_recipe",
        "tb_recipes.recipe_name",
        "tb_recipes.recipe_prep_time",
        "tb_recipes.recipe_cook_time",
        "tb_recipes.recipe_total_time",
        "tb_recipe_category.recipe_category"
    ]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registered Recipes</h1>

    <table>
        <tr>
            <td>Recipe name</td>
            <td>Recipe Category</td>
            <td>Prep. time</td>
            <td>Options</td>
        </tr>
        <tr>

        </tr>
        <?php

            $len = count($data);

            for($i=0; $i<$len; $i++){
                echo "<tr>";
                echo "<td>".$data[$i]["recipe_name"]."</td>";
                echo "<td>".$data[$i]["recipe_category"]."</td>";
                echo "<td>".$data[$i]["recipe_prep_time"]."</td>";
                echo "<td>".$data[$i]["recipe_cook_time"]."</td>";
                echo "<td>".$data[$i]["recipe_total_time"]."</td>";
                echo "<td><a href='edit.php?id=".$data[$i]["id_recipe"]."'>Edit</a> <a href='delete.php?id=".$data[$i]["id_recipe"]."'>Delete</a></td>";
                echo "</tr>";
            }

        ?>
    </table>
</body>
</html>