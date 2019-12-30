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
 
     $email = $data->email;
     $password = $data->password;
 
 
      // Instantiate DB & connect
      $database = new Database();
      $db = $database->connect();
 
      // Instantiate User Object
      $user = new User($db);

      // Gets the password for the given email. If email exists, it returns a password
      $result = $user->getPassword($email);

      // Get the row count
      $rowcount = $result->rowCount();
      
      // Check if there is a record with that password
      if ($rowcount > 0){
        $row = $result->fetch(PDO::FETCH_ASSOC);

        // Check if password is incorrect
        if (password_verify($password, $row['password'])) {

            // Get user Info
            $result = $user->getUserInfo($email);
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] =  $password;
            $_SESSION["fullname"] = preg_split('/\s+/', $row['name']);
    
            echo json_encode (
                array(
                    'message' => 'You Exist!'
      
                )
            );
        }else{
            echo json_encode (
                array(
                    'message' => 'Email or Password is Incorrect'
      
                )
            );
        }

      }else{
        echo json_encode (
            array(
                'message' => 'Email or Password is Incorrect'
  
            )
        );
      }
 

?>