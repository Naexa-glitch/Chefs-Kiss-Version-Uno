<?php 
    
    require 'database.php';

    if($_POST){

    //var_dump($_POST);

        $user = $database->select("tb_user","*", [

            "username" => $_POST["username"]

        ]);

        if(count($user) > 0){

            if(password_verify($_POST["password"], $user[0]["password"])){

                //echo "The password and username are valid";

                session_start();
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["username"] = $user[0]["username"];
                //
                header ("Location: user.php");

            }else{

                echo "Invalid username or password";

            }

        }else{

            echo "Invalid username or password";

        }


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

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
                <li class="top-nav-item"><a class="top-nav-select" href="login.php">Login</a></li>
                <form action="search.php" method="get" role="search">
                <li class="top-nav-item"><input class= "search-recipe rectangle mt-2 me-5" type="search" name="keyword" placeholder="Search recipe" aria-label="Search"><button class="btn btn-danger me-5" type="submit">Search</button></li>
                </form>

            </ul>
        </nav>
    </header>
<!--HEADER END-->

<h1 class="title-xlg text-orange mt-5 text-center">WELCOME BACK</h1>
<div class="wrapper">
    <form class="form-signin" action="login.php" method="post">
            <input type="text" class="form-control mb-3" name="username" placeholder="Username/Email Address" />
            <input type="password" class="form-control" name="password" placeholder="Password" />
            <label class="checkbox">
                <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
            </label>
            <div class="d-grid gap-2 d-md-block col-6">

            <input class="btn btn-danger" type="submit" value="Login">

            <!-- <button class="btn btn-danger" type="submit"> Login</button> -->

            </div>

            <div class="mt-3">
            <a href="forgot-password.php" class="text-gray mt-2">Forgot password?</a>
            </div>

            <div class="mt-2">
            <a href="signup.php" class="text-gray mt-2">Don't have an account? <span> Sign up </span></a>
            </div>

    </form>
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