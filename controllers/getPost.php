<?php 
    session_start(); 
    
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-Width');

    include_once('../config/Database.php');
    include_once('../models/post.php');


    // Get the raw posted data
    $data = json_decode(file_get_contents("php://input"));
    $postId = $data->postId;

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $post = new Post($db);
    
    if ($row = $post->readSingle($postId)){
        extract($row);
        $_SESSION["post"] = $row;
        echo json_encode(
            array(
                "msg" => "post retrieved successfully"
            )
        );
    }else {
        echo json_encode(
            array(
                "msg" => "Something Happened"
            )
        );
    }

?>