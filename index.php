<?php
    session_start();

    if (isset($_SESSION["email"])){
        header("location: ./views/home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Lato:300i,400,400i,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/main.css">
    <link rel="stylesheet" href="./public/css/index.css">

    <script src="https://kit.fontawesome.com/81dd882751.js"></script>
    <title>Login && Register</title>
</head>

<body>

    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar fixed-top  navbar-expand-md navbar-light ">
                    <a class="navbar-brand" href="#">CMS</a>
                    <button class="navbar-toggler bg-white mr-4" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="./views/login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./views/register.php">Register</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- <div class="row mt-5 body">
            <div class="col-lg-4 col-md-4 col-sm-8 col-11 m-auto">
                <div class="card card-body text-center">
                    <h1><i class="fas fa-door-open"></i></h1>
                    <p>Create an account or login</p>
                    <a href="./views/register.php" class="btn btn-block mb-2 register-btn">Register</a>
                    <a href="./views/login.php" class="btn btn-secondary btn-block">Login</a>
                </div>
            </div>
        </div> -->

        <div class="row body">
            <div class="col-xl-7 col-lg-7 col-md-7 col-12 order-xl-1 order-lg-1 order-md-1 order-2 all-posts">

            </div>
            <div
                class="col-xl-5 col-lg-5 col-md-5 col-12 order-lg-2 order-md-2 order-1 create-account-or-login-container">
                <div class="card card-body text-center create-account-or-login-container-wrapper ">
                    <h1 class="cms-intro">Write about what you care about</h1>
                    <p class="mb-5">Share your blogs with the world</p>
                    <h2><i class="fas fa-door-open"></i></h2>
                    <p>Create an account or login</p>
                    <a href="./views/register.php" class="btn btn-block mb-2 register-btn">Register</a>
                    <a href="./views/login.php" class="btn btn-secondary btn-block">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- Local Javascript -->
    <script src="./public/javascript/index.js"></script>
</body>

</html>