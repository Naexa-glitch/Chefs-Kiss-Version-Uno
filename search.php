<?php
    require 'database.php';

    if($_GET){

        $results = $database->select("tb_recipes",[
            "[><]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"]
        ],[
            "tb_recipes.id_recipe",
            "tb_recipes.recipe_name",
            "tb_recipes.recipe_total_time",
            "tb_recipes.recipe_img",
            "tb_recipes.recipe_description",
            "tb_recipes.recipe_likes",
            "tb_recipe_category.recipe_category"
        ],[
            "tb_recipes.recipe_name[~]" => $_GET["keyword"]
        ]);
        
    }

    $levels = $database->select("tb_recipe_complex","*");
    $categories = $database->select("tb_recipe_category","*");
    $ocassions = $database->select("tb_recipe_date","*");

    //featured recipes
    /*$featured_recipes = $database->select("tb_recipes","*",[
        "recipe_is_featured" => 1
    ]);*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results of search</title>

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
    <link rel="stylesheet" href="./css/main.css">
</head>

<body class="container">
<!--HEADER START-->
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
<body>
    
    <?php 
                    if(count($results) > 0){
                        echo "<h4 class='title-xlg text-orange mt-5'>".count($results)." recipe/s related to <span class='fw-bolder'>".$_GET["keyword"]."</span></h4>";
                    }else{
                        echo "<h4 class='title-xlg text-orange mt-5'>No results for <span class='fw-bolder'>".$_GET["keyword"]."</span></h4>";
                    }
                ?>
            </div>
            <div class="row g-5 mt-3">
                <?php 
                    foreach ($results as $recipe){
                        echo "<div class='mt-3 col-4 mb-5'><a href='recipeinfo.php?id_recipe=".$recipe["id_recipe"]."'><img src='./imgs/".$recipe["recipe_img"]."' class='img-fluid m-auto curved-borders img-column' alt='".$recipe["recipe_name"]."'></a><div class=''><h5 class=''>".$recipe["recipe_name"]."</p></div></div>";
                    }
                ?>

            </div>    

<footer>
<div class="footer row justify-content-around">
    <div class="contain ">
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
</footer>

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