<?php
   
    require 'database.php';

    session_start();
    if(isset($_SESSION['isLoggedIn'])){
        
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
    <title>Remove recipe</title>

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
                <li class="top-nav-item"><a class="top-nav-link" href="home.php">About </a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="index.php">Login</a></li>
                <form action="search.php" method="get" role="search">
                <li class="top-nav-item"><input class= "search-recipe rectangle mt-2 me-5" type="search" name="keyword" placeholder="Search recipe" aria-label="Search"><button class="btn btn-danger me-5" type="submit">Search</button></li>
                </form>

            </ul>
        </nav>
    </header>
<body>
    <h2 class="mt-5 title-xlg text-orange mt-5 text-center">Delete this recipe?: <?php echo $data[0]["recipe_name"]; ?> </h2>
    <form class="mb-5 mt-5" action="remove.php" method="post">
        <input class="mr-3 btn btn-danger btn-lg btn-block" type="submit" value="YES">
        <input class="ms-2 btn btn-danger btn-lg btn-block" type="button" value="CANCEL" onclick="history.back();">
        <input class="mb-5" type="hidden" name="id" value="<?php echo $data[0]["id_recipe"]; ?>">
    </form>

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