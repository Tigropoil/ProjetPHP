><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
        <div class="top">
            <a href="../html/secretariat.html">
                <img src="../img/doctolibre.png" alt="logo"/>
            </a>
        </div>
            <div class="boutonHeader">
                <ul type="none">
                    <li>
                        <a href="../html/secretariat.html" class="aa">Secretariat</a>
                    </li>
                    <li>
                        <a href="../php/listeUtilisateurs.php" class="aa">Patients</a>
                    </li>
                    <li>
                        <a href="../php/listeMedecin.php" class="aa">Médecins</a>
                    </li>
                    <li>
                        <a href="../php/stat.php" class="aa">Statistiques</a>
                    </li>
                </ul>
            </div>
    </header>
<body>
    <a href="../html/utilisateur.html">patient</a>
</body>
</html>35
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
        $columns = mysqli_fetch_fields($result);
        foreach ($columns as $column) {
            echo "<th>" . $column->name . "</th>";
        }
        echo "</tr>";
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
            echo"<td>
                    <form action='./supprimerUtilisateurs.php' method='post'>
                        <input type='submit' name='id' value='" . $row['id_patient'] . "'>
                    </form>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun utilisateur trouvé.";
    }
?>