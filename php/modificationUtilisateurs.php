<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        if(isset($_COOKIE['login'])==null && isset($_COOKIE['password'])==null){
            header('Location: ../index.html');
        }
        include '../BDD/bddpatient.php';
        $patient = new bddpatient();
        $idPatient = $_POST['id'];
        $infoPatient = $patient->selectbyID($idPatient)->fetch();
        if($infoPatient){
            $nom = $infoPatient['nom'];
            $prenom = $infoPatient['prenom'];
            $civilite = $infoPatient['civilite'];
            $adresse = $infoPatient['adresse'];
            $ville = $infoPatient['ville'];
            $codepostal = $infoPatient['codePostal'];
            $dateNaissance = $infoPatient['dateNaissance'];
            $lieuNaissance = $infoPatient['lieuNaissance'];
            $numSecu = $infoPatient['numSecu'];
            $medecinId = $infoPatient['id_medecin'];
            ?>
            <form action="traitementModificationMedecin.php" method="POST">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" value="<?php echo $nom; ?>"><br>

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" value="<?php echo $prenom; ?>"><br>

                <label for="civilite">Civilité :</label>
                <input type="text" name="civilite" value="<?php echo $civilite; ?>"><br>

                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" value="<?php echo $adresse; ?>"><br>

                <label for="ville">Ville :</label>
                <input type="text" name="ville" value="<?php echo $ville; ?>"><br>

                <label for="codepostal">Code Postal :</label>
                <input type="text" name="codepostal" value="<?php echo $codepostal; ?>"><br>

                <label for="dateNaissance">Date de Naissance :</label>
                <input type="text" name="dateNaissance" value="<?php echo $dateNaissance; ?>"><br>

                <label for="lieuNaissance">Lieu de Naissance :</label>
                <input type="text" name="lieuNaissance" value="<?php echo $lieuNaissance; ?>"><br>

                <label for="numSecu">Numéro de Sécurité Sociale :</label>
                <input type="text" name="numSecu" value="<?php echo $numSecu; ?>"><br>

                <label for="medecinId">ID du Médecin :</label>
                <input type="text" name="medecinId" value="<?php echo $medecinId; ?>"><br>
                <input type="submit" value="Modifier">
            </form>
            <?php
        }else{
            echo "Patient introuvable.";
        }
        $patient->modifierpatientquery($idPatient,$nom,$prenom,$civilite,$adresse,$ville,$codepostal,$dateNaissance,$lieuNaissance,$numSecu,$medecinId);

    ?>

</body>
</html>