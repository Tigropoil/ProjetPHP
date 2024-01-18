<?php
class BddMedecin {
    private $conn;



    public function connectmed() {
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
    public function afficherMedecinlistquery() {
        $this->conn = $this->connectmed();
        $sql = "SELECT * FROM medecin";
        $result = $this->conn->query($sql);
        $this->conn = null;
        return $result;
    }
    
    public function ajoutermedecinquery($nom,$prenom,$civilite,$specialite) {
        $this->conn = $this->connectmed();
        $sql = "INSERT INTO medecin (nom, prenom, civilite, specialite) 
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $civilite, $specialite]);
        $this->conn = null;
        
    }
    
    public function supprimermedecinquery($medecinId) {
        $this->conn = $this->connectmed();
        $sql2 = "DELETE FROM patient WHERE id_medecin = $medecinId";
        $sql = "DELETE FROM medecin WHERE id_medecin = $medecinId";
        if ($this->conn->query($sql2)) {
            $this->conn->query($sql);
        } else {
            echo "Erreur lors de la suppression du médecin";
        }
        $this->conn = null;
        header('Location: ./listeMedecin.php');
    }
    
    public function modifiermedecinquery($nom,$prenom,$civilite,$specialite,$medecinId) {
        $this->conn = $this->connectmed();
        $sql = "UPDATE medecin SET nom=:nom, prenom=:prenom, civilite=:civilite, specialite=:specialite WHERE id_medecin=:medecinId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($nom, $prenom, $civilite, $specialite, $medecinId);
        $this->conn = null;
    }
    public function select() {
        $this->conn = $this->connectmed();
        $sql = "SELECT * FROM medecin";
        $result = $this->conn->query($sql);
        $this->conn = null;
        return $result;
    }
}
?>