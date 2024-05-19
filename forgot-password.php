<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password?</title>

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
<!--HEADER END-->

<h1 class="title-xlg text-orange mt-5 text-center">Forgot Password? </h1>
<div class="wrapper">
    <form class="form-signin">
            <input type="text" class="form-control mb-3" name="email" placeholder="Email Address" required="" />
            <div class="d-grid d-md-block">
        <button href="entercode.php" class="btn btn-danger" type="submit">Send code</button>

            </div>
            <div class="mt-2">
        <a href="login.html" class="text-gray mt-2">Cancel</a>
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