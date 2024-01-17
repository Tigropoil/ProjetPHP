><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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