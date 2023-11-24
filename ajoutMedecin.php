<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajoutMedecin</title>
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

// Créer un formulaire avec les champs nécessaires pour ajouter un médecin
echo '<form method="POST" action="">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom" required><br>
    <label for="specialite">Spécialité:</label>
    <input type="text" name="specialite" id="specialite" required><br>
    <input type="submit" value="Ajouter">
</form>';

// Valider les données du formulaire côté serveur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $specialite = $_POST["specialite"];

    // Exécuter une requête INSERT pour ajouter le médecin à la base de données
    $sql = "INSERT INTO medecins (nom, specialite) VALUES ('$nom', '$specialite')";
    if ($conn->query($sql) === TRUE) {
        echo "Médecin ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du médecin: " . $conn->error;
    }
}

// Rediriger l'utilisateur vers la page d'affichage des médecins après l'ajout
header("Location: affichageMedecins.php");
exit;


?>