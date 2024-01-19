<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>modification d'un Medecin</title>
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
        <h1>Mofifier un médecin</h1>
    </div>
    <?php
        if(isset($_COOKIE['login'])==null && isset($_COOKIE['password'])==null){
            header('Location: ../index.html');
        }

        include '../BDD/bddmedecin.php';
        $medecin = new bddmedecin();

        // Récupérer les informations du médecin
        $idMedecin = $_POST['id'];
        $infoMedecin = $medecin->selectMedecinbyID($idMedecin)->fetch();
        // Vérifier si le médecin existe
        if($infoMedecin) {
            $nom = $infoMedecin['nom'];
            $prenom = $infoMedecin['prenom'];
            $specialite = $infoMedecin['specialite'];
            $idmedecin=$infoMedecin['id_medecin'];
            // Afficher le formulaire prérempli
            ?>
            <form action="modificationMedecin.php" class='form' method="POST">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" value="<?php echo $nom; ?>" require><br>

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" value="<?php echo $prenom; ?>"require><br>

                <label for="specialite">Spécialité :</label>
                <input type="text" name="specialite" value="<?php echo $specialite; ?>"require><br>

                <input type="hidden" name="id" value="<?php echo $idMedecin; ?>">
                
                <input type="submit" value="Modifier">
            </form>
            <?php
        } else {
            echo "Médecin introuvable.";
        }
        
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['specialite'])){
            $medecin->modifiermedecinquery($_POST['nom'],$_POST['prenom'],$_POST['specialite'],$idmedecin);
            header('Location: ../php/listeMedecin.php');
        }
    ?>
</body>
</html>