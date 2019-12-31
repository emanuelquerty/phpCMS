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

    <!-- CK EDITOR CDN -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <!-- Local css -->
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/css/home.css">
    <link rel="stylesheet" href="../public/css/createPost.css">

    <script src="https://kit.fontawesome.com/81dd882751.js"></script>
    <title>Edit Post</title>
</head>

<body>
    <div class="container-fluid px-0">
        <!-- Include top navbar -->
        <?php include_once("./partials/topNavbar.php") ?>

        <!-- Body starts here -->
        <div class="row">

            <!-- Include side navbar -->
            <?php include_once("./partials/sideNavbar.php") ?>

            <div class="col-10 create-new-post-body px-4 py-4">
                <h3 class="page-title">Edit Post</h3>

                <form onsubmit="return false" class="edit-post-form <?php echo $_SESSION["post"]["id"]; ?>">
                    <div class="form-group">
                        <label for="image">Add Image</label>
                        <br>
                        <input type="file" class="image mb-4" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control mb-5" class="title" id="title" name="title"
                            placeholder="Enter the title" value="<?php echo $_SESSION["post"]["title"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ckeditor">Post Body</label>
                        <textarea class="form-control" name="ckeditor" id="ckeditor" cols="30" rows="60">
                        <?php echo $_SESSION["post"]["body"]; ?>
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary preview-btn mt-3 mr-2"
                        id="preview-btn">Preview</button>
                    <button type="submit" class="btn btn-primary publish-btn mt-3" id="publish-btn">Update</button>
                </form>

                <!-- Preview Article (hidden by default) -->
                <div class="preview-article">
                    <div class="article">
                        <img src="../public/img/image-road.jpeg" id="article-image" alt="">
                        <div class="article-wrapper">
                            <h3 class="article-title">Dummy Title </h3>
                            <div class="article-body">
                                <p>Dummy content</p>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum animi dolore quo
                                    perspiciatis impedit nesciunt odit, inventore nihil id consectetur quas? Eligendi
                                    tenetur, obcaecati dolore quaerat doloremque accusamus at quisquam omnis id soluta
                                    libero repellendus, ipsa, in voluptatem! Esse cumque accusamus eius soluta ipsum
                                    dolorum
                                    hic voluptas tenetur veniam aliquid, omnis maxime autem totam eveniet, nulla fugit,
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. In, eligendi placeat sequi
                                    quidem culpa amet quasi doloremque voluptate distinctio esse eius cum delectus
                                    suscipit
                                    nemo corporis explicabo soluta sunt magni, tempore facilis voluptatem autem officia
                                    cupiditate. Corporis eius praesentium obcaecati veritatis maxime, illum pariatur!
                                    Facilis cumque explicabo maxime ad itaque cum cupiditate quae natus ipsam! Magni,
                                    odit
                                    suscipit quae voluptate voluptas eligendi illo doloribus veniam nam! Nulla quisquam
                                    mollitia, quo voluptates ullam quod culpa similique quas doloremque, maxime nobis
                                    vitae?
                                </p>
                            </div>

                            <button type="submit" class="btn btn-secondary keep-writing-btn mt-3"
                                id="keep-writing-btn">Keep
                                Writing</button>
                            <button type="submit" class="btn btn-primary publish-btn mt-3 mr-2"
                                id="publish-btn">Update</button>
                        </div>
                    </div>
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
    <script src="../public/javascript/home.js"></script>
    <script src="../public/javascript/editPost.js"></script>
</body>

</html>