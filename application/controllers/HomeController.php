<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('HomeModel');
		$this->load->model('EventModel');
		$this->load->model('LoginModel');
		$this->load->library('form_validation');
	}


	public function index()
	{
		

		$dados['estados'] = $this->EventModel->getEstados();
		$dados['formerror'] = NULL;

		$this->db->select('*');
		$dados['events'] = $this->db->get('events')->result();

		$this->db->select('*');
		$dados['bands'] = $this->db->get('bands')->result();

		$this->db->select('*');
		$dados['sponsors'] = $this->db->get('sponsors')->result();
        
        $this->db->select('m.id_music, m.url, m.name_music, m.title, d.qtd');
		$this->db->from('musics m'); 
		$this->db->join('download d', 'm.id_music = d.id_music','left');
		$this->db->order_by("m.id_music", "desc");
	   	$dados['musics'] = $this->db->get()->result(); 

		$query = $this->LoginModel->logged();
		
		if ($query==1) {
		
			$this->load->view('HomeView',$dados);
			
		}else if ($query==2) {
			
			$this->load->view('users/UserView',$dados);
		
		}else if ($query==3) {
			
			redirect('user');

		}else{
			
			$this->load->view('login/InitialView',$dados);
		}
		
	}

	public function getOne(){
		$id=$this->input->post('id_event');
		$result = $this->HomeModel->listOne($id);
		echo json_encode( $result );
	}
}
