<?php
    //comentarios
    /* comentarios de bloque */

   /* $status = true; //boolean
    $name = "string"; //string
    $val = 1234; //number*/

    require 'database.php';

    session_start();
    if(isset($_SESSION['isLoggedIn'])){

        $complex = $database->select("tb_recipe_complex", "*");
        $category = $database->select("tb_recipe_category", "*");
        $date = $database->select("tb_recipe_date", "*");

        $data = $database->select("tb_recipes", "*", [
            "tb_recipes.recipe_ingredients",
        ]);
        
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
                <li class="top-nav-item"><a class="top-nav-link" href="index.php">About </a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="login.php">Login</a></li>
                <form action="search.php" method="get" role="search">
                <li class="top-nav-item"><input class= "search-recipe rectangle mt-2 me-5" type="search" name="keyword" placeholder="Search recipe" aria-label="Search"><button class="btn btn-danger me-5" type="submit">Search</button></li>
                </form>

            </ul>

        </nav>

    </header>

        <div>

            <h1 class="title-xlg mt-5 ms-4 text-center text-orange">RECIPE INFO</h1>

            <form action="response.php" method="post" enctype="multipart/form-data">

            <section class="row mb-4">
                
                <section class="col-mb pt-5 ">
                    
                     <!-- <img class="m-auto me-5 img-fluid" src="./imgs/placeholder.png" alt="placeholder"> --> 
                    <img  class="m-auto img-fluid img-45" id="preview" src="./imgs/placeholder.png" alt="Preview">
                    <label for="recipe_image ">Imagen principal</label>
                    <input id="recipe_image" type="file" name="recipe_image" onchange="readURL(this)">

                </section>
                <section class="col-mb mt-5">

                    <label for="namerecipe" class="title-sm">Name</label>
                    <input id="namerecipe" type="text" class="rectangle-add" name="namerecipe"  required="" autofocus="" />
                    <label for="cookingtime" class="mt-4 title-sm">Cooking time</label>
                    <input type="text" class="rectangle-add" name="cookingtime" required="" />
                    <label for="portions" class="mt-4 title-sm">Portions</label>
                    <input type="text" class="rectangle-add" name="portions" required="" />
                    <label for="category" class="mt-4 title-sm">Category</label>
                    <select class="rectangle-add" name="category" id="">
                            <?php
                                $len = count($category);
                                for($i=0; $i < $len; $i++){

                                    echo '<option value="'.$category[$i]
                                    ['id_recipe_category'].'">'.$category[$i]
                                    ['recipe_category'].'</option>';

                                }
                            ?> 

                    </select>
                </section>

                <section class="col-mb mb-5">

                    <label for="preparationtime" class="title-sm">Preparation time</label>
                    <input type="text" class="rectangle-add" name="preparationtime"  required="" autofocus="" />
                    <label for="totaltime" class="mt-4 title-sm">Total time</label>
                    <input type="text" class="rectangle-add" name="totaltime" required="" />
                    <label for="complexity" class="mt-4 title-sm">Complexity</label>
                    
                    <select class="rectangle-add" name="complexity" id="">

                        <option value=""></option>
                        <?php
                            $lenc = count($complex);
                            for($i=0; $i < $lenc; $i++){

                                echo '<option value="'.$complex[$i]
                                ['id_recipe_complex'].'">'.$complex[$i]
                                ['recipe_complex'].'</option>';

                            }
                        ?> 

                    </select>

                    <label for="date" class="mt-4 title-sm">Date</label>
                    <select class="rectangle-add" name="date" id="">

                        <option value=""></option>
                        <?php
                            $lend = count($date);
                            for($i=0; $i < $lend; $i++){

                                echo '<option value="'.$date[$i]
                                ['id_recipe_date'].'">'.$date[$i]
                                ['recipe_date'].'</option>';

                            }
                        ?> 

                    </select>
            
                </section>
            </section>

            <section class="row mb-4">

                <section class="col-md mt-5">

                    <label for="description" class="title-sm">Description</label>
                    <input type="text" class="rectangle-add-big" name="description"  required="" autofocus="" />
                    <label for="instructions" class="mt-4 title-sm">Instructions</label>
                    <input type="text" class="rectangle-add-big" name="instructions" required="" />
                
                </section>

                <section class="col-md mt-5 mr-5">

                    <label for="ingredients" class="title-sm">Ingredients</label>
                    <input type="text" class="rectangle-add-big" name="ingredients"  required="" autofocus="" />
                   
        <br>
                
                </section>

                

            </section>

            <section class="row mb-5">
                <label class="checkbox">
                    <input type="checkbox" value="Highlighted" id="Highlighted" name="Highlighted"> Highlighted
                </label>
            </section>
                <section class="col-md mb-5">

                <input type="submit" class="btn btn-danger btn-lg btn-block" value="Submit">

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