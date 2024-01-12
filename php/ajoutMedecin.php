<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajoutMedecin</title>
</head>
<body>
    <a href="../html/medecin.html">Medecin</a>
</body>
</html>

<?php

// Établir une connexion à la base de données
$servername = "localhost";
$username = "med1";
$password = "med1";
$dbname = "cabinet";

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$civilite=$_POST['civilite'];
$specialite=$_POST['specialite'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
try{
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql1 = "INSERT INTO medecin(Nom,Prenom,civilite,specialite)
            VALUES('$nom','$prenom','$civilite','$specialite')";
    $dbco->exec($sql1);
    
    echo 'Entrées ajoutées dans la table';
}

catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}
?>