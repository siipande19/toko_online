<?php

	class pencarian extends CI_Controller{

		public function index(){
			$data['mencari']=$this->model_barang->get_all();
		}

		// public function cari_barang(){
		// 	$keyword = $this->input->post('keyword');
		// 	$data['mencari']=$this->model_barang->pencarian_barang($keyword);
		// 	$this-> load->view('templates/header');
		// 	$this-> load->view('templates/sidebar');
		// 	$this-> load->view('search', $data);
		// 	$this-> load->view('templates/footer');
		// }
	}
?>