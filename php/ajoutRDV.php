<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Ajouter un médecin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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
                        <a href="../html/utilisateur.html" class="aa">Patients</a>
                    </li>
                    <li>
                        <a href="../html/medecin.html" class="aa">Médecins</a>
                    </li>
                    <li>
                        <a href="../php/stat.php" class="aa">Statistiques</a>
                    </li>
                </ul>
            </div>
    </header>
        
    <body>
        <div class="titre">
            <h1>Ajouter un Patient</h1>
        </div>
        <div class="corps">
            <p>
                <form action="../php/ajoutRDV.php" method="post">
                    

                    <input type="submit" value="Créer un compte">
                    
                </form>
            </p> 
        </div>
        
    </body>

</html>