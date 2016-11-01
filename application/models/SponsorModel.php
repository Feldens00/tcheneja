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

	public function update($sponsor){
		$this->db->where('id_sponsor', $sponsor['id_sponsor']);
		return $this->db->update($this->table, $sponsor);
	}

	public function delete($sponsor){
		$this->db->where('id_sponsor', $sponsor['id_sponsor']);
        $dados= $this->db->get('sponsors')->row();
        $url= $dados->url;
		unlink($url);
		return $this->db->delete($this->table, $sponsor);
	}
}