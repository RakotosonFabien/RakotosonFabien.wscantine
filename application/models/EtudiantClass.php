<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Etudiant
 *
 * @author Fabien
 */
class EtudiantClass extends CI_Model{
    //put your code here
    private $id;
    private $numETU;
    private $mdp;
    private $nom;
    private $dateNaissance;
    function authentification($numETU, $mdp){
        $mdp = encryptString($mdp, $this->db);
        $requete = "SELECT * FROM etudiants WHERE numETU = '%s' and mdp = '%s'";
        $requete = sprintf($requete, $numETU, $mdp);
        $query = $this->db->query($requete);
        $etudiant = new EtudiantClass();
        foreach($query->result_array() as $row){
            $etudiant->construct($row['id'], $row['numETU'], $row['mdp'], $row['nom'], $row['dateNaissance']);
            break;
        }
        $query->free_result();
        return $etudiant;
    }
    
//Getters and setters
    function getId() {
        return $this->id;
    }

    function getNumETU() {
        return $this->numETU;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getNom() {
        return $this->nom;
    }

    function getDateNaissance() {
        return $this->dateNaissance;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNumETU($numETU): void {
        if(filter_var($numETU, FILTER_VALIDATE_INT) === false)
            throw new Exception ('Numero ETU invalide');
        $this->numETU = $numETU;
    }

    function setMdp($mdp): void {
        $this->mdp = $mdp;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setDateNaissance($dateNaissance): void {
        $this->dateNaissance = $dateNaissance;
    }

//Constructors
    function construct($id, $numETU, $mdp, $nom, $dateNaissance) {
        $this->setId($id);
        $this->setNumETU($numETU);
        $this->setMdp($mdp);
        $this->setNom($nom);
        $this->setDateNaissance($dateNaissance);
    }
    function constructWithoutId($numETU, $mdp, $nom, $dateNaissance) {
        $this->setNumETU($numETU);
        $this->setMdp($mdp);
        $this->setNom($nom);
        $this->setDateNaissance($dateNaissance);
    }

}
