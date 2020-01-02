<?php 
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Access-Control-Allow-Origin');

    include_once '../config/Database.php';
    include_once '../models/post.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $post = new Post($db);

    $title = "";
    $body = "";
    $image = "";
    $author = $_SESSION["name"];
    $email = $_SESSION["email"];

    // Make sure text data came through
    if ( isset( $_POST["title"] ) && isset( $_POST["body"] ) ) {
        $title = $_POST["title"];
        $body = $_POST["body"];
    }

    $filenameToStore = "noImage";
    // Make sure user has sent an image
    if ( isset( $_FILES["image"]) ) {
        $image = $_FILES["image"];

        // Get filename with extension
        $filenameWithExtension = $image["name"];

        // Get filename with no extension
        $filename  = pathinfo( $filenameWithExtension, PATHINFO_FILENAME);

        // Get just the extension
        $extension = pathinfo( $filenameWithExtension, PATHINFO_EXTENSION);

        // Filename to store (we use timestamp given by time() to make sure all files are unique.
        // If someone uploads a file with the same filename, it won't override any file because of timestamp)
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        // Upload the image
        $target_dir = "../public/post_cover_images/";
        $target_file = $target_dir . basename($filenameToStore);
        move_uploaded_file($image["tmp_name"], $target_file);

    }

    // Create and save the post in the database
    if ($post->create($title, $body, $author, $email, $filenameToStore)){
        echo json_encode(
            array('message' => 'Post Created')
        );
    }else {
        echo json_encode(
            array('message' => 'Post Not Created')
        );
    }

?>