><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../html/patient.html">Medecin</a>
</body>
</html>
<?php
    $pseudo = "med1";
    $password = "med1";
    $bdname = 'cabinet';
    $server='localhost';
    // Connexion à la base de données
    try
    {
        $bdd = new mysqli($server, $pseudo, $password, $bdname);
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    $query = "SELECT * FROM patient";
    $result = mysqli_query($bdd, $query);

    // Afficher les informations des médecins dans un tableau
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Nom</th><th>Spécialité</th><th>Adresse</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['civilite'] . "</td>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['prenom'] . "</td>";
            echo "<td>" . $row['adresse'] . "</td>";
            echo "<td>" . $row['ville'] . "</td>";
            echo "<td>" . $row['codePostal'] . "</td>";
            echo "<td>" . $row['dateNaissance'] . "</td>";
            echo "<td>" . $row['lieuNaissance'] . "</td>";
            echo "<td>" . $row['numSecu'] . "</td>";
            echo "<td>" . $row['id_medecin'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun utilisateur trouvé.";
    }
?>