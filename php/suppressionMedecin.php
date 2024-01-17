<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suppressionMedecin</title>
</head>
<body>
    
</body>
</html>
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
$medecinId = $_POST['id']; // Supposons que l'identifiant du médecin est passé dans l'URL

// Exécuter une requête DELETE pour supprimer le médecin de la base de données
$sql2 = "DELETE FROM patient WHERE id_medecin = $medecinId";
$sql = "DELETE FROM medecin WHERE id_medecin = $medecinId";

if ($conn->query($sql2) === TRUE) {
    $conn->query($sql);
    echo "Médecin supprimé avec succès";
} else {
    echo "Erreur lors de la suppression du médecin: " . $conn->error;
}

// Rediriger l'utilisateur vers la page d'affichage des médecins après la suppression
header("Location: ./listeMedecin.php");
exit;

$conn->close();
?>