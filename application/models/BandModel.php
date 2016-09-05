<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BandModel extends CI_Model {

	public $table = "bands";


	
    public function listOne($id) {
        $this->db->where('id_band', $id);
        return $this->db->get('bands')->result();
    }
	
    public function create($band){
	return $this->db->insert($this->table, $band);
	}

}