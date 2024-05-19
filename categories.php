<?php
    require 'database.php';

    if($_GET){

        $column = "";
        $value = 0;
        $title = "";
        $subtitle = $_GET["name"];

        if(isset($_GET["complex"])){
            $column = "tb_recipes.id_recipe_complex";
            $value = $_GET["complex"];
            $title = "By complexity";
        }else if(isset($_GET["category"])){
            $column = "tb_recipes.id_recipe_category";
            $value = $_GET["category"];
            $title = "By type";
        }else if(isset($_GET["date"])){
            $column = "tb_recipes.id_recipe_date";
            $value = $_GET["date"];
            $title = "By date";
        }

        $results = $database->select("tb_recipes",[
            "[><]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"],
            "[><]tb_recipe_complex"=>["id_recipe_complex" => "id_recipe_complex"],
            "[><]tb_recipe_date"=>["id_recipe_date" => "id_recipe_date"],
        ],[
            "tb_recipes.id_recipe",
            "tb_recipes.recipe_name",
            "tb_recipes.recipe_total_time",
            "tb_recipes.recipe_img",
            "tb_recipes.recipe_description",
            //"tb_recipes.recipe_likes",
            "tb_recipe_category.recipe_category",
            "tb_recipes.id_recipe_complex",
            "tb_recipes.id_recipe_date"
        ],[
            $column => $value
        ]);
        
    }

    $complex = $database->select("tb_recipe_complex","*");
    $categories = $database->select("tb_recipe_category","*");
    $date = $database->select("tb_recipe_date","*");

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

    <link rel="stylesheet" href="./css/main.css">

</head>
<body class="container">
        <!-- HEADER -->
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
                <li class="top-nav-item"><a class="top-nav-select" href="categories.php">Categories</a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="index.php">About </a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="login.php">Login</a></li>
                <form action="search.php" method="get" role="search">
                <li class="top-nav-item"><input class= "search-recipe rectangle mt-2 me-5" type="search" name="keyword" placeholder="Search recipe" aria-label="Search"><button class="btn btn-danger me-5" type="submit">Search</button></li>
                </form>

            </ul>
        </nav>
    </header>
        <!-- HEADER -->

        <div>
            <h1 class="title-xlg text-center mt-5 mr-3 text-orange">All recipe categories</h1>
        </div>

        <section>
            <h1 class="title-xlg mt-5 mb-5 text-green">By complexity</h1>

            <div class="row align-items-center">

            <?php
                    //var_dump($levels);
                    foreach ($complex as $complexity){
                        echo "<li class='nav-item'><a class='title-md text-gray mt-3 ms-3' href='categories.php?complex=".$complexity['id_recipe_complex']."&name=".$complexity['recipe_complex']."'>".$complexity['recipe_complex']."</a></li>";
                    }
                ?>

            </div>    

             <!--<div class="row align-items-center">
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/EASY-Chickpea-salad.jpg" alt="Easy"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Easy</p> 
                    </div>
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/INTERMEDIATE-Macarrones.jpg" alt="Intermediate"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Intermediate</p> 
                    </div>
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/ADVANCED-BBQBrisket.jpg" alt="Advanced"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Advanced</p> 
                </div>-->
        </section>

        <section>
            <h1 class="title-xlg mt-5 mb-5 text-lightblue">By type</h1>

            <?php 
                foreach ($categories as $category){
                    echo "<li class='nav-item'><a class='title-md text-gray mt-3 ms-3' href='categories.php?category=".$category['id_recipe_category']."&name=".$category['recipe_category']."'>".$category['recipe_category']."</a></li>";
                }
            ?>

            <!--<div class="row align-items-center">
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/BREAKFAST-british-full-english-breakfast-.jpg" alt="Breakfast"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Breakfast</p> 
                    </div>
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/BEVERAGES.jpg" alt="Beverages"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Beverages</p> 
                    </div>
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/APPETIZER-cranberry-olive-cheese-skewers.jpg" alt="Appetizer"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Appetizer</p> 
                    </div> 
                </div> 
                <div class="row align-items-center mt-5">
                    <div class="col">
                        <a href="#"><img class="v m-auto curved-borders img-column" src="./imgs/LUNCH-salmon.jpeg" alt="Lunch"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Lunch</p> 
                    </div>
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/SOUP-pumpkin-soup.jpg" alt="Soup"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Soup</p>  
                    </div>
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/DESSERTS-Cherry-Cheesecake-with-Berry-Sauce.png" alt="Desserts"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Desserts</p> 
                    </div> 
                </div> -->
        </section>

        <section>
            <h1 class="title-xlg mt-5 mb-5 text-lightblue">By date</h1>  

            <?php 
                foreach ($date as $dates){
                    echo "<li class='nav-item'><a class='title-md text-gray mt-3 ms-3 text-align' href='categories.php?date=".$dates['id_recipe_date']."&name=".$dates['recipe_date']."'>".$dates['recipe_date']."</a></li>";
                }
            ?>

            <!--<div class="row align-items-center">
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/ALL-Strawberry_Shortcake.jpg" alt="All"></a> 
                        <p class="title-md text-gray mt-3 ms-3">All</p> 
                    </div>
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/BIRTHDAY-Vanilla-Birthday-Cake.jpg" alt="Birthday"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Birthday</p> 
                    </div>
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/FATHERSDAY-smoky-spiced-pork-ribs-with-loaded-sweet-potato.jpg" alt="Father's day"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Father's day</p> 
                    </div> 
                </div> 
                <div class="row align-items-center mt-5">
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/MOTHERSDAY-dessert-berries.jpg" alt="mother's day"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Mother's day</p> 
                    </div>
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/CHILDRENSDAY-how-to-make-a-samurai-warrior-helmet-for-childrens-day-recipe-main-photo.jpg" alt="Children's day"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Children's day</p>  
                    </div>
                    <div class="col">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/CHRISTMAS-easy-fruit-cake-b953d3b.jpg" alt="Christmas"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Christmas</p> 
                    </div> 
                </div> 

                <div class="row justify-content-evenly mt-5">
                    <div class="col-4">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/HOLYWEEK.jpg" alt="Holy week"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Holy week</p> 
                    </div>
                    <div class="col-4">
                        <a href="#"><img class="img-fluid m-auto curved-borders img-column" src="./imgs/SUMMER-popsicle-recipes-fruit-yogurt-swirl-ice-pops.jpeg" alt="Summer"></a> 
                        <p class="title-md text-gray mt-3 ms-3">Summer</p>  
                    </div>
                </div>-->
        </section>
        

        <div class="row g-0 mt-3">

            <div class="row">

                <?php 
                    foreach ($results as $recipe){
                         echo "<div class=' mt-3 col-4 mb-5'><a href='recipeinfo.php?id_recipe=".$recipe["id_recipe"]."'><img src='./imgs/".$recipe["recipe_img"]."' class='img-fluid m-auto curved-borders img-column' alt='".$recipe["recipe_name"]."'></a><div class=''><h5 class=''>".$recipe["recipe_name"]."</p></div></div>"; 
                    }
                ?>

            </div>        

        </div>

        <!-- FOOTER START -->
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

    <!-- END OF FOOTER -->

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