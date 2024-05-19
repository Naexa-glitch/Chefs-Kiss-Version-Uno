<?php
    require 'database.php';

    session_start();
    if(isset($_SESSION['isLoggedIn'])){

        $data= $database->select("tb_recipes",[
            "[>]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"]
        ],[
            "tb_recipes.id_recipe",
            "tb_recipes.recipe_img",
            "tb_recipes.recipe_name",
            "tb_recipes.recipe_prep_time",
            "tb_recipes.recipe_cook_time",
            "tb_recipes.recipe_total_time",
            "tb_recipe_category.recipe_category"
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


        <div class="align-right mt-3">

            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>

        </div>    

        <div class="mt-5 text-center">

            <img class="img-fluid" src="./imgs/user.png" alt="user">

            <!--<h1 class="title-xxlg mt-3 text-orange">User</h1>-->

            <p class="title-xxlg mt-3 text-orange"><?php echo $_SESSION["username"] ?></p>

            <p><a href="logout.php" class="btn btn-dark"> Logout </a></p>



        </div>

        <h1 class="title-xlg mt-5 text-orange">Created Recipes</h1>

        <a href="create-recipes.php">
            <input class="btn btn-danger mt-3 mb-3" type="login" value="Create recipe">
        </a>

    <table>

        <tr>
            <td>Image</td>
            <td>Recipe name</td>
            <td>Recipe Category</td>
            <td >Prep. time</td>
            <td >Cook time</td>
            <td >Total time</td>
            <td >Options</td>
        </tr>

   

      
        <?php

            $len = count($data);

            for($i=0; $i<$len; $i++){
                echo "<tr>";
                echo "<td><img class='img-20' src='./imgs/".$data[$i]["recipe_img"]."' class='thumb'></td>";
                echo "<td>".$data[$i]["recipe_name"]."</td>";
                echo "<td>".$data[$i]["recipe_category"]."</td>";
                echo "<td>".$data[$i]["recipe_prep_time"]."</td>";
                echo "<td>".$data[$i]["recipe_cook_time"]."</td>";
                echo "<td>".$data[$i]["recipe_total_time"]."</td>";
                echo "<td><a class='btn btn-danger mb-2' href='edit.php?id=".$data[$i]["id_recipe"]."'>Edit</a> <a class='btn btn-danger' href='delete.php?id=".$data[$i]["id_recipe"]."'>Delete</a></td>";
                echo "</tr>";
            }

        ?>
    </table>

    <!-- FOOTER START -->
<footer>
    <div class="footer row justify-content-around mt-5">
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