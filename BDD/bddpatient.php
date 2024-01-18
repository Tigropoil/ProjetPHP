<?php

class bddpatient {
    private $conn;



    public function connectpat() {
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

    // Autres méthodes pour interagir avec la base de données
    // ...
    public function afficherpatientlistquery() {
        $this->conn = $this->connectpat();
        $sql = "SELECT * FROM patient";
        if($this->conn->query($sql) != null){
            $result = $this->conn->query($sql);
            return $result;
        }else{
            echo "Erreur lors de l'affichage des patients";
            $result = -1;
        }
        $this->conn = null;
        return $result;
    }

    public function ajouterpatientquery($nom,$prenom,$civilite,$adresse,$ville,$codepostal,$dateNaissance,$lieuNaissance,$numSecu, $medecinId) {
        $this->conn = $this->connectpat();
        $sql = "INSERT INTO patient (nom, prenom, civilite, adresse, ville, codePostal, dateNaissance, lieuNaissance, numSecu, id_medecin) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $civilite, $adresse, $ville, $codepostal, $dateNaissance, $lieuNaissance, $numSecu, $medecinId]);
        $this->conn = null;
        header('Location: ./listeUtilisateurs.php');
    }

    public function supprimerpatientquery($patientId) {
        $this->conn = $this->connectpat();
        $sql = "DELETE FROM patient WHERE id_patient = $patientId";
        if ($this->conn->query($sql)) {
            echo"ok";
        }else{
            echo "Erreur lors de la suppression du patient";}
        $this->conn = null;
        header('Location: ./listeUtilisateurs.php');
    }

    public function modifierpatientquery($id,$nom,$prenom,$civilite,$adresse,$ville,$codepostal,$dateNaissance,$lieuNaissance,$numSecu) {
        $this->conn = $this->connectpat();
        $sql = "UPDATE patient SET nom=?, prenom=?, civilite=?, adresse=?, ville=?, codePostal=?, dateNaissance=?, lieuNaissance=?, numSecu=? WHERE id_patient=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $civilite, $adresse, $ville, $codepostal, $dateNaissance, $lieuNaissance, $numSecu, $id]);
        $this->conn = null;
        return $stmt->rowCount();
    }
}
?>