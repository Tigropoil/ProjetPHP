<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suppressionMedecin</title>
</head>
<body>
    
</body>
</html>
<?php
    if(isset($_COOKIE['login'])==null && isset($_COOKIE['password'])==null){
        header('Location: ../index.html');
    }
    include '../BDD/bddmedecin.php';

    $medecin = new BddMedecin();
    $medecin->supprimermedecinquery($_POST['id']);

?>