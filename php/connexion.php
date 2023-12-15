<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
</body>
</html>

<?php
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $bdname = 'cabinet';
    $server='localhost';
    // Connexion à la base de données
    try
    {
        $bdd = new PDO("mysql:host=$server;dbname=$bdname", $pseudo, $password);
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    if ($bdd) {
        header('Location: edtMed.html');
        ?>
        <p><?php echo "connexion réussie"; ?></p>
        <?php
            
    } else {
        ?>
        <p><?php echo "connexion échouée"; ?></p>
        <?php
    }
?>