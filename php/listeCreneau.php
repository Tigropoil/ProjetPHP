<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Liste des RDV</title>
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
    <h1>Liste des RDV<h1><br>
    <table id="myTable">
                    <tr>
                        <th>id_medecin</th>
                        <th>id_patient</th>
                        <th>date RDV</th>
                        <th>Heure RDV</th>
                        <th>Durée</th>
                        <th>supprimer</th>
                    </tr>
    <?php
    include '../BDD/bddrdv.php';
    $rdv = new BddRdv();
    $records = $rdv->afficherRdv();
    while ($row = $records->fetch()) {
        $recordID = $row["id_medecin"]; ?>
        <tr>
          <td>
                <?php echo $row["id_patient"]; ?>
            </td>
            <td>
                <?php echo $row["dateRDV"]; ?>
            </td>
            <td>
                <?php echo $row["heureRDV"]; ?>
            <td>
                <?php echo $row["dureeRDV"]; ?>
            </td>
            <?php
                echo"<td>
                    <form action='./suppressionRDV.php' method='post'>
                        <button type='submit' name='id' value='" . $row['id_medecin'] . "'>Supprimer</button>
                    </form>";
                echo "</td>";
            ?>
        </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <a href="../php/ajoutRDV.php" class="aa">Ajouter un RDV</a>
</body>


</html>

