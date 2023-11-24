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
$username = "root";
$password = "";
$dbname = "cabinet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer l'identifiant du médecin à supprimer à partir de l'URL ou d'un formulaire
$medecinId = $_GET['id']; // Supposons que l'identifiant du médecin est passé dans l'URL

// Exécuter une requête DELETE pour supprimer le médecin de la base de données
$sql = "DELETE FROM medecin WHERE id = $medecinId";

if ($conn->query($sql) === TRUE) {
    echo "Médecin supprimé avec succès";
} else {
    echo "Erreur lors de la suppression du médecin: " . $conn->error;
}

// Rediriger l'utilisateur vers la page d'affichage des médecins après la suppression
header("Location: affichagemedecin.php");
exit;

$conn->close();
?>