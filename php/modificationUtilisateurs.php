<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Modification d'un patient</title>
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
        <h1>Mofifier un patient</h1>
    </div>
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
            <form action="traitementModificationMedecin.php" class='form' method="POST">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" value="<?php echo $nom; ?>"><br><br>

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" value="<?php echo $prenom; ?>"><br><br>

                <label for="civilite">Civilité :</label>
                <input type="text" name="civilite" value="<?php echo $civilite; ?>"><br><br>

                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" value="<?php echo $adresse; ?>"><br><br>

                <label for="ville">Ville :</label>
                <input type="text" name="ville" value="<?php echo $ville; ?>"><br><br>

                <label for="codepostal">Code Postal :</label>
                <input type="text" name="codepostal" value="<?php echo $codepostal; ?>"><br><br>

                <label for="dateNaissance">Date de Naissance :</label>
                <input type="text" name="dateNaissance" value="<?php echo $dateNaissance; ?>"><br><br>

                <label for="lieuNaissance">Lieu de Naissance :</label>
                <input type="text" name="lieuNaissance" value="<?php echo $lieuNaissance; ?>"><br><br>

                <label for="numSecu">Numéro de Sécurité Sociale :</label>
                <input type="text" name="numSecu" value="<?php echo $numSecu; ?>"><br><br>

                <label for="medecinId">ID du Médecin :</label>
                <input type="text" name="medecinId" value="<?php echo $medecinId; ?>"><br><br>
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