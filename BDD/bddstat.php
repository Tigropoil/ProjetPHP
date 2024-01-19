<?php
    class Bddstat {
        private $conn;
    
    
         private function connectrdv() {
            // Code de connexion à la base de données
            require_once 'bdd.php';
            $bdd= new bdd();
            $this->conn = $bdd->connect();
        
        return $this->conn;
        // Remove the closing curly brace
        }
        public function groueagequey(){
        $this->conn=$this->connectrdv();
            $stmt = $this->conn->prepare("SELECT civilite, 
            CASE 
               WHEN TIMESTAMPDIFF(YEAR, dateNaissance, CURDATE()) < 25 THEN 'Moins de 25 ans'
               WHEN TIMESTAMPDIFF(YEAR, dateNaissance, CURDATE()) BETWEEN 25 AND 50 THEN 'Entre 25 et 50 ans'
               ELSE 'Plus de 50 ans'
            END AS age_group,
            COUNT(*) AS count");
            $stmt->execute();
            $this->conn = null;
            return $stmt;
        }
    }
?>