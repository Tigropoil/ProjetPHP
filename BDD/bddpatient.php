<?php

class bddpatient {
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

    public function connectpat() {
        // Code de connexion à la base de données
        $host = "localhost";
        $username = "med1";
        $password = "med1";
        $database = "medecin";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
    }
    return $pdo;
    }

    // Autres méthodes pour interagir avec la base de données
    // ...
    public function afficherpatientlistquery() {
        $conn = $this->connectpat();
        $sql = "SELECT * FROM patient";
        $result = $conn->query($sql);
        $conn = null;
        return $result;
    }
    public function ajouterpatientquery($nom,$prenom,$civilite,$adresse,$ville,$codepostal,$dateNaissance,$lieuNaissance,$numSecu) {
        $conn = $this->connectpat();
        $sql = "INSERT INTO patient (nom, prenom, civilite, adresse, ville, codePostal, dateN, lieuN, numSecu) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $civilite, $adresse, $ville, $codepostal, $dateNaissance, $lieuNaissance, $numSecu]);
        $conn = null;
        return $stmt->rowCount();
    }
    public function supprimerpatientquery($id) {
        $conn = $this->connectpat();
        $sql = "DELETE FROM patient WHERE id_patient = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $conn = null;
        return $stmt->rowCount();
    }
    public function modifierpatientquery($id,$nom,$prenom,$civilite,$adresse,$ville,$codepostal,$dateNaissance,$lieuNaissance,$numSecu) {
        $conn = $this->connectpat();
        $sql = "UPDATE patient SET nom=?, prenom=?, civilite=?, adresse=?, ville=?, codePostal=?, dateN=?, lieuN=?, numSecu=? WHERE id_patient=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $civilite, $adresse, $ville, $codepostal, $dateNaissance, $lieuNaissance, $numSecu, $id]);
        $conn = null;
        return $stmt->rowCount();
    }
}
?>