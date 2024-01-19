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
            <form action="modificationMedecin.php" method="POST">
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
        echo "$idMedecin";
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['specialite'])){
            $medecin->modifiermedecinquery($_POST['nom'],$_POST['prenom'],$_POST['specialite'],$idmedecin);
        }
    ?>
</body>
</html>