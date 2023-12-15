<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajoutMedecin</title>
</head>
<body>
    
</body>
</html>

<?php

// Établir une connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$civilite=$_POST['civilite'];
$mdp=$_POST['mdp'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
try{
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql1 = "INSERT INTO medecin(Nom,Prenom,civilite,mdp)
            VALUES('$nom','$prenom','$civilite','$mdp')";
    $dbco->exec($sql1);
    
    echo 'Entrées ajoutées dans la table';
}

catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}
?>