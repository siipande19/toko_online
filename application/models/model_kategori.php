<?php 
	
	class model_kategori extends CI_Model{
		public function data_oli()
		{
			$sql = "SELECT * FROM tb_barang WHERE kategori = 'oli' ORDER BY rating DESC" ;
        	return $this->db->query($sql);
		}
		public function data_sparepart_mesin()
		{
			$sql = "SELECT * FROM tb_barang WHERE kategori = 'sparepart mesin' ORDER BY rating DESC" ;
        	return $this->db->query($sql);
		}
		public function data_sparepart_kelistrikan()
		{
			$sql = "SELECT * FROM tb_barang WHERE kategori = 'sparepart kelistrikan' ORDER BY rating DESC" ;
        	return $this->db->query($sql);
		}
		public function data_sparepart_body()
		{
			$sql = "SELECT * FROM tb_barang WHERE kategori = 'sparepart body' ORDER BY rating DESC" ;
        	return $this->db->query($sql);
		}
	}
 ?>