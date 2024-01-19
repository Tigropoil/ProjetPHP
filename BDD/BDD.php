<?php
    class bdd{
        private $conn;

        public function connect() {
            // Code de connexion à la base de données
            $host = "mysql-docteurlibre.alwaysdata.net";
            $username = $_COOKIE['login'];
            $password = $_COOKIE['password'];
            $database = "docteurlibre_cabinet";
    
            try {
                $this->conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conn;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                return -1;
        }
        }
    }
    ?>