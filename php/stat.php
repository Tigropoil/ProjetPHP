<!DOCTYPE html>
<html lang="fr">
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
    <div class="titre">
        <h1>Patient par tranche d'âge</h1>
    </div>

    <?php
    if(isset($_COOKIE['login'])==null && isset($_COOKIE['password'])==null){
        header('Location: ../index.html');
    }

    include '../BDD/bddstat.php';
    $stat = new Bddstat();
    $result = $stat->usersGenderAgeDistribution();

    echo '<table>
            <tr>
                <th>Tranche d\'âge</th>
                <th>Sexe</th>
                <th>Nombre d\'usagers</th>
            </tr>';

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>
                <td>' . $row['age_group'] . '</td>
                <td>' . $row['gender'] . '</td>
                <td>' . $row['user_count'] . '</td>
            </tr>';
    }

    echo '</table>';
    ?>

    <div class="titre">
        <h1>Durée totale des consultations par médecin</h1>
    </div>

    <?php
    $result = $stat->totalConsultationDurationByDoctor();

    echo '<table>
            <tr>
                <th>Nom du médecin</th>
                <th>Prénom du médecin</th>
                <th>Durée totale des consultations (heures)</th>
            </tr>';

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>
                <td>' . $row['doctor_name'] . '</td>
                <td>' . $row['doctor_firstname'] . '</td>
                <td>' . $row['total_duration'] . '</td>
            </tr>';
    }

    echo '</table>';
    ?>
</body>
</html>
