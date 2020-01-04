<?php 
session_start(); 

if (isset($_SESSION['email'])) {
    header('location: ./home.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Lato:300i,400,400i,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/css/login.css">

    <script src="https://kit.fontawesome.com/81dd882751.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="../index.php">CMS</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="./register.php">Register</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="row mt-5 body">
            <div class="col m-auto">
                <div class="card card-body">
                    <h1 class="text-center mb-3"><i class="fas fa-sign-in-alt"></i> Login</h1>
                    <form id="login-form" onsubmit="return validate(event)">
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Enter Email" />
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter Password" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-block login-btn">Login</button>
                        <p class="mt-4">
                            No Account? <a href="./register.php">Register</a>
                        </p>
                        <p class="reset">
                            Forgot Password? <a href="./resetPassword.php">Change Password</a>
                        </p>
                    </form>
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
    <script src="../public/javascript/login.js"></script>
</body>

</html>