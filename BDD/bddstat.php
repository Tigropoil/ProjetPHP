<?php
    class Bddstat {
        private $conn;
    
    
        public function connectrdv() {
            // Code de connexion à la base de données
            include 'BDD.php';
            $bdd= new bdd();
            $this->conn = $bdd->connect();
        
        return $this->conn;
        // Remove the closing curly brace
        }
    }
?>