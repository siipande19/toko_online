<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class model_product extends CI_Model{

		public function get_all(){
			return $this->db->getVar('tb_barang')->result();
		}

		public function pencarian_barang($keyword){
		$this->db->select('*');
		$this->db->from('tb_barang');
		$this->db->like('nama_barang', $keyword);
		$this->db->or_like('kategori', $keyword);
		return $this->db->get($keyword)->result();
		}

		// public function pencarian_barang($keyword){
		// $this->db->select('*');
		// $this->db->from('tb_barang');
		// $this->db->like('nama_barang', $keyword);
		// $this->db->or_like('kategori', $keyword);
		// $result = $this->db->get('tb_barang')->result();
		// return $result;
		// if(!empty($keyword)){
		// 	$this->db->like('nama_barang',$keyword);
		// 	}
		// }
	}