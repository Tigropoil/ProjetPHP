<?php
    function connectToDatabase($pseudo, $password) {
        $bdname = 'cabinet';
        $server = 'localhost';
        
        try {
            $bdd = new PDO("mysql:host=$server;dbname=$bdname", $pseudo, $password);
            return $bdd;
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    // Utilisation de la fonction
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $bdd = connectToDatabase($pseudo, $password);
    ?>