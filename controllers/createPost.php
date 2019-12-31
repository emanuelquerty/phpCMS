<?php 
    session_start();

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-Width');

     // Get the raw posted data
     $data = json_decode(file_get_contents("php://input"));

    include_once '../config/Database.php';
    include_once '../models/post.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $post = new Post($db);


    $title = $data->title;
    $body = $data->body;
    $author = $_SESSION["name"];
    $email = $_SESSION["email"];

    
    // Create the post
    if ($post->create($title, $body, $author, $email)){
        echo json_encode(
            array('message' => 'Post Created')
        );
    }else {
        echo json_encode(
            array('message' => 'Post Not Created')
        );
    }

?>