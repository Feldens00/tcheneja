<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BandModel extends CI_Model {

	public $table = "bands";


	
    public function listOne($id) {
        $this->db->where('id_band', $id);
        return $this->db->get('bands')->result();
    }

    public function listOneBM($id) {

       $this->db->select('*');    
		$this->db->join('bands_musics', 'musics.id_music = bands_musics.music_id_music','inner');
		$this->db->where('band_id_band', $id);
	   	return $this->db->get('musics')->result();
    }
	
  public function create($band,$bandMusic){
    $tb = 'bands_musics';
    $this->db->insert($this->table, $band);
    $id_band = $this->db->insert_id();
		
		for ( $i = 0, $total = count( $bandMusic ); $i < $total; $i++ )
		{
	   		$array = array('band_id_band' => $id_band, 'music_id_music' => $bandMusic[$i]);

				 $this->db->insert($tb, $array);
				
		}
	}

	
	public function update($band,$bandMusic){
    
    $this->db->where('id_band', $band['id_band']);
	$this->db->update($this->table, $band);
   
		
		for ( $i = 0, $total = count( $bandMusic ); $i < $total; $i++ )
		{
			$sql = "INSERT INTO  bands_musics VALUES(".$band['id_band'].",'".$bandMusic[$i]."') ON DUPLICATE KEY UPDATE music_id_music= ".$bandMusic[$i]."; "; 
			
			$this->db->query($sql);
		}

	}


	public function delete($band){
	
		$this->db->where('id_band', $band['id_band']);
        $dados= $this->db->get('bands')->row();
        $url= $dados->url;
		unlink($url);

		
		return $this->db->delete($this->table, $band);
	}
}