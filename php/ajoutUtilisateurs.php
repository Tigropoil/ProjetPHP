<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Ajouter un médecin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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
        <div class="titre">
            <h1>Ajouter un Patient</h1>
        </div>
        <div class="corps">
            <p>
                <form action="./ajoutUtilisateurs.php" method="post">
                    <fieldset>
                        <label for="civilite">Monsieur</label>
                        <input type="radio" id="civilite" name="civilite" value="mr" checked />
                        <label for="civilite">Madame</label>
                        <input type="radio" id="civilite" name="civilite" value="mme" checked />
                    </fieldset><br>
                    
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom"><br><br>
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom"><br><br>
                    <label for="adresse">Adresse :</label>
                    <input type="text" id="adresse" name="adresse"><br><br>
                    <label for="ville">Ville :</label>
                    <input type="text" id="ville" name="ville"><br><br>
                    <label for="codePostal">Code Postal :</label>
                    <input type="text" id="codePostal" name="codePostal"><br><br>
                    <label for="dateN">Date de naissance :</label>
                    <input type="date" id="dateN" name="dateN"><br><br>
                    <label for="lieuN">Lieu de Naissance :</label>
                    <input type="text" id="lieuN" name="lieuN"><br><br>
                    <label for="numSecu">Numéro de sécurité sociale :</label>
                    <input type="text" id="numSecu" name="numSecu"><br><br>
                    
                    <label>Médecin référent</label>
                        <?php
                            require("../BDD/bddmedecin.php");
                            $BDDmed = new BddMedecin();
                            $records = $BDDmed->select();

                            echo "<select name='medid'>";

                            while ($row = $records->fetch()) {
                                $recordID = $row["id_medecin"];
                                echo "<option value='" . $row["id_medecin"] . "'>" . $row["nom"] . " " . $row["renom"] . "</option>";
                            }

                             // Close the select element
                            echo "</select>"; ?>

                    <input type="submit" value="Créer un compte">
                    
                </form>
            </p> 
        </div>
        
    </body>

</html>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cabinet";

    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $civilite=$_POST['civilite'];
    $adresse=$_POST['adresse'];
    $ville=$_POST['ville'];
    $codepostal=$_POST['codePostal'];
    $dateNaissance=$_POST['dateN'];
    $lieuNaissance=$_POST['lieuN'];
    $numSecu=$_POST['numSecu'];
    $medecinId=$_POST['medid'];


include '../BDD/bddpatient.php';

$bdd = new bddpatient();
$bdd->ajouterpatientquery($nom,$prenom,$civilite,$adresse,$ville,$codepostal,$dateNaissance,$lieuNaissance,$numSecu, $medecinId);
?>