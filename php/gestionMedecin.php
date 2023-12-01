<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestionMedecin</title>
</head>
<body>
    
</body>
</html>
<?php
// Établir une connexion à la base de données

// Your database connection code here

// Exécuter une requête SELECT pour récupérer les informations des médecins

function affichermedecin($conn) {
    $query = "SELECT * FROM medecin";
    $result = mysqli_query($conn, $query);

    // Afficher les informations des médecins dans un tableau
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Nom</th><th>Spécialité</th><th>Adresse</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['specialite'] . "</td>";
            echo "<td>" . $row['adresse'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun médecin trouvé.";
    }
}

affichermedecin($conn);

?>

// FILEPATH: /c:/xampp/htdocs/ProjetPHP/ajoutMedecin.php

<?php
// Établir une connexion à la base de données

// Créer un formulaire avec les champs nécessaires pour ajouter un médecin

// Valider les données du formulaire côté serveur

// Exécuter une requête INSERT pour ajouter le médecin à la base de données

// Rediriger l'utilisateur vers la page d'affichage des médecins après l'ajout
?>

// FILEPATH: /c:/xampp/htdocs/ProjetPHP/modificationMedecin.php

<?php
// Établir une connexion à la base de données

// Récupérer l'identifiant du médecin à modifier à partir de l'URL ou d'un formulaire

// Exécuter une requête SELECT pour récupérer les informations du médecin

// Afficher les informations du médecin dans un formulaire pré-rempli

// Valider les données du formulaire côté serveur

// Exécuter une requête UPDATE pour mettre à jour les informations du médecin

// Rediriger l'utilisateur vers la page d'affichage des médecins après la modification
?>

// FILEPATH: /c:/xampp/htdocs/ProjetPHP/suppressionMedecin.php

<?php
// Établir une connexion à la base de données

// Récupérer l'identifiant du médecin à supprimer à partir de l'URL ou d'un formulaire

// Exécuter une requête DELETE pour supprimer le médecin de la base de données

// Rediriger l'utilisateur vers la page d'affichage des médecins après la suppression
?>
