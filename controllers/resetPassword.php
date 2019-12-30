<?php 
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-Width');

include_once('../config/Database.php');
include_once('../models/user.php');
include_once('../models/resetPassword.php');

// Get the raw posted data
$data = json_decode(file_get_contents("php://input"));

$email = $data->email;

 // Instantiate DB & connect
 $database = new Database();
 $db = $database->connect();

 // Instantiate user Object
 $user = new User($db);

// Instantiate password_reset Object
$password_reset = new PasswordReset($db);

//Check if email exists in user table
if(User::columnExists($db, "users", "email", $email)) {

    // Generate a unique random token of length 100
    $token = bin2hex(random_bytes(50));

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Reset your password on Emanuel's Website";
    $msg = "Hi there, click on this <a href=\"new_password.php?token=" . $token . "\">link</a> to reset your password on our site";
    $msg = wordwrap($msg,70);
    $headers = "From: einacio2600@gmail.com";
    
    
    echo json_encode((mail($to, $subject, $msg, $headers)));



    echo json_encode(
        array("message" => "Email Exists")
    );
}else{
    echo json_encode(
        array("message" => "The email entered does not exist")
    );
}

?>