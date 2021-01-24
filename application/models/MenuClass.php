<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author Fabien
 */
class MenuClass extends CI_Model{
    //put your code here
    private $id;
    private $dateMenu;
//mes fonctions
    function findAll(){
        $requete = 'SELECT * FROM menus';
        return $this->constructBySql($requete);
    }
    function constructBySql($requete){
        $resultats = array();
        $query = $this->db->query($requete);
        $indice = 0;
        foreach($query->result_array() as $row){
            $menu = new MenuClass;
            $menu->construct($row['id'], $row['dateMenu']);
            $resultats[$indice] = $menu;
            $indice++;
        }
        $query->free_result();
        return $resultats;
    }
    public function findPlats(){
        if($this->id == null){
            throw new Exception('Pas de menu defini en ce jour');
        }
        $requete = "SELECT * FROM plats WHERE id IN (SELECT idPlat FROM menusXplats WHERE idMenu = %d)";
        $requete = sprintf($requete, $this->id);
        return $this->platClass->constructBySql($requete);
    }
    public function getMenuDuJour(){
        $menuDuJour = new MenuClass;
        $menusDuJour = $this->constructBySql("SELECT * FROM menus WHERE date(dateMenu) = date(now()) limit 1");
        if(count($menusDuJour)>0){
            $menuDuJour = $menusDuJour[0];
        }
        return $menuDuJour;
    }
    public function getPlatsDuJour(){
        $menuDuJour = $this->getMenuDuJour();
        return $menuDuJour->findPlats();
    }
    
//Getters and setters
    function getId() {
        return $this->id;
    }

    function getDateMenu() {
        return $this->dateMenu;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setDateMenu($dateMenu): void {
        $this->dateMenu = $dateMenu;
    }

//Constructors
    function construct($id, $dateMenu) {
        $this->id = $id;
        $this->dateMenu = $dateMenu;
    }

}
