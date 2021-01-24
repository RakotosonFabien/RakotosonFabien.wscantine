<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require APPPATH . '/libraries/REST_Controller.php';
 use Restserver\Libraries\REST_Controller;

class CommandesXPlats extends REST_Controller {

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
 $data = $this->db->get_where("commandesxplats", ['id' => $id])->row_array();
 }else{
 $data = $this->db->get("commandesxplats")->result();
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
    var_dump($input);
    $this->db->insert('commandesxplats',$input);
    redirect(site_url('welcome/commande?id='.$input['idCommande']));
 //$this->response(['commandesxplats created successfully.'], REST_Controller::HTTP_OK);
 }

 /**
 * Get All Data from this method.
 *
 * @return Response
 */
 public function index_put($id)
 {
 $input = $this->put();
 $this->db->update('commandesxplats', $input, array('id'=>$id));

 $this->response(['commandesxplats updated successfully.'], REST_Controller::HTTP_OK
);
 }

 /**
 * Get All Data from this method.
 *
 * @return Response
 */
 public function index_delete($id)
 {
 $this->db->delete('commandesxplats', array('id'=>$id));

 $this->response(['commandesxplats deleted successfully.'], REST_Controller::HTTP_OK
);
 }

}
?>



