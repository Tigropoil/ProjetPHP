<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Liste des Créneaux</title>
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
        <h1>Liste des Créneaux</h1>
    </div>
    <table id="myTable">
        <tr>
            <th>id_medecin</th>
            <th>id_patient</th>
            <th>date</th>
            <th>heure début</th>
            <th>durée</th>
            <th>supprimer</th>
        </tr>
        <?php
        if(isset($_COOKIE['login']) == null && isset($_COOKIE['password']) == null){
            header('Location: ../index.html');
        }
        include '../BDD/bddrdv.php';
        $creneau = new  BddRdv();
        $records = $creneau->afficherRdv() ;
        while ($row = $records->fetch()) {
            $recordID = $row["id_medecin"];
        ?>
        <tr>
            <td>
                <?php echo $recordID; ?>
            </td>
            <td>
                <?php echo $row["id_patient"]; ?>
            
            </td>
            <td>
                <?php echo $row["dateRDV"]; ?>
            </td>
            <td>
                <?php echo $row["heureRDV"]; ?>
            </td>
            <td>
                <?php echo $row["dureeRDV"]; ?>
            </td>
            <td>
                <form action='./suppressionRDV.php' class='tableau' method='post'>
                    <input type='hidden' name='id[]' value='<?php echo $row["id_medecin"]; ?>'>
                    <input type='hidden' name='id[]' value='<?php echo $row["id_patient"]; ?>'>
                    <input type='hidden' name='id[]' value='<?php echo $row["dateRDV"]; ?>'>
                    <input type='hidden' name='id[]' value='<?php echo $row["heureRDV"]; ?>'>
                    <button type='submit'>Supprimer</button>
                </form>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <a href="../php/ajoutRDV.php" class="aa">Ajouter un Créneau</a>
</body>
</html>
