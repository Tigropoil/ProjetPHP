<?php

class BddRdv {
    private $conn;


    private function connectrdv() {
        // Code de connexion à la base de données
        require_once 'BDD.php';
        $bdd= new bdd();
        $this->conn = $bdd->connect();
    
    return $this->conn;
    // Remove the closing curly brace
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
    public function supprimerrdvquery($idMedecin,$idPatient,$date,$heureDebut){
        $this->conn = $this->connectrdv();
        try {
            $sql = "DELETE FROM rdv WHERE dateRDV = ? AND heureRDV = ?  and id_patient = ? and id_medecin = ? ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$date, $heureDebut, $idPatient, $idMedecin]);
        }
        catch (PDOException $e) {
            echo "Error deleting rdv: " . $e->getMessage();
        }
        $this->conn = null;
    }

    // Ajoutez d'autres méthodes au besoin
}

?>
