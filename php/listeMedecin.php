><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../html/medecin.html">medecin</a>
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
    $query = "SELECT * FROM medecin";
    $result = mysqli_query($bdd, $query);

    // Afficher les informations des médecins dans un tableau
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        $fields = mysqli_fetch_fields($result);
        echo "<tr>";
        foreach ($fields as $field) {
            echo "<th>" . $field->name . "</th>";
        }
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['civilite'] . "</td>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['prenom'] . "</td>";
            echo "<td>" . $row['specialite'] . "</td>";
            echo"<td>
                    <form action='./suppressionMedecin.php' method='post'>
                        <input type='submit' name='id' value='" . $row['id_medecin'] . "'>
                    </form>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun médecin trouvé.";
    }
?>