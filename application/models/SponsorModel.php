<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SponsorModel extends CI_Model {

	public $table = "sponsors";


	
    public function listOne($id) {
        $this->db->where('id_sponsor', $id);
        return $this->db->get('sponsors')->result();
    }
	
    public function create($sponsor){
	return $this->db->insert($this->table, $sponsor);
	}

}