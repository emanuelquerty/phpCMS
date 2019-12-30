<?php 
session_start(); 

if (!isset($_SESSION['email'])) {
    header('location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Lato:300i,400,400i,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/css/home.css">
    <link rel="stylesheet" href="../public/css/profile.css">

    <script src="https://kit.fontawesome.com/81dd882751.js"></script>
    <title>Account Information</title>
</head>

<body>
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-light bg-primary">
                    <a class="navbar-brand ml-2 mr-4" href="#">CMS</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <form class="form-inline my-2 my-lg-0 userinfo-form">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="email"><?php  echo $_SESSION['fullname'][0]  ?></a>
                                </li>
                                <li class="nav-item logout-btn">
                                    <a class="nav-link" href="./views/login.php" id="logout-btn"> Logout</a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Body starts here -->
        <div class="row">
            <div class="col-2 dashboard-navbar bg-primary">
                <li class="nav-item active dashboard-item">
                    <a class="nav-link home" href="./home.php"><i class="material-icons">home</i> Home</a>
                </li>
                <li class="nav-item dashboard-item">
                    <a class="profile" href="./profile.php"><i class="material-icons">person</i> Profile</a>
                </li>
                <li class="nav-item dashboard-item">
                    <a class="post" href="./post.php"><i class="material-icons">post_add</i> New Post</a>
                </li>
                <li class="nav-item dashboard-item">
                    <a class="posts"><i class="material-icons">library_books</i> All Posts</a>
                </li>
                <li class="nav-item dashboard-item">
                    <a class="comments"><i class="material-icons">comment</i> Comments</a>
                </li>
            </div>
            <div class="col-10 dashboard-body">
                <form class="edit-profile-info" onsubmit="return validate(event)">
                    <h3 id="account-info-title">Account Information</h3>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" id="name" value="<?php  echo $_SESSION["name"]  ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php  echo $_SESSION["email"]  ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"
                            value="<?php  echo $_SESSION["password"]  ?>">
                    </div>
                    <button type="submit" class="btn btn-primary submit-btn">Update Account</button>
                </form>
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
    <script src="../public/javascript/home.js"></script>
    <script src="../public/javascript/profile.js"></script>
</body>
</body>

</html>