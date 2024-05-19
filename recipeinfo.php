<?php
    require 'database.php';

    $complex = $database->select("tb_recipe_complex","*");
    $categories = $database->select("tb_recipe_category","*");
    $date = $database->select("tb_recipe_date","*");

    //featured recipes
    $featured_recipes = $database->select("tb_recipes","*",[
        "recipe_is_featured" => 1
    ]);

    //recipe
    $recipe = $database->select("tb_recipes",[
        "[><]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"],
        "[><]tb_recipe_complex"=>["id_recipe_complex" => "id_recipe_complex"],
        "[><]tb_recipe_date"=>["id_recipe_date" => "id_recipe_date"],
    ],[
        "tb_recipes.id_recipe",
        "tb_recipes.id_recipe_category",
        "tb_recipes.recipe_name",
        "tb_recipes.recipe_prep_time",
        "tb_recipes.recipe_cook_time",
        "tb_recipes.recipe_total_time",
        "tb_recipes.recipe_yields",
        "tb_recipes.recipe_img",
        "tb_recipes.recipe_description",
        "tb_recipes.recipe_likes",
        "tb_recipes.recipe_ingredients",
        "tb_recipes.recipe_instructions",
        "tb_recipe_category.recipe_category",
        "tb_recipes.id_recipe_complex",
        "tb_recipes.id_recipe_date",
        "tb_recipe_complex.recipe_complex"
    ],[
        "tb_recipes.id_recipe" => $_GET["id_recipe"]
    ]);

    //related recipes
    $related_recipes = $database->select("tb_recipes", "*", [
        "id_recipe_category" => $recipe[0]["id_recipe_category"],
        'LIMIT' => 3
    ]);

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

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
                    <li class="top-nav-item"><a class="top-nav-link" href="categories.php">Categories</a></li>
                    <li class="top-nav-item"><a class="top-nav-link" href="index.php">About </a></li>
                    <li class="top-nav-item"><a class="top-nav-link" href="login.php">Login</a></li>
                    <form action="search.php" method="get" role="search">
                    <li class="top-nav-item"><input class= "search-recipe rectangle mt-2 me-5" type="search" name="keyword" placeholder="Search recipe" aria-label="Search"><button class="btn btn-danger me-5" type="submit">Search</button></li>
                    </form>

                </ul>
        </nav>
    </header>
        <!-- HEADER -->

        <center><section>
           <!-- <h1 class="title-xlg ms-4 mt-5 text-orange text-center">Dumplings</h1>-->

            <div class="row g-0 recipe-image img-fluid mt-5 mb-5 curved-borders">
                <div class='featured-recipe title-xlg ms-4 mt-5 mb-5 text-orange text-center'><?php echo $recipe[0]["recipe_name"]; ?></div>
                <?php echo "<img class='img-fluid mt-5 mb-5 curved-borders' src='./imgs/".$recipe[0]['recipe_img']."'>"; ?>
            </div>
                <!-- <img class="img-fluid mt-5 mb-5 curved-borders " src="./imgs/dumplings.jpg" alt="dumplings"> -->
                
                <div class="row g-0 mt-3 mb-5">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><span class='fw-bolder'>Preparation time:</span> <?php echo $recipe[0]["recipe_prep_time"]; ?></li>
                        <li class="list-group-item"><span class='fw-bolder'>Cook time:</span> <?php echo $recipe[0]["recipe_cook_time"]; ?></li>
                        <li class="list-group-item"><span class='fw-bolder'>Total time:</span> <?php echo $recipe[0]["recipe_total_time"]; ?></li>
                        <li class="list-group-item"><span class='fw-bolder'>Yield:</span> <?php echo $recipe[0]["recipe_yields"]; ?></li>
                        <li class="list-group-item"><span class='fw-bolder'>Skill level:</span> <?php echo $recipe[0]["recipe_complex"]; ?></li>
                    </ul>
                </div> 


                <a type="button" href="likes.php?id_recipe=<?php echo $recipe[0]["id_recipe"]; ?>" class="btn btn-danger position-relative mt-3 mx-auto likes">
                    Likes <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                    <?php echo $recipe[0]["recipe_likes"]; ?>
                        <span class="visually-hidden">likes</span>
                    </span>
                </a>


               <!--  <div class='rating_selection'>
                    <a type="button" href="likes.php?id_recipe=<?php echo $recipe[0]["id_recipe"]; ?>" class="likes">
                        <input checked id='rating_1' name='rating' type='radio' value='rating_1'><label for='rating_1'>
                        <span>Rate 1 Star</span>
                        </label><input id='rating_1' name='rating' type='radio' value='rating_1'><label for='rating_1'>
                    </a>        
                        </div> -->
                  
            </section></center>
                <div>

                <p class="p-3 text-content text-center opacity-60 mt-5 mb-5 px-5 me-5"><?php echo $recipe[0]["recipe_description"]; ?></p>
                   
                </div>


        <section class="row">
			<img class="mt-5 mb-5 img-75" src="./imgs/linea.png" alt="linea">
		</section>
        
        <h1 class="title-xlg mb-4 mt-5 text-orange text-center">Ingredients</h1>
        <div class="row justify-content-around mt-5">
            <div class="col-4">

                    <ul>
                        <?php 
                            $ingredients = [];
                            $ingredients = explode(",", $recipe[0]["recipe_ingredients"]);
                        
                            foreach ($ingredients as $key => $ingredient){
                                if($key != array_key_last($ingredients)){
                                    echo "<li>".$ingredient."</li>";
                                }
                            }

                        ?>
                    </ul>

                <!--
                <li class="title-rg">Olive oil</li>
                <li class="title-rg">1 onion</li>
                <li class="title-rg">250g of wheat dough</li>
                <li class="title-rg">Salt</li>

            </div>
            <div class="col-4">
                <li class="title-rg">Soy sauce</li>
                <li class="title-rg">Pepper</li> -->

            </div>
        </div>

            </div>
        <section class="row">
			<img class="mt-5 mb-5 img-75" src="./imgs/linea.png" alt="linea">
		</section>
        

        <h1 class="title-xlg mb-4 mt-5 text-orange text-center">Process</h1>
        <section class="text-center mt-5 mb-5 px-5">
            <div class="row d-flex justify-content-center">

            <ul>
                        <?php 
                            $instructions = [];
                            $instructions = explode(",", $recipe[0]["recipe_instructions"]);
                        
                            foreach ($instructions as $key => $instruction){
                                if($key != array_key_last($instructions)){
                                    echo "<li>".$instruction."</li>";
                                }
                            }

                        ?>
                    </ul>

               <!-- <div class="col-sm"><ol class="custom-counter">
                    <li class="title-rg mt-3 mb-3">Let’s put the dough in a bowl, after this we’ll mix it with the salt and pepper, <br>once it’s all mixed, add hot water and mix again.</li>
                    <li class="title-rg mb-3">Now we’ll stretch the dough in order to make the famous figure of dumplings, <br>after this put it in the bowl again and add olive oil so that it doesn’t stick to the recipient.</li>
                    <li class="title-rg mb-3">Wait for about one hour, it’ll be ready to be cut in parts, after this make them<br> plain and add the meat, in this case i’ll use pork belly, Now we make sure to close them.</li>
                    <li class="title-rg mb-3">Once you’ve done it we can cook them in vapor, also add chicket broot if <br>you want to give in more flavour.</li>
                    <li class="title-rg">In 25 minutes it will be coocked and ready to be eated. It’s simple and delicious,<br> thank you guys for following my recipes.</li>
                </ol>
                </div>-->
            <div class="d-grid gap-2 d-md-block mt-5">
                <button class="btn btn-danger btn-lg" type="button">Save Recipe</button>
            </div>
        </section>

        <div class="row g-0 mt-1">
                <h4 class='title-xlg mb-4 mt-5 text-orange'>Related recipes</h4>
            </div>

            <div class="row g-0 mt-3 mb-5">

                <div class="row">

                    <?php 
                        foreach ($related_recipes as $recipe){
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