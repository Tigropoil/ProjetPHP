<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Ajouter un RDV</title>
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
            <h1>Ajouter un RDV</h1>
        </div>
        <div class="corps">
            <p>

                </form>

                <form action="traitement.php" method="post">
                    <label for="medecin">Médecin :</label>
                    <select name="medecin" id="medecin">
                        <?php
                        // Connexion à la base de données
                        $conn = new PDO("mysql:host=localhost;dbname=nom_de_la_base_de_donnees", "nom_utilisateur", "mot_de_passe");

                        // Récupération des médecins depuis la table Medecin
                        $query = "SELECT id_medecin, nom, prenom FROM Medecin";
                        $result = $conn->query($query);

                        // Affichage des options de la liste déroulante
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
                        $conn = new PDO("mysql:host=localhost;dbname=nom_de_la_base_de_donnees", "nom_utilisateur", "mot_de_passe");

                        // Récupération des patients depuis la table Patient
                        $query = "SELECT id_patient, nom, prenom FROM Patient";
                        $result = $conn->query($query);

                        // Affichage des options de la liste déroulante
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['id_patient'] . '">' . $row['nom'] . ' ' . $row['prenom'] . '</option>';
                        }

                        // Fermeture de la connexion à la base de données
                        $conn = null;
                        ?>
                    </select><br><br>
                </form>

                    <label for="dateRDV">Date du rendez-vous :</label>
                    <input type="date" id="dateRDV" name="dateRDV"><br><br>
                    

                    <input type="submit" value="Créer un RDV">
                    
                </form>
            </p> 
        </div>
        
    </body>

</html>