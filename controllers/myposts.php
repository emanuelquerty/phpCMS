<?php 
    session_start();

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../config/Database.php';
    include_once '../models/post.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $post = new Post($db);

    // Blog Post Query
    $result = $post->getMyPosts($_SESSION["email"]);

    // Get Row Count
    $num = $result->rowCount();

    // Check if there is any post
    if ($num > 0){

        // Post Array
        $post_arr = array();
        $post_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $post_item = array(
                'id' => $id,
                'title' => $title,
                'body' => html_entity_decode($body),
                'author' => $author,
                "created_at" => $created_at
            );

            // Push to the data
            array_push($post_arr['data'], $post_item);
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