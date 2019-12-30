<?php

    include_once("../models/resetPassword.php");

    class User {
         // DB Stuff
         private $conn;
         private $table = 'users';

        // DB Properties
        public $id;
        public $name;
        public $email;
        public $password;
        public $created_at;
       
        // Constructor with DB
        public function __construct($db){
            $this->conn = $db;
        }


        // Check if user exists
        public function emailExists($email){
            // Create Query
            $query = "SELECT * FROM `$this->table`
                WHERE 
                email = ?
                LIMIT 0,1";

            // Prepare Statement 
            $stmt = $this->conn->prepare($query);          
            
            // Bind email
            $stmt->bindParam(1, $email);

             //Execute query
            $stmt->execute();

            // Get Row Count
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                return true;
            }else{
                return false;
            }            
        }


        // Add the user
        public function addUser($name, $email, $password){
            // Create Query
            $query = "INSERT INTO `$this->table`
            SET 
                name = :name,
                email = :email,
                password = :password
            ";

            // Prepare Statement 
            $stmt = $this->conn->prepare($query);

             // Clean the data
             $name = htmlspecialchars(strip_tags($name));
             $email = htmlspecialchars(strip_tags($email));
             $password = htmlspecialchars(strip_tags($password));
            
            // Bind the data
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            // Execute Query
            if ($stmt->execute()){
                // Get the info of the user just registered
                $result = $this->getUserInfo($email);
                $row = $result->fetch(PDO::FETCH_ASSOC);

                // Extract the results from row array
                extract($row);
                
                // Instantiate Password Reset Class to insert users info on password reset table
                $password_reset = new PasswordReset($this->conn);
                return $password_reset->insertAllRecords($id, $email);

            }

            // Print Errors if something goes wrong
            printf("Error: %s. \n", $stmt->error);
            
            return false;
        }

          // Get the password given an email
          public function getPassword($email){
            // Create Query
            $query = "SELECT password FROM `$this->table` 
                WHERE 
                email = ? 
                LIMIT 0,1";

            // Prepare Statement 
            $stmt = $this->conn->prepare($query);          
            
            // Bind email
            $stmt->bindParam(1, $email);

             //Execute query
            $stmt->execute();

            return $stmt;         
        }

             // Get all user info given an email
             public function getUserInfo($email){
                // Create Query
                $query = "SELECT * FROM `$this->table`
                    WHERE 
                    email = ? 
                    LIMIT 0,1";
    
                // Prepare Statement 
                $stmt = $this->conn->prepare($query);          
                
                // Bind email
                $stmt->bindParam(1, $email);
    
                 //Execute query
                $stmt->execute();
    
                return $stmt;         
            }

            public function updatePassword($id, $password){
                $query = "UPDATE `$table` SET `password`=? WHERE `id`=?";

                $stmt = $this->conn->prepare($query);

                $stmt->bindParam(1, $password);
                $stmt->bindParam(2, $id);
                
                 // Execute Query
                 if ($stmt->execute()){
                    return true;
                }else{
                    return false;
                }

            }

            // Check if an entry exists in a table
            public static function columnExists($db, $table, $columnName, $columnValue) {
                $query = "SELECT * FROM `$table` WHERE `$columnName` = ?";

                $stmt = $db->prepare($query);

                $stmt->bindParam(1, $columnValue);

                //Execute query
                $stmt->execute();

                 // Get Row Count
                $rowCount = $stmt->rowCount();

                if ($rowCount > 0){
                    return true;
                }else {
                    return false;
                }

            }

            public function updateAccountInfo($name, $email, $password, $currentEmail){
                $query = "UPDATE `$this->table` SET `name`=?, `email`=?, `password`=? WHERE `email`=?";

                $stmt = $this->conn->prepare($query);

                $stmt->bindParam(1, $name);
                $stmt->bindParam(2, $email);
                $stmt->bindParam(3, $password);
                $stmt->bindParam(4, $currentEmail);
                
                 // Execute Query
                 if ($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }

    }






























?>