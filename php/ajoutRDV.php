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
            <h1>Ajouter un Patient</h1>
        </div>
        <div class="corps">
            <p>

                </form>

                <form action="traitement.php" method="post">
                    <label for="medecin">Médecin :</label>
                    <select name="medecin" id="medecin">
                        <?php
                        include '../BDD/bddmedecin.php';
                        include '../BDD/bddpatient.php';

                        $medecin = new BddMedecin();
                        $patient = new bddpatient();

                        $resultM = $medecin->affichermedecinlistquery();
                        // Affichage des options de la liste déroulante
                        while ($row = $resultM->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['id_medecin'] . '">' . $row['nom'] . ' ' . $row['prenom'] . '</option>';
                        }

                        // Fermeture de la connexion à la base de données
                        $conn = null;
                        ?>
                    </select><br><br>

                    <label for="patient">Patient :</label>
                    <select name="patient" id="patient">
                        <?php
                        // Connexion à la base de données
                        $resultP = $patient->afficherpatientlistquery();
                        while ($row = $resultP->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['id_patient'] . '">' . $row['nom'] . ' ' . $row['prenom'] . '</option>';
                        }

                        ?>
                    </select><br><br>

                    <label for="dateRDV">Date du rendez-vous :</label>
                    <input type="date" id="dateRDV" name="dateRDV"><br><br>
                    
                    <label for="heureRDV">Heure du rendez-vous :</label>
                    <input type="time" id="heureRDV" name="heureRDV"><br><br>

                    <input type="submit" value="Créer un RDV">
                    
                </form>
            </p> 
        </div>
        
    </body>

</html>