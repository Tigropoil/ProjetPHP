
<?php
include '../BDD/bddpatient.php';

$bdd = new bddpatient();
$bdd->supprimerpatientquery($_POST['id']);
?>