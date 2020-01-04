<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-Width');

    include_once('../config/Database.php');
    include_once('../models/post.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $post = new Post($db);
    $stmt = $post->readAll();

    $count = $stmt->rowCount();

    // Check if there is any post
    if ($count > 0){

        // Post Array
        $post_arr = array();
        // $post_arr['data'] = array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $post_item = array(
                'id' => $id,
                'title' => $title,
                'body' => html_entity_decode($body),
                'author' => $author,
                "created_at" => $created_at
            );

            // Push to the data
            array_push($post_arr, $post_item);
        }

        // Turn to JSON && output
        echo json_encode($post_arr);

    }else{
        // No posts
        echo json_encode(
            array(
                'data' => [],
                'message' => 'No Posts Found'
                )
        );
    }

?>