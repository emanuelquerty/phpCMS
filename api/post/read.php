<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $post = new Post($db);

    // Blog Post Query
    $result = $post->read();

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
                'category_id' => $category_id,
                'category_name' => $category_name
            );

            // Push to the data
            array_push($post_arr['data'], $post_item);
        }

        // Turn to JSON && output
        echo json_encode($post_arr);

    }else{
        // No posts
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }














?>