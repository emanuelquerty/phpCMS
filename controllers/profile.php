<?php
    session_start(); 
    
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
     $passwordHash = password_hash($password, PASSWORD_DEFAULT);

   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();

   // Instantiate User Object
   $user = new User($db);

   // Check if email entered is the same as the current one being used
   if ($email == $_SESSION["email"] || ($email != $_SESSION["email"] && !$user->emailExists($email)) ){

       $result = $user->updateAccountInfo($name, $email, $passwordHash, $_SESSION["email"]);
       if ($result){
            $stmt = $user->getUserInfo($email);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] =  $password;
            $_SESSION["fullname"] = preg_split('/\s+/', $row['name']);

            echo json_encode(
                array('emailAlreadyExists' => false,
                'OK' => true)
               );
    
       }

}else if ($user->emailExists($email)){
       echo json_encode(
        array('emailAlreadyExists' => true,
        'OK' => false)
       );
}

?>