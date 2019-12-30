<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-Width');

    include_once('../config/Database.php');
    include_once('../models/user.php');

    // Get the raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $name = $data->name;
    $email = $data->email;
    $password = $data->password;

    // Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);


     // Instantiate DB & connect
     $database = new Database();
     $db = $database->connect();

     // Instantiate User Object
     $user = new User($db);

    // Add the user to the database
    if ($user->emailExists($email)){
        echo json_encode(
            array('emailAlreadyExists' => true,
            'OK' => false)
        );
    }else{
        if ($user->addUser($name, $email, $password)) {
            echo json_encode(
                array('emailAlreadyExists' => false,
                'OK' => true)
            );
         }else{
            echo json_encode(
                array('emailAlreadyExists' => false,
                'OK' => false)
            );
         }
    }




?>