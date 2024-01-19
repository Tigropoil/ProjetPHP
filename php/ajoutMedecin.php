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
            <h1>Ajouter un médecin</h1>
        </div>
        <div class="corps">
            <p>
                <form action="../php/ajoutMedecin.php" method="post">
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
                    <label for="specialite">Spécialité :</label>
                    <input type="text" id="specialite" name="specialite"><br><br>

                    <input type="submit" value="Créer un compte">
                    
                </form>
            </p> 
        </div>
        
    </body>

</html>
<?php
if(isset($_COOKIE['login'])==null && isset($_COOKIE['password'])==null){
    header('Location: ../index.html');
}
include '../BDD/bddmedecin.php';

// Exécuter une requête INSERT pour ajouter le médecin à la base de données
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['civilite']) && isset($_POST['specialite'])) {
$addmed = new BddMedecin();
$addmed->ajoutermedecinquery($_POST['nom'], $_POST['prenom'], $_POST['civilite'], $_POST['specialite']);
}?>
    </body>

</html>