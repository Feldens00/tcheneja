<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BandController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('BandModel');
		
	}


	public function index()
	{

		$this->db->select('*');
		$dados['bandss'] = $this->db->get('bands')->result();

		$this->load->view('HomeView',$dados);
	}

	public function create()
	{	
				
			
				$band = [
				'name_band' => $this->input->post('bandName'),
				'components' => $this->input->post('bandComp'),
				"fone_band" => $this->input->post('bandFone'),
				"url"=> $this->upload_image()

				];

				$this->BandModel->create($band);
				redirect();
			
				
		

		
	}

	public function upload_image(){


				$type = explode('.', $_FILES['bandFoto']['name']);
				$type = $type[count($type)-1];
				$url = "./files/bands/".uniqid(rand()).'.'.$type;
				if(in_array($type, array("jpg", "jpeg","gif","png"))){
					if (is_uploaded_file($_FILES['bandFoto']['tmp_name'])){
						if (move_uploaded_file($_FILES['bandFoto']['tmp_name'],$url)) {
							return $url;
						}
						return "";
					}
				}
	}

	public function getOne(){
		$id=$this->input->post('id_band');
		$result = $this->BandModel->listOne($id);
		echo json_encode( $result );
	}
}
