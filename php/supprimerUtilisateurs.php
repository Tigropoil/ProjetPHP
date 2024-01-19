
<?php
    if(isset($_COOKIE['login'])==null && isset($_COOKIE['password'])==null){
        header('Location: ../index.html');
    }
include '../BDD/bddpatient.php';

$bdd = new bddpatient();
$bdd->supprimerpatientquery($_POST['id']);
?>