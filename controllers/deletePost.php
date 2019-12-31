<?php 
    session_start();

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-Width');

     // Get the raw posted data
     $data = json_decode(file_get_contents("php://input"));
     $postId = $data->postId;

    include_once '../config/Database.php';
    include_once '../models/post.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $post = new Post($db);
    
    // Create the post
    if ($post->deleteSingle($postId)){
        echo json_encode(
            array(
                'message' => 'Post Deleted',
                'success' => true
                )
        );
    }else {
        echo json_encode(
            array(
                'message' => 'Post Not Deleted',
                'success' => false
                )
        );
    }

?>