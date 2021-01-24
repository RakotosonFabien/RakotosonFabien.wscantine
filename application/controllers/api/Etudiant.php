<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require APPPATH . '/libraries/REST_Controller.php';
 use Restserver\Libraries\REST_Controller;

class Etudiant extends REST_Controller {

 /**
 * Get All Data from this method.
 *
 * @return Response
 */
 public function __construct() {
 parent::__construct();
 $this->load->database();
 }

 /**
 * Get All Data from this method.
 *
 * @return Response
 */
public function index_get($id = 0)
 {
    
 if(!empty($id)){
 $data = $this->db->get_where("etudiants", ['id' => $id])->row_array();
 }else{
 $data = $this->db->get("etudiants")->result();
 }
 var_dump($data);
 $this->response($data, REST_Controller::HTTP_OK);
 }

 /**
 * Get All Data from this method.
 *
 * @return Response
 */
 public function index_post()
 {
    try{
        $this->load->helper('fonctions');
        $this->load->model('etudiantClass');
        $input = $this->input->post();
        $data = array(
            ''
        );
        $jour = $input["jour"];
        $mois = $input["mois"]+1;
        $annee = $input["annee"];
        if(testDate($jour, $mois, $annee)==false){
            echo 'Date invalide';
        }
        $dateNaissance = "$annee-$mois-$jour";
         $etudiant = new $this->etudiantClass;
         $etudiant->constructWithoutId($input['numETU'], $input['mdp'], $input['nom'], $dateNaissance);
         $newInput = array(
             'nom' => $etudiant->getNom(),
             'numETU' => $etudiant->getNumETU(),
             'mdp' => encryptString($etudiant->getMdp(), $this->db),
             'dateNaissance' => $etudiant->getDateNaissance()
         );
       //$this->db->set($data);
        $this->db->insert('etudiants',$newInput);
        redirect(site_url('welcome/index?message=reussiteInscription'));
        //$this->response(['etudiants created successfully.'], REST_Controller::HTTP_OK);
    }
    catch(Exception $exception){
        echo $exception->getMessage();
    }
 }

 /**
 * Get All Data from this method.
 *
 * @return Response
 */
    public function index_put($id)
    {
        $this->load->helper('fonctions');
        $this->load->model('etudiantClass');
        $input = $this->input->post();
        echo $id;
        $jour = $input["jour"];
               $mois = $input["mois"]+1;
               $annee = $input["annee"];
               if(testDate($jour, $mois, $annee)==false){
                   echo 'Date invalide';
       }
       $dateNaissance = "$annee-$mois-$jour";
       $nom = $input["nom"];
       $newInput = array(
           'nom' => $nom,
           'dateNaissance' => $dateNaissance
       );
       var_dump($newInput);
        $this->db->update('etudiants', $newInput, array('id'=>$id));
        //$this->response(['etudiants updated successfully.'], REST_Controller::HTTP_OK);
        session_start();
        $_SESSION['etudiant']->setNom($nom);
        $_SESSION['etudiant']->setDateNaissance($dateNaissance);
        redirect(site_url('welcome/accueilStudent'));
    }

 /**
 * Get All Data from this method.
 *
 * @return Response
 */
 public function index_delete($id)
 {
 $this->db->delete('etudiants', array('id'=>$id));

 $this->response(['etudiants deleted successfully.'], REST_Controller::HTTP_OK
);
 }

}
?>