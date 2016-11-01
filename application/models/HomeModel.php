<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

	public $table = "events";



  public function listOne($id) {
        $this->db->where('id_event', $id);
        $this->db->join('cities', 'events.id_city = cities.id_city','inner');
        $this->db->join('states', 'events.id_state = states.id_state','inner');  
        return $this->db->get('events')->result();
    }

	

}