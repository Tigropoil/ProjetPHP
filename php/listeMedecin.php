><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste medecin</title>
</head>
<body>
    <a href="../html/ajoutMedecin.html">medecin</a>
    <table id="myTable">
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Civilité</th>
                        <th>Choix</th>
                    </tr>
<?php
    include '../BDD/bddmedecin.php';

    $medecin = new BddMedecin();
    $records = $medecin->afficherMedecinlistquery();
          while ($row = $records->fetch()) {
            $recordID = $row["id_medecin"]; ?>
            <tr>
              <td>
                <?php echo $row["nom"]; ?>
              </td>
              <td>
                <?php echo $row["prenom"]; ?>
              </td>
              <td>
                <?php echo $row["civilite"]; ?>
                <td>
                    <?php echo $row["specialite"]; ?>
                </td>
                <?php
                    echo"<td>
                        <form action='./suppressionMedecin.php' method='post'>
                            <input type='submit' name='id' value='" . $row['id_medecin'] . "'>
                        </form>";
                    echo "</td>";
                ?>
            </tr>
            <?php
            }
            ?>
        </table>
        </body>
</html>