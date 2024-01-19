<?php
class BddMedecin {
    private $conn;



    private function connectmed() {
        // Code de connexion à la base de données
        require_once('BDD.php');
        $bdd= new bdd();
        $this->conn = $bdd->connect();
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
        header('Location: ./listeMedecin.php');
        
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
    
    public function modifiermedecinquery($nom,$prenom,$specialite,$medecinId) {
        $this->conn = $this->connectmed();
        $stmt = $this->conn->prepare("UPDATE medecin SET nom=?, prenom=?, specialite=? WHERE id_medecin=?");
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(3, $specialite);
        $stmt->execute([$nom, $prenom, $specialite]);
        $this->conn = null;
    }
    public function select() {
        $this->conn = $this->connectmed();
        $sql = "SELECT * FROM medecin";
        $result = $this->conn->query($sql);
        $this->conn = null;
        return $result;
    }
    public function selectMedecinbyID($idMedecin) {
        $this->conn = $this->connectmed();
        $sql = "SELECT * FROM medecin WHERE id_medecin = $idMedecin";
        $result = $this->conn->query($sql);
        $this->conn = null;
        return $result;
    }
}
?>