<?php 

    class PasswordReset {
         // DB Stuff
         private $conn;
         private $table = 'password_reset';

        // DB Properties
        public $id;
        public $email;
        public $token;
        
        // Constructor with DB
        public function __construct($db){
            $this->conn = $db;
        }

        // Populate user table
        public function insertAllRecords($id, $email){
            // generate a unique random token of length 100
            $token = bin2hex(random_bytes(50));

            // Now add the id, email and a random token for a user in the password_reset table
            $query = "INSERT INTO password_reset (id, email, token) VALUES ('$id', '$email', '$token')";

             //Execute query
             if ($this->conn->exec($query)){
                return true;
            }
            return false;
        }

        //Update token with a new generated token to be used to reset password
        public function updateToken($token, $email){
            $query = "UPDATE '$table' SET token='$token' WHERE email='$email'";

             //Execute query
             if ($this->conn->exec($query)){
                return true;
            }
            return false;
        }

        // Update password in users table using a generated token
        public function updatePassword($token, $password){

            // Get the id of the user from password_reset table using the token extracted from the link sent to the user email
            $query = "SELECT id from '$table' WHERE token=:token LIMIT 0,1";

            $stmt = $this->conn->prepare($query);

            // Bind token
            $stmt->bindParam(':token', $token);

            $stmt->execute();

            // Get the ID
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Now update password for the user with the found id
            $query = "UPDATE $table SET token=$token WHERE email=$email";


            





        }
    }


?>