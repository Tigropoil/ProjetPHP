<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>liste des patients</title>
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
                        <a href="./listeUtilisateurs.php" class="aa">Patients</a>
                    </li>
                    <li>
                        <a href="./listeMedecin.php" class="aa">Médecins</a>
                    </li>
                    <li>
                        <a href="../php/stat.php" class="aa">Statistiques</a>
                    </li>
                </ul>
            </div>
    </header>
<body>
    <h1>Liste des patients<h1><br>
    <table id="myTable">
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Civilité</th>
                        <th>adresse</th>
                        <th>ville</th>
                        <th>codePostal</th>
                        <th>dateNaissance</th>
                        <th>lieuNaissance</th>
                        <th>numSecu</th>
                        <th>id_medecin</th>
                    </tr>
<?php
    include '../BDD/bddpatient.php';
    $bdd = new bddpatient();
    $records = $bdd->afficherpatientlistquery();
    while ($row = $records->fetch()) {
        $recordID = $row["id_patient"]; ?>
        <tr>
            <td>
                <?php echo $row["nom"]; ?>
            </td>
            <td>
                <?php echo $row["prenom"]; ?>
            </td>
            <td>
                <?php echo $row["civilite"]; ?>
            </td>
            <td>
                <?php echo $row["adresse"]; ?>
            </td>
            <td>
                <?php echo $row["ville"]; ?>
            </td>
            <td>
                <?php echo $row["codePostal"]; ?>
            </td>
            <td>
                <?php echo $row["dateNaissance"]; ?>
            </td>
            <td>
                <?php echo $row["lieuNaissance"]; ?>
            </td>
            <td>
                <?php echo $row["numSecu"]; ?>
            </td>
            <td>
                <?php echo $row["id_medecin"]; ?>
            </td>
            <?php
                echo"<td>
                    <form action='./supprimerUtilisateurs.php' method='post'>
                        <button type='submit' name='id' value='" . $row['id_patient'] . "'>Supprimer</button>
                    </form>";
                echo "</td>";
            ?>
        </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <a href="../php/ajoutUtilisateurs.php">Ajouter un patient</a>

    </body>
</html>