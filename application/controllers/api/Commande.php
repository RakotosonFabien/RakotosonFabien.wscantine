<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require APPPATH . '/libraries/REST_Controller.php';
 use Restserver\Libraries\REST_Controller;

class Commande extends REST_Controller {

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
 $data = $this->db->get_where("commandes", ['id' => $id])->row_array();
 }else{
 $data = $this->db->get("commandes")->result();
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
    $input = $this->input->post();
    $dateNow = date_create("now")->format('Y-m-d');
    $this->load->model('commandeClass');
    $commande = new $this->commandeClass;
    $commande->constructWithoutId($input['idEtudiant'], $dateNow);
    $newInput = array(
        'idEtudiant' => $commande->getIdEtudiant(),
        'dateCommande' => $commande->getDateCommande()
    );
    $this->db->insert('commandes',$newInput);
    $id = $this->commandeClass->getLastInsert()->getId();
    redirect(site_url('welcome/commande?id='.$id));
    //$this->response(['Commande created successfully.'], REST_Controller::HTTP_OK);
}

    /**
    * Get All Data from this method.
    *
    * @return Response
    */
public function index_put($id)
    {
    $input = $this->put();
    $this->db->update('commandes', $input, array('id'=>$id));

    $this->response(['Commande updated successfully.'], REST_Controller::HTTP_OK
    );
}

 /**
 * Get All Data from this method.
 *
 * @return Response
 */
 public function index_delete($id)
 {
 $this->db->delete('commandes', array('id'=>$id));

 $this->response(['Commande deleted successfully.'], REST_Controller::HTTP_OK
);
 }

}
?>