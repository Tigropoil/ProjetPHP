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
// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $login = $_POST["login"];
    $password = $_POST["password"];
    // Vérifier si le login et le mot de passe sont corrects
    if ($login == "med1" && $password == "med1") {
        // Rediriger l'utilisateur vers la page d'accueil
        header('Location: ../html/secretariat.html');
        setcookie("login", $login, time() + 3600); // Expire dans 1 heure
        setcookie("password", $password, time() + 3600); // Expire dans 1 heure
    } else {
        // Rediriger l'utilisateur vers la page de connexion
        header('Location: ../index.html');
    }   
}
?>
