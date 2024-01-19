<?php
class Bddstat {
    private $conn;

    private function connectrdv() {
        require_once 'BDD.php';
        $bdd = new bdd();
        $this->conn = $bdd->connect();

        return $this->conn;
    }

    public function usersGenderAgeDistribution() {
        $this->conn = $this->connectrdv();
        $stmt = $this->conn->prepare("
            SELECT
                CASE 
                    WHEN TIMESTAMPDIFF(YEAR, dateNaissance, CURDATE()) < 25 THEN 'Moins de 25 ans'
                    WHEN TIMESTAMPDIFF(YEAR, dateNaissance, CURDATE()) BETWEEN 25 AND 50 THEN 'Entre 25 et 50 ans'
                    ELSE 'Plus de 50 ans'
                END AS age_group,
                civilite AS gender,
                COUNT(*) AS user_count
            FROM patient
            GROUP BY age_group, gender
        ");
        $stmt->execute();
        $this->conn = null;
        return $stmt;
    }

    public function totalConsultationDurationByDoctor() {
        $this->conn = $this->connectrdv();
        $stmt = $this->conn->prepare("
            SELECT
                medecin.nom AS doctor_name,
                medecin.prenom AS doctor_firstname,
                SUM(rdv.dureeRDV) AS total_duration
            FROM rdv
            INNER JOIN medecin ON rdv.id_medecin = medecin.id_medecin
            GROUP BY rdv.id_medecin
        ");
        $stmt->execute();
        $this->conn = null;
        return $stmt;
    }
}
?>
