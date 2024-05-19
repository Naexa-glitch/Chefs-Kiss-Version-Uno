<?php
   
    require 'database.php';
    if(isset($_GET)){
        $data = $database->select("tb_recipes", "*", [
            "id_recipe" => $_GET["id"]
        ]);
    }
    //var_dump($data);
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
    
    <h1>Edit Recipe</h1>
   <form action="update.php" method="post">

    <label for="recipe">Recipe</label>
    <input type="text" name="recipe" value="<?php echo $data[0]["recipe_name"]; ?>">
    <label for="category">Category</label>
    <input type="text" name="category" value="<?php echo $data[0]["recipe_category"]; ?>">
    <label for="time">Prep. time</label>
    <input type="text" name="time" value="<?php echo $data[0]["recipe_time"]; ?>">
    <input type="hidden" name="id" value="<?php echo $data[0]["id_recipe"]; ?>">
    <input type="submit" value="SUBMIT">
   </form>

</body>
</html>