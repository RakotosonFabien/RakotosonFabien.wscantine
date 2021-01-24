<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plat
 *
 * @author Fabien
 */
class PlatClass extends CI_Model{
    //put your code here
    private $id;
    private $nom;
    private $prix;
//mes fonctions
    function findByIdCommande($idCommande){
        $requete = "SELECT plats.id, plats.nom, sum(commandesxplats.quantite) as quantite, plats.prix, sum(commandesxplats.quantite)*prix as total FROM plats JOIN commandesxplats ON plats.id = commandesxplats.idPlat WHERE idCommande = %d GROUP BY plats.id, plats.nom, plats.prix";
        $requete = sprintf($requete, $idCommande);
        $query = $this->db->query($requete);
        return $query;
    }
    function findAll(){
        $requete = 'SELECT * FROM plats';
        return $this->constructBySql($requete);
    }
    function constructBySql($requete){
        $resultats = array();
        $query = $this->db->query($requete);
        $indice = 0;
        foreach($query->result_array() as $row){
            $plat = new PlatClass;
            $plat->construct($row['id'], $row['nom'], $row['prix']);
            $resultats[$indice] = $plat;
            $indice++;
        }
        $query->free_result();
        return $resultats;
    }
//Getters and setters
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrix() {
        return $this->prix;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setPrix($prix): void {
        $this->prix = $prix;
    }

//Constructors
    function construct($id, $nom, $prix) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
    }
    
}
