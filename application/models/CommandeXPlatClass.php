<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandeXPlat
 *
 * @author Fabien
 */
class CommandeXPlatClass extends CI_Model{
    //put your code here
    private $id;
    private $idCommande;
    private $idPlat;
    private $quantite;
//Getters and setters
    function getId() {
        return $this->id;
    }

    function getIdCommande() {
        return $this->idCommande;
    }

    function getIdPlat() {
        return $this->idPlat;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setIdCommande($idCommande): void {
        $this->idCommande = $idCommande;
    }

    function setIdPlat($idPlat): void {
        $this->idPlat = $idPlat;
    }
    function getQuantite() {
        return $this->quantite;
    }

    function setQuantite($quantite): void {
        $this->quantite = $quantite;
    }
    
    function findByIdCommande($idCommande){
        $requete = "SELECT null, idCommande, idPlat, sum(quantite) FROM commandesxplats WHERE idCommande = %d GROUP BY id, idCommande, idPlat";
        $requete = sprintf($requete, $idCommande);
        $query = $this->db->query($requete);
        $resultats = array();
        $indice = 0;
        foreach($query->result_array() as $row){
            $commande = new CommandeXPlatClass;
            $commande->construct($row['id'], $row['idCommande'], $row['idPlat'], $row['nom'], $row['quantite']);
            $resultats[$indice] = $commande;
            $indice++;
        }
        $query->free_result();
        return $resultats;
    }
//Constructors
    function construct($id, $idCommande, $idPlat, $quantite) {
        $this->id = $id;
        $this->idCommande = $idCommande;
        $this->idPlat = $idPlat;
        $this->quantite = $quantite;
    }
    function constructWithoutId($idCommande, $idPlat, $quantite){
        $this->idCommande = $idCommande;
        $this->idPlat = $idPlat;
        $this->quantite = $quantite;
    }

}
