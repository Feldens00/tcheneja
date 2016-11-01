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

	public function create(){


					   $bandMusic = $this->input->post('musics');
                        //Configurações necessárias para fazer upload do arquivo
                       $foto = 'bandFoto';

                        //Pasta onde será feito o upload
                        $config['upload_path'] = 'assets/files/bands/';
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
            					$url="assets/files/bands/".$data['file_name'];

								$band = [
								'name_band' => $this->input->post('bandName'),
								'components' => $this->input->post('bandComp'),
								"fone_band" => $this->input->post('bandFone'),
								"url"=>  $url
								];


							$this->BandModel->create($band,$bandMusic);
							redirect();
                        }
                        else
                        {
                              echo ( $this->upload->display_errors());
                                
                        }
               
    }



	public function delete(){
		$data = array('id_band' => $this->input->post('id_band'));
		if($this->BandModel->delete($data)){
			echo 'Cadastro Excluido!';

			
		}else { 
			echo 'Ocorreu algum erro. Tente novamente'; 
		}
		
	}



	public function getOne(){
		$id=$this->input->post('id_band');
		$result = $this->BandModel->listOne($id);
		echo json_encode( $result );
	}

	public function band_music($id){
	
		$dados['bands_musics']=$this->BandModel->listOneBM($id);
		$dados['bands']=$this->BandModel->listOne($id);
		$this->load->view('bands/bandMusicView', $dados);
		
	}

	public function deleteMusic($id_band, $id_music){
		$tb= 'bands_musics';
		$array = array('band_id_band' => $id_band, 'music_id_music' => $id_music);

		$this->db->where($array);
		return $this->db->delete($tb);
	}

	public function update_form($id){

		$this->db->select('*');
		$dados['musics'] = $this->db->get('musics')->result();

		$dados['bands_musics']=$this->BandModel->listOneBM($id);

		$dados['bands']=$this->BandModel->listOne($id);

		$this->load->view('bands/updateBandView', $dados);
		
	}

	public function update(){

				$bandMusic = $this->input->post('musics');
				$id = $this->input->post('updateBandId');
				$name = $this->input->post('updateBandName');
				$comp = $this->input->post('updateBandComponents');
				$fone = $this->input->post('updateBandFone');
				$url = $this->input->post('updateBandUrl');

				if ( isset($_FILES['updateBandFoto']['name']) && !empty($_FILES['updateBandFoto']['name'])) {
					  	$u = "assets/files/bands/".$_FILES['updateBandFoto']['name'];

					  	if ($u!=$url) {

					  				unlink($url);
					  				$foto = 'updateBandFoto';

			                        //Pasta onde será feito o upload
			                        $config['upload_path'] = 'assets/files/bands/';
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
			            					$url="assets/files/bands/".$data['file_name'];

											$band = [
											'id_band' => $id,
											'name_band' => $this->input->post('updateBandName'),
											'components' => $this->input->post('updateBandComp'),
											"fone_band" => $this->input->post('updateBandFone'),
											"url"=>  $url
											];


										$this->BandModel->update($band,$bandMusic);
										redirect();
			                        }
			                        else
			                        {
			                              echo ( $this->upload->display_errors());
			                                
			                        }

					  	}
					  
				}
				else {
			    	          			
			            					

											$band = [
											'id_band' => $id,
											'name_band' => $this->input->post('updateBandName'),
											'components' => $this->input->post('updateBandComp'),
											"fone_band" => $this->input->post('updateBandFone'),
											"url"=>  $url
											];


										$this->BandModel->update($band,$bandMusic);
										redirect();         
			    }

			        
		
	}
}
