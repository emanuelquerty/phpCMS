<?php session_start();
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
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/home.css">
    <link rel="stylesheet" href="../public/css/post.css">

    <script src="https://kit.fontawesome.com/81dd882751.js"></script>
    <title> <?php echo $_SESSION["post"]["title"]; ?></title>
</head>

<body>

    <div class="container-fluid px-0">
        <?php 
            if (isset($_SESSION['email'])){
                include_once("./partials/topNavbar.php");
            }else {
                include_once("./partials/topNavbarLoggedOut.php");
            }
        ?>

        <div class="row body">
            <div class="post-header col-12">
                <div class="col-lg-6 col-md-6 col-sm-8 col-11 m-auto image-container">
                    <img class="cover-image m-auto" src="<?php $image_path = $_SESSION["post"]["cover_image_name"] == "noImage"? "../public/post_cover_images/default-image.jpg" :
                    "../public/post_cover_images/".$_SESSION["post"]["cover_image_name"];
                    echo $image_path; ?>" alt="Cover Image">
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-8 col-11 m-auto post-container">
                <div class="post">
                    <h1 id="title"> <?php echo $_SESSION["post"]["title"]; ?></h1>
                    <p class="post-author-description">
                        By <?php echo $_SESSION["post"]["author"] . " on " . $_SESSION["post"]["created_at"]; ?>
                    </p>
                    <div class='body'> <?php echo $_SESSION["post"]["body"]; ?></div>
                    <p class="post-author-description">
                        By <?php echo $_SESSION["post"]["author"] . " on " . $_SESSION["post"]["created_at"]; ?>
                    </p>
                    <hr>
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
        <script src="../public/javascript/post.js"></script>
</body>

</html>