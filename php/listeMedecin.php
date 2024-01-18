><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../html/ajoutMedecin.html">medecin</a>
</body>
</html>
<?php
    include 'bd.php';

    $server = 'localhost';
    $bdname = 'cabinet';
    $pseudo = 'med1';
    $password = 'med1';
    $bdd=connectToDatabase($server,$bdname,$pseudo,$password);

    $query = "SELECT * FROM medecin";
    $stmt = $bdd->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // Afficher les informations des médecins dans un tableau
    if ($stmt->rowCount() > 0) {
        echo "<table>";
        $q = $bdd->prepare("DESCRIBE medecin");
        $q->execute();
        $table_fields = $q->fetchAll(PDO::FETCH_COLUMN);

        echo "<tr>";
        foreach ($table_fields as $field) {
            echo "<th>{$field}</th>";
        }
        echo "</tr>";
        $records = $bdd->select();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo"$row";
            echo "<td>".$row['civilite'] . "</td>";
            echo "<td>".$row['nom']."</td>";
            echo "<td>".$row['prenom']."</td>";
                                                                                        echo "<td>".$row['specialite']."</td>";
            echo "<td>
                    <form action='./suppressionMedecin.php' method='post'>
                        <input type='submit' name='id' value='".$row['id_medecin']."'>
                    </form>
                </td>";
        }
        echo "</table>";
    } else {
        echo "Aucun médecin trouvé.";
    }
?>