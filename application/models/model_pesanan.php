<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_pesanan extends CI_Model{

		public function data_pesanan(){
			$id_user = $this->session->userdata('id_user');
			$sql = "SELECT i.*,p.jumlah,p.harga,sum(p.jumlah) sumqty,count(p.id) countid 
					FROM tb_pesanan p
					LEFT JOIN tb_invoice i ON p.id_invoice = i.id
					WHERE i.created_by = '$id_user' 
					GROUP BY p.id_invoice 
					ORDER BY i.tgl_pesan DESC";
        	return $this->db->query($sql);
		}
		public function detail_pesanan($kode_invoice){
			$id_user = $this->session->userdata('id_user');
			$sql = "SELECT p.*,i.* FROM tb_pesanan p
					LEFT JOIN tb_invoice i ON p.id_invoice = i.id
					WHERE i.created_by = '$id_user' AND i.kode_invoice = '$kode_invoice'";
        	return $this->db->query($sql);
		}
		public function input_rating($id_invoice,$id_produk,$value){
			$id_user = $this->session->userdata('id_user');
			$sql = "UPDATE `tb_pesanan` 
					SET `rating`='$value',`rating_at`=NOW() 
					WHERE id_invoice='$id_invoice' AND id_barang='$id_produk'";
        	return $this->db->query($sql);
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