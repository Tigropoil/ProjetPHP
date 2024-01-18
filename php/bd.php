<?php

function connectToDatabase($server, $bdname, $pseudo, $password) {
    try {
        $bdd = new PDO("mysql:host=$server;dbname=$bdname", $pseudo, $password);
        return $bdd;
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}
?>