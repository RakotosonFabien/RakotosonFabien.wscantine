<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require APPPATH . '/libraries/REST_Controller.php';
 use Restserver\Libraries\REST_Controller;

class Menu extends REST_Controller {

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
 $data = $this->db->get_where("menus", ['id' => $id])->row_array();
 }else{
 $data = $this->db->get("menus")->result();
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
 $data = array(
     ''
 );
 $this->db->set($data);
 $this->db->insert('menus',$input);

 $this->response(['Menu created successfully.'], REST_Controller::HTTP_OK
);
 }

 /**
 * Get All Data from this method.
 *
 * @return Response
 */
 public function index_put($id)
 {
 $input = $this->put();
 $this->db->update('menus', $input, array('id'=>$id));

 $this->response(['Menu updated successfully.'], REST_Controller::HTTP_OK
);
 }

 /**
 * Get All Data from this method.
 *
 * @return Response
 */
 public function index_delete($id)
 {
 $this->db->delete('menus', array('id'=>$id));

 $this->response(['Menu deleted successfully.'], REST_Controller::HTTP_OK
);
 }

}
?>