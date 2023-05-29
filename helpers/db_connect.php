<?php
    class db{
        private $servername = "localhost";
        private $username = "root";
        private $password = "marmite90";
        private $dbname = "vacation";

        public function connect(){
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
                // Close the database connection
                // $conn = null;
            } catch(PDOException $e) {
                // If there is an error connecting to the database
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }

?>