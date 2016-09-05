<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

	public $table = "events";


	
    public function listOne($id) {
        $this->db->where('id_event', $id);
        return $this->db->get('events')->result();
    }
	


}