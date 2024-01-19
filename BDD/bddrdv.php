<?php

class BddRdv {
    private $conn;


    public function connectrdv() {
        // Code de connexion à la base de données
        $host = "localhost";
        $username = "med1";
        $password = "med1";
        $database = "cabinet";

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
    }
    return $this->conn;
    }

    public function insertRdv($date, $time, $patientId, $medecinId, $duree) {
        $this->conn = $this->connectrdv();
        try {
            $sql = "INSERT INTO rdv (dateRDV, heureRDV, id_patient, id_medecin,dureeRDV) VALUES (?, ?, ?, ?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$date, $time, $patientId, $medecinId, $duree]);
            echo "Rdv inserted successfully";
        } catch (PDOException $e) {
            echo "Error inserting rdv: " . $e->getMessage();
        }
        $this->conn = null;
    }
    public function afficherRdv() {
        $this->conn = $this->connectrdv();
        $sql = "SELECT * FROM rdv";
        if($this->conn->query($sql) != null){
            $result = $this->conn->query($sql);
            return $result;
        }else{
            echo "Erreur lors de l'affichage des rdv";
            $result = -1;
        }
        $this->conn = null;
        return $result;
    }

    // Ajoutez d'autres méthodes au besoin
}

?>
