<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificationMedecin</title>
</head>
<body>
    <?php
        if(isset($_COOKIE['login'])==null && isset($_COOKIE['password'])==null){
            header('Location: ../index.html');
        }

        include '../BDD/bddmedecin.php';
        $medecin = new bddmedecin();

        // Récupérer les informations du médecin
        $idMedecin = $_POST['id']; // Supposons que l'ID du médecin soit passé en paramètre GET
        $infoMedecin = $medecin->selectMedecinbyID($idMedecin)->fetch();
        // Vérifier si le médecin existe
        if($infoMedecin) {
            $nom = $infoMedecin['nom'];
            $prenom = $infoMedecin['prenom'];
            $specialite = $infoMedecin['specialite'];
            // Afficher le formulaire prérempli
            ?>
            <form action="traitementModificationMedecin.php" method="POST">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" value="<?php echo $nom; ?>"><br>

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" value="<?php echo $prenom; ?>"><br>

                <label for="specialite">Spécialité :</label>
                <input type="text" name="specialite" value="<?php echo $specialite; ?>"><br>

                <input type="submit" value="Modifier">
            </form>
            <?php
        } else {
            echo "Médecin introuvable.";
        }
    ?>
</body>
</html>