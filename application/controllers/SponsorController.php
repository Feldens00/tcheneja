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


	public function create(){


                        //Configurações necessárias para fazer upload do arquivo
                       $foto = 'sponsorFoto';

                        //Pasta onde será feito o upload
                        $config['upload_path'] = 'assets/files/sponsors/';
                        //Tipos suportados
                        $config['allowed_types'] = 'gif|jpg|png';
                        //Configurando atributos do arquivo imagem que iremos receber
                      	$config['max_size']    = 102400000;
                     	$config['max_width']   = 1900;
                		$config['max_height']  = 1900;
                        //Carregando a lib com as configurações feitas
                        $this->load->library('upload', $config);

                        //Fazendo o upload do arquivo e direcionando para a view de erro ou de sucesso
                        if(  $this->upload->do_upload($foto)){
                               
            					$data=$this->upload->data();
            					$url="assets/files/sponsors/".$data['file_name'];

								$sponsor = [
								'name_sponsor' => $this->input->post('sponsorName'),
								"fone_sponsor" => $this->input->post('sponsorFone'),
								"url"=>  $url
								];


							$this->SponsorModel->create($sponsor);
							redirect();
                        }
                        else
                        {
                              echo ( $this->upload->display_errors());
                                
                        }
               
    }

	public function delete(){
		$data = array('id_sponsor' => $this->input->post('id_sponsor'));
		if($this->SponsorModel->delete($data)){
			echo 'Cadastro Excluido!';

			
		}else { 
			echo 'Ocorreu algum erro. Tente novamente'; 
		}
		
	}


	public function getOne(){
		$id=$this->input->post('id_sponsor');
		$result = $this->SponsorModel->listOne($id);
		echo json_encode( $result );
	}

	public function update_form($id){
	
		$dados['sponsors']=$this->SponsorModel->listOne($id);
		 $this->load->view('sponsors/updateSponsorView', $dados);
		
	}

	public function update(){
				$id = $this->input->post('updateSponsorId');
				$name = $this->input->post('updateSponsorName');
				$fone = $this->input->post('updateSponsorFone');
				$url = $this->input->post('updateSponsorUrl');

				if ( isset($_FILES['updateSponsorFoto']['name']) && !empty($_FILES['updateSponsorFoto']['name'])) {
					  	$u = "assets/files/sponsors/".$_FILES['updateSponsorFoto']['name'];

					  	if ($u!=$url) {

					  				unlink($url);
					  				$foto = 'updateSponsorFoto';

			                        //Pasta onde será feito o upload
			                        $config['upload_path'] = 'assets/files/sponsors/';
			                        //Tipos suportados
			                        $config['allowed_types'] = 'gif|jpg|png';
			                        //Configurando atributos do arquivo imagem que iremos receber
			                      	$config['max_size']    = 102400000;
			                     	$config['max_width']   = 1900;
			                		$config['max_height']  = 1900;
			                        //Carregando a lib com as configurações feitas
			                        $this->load->library('upload', $config);

			                        //Fazendo o upload do arquivo e direcionando para a view de erro ou de sucesso
			                        if(  $this->upload->do_upload($foto)){
			                               
			            					$data=$this->upload->data();
			            					$url="assets/files/sponsors/".$data['file_name'];

											$sponsor = [
											'id_sponsor' => $id,
											'name_sponsor' => $name,
											"fone_sponsor" => $fone,
											"url"=>  $url
											];


										$this->SponsorModel->update($sponsor);
										redirect();
			                        }
			                        else
			                        {
			                              echo ( $this->upload->display_errors());
			                                
			                        }

					  	}
					  
				}
				else {
			    	          			
			            					

											$sponsor = [
											'id_sponsor' => $id,
											'name_sponsor' => $name,
											"fone_sponsor" => $fone,
											"url"=>  $url
											];


										$this->SponsorModel->update($sponsor);
										redirect();         
			    }

			       
   			
		
	}
}
