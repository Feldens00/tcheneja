<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('HomeModel');
		$this->load->library('form_validation');
	}


	public function index()
	{

		$this->db->select('*');
		$dados['events'] = $this->db->get('events')->result();

		$this->db->select('*');
		$dados['bands'] = $this->db->get('bands')->result();

		$this->db->select('*');
		$dados['sponsors'] = $this->db->get('sponsors')->result();


		$this->load->view('HomeView',$dados);
	}

	public function getOne(){
		$id=$this->input->post('id_event');
		$result = $this->HomeModel->listOne($id);
		echo json_encode( $result );
	}
}
