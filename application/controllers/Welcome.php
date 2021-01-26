<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
            $data = array();
            $data["page"] = 'liens';
			//echo site_url('api/menuDuJour');
            $this->load->view("Template", $data);
	}
        public function test(){
            $this->load->helper('fonctions');
            var_dump(testDate("L", 1, 2000));
            $this->load->model('platClass');
            $this->load->model('menuClass');
            $menu = new $this->menuClass;
            $menu->setId(1);
            var_dump($menu);
            var_dump($menu->getPlatsDuJour());
        }
        public function menudujour(){
            $this->load->model('menuClass');
            $menuDuJour = $this->menuClass->getMenuDuJour();
            $idMenu = $menuDuJour->getId();
            redirect(site_url('api/menudujour?idMenu='.$idMenu));
        }
        public function inscription(){
            $this->load->helper('fonctions');
            $data = array();
            $data["allMonths"] = allMonths();
            $data['page'] = 'inscription';
            $this->load->view("Template", $data);
        }
        public function connexion(){
            $data = array();
            $data['page'] = 'connexion';
            $this->load->view('Template', $data);
        }
        public function authentification(){
            $this->load->helper('fonctions');
            $this->load->model('etudiantClass');
            $numETU = $this->input->post('numETU');
            $mdp = $this->input->post('mdp');
            $etudiant = $this->etudiantClass->authentification($numETU, $mdp);
            if($etudiant->getId()==null){
                echo 'Pas de compte';
            }
            else{
                session_destroy();
                session_start();
                $_SESSION['etudiant'] = $etudiant;
                var_dump($_SESSION['etudiant']);
                redirect(site_url('welcome/accueilStudent'));
            }
        }
        public function accueilStudent(){
            $this->load->model('etudiantClass');
            $data = array();
            session_start();
            if(isset($_SESSION['etudiant'])){
            $data['etudiant'] = $_SESSION['etudiant'];
            $data['page'] = 'accueilStudent';
            $this->load->view('Template', $data);
            }
            else{
                echo 'Pas d\'etudiant';
            }
        }
        public function modification(){
            $this->load->helper('fonctions');
            $this->load->model('etudiantClass');
            $data = array();
            session_start();
            $etudiant = $_SESSION['etudiant'];
            $data["etudiant"] = $etudiant;
            $data["allMonths"] = allMonths();
            $data['page'] = 'modification';
            $this->load->view('Template', $data);
        }
        public function commande(){
            
            $this->load->model('platClass');
            $this->load->model('etudiantClass');
            $this->load->model('platClass');
            $allPlats = $this->platClass->findAll();
            $idCommande = $this->input->get('id');
            $data = array();
            session_start();
            $data['allCommandes'] = $this->platClass->findByIdCommande($idCommande);
            $data['etudiant'] = $_SESSION['etudiant'];
            $data['idCommande'] = $idCommande;
            $data['page'] = 'platAjoutCommande';
            $data['allPlats'] = $allPlats; 
            $this->load->view('Template', $data);
        }
}
