<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suppressionRDV</title>
</head>
<body>
    
</body>
</html>

<?php
    if(isset($_COOKIE['login'])==null && isset($_COOKIE['password'])==null){
        header('Location: ../index.html');
    }

    include '../BDD/bddrdv.php';

    if(isset($_POST['id']) && is_array($_POST['id']) && count($_POST['id']) === 4) {
        $id_medecin = $_POST['id'][0];
        $id_patient = $_POST['id'][1];
        $dateRDV = $_POST['id'][2];
        $heureRDV = $_POST['id'][3];

        $rdv = new BddRdv();
        $rdv->supprimerrdvquery($id_medecin, $id_patient, $dateRDV, $heureRDV);
        header('Location: ./listeCreneau.php');
    } else {
        echo "Error: Invalid ID format.";
    }
?>
