<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../html/utilisateur.html">utilisateur</a>
</body>
</html>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cabinet";

    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $civilite=$_POST['civilite'];
    $adresse=$_POST['adresse'];
    $ville=$_POST['ville'];
    $codepostal=$_POST['codePostal'];
    $dateNaissance=$_POST['dateN'];
    $lieuNaissance=$_POST['lieuN'];
    $numSecu=$_POST['numSecu'];


    $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
try{
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql1 = "INSERT INTO patient(adresse,civilite,codePostal,dateNaissance,lieuNaissance,nom,numSecu,prenom,ville)
            VALUES('$adresse','$civilite','$codepostal','$dateNaissance','$lieuNaissance','$nom','$numSecu','$prenom','$ville')";
    $dbco->exec($sql1);
    
    echo 'Entrées ajoutées dans la table';
}

catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}

?>