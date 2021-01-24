<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commande
 *
 * @author Fabien
 */
class CommandeClass extends CI_Model{
    //put your code here
    private $id;
    private $idEtudiant;
    private $dateCommande;
//Getters and setters
    function getId() {
        return $this->id;
    }

    function getIdEtudiant() {
        return $this->idEtudiant;
    }

    function getDateCommande() {
        return $this->dateCommande;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setIdEtudiant($idEtudiant): void {
        $this->idEtudiant = $idEtudiant;
    }

    function setDateCommande($dateCommande): void {
        $this->dateCommande = $dateCommande;
    }

//Constructors
    function construct($id, $idEtudiant, $dateCommande) {
        $this->id = $id;
        $this->idEtudiant = $idEtudiant;
        $this->dateCommande = $dateCommande;
    }
    function constructWithoutId($idEtudiant, $dateCommande) {
        $this->idEtudiant = $idEtudiant;
        $this->dateCommande = $dateCommande;
    }
    function getLastInsert(){
        $requete = 'SELECT * FROM commandes ORDER BY id desc LIMIT 1';
        $query = $this->db->query($requete);
        $commande = new CommandeClass;
        foreach($query->result_array() as $row){
            $commande->construct($row['id'], $row['idEtudiant'], $row['dateCommande']);
            break;
        }
        $query->free_result();
        return $commande;
    }
}
