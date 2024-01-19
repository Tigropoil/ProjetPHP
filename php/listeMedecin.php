<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Liste des médecins</title>
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
    <h1>Liste des médecins</h1><br>
    <table id="myTable">
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Civilité</th>
                        <th>Choix</th>
                    </tr>
<?php
    if(isset($_COOKIE['login'])==null && isset($_COOKIE['password'])==null){
        header('Location: ../index.html');
    }
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
                        <form action='./suppressionMedecin.php' class='tableau' method='post'>
                            <button type='submit' name='id' value='" . $row['id_medecin'] . "'>Supprimer</button>
                        </form>";
                    echo "</td>";
                ?>
            </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <a href="../php/ajoutMedecin.php">Ajouter un médecin</a>
        </body>
</html>