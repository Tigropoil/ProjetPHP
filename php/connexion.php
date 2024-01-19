
<?php
// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $login = $_POST["login"];
    $password = $_POST["password"];
    // Vérifier si le login et le mot de passe sont corrects
    if ($login == "344098" && $password == "$iutinfo") {
        // Rediriger l'utilisateur vers la page d'accueil
        setcookie("login", $login, time() + 3600); // Expire dans 1 heure
        setcookie("password", $password, time() + 3600); // Expire dans 1 heure
        header('Location: ../html/secretariat.html');
    } else {
        // Rediriger l'utilisateur vers la page de connexion
        header('Location: ../index.html');
    }   
}
?>
