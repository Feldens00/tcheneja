<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SponsorController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('SponsorModel');
	}


	public function index()
	{

		$this->db->select('*');
		$dados['events'] = $this->db->get('events')->result();

		$this->load->view('HomeView',$dados);
	}

	public function create()
	{
	
	$sponsor = ['name_sponsor' => $this->input->post('sponsorName'),
					"fone_sponsor" => $this->input->post('sponsorFone'),
					"url"=> $this->upload_image()
					];
				
		
		$this->SponsorModel->create($sponsor);
		redirect();
	
		
	}

		public function upload_image(){


				$type = explode('.', $_FILES['sponsorFoto']['name']);
				$type = $type[count($type)-1];
				$url = "./files/sponsors/".uniqid(rand()).'.'.$type;
				if(in_array($type, array("jpg", "jpeg","gif","png"))){
					if (is_uploaded_file($_FILES['sponsorFoto']['tmp_name'])){
						if (move_uploaded_file($_FILES['sponsorFoto']['tmp_name'],$url)) {
							return $url;
						}
						return "";
					}
				}
	}


	public function getOne(){
		$id=$this->input->post('id_sponsor');
		$result = $this->SponsorModel->listOne($id);
		echo json_encode( $result );
	}
}
