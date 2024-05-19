<?php
   
    require 'database.php';

    session_start(); 
    if(isset($_SESSION['isLoggedIn'])){
        
        $complex = $database->select("tb_recipe_complex", "*");
        $category = $database->select("tb_recipe_category", "*");
        $date = $database->select("tb_recipe_date", "*");
    
        if(isset($_GET)){
            $data = $database->select("tb_recipes", "*", [
                "id_recipe" => $_GET["id"]
            ]);
        }
        
        
    }else{

        header("location: login.php");

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef's kiss</title>

        <!--Google fonts Source sans pro-->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;400&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    
        <!--Google fonts Source serif pro-->
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;400&family=Source+Sans+Pro&family=Source+Serif+Pro:wght@200;400&display=swap" rel="stylesheet">
    
        <!--Bootstrap-->
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    
          <!--css-->
    
          <link rel="stylesheet" href="./css/chefskiss.css">
    
        <!--animations-->
    
        <link rel="stylesheet" href="./css/main.css">

</head>
<body class="container">

    <header>

        <div class="mobile-bar">
            
            <img src="imgs/bars.svg" alt="mobile bar" class="mobile-icon">

        </div>

        <nav id="main-nav" class="mobile-offcanvas navbar-left mt-5 gap-5 align-menu">

            <div class="offcanvas-header">

                <button class="btn-close"></button>

            </div>

            <div class="logo">
                <img class="" src="./imgs/logo.png" alt="Logo">
            </div>

            <ul class="align-menu gap-5 mt-4 ms-5">

                <li class="top-nav-item "><a class="top-nav-link" href="index.php">Home</a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="categories.php">Categories</a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="home.php">About </a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="index.php">Login</a></li>
                <form action="search.php" method="get" role="search">
                <li class="top-nav-item"><input class= "search-recipe rectangle mt-2 me-5" type="search" name="keyword" placeholder="Search recipe" aria-label="Search"><button class="btn btn-danger me-5" type="submit">Search</button></li>
                </form>

            </ul>
        </nav>
    </header>

        <div>

            <h1 class="title-xlg mt-5 ms-4 text-center text-orange">EDIT RECIPE</h1>

            <form action="update.php" method="post" enctype="multipart/form-data">

            <section class="row mb-4">
                
                <section class="col-md pt-5 ">
            
                    <img class="m-auto me-5 img-fluid img-45" id="preview" src="./imgs/<?php echo $data[0]["recipe_img"]; ?>" alt="Preview">
                    <label for="recipe_image">Imagen principal</label>
                    <input id="recipe_image" type="file" name="recipe_image" onchange="readURL(this)">
                    
                </section>
                <section class="col-mb mt-5">

                    <label for="namerecipe" class="title-sm">Name</label>
                    <input type="text" class="rectangle-add" name="namerecipe" value="<?php echo $data[0]["recipe_name"]; ?>">
                    <label for="cookingtime" class="mt-4 title-sm">Cooking time</label>
                    <input type="text" class="rectangle-add" name="cookingtime" value="<?php echo $data[0]["recipe_cook_time"]; ?>">
                    <label for="portions" class="mt-4 title-sm">Portions</label>
                    <input type="text" class="rectangle-add" name="portions" value="<?php echo $data[0]["recipe_yields"]; ?>">
                    <br>
                    <label for="category" class="mt-4 title-sm">Category</label>
                    <select class="rectangle-add" name="category" id=""> 
                    <?php 
                        $len = count($category);
                        for($i=0; $i < $len; $i++) {
                            if($data[0]["id_recipe_category"] == $category[$i]['id_recipe_category']){
                                echo '<option value="'.$category[$i]['id_recipe_category'].'" selected>'.$category[$i]['recipe_category'].'</option>';
                            }else{
                                echo '<option value="'.$category[$i]['id_recipe_category'].'">'.$category[$i]['recipe_category'].'</option>';
                            }
                            
                        }
                    ?>

                    </select>
                    

                </section>

                <section class="col-mb mb-5">

                    <label for="preparationtime" class="title-sm">Preparation time</label>
                    <input type="text" class="rectangle-add" name="preparationtime"  value="<?php echo $data[0]["recipe_prep_time"]; ?>">
                    <label for="totaltime" class="mt-4 title-sm">Total time</label>
                    <input type="text" class="rectangle-add" name="totaltime" value="<?php echo $data[0]["recipe_total_time"]; ?>">
                    <label for="complexity" class="mt-4 title-sm">Complexity</label>
                    <select class="rectangle-add" name="complexity" id="">
                        <?php
                            $len = count($complex);
                            for($i=0; $i < $len; $i++){
                                if($data[0]["id_recipe_complex"] === $complex[$i] ['recipe_complex']){
                                    echo '<option value="'.$complex[$i]
                                    ['id_recipe_complex'].'"selected>'.$complex[$i]
                                    ['recipe_complex'].'</option>';

                                }else{
                                    echo '<option value="'.$complex[$i]
                                    ['id_recipe_complex'].'">'.$complex[$i]
                                    ['recipe_complex'].'</option>';
                                } 
                            }
                        ?> 

                    </select>

                    <label for="date" class="mt-4 title-sm">Date</label>
                    <select class="rectangle-add" name="date" id="">
                        <?php
                            $len = count($date);
                            for($i=0; $i < $len; $i++){
                                if($data[0]["id_recipe_date"] === $date[$i] ['recipe_date']){
                                    echo '<option value="'.$date[$i]
                                    ['id_recipe_date'].'"selected>'.$date[$i]
                                    ['recipe_date'].'</option>';

                                }else{
                                    echo '<option value="'.$date[$i]
                                    ['id_recipe_date'].'">'.$date[$i]
                                    ['recipe_date'].'</option>';
                                } 
                            }
                        ?> 

                    </select>
            
                </section>
            </section>

            <section class="row mb-4">

                <section class="col-md mt-5">

                    <label for="description" class="title-sm">Description</label>
                    <input type="text" class="rectangle-add-big" name="description" value="<?php echo $data[0]["recipe_description"]; ?>">
                    <label for="instructions" class="mt-4 title-sm">Instructions</label>
                    <input type="text" class="rectangle-add-big" name="instructions" value="<?php echo $data[0]["recipe_instructions"]; ?>">
                
                </section>

                <section class="col-md mt-5 mr-5">

                    <label for="ingredients" class="title-sm">Ingredients</label>
                    <input type="text" class="rectangle-add-big" name="ingredients" value="<?php echo $data[0]["recipe_ingredients"]; ?>">
                
                </section>

                

            </section>

            <section class="row mb-5">
                <label class="checkbox">
                    <input type="checkbox" value="Highlighted" id="Highlighted" name="Highlighted"> Highlighted
                </label>
            </section>
                <section class="col-md mb-5">
                
                <input type="hidden" name="id" value="<?php echo $data[0]["id_recipe"]; ?>">
                <input class="btn btn-danger btn-lg btn-block" type="submit" value="Edit">

                    <!--  <button class="btn btn-danger btn-lg btn-block" type="submit"> Submit</button> -->
                </section>

            </form>    

        </div>

            <footer>
                <div class="footer row justify-content-around">
                    <div class="container">
                            <div class="col social mt-5">
                        <ul>
                            <li><img src="./imgs/facebook.png" width="32" style="width: 32px;"></li>
                            <li><img src="./imgs/insta-logo.png" width="32" style="width: 32px;"></li>
                            <li><img src="./imgs/youtube.png" width="32" style="width: 32px;"></li>
                            <li><h1 class="title-rg text-white mt-4 mb-2">Chef's Kiss© 2022</h1></li>
                        </ul>
                    </div>
                    
                    <section class="row justify-content-end">
                        <div class="col-4 mt-5">
                            <img class="img-fluid" src="./imgs/googleplay.png">
                        </div>  
                
                        <div class="col-4 mt-5">
                            <img class="img-fluid" src="./imgs/appstore.png">
                        </div>  
                    <div class="clearfix"></div>
                    </section>

                </div>

            </footer>
                <!-- END OF FOOTER -->

                <script>
                    function readURL(input) {
                        if(input.files && input.files[0]){
                            let reader = new FileReader();

                            reader.onload = function(e) {
                                let preview = document.getElementById('preview').setAttribute('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>

            <script>
                document.addEventListener("DOMContentLoaded", function(){

                    AOS.init();

                    document.querySelector('.mobile-icon').addEventListener('click', function(event){
                        console.log('click');
                        document.getElementById('main-nav').classList.add('show-nav');
                    });

                    document.querySelector('.btn-close').addEventListener('click', function(event){
                        console.log('click');
                        document.getElementById('main-nav').classList.remove('show-nav');
                    });
                });
            </script>
    
</body>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</html>