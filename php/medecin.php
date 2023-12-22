<?php
class medecin{
    private $idMedecin;
    private $civilite;
    private $nom;
    private $prenom;

    public fonction __construct($idM, $civilite, $nom, $prenom){
        $this->$idMedecin = $idM;
        $this->$civilite = $civilite;
        $this->$nom = $nom;
        $this->$prenom = $prenom;
    }

    public fonction setCivilite(){
        return $this->civilite;
    }

}