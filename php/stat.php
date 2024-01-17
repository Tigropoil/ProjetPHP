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

<?php
// Assuming you have established a database connection

// Query to retrieve the distribution of users by gender and age
$query = "SELECT civilite, 
                 CASE 
                    WHEN TIMESTAMPDIFF(YEAR, dateNaissance, CURDATE()) < 25 THEN 'Moins de 25 ans'
                    WHEN TIMESTAMPDIFF(YEAR, dateNaissance, CURDATE()) BETWEEN 25 AND 50 THEN 'Entre 25 et 50 ans'
                    ELSE 'Plus de 50 ans'
                 END AS age_group,
                 COUNT(*) AS count
          FROM Patient
          GROUP BY civilite, age_group";

$result = mysqli_query($connection, $query);

// Generate the table
echo '<table>
        <tr>
            <th>Sexe</th>
            <th>Tranche d\'âge</th>
            <th>Nombre d\'usagers</th>
        </tr>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
            <td>' . $row['civilite'] . '</td>
            <td>' . $row['age_group'] . '</td>
            <td>' . $row['count'] . '</td>
          </tr>';
}

echo '</table>';

// Close the database connection
mysqli_close($connection);
?>

</body>
</html>
