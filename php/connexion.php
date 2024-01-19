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

    // Créer un cookie avec le login et le mot de passe
    setcookie("login", $login, time() + 3600); // Expire dans 1 heure
    setcookie("password", $password, time() + 3600); // Expire dans 1 heure
    header('Location: ../html/secretariat.html');
}
?>
