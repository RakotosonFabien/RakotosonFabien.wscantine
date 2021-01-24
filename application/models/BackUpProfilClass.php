<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BackUpProfil
 *
 * @author Fabien
 */
class BackUpProfil extends CI_Model{
    //put your code here
    private $id;
    private $idEtudiant;
    private $nom;
    private $dateNaissance;
    private $dateModification;
//Getters and setters
    function getId() {
        return $this->id;
    }

    function getIdEtudiant() {
        return $this->idEtudiant;
    }

    function getNom() {
        return $this->nom;
    }

    function getDateNaissance() {
        return $this->dateNaissance;
    }

    function getDateModification() {
        return $this->dateModification;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setIdEtudiant($idEtudiant): void {
        $this->idEtudiant = $idEtudiant;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setDateNaissance($dateNaissance): void {
        $this->dateNaissance = $dateNaissance;
    }

    function setDateModification($dateModification): void {
        $this->dateModification = $dateModification;
    }
//Constructors
    function construct($id, $idEtudiant, $nom, $dateNaissance, $dateModification) {
        $this->id = $id;
        $this->idEtudiant = $idEtudiant;
        $this->nom = $nom;
        $this->dateNaissance = $dateNaissance;
        $this->dateModification = $dateModification;
    }


}
