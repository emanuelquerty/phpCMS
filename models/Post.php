<?php 

    class Post {
        // DB Stuff
        private $conn;
        private $table = 'posts';

        // Constructor with DB
        public function __construct($db){
            $this->conn = $db;
        }

        // Create a Post
        public function create($title, $body, $author, $email){
            // Create Query
            $query = 'INSERT INTO ' . $this->table . '
            SET 
                title = :title,
                body = :body,
                author = :author,
                email = :email
            ';

            // Prepare Statement 
            $stmt = $this->conn->prepare($query);

            // Bind the data
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':body', $body);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':email', $email);

            // Execute Query
            if ($stmt->execute()){
                return true;
            }

            // Print Errors if something goes wrong
            printf("Error: %s. \n", $stmt->error);
            
            return false;
        }

        // Get all posts of the user that is signed in
        public function getMyPosts($email){
            // Create query
            $query = "SELECT * FROM `$this->table` WHERE email=? ORDER BY created_at DESC ";

            // Prepare Statement
            $stmt = $this->conn->prepare($query);

            // Bind parameter
            $stmt->bindParam(1, $email);

            //Execute query
            $stmt->execute();

            return $stmt;
        }

        // Get Single Post
        public function readSingle($id){
            // Create query
            $query = "SELECT * FROM `$this->table` WHERE id=?";

            // Prepare Statement
            $stmt = $this->conn->prepare($query);

            // BIND ID
            $stmt->bindParam(1, $id);

            //Execute query
            if ( $stmt->execute()){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            }else{
                return false;
            }
       }

       // Delete a single post given an id
       public function deleteSingle($postId){
           $query = "DELETE FROM  `$this->table` WHERE id=?";

           // Prepare Statement
           $stmt = $this->conn->prepare($query);

           // BIND ID
           $stmt->bindParam(1, $postId);

           //Execute query
           if ( $stmt->execute()){
               return true;
           }else{
               return false;
           }
       }

          // update a Post
          public function update($title, $body, $author, $email, $id){
            // Create Query
            $query = 'UPDATE ' . $this->table . '
            SET 
                title = :title,
                body = :body,
                author = :author,
                email = :email
            WHERE 
                id=:id
            ';

            // Prepare Statement 
            $stmt = $this->conn->prepare($query);

            // Bind the data
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':body', $body);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);

            // Execute Query
            if ($stmt->execute()){
                return true;
            }

            // Print Errors if something goes wrong
            printf("Error: %s. \n", $stmt->error);
            
            return false;
        }












        // Get Posts
        public function read(){
            // Create query
            $query = 'SELECT 
                c.name AS category_name,
                p.id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
            FROM
                ' . $this->table . ' p
            LEFT JOIN 
                categories c  ON p.category_id = c.id
            ORDER BY 
                p.created_at DESC
            ';

            // Prepare Statement
            $stmt = $this->conn->prepare($query);

            //Execute query
            $stmt->execute();

            return $stmt;
        }

        

    }

?>