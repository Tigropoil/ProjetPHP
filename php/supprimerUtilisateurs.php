
<?php
// Établir une connexion à la base de données
$servername = "localhost";
$username = "med1";
$password = "med1";
$dbname = "cabinet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer l'identifiant du médecin à supprimer à partir de l'URL ou d'un formulaire
$patientId = $_POST['id']; // Supposons que l'identifiant du médecin est passé dans l'URL

// Exécuter une requête DELETE pour supprimer le médecin de la base de données
$sql = "DELETE FROM patient WHERE id_patient = $patientId";
if ($conn->query($sql) === TRUE) {
    echo "patirnt supprimé avec succès";
} else {
    echo "Erreur lors de la suppression du médecin: " . $conn->error;
}

// Rediriger l'utilisateur vers la page d'affichage des médecins après la suppression
header("Location: ./listeUtilisateurs.php");
exit;

$conn->close();
?>