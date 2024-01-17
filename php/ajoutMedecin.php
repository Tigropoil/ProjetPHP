<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>ajoutMedecin</title>
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