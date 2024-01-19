<?php

class BddRdv {
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connectrdv() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function insertRdv($date, $time, $patientId, $medecinId) {
        try {
            $sql = "INSERT INTO rdv (date, time, patient_id, medecin_id) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$date, $time, $patientId, $medecinId]);
            echo "Rdv inserted successfully";
        } catch (PDOException $e) {
            echo "Error inserting rdv: " . $e->getMessage();
        }
    }

    // Ajoutez d'autres méthodes au besoin

    public function close() {
        $this->conn = null;
    }
}

?>
