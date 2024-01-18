<?php
class BddMedecin {
    private $host;
    private $username;
    private $password;
    private $database;
    private $pdo;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connectmed() {
        $host = "localhost";
        $username = "med1";
        $password = "med1";
        $database = "medecin";

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->pdo;
    }

    // Autres méthodes pour interagir avec la base de données
    public function afficherMedecinlistquery() {
        $conn = $this->connectmed();
        $sql = "SELECT * FROM medecin";
        $result = $conn->query($sql);
        $conn = null;
        return $result;
    }
    
    public function ajoutermedecinquery($nom,$prenom,$civilite,$specialite) {
        $conn = $this->connectmed();
        $sql = "INSERT INTO medecin (nom, prenom, civilite, specialite) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $civilite, $specialite]);
        $conn = null;
    }
    
    public function supprimermedecinquery($medecinId) {
        $conn = $this->connectmed();
        $sql2 = "DELETE FROM patient WHERE id_medecin = :medecinId";
        $sql = "DELETE FROM medecin WHERE id_medecin = :medecinId";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindParam(':medecinId', $medecinId);
        $stmt2->execute();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':medecinId', $medecinId);
        $stmt->execute();
        if ($stmt2->rowCount() > 0) {
            echo "Médecin supprimé avec succès";
        } else {
            echo "Erreur lors de la suppression du médecin";
        }
        $conn = null;
    }
    
    public function modifiermedecinquery($nom,$prenom,$civilite,$specialite,$medecinId) {
        $conn = $this->connectmed();
        $sql = "UPDATE medecin SET nom=:nom, prenom=:prenom, civilite=:civilite, specialite=:specialite WHERE id_medecin=:medecinId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':civilite', $civilite);
        $stmt->bindParam(':specialite', $specialite);
        $stmt->bindParam(':medecinId', $medecinId);
        $stmt->execute();
        $conn = null;
    }
}
?>