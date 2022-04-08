<?php

class kategori extends CI_Controller {
	public function oli()
	{
		$result = $this->model_kategori->data_oli()->result_array();
		$data['oli'] = json_decode(json_encode($result), FALSE);
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('oli' , $data);
		$this-> load->view('templates/footer');
	}
	public function sparepart_mesin()
	{
		$result = $this->model_kategori->data_sparepart_mesin()->result_array();
		$data['sparepart_mesin'] = json_decode(json_encode($result), FALSE);
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('sparepart_mesin' , $data);
		$this-> load->view('templates/footer');
	}
	public function sparepart_kelistrikan()
	{
		$result = $this->model_kategori->data_sparepart_kelistrikan()->result_array();
		$data['sparepart_kelistrikan'] = json_decode(json_encode($result), FALSE);
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('sparepart_kelistrikan' , $data);
		$this-> load->view('templates/footer');
	}
	public function sparepart_body()
	{
		$result = $this->model_kategori->data_sparepart_body()->result_array();
		$data['sparepart_body'] = json_decode(json_encode($result), FALSE);
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('sparepart_body' , $data);
		$this-> load->view('templates/footer');
	}
	public function rekomendasi()
	{
		$data['barang'] = $this->model_barang->tampil_data()->result();
		$data['user'] = $this->model_barang->tampil_user();
		$data['pesanan'] = $this->model_barang->tampil_pesanan();


		foreach ($data['pesanan'] as $key) {
			$detail_pesanan[$key->id_user][$key->id_barang] = $key->rating;
		}
		foreach ($data['barang'] as $row) {
			foreach ($data['user'] as $value) {
				if (empty($detail_pesanan[$value->id][$row->id_barang])) {
					$detail_pesanan[$value->id][$row->id_barang] = 0;
				}
			}
		}
		// hitung rata2
		foreach ($data['user'] as $key) {
			$total_pesanan_user[$key->id] = 0;
			$jumlah_pesanan_user[$key->id] = 0;
			foreach ($data['barang'] as $row) {
				if(! empty($detail_pesanan[$key->id][$row->id_barang])){
					$total_pesanan_user[$key->id] = $total_pesanan_user[$key->id] + $detail_pesanan[$key->id][$row->id_barang];
					$jumlah_pesanan_user[$key->id]++;
				}
			}
			if ($total_pesanan_user[$key->id] != 0) {
				$rata_rating[$key->id] = $total_pesanan_user[$key->id]/$jumlah_pesanan_user[$key->id];
			}else{
				$rata_rating[$key->id] = 0;
			}
			
		}

		// adjusted cosine
		foreach ($data['barang'] as $key) {
			foreach ($data['barang'] as $row) {
				$total_adjusted[][] = 0;
				$first_line = 0;
				$akar_1 = 0;
				$akar_2 = 0;
				foreach ($data['user'] as $value) {
					if($key->id_barang != $row->id_barang){
						if ($detail_pesanan[$value->id][$key->id_barang] != 0 AND $detail_pesanan[$value->id][$row->id_barang] != 0) {
							$first_line = (($detail_pesanan[$value->id][$key->id_barang]-$rata_rating[$value->id])*($detail_pesanan[$value->id][$row->id_barang] - $rata_rating[$value->id])) + $first_line;
							$akar_1 = (pow(($detail_pesanan[$value->id][$key->id_barang]-$rata_rating[$value->id]), 2)) + $akar_1;
							$akar_2 = (pow(($detail_pesanan[$value->id][$row->id_barang]-$rata_rating[$value->id]), 2)) + $akar_2;
						}
					}else{
						$first_line = 0;
						$akar_1 = 0;
						$akar_2 = 0;
					}
				}
				if ($first_line != 0) {
					$total_adjusted[$key->id_barang][$row->id_barang] = $first_line/(sqrt($akar_1) * sqrt($akar_2));
				}else{
					$total_adjusted[$key->id_barang][$row->id_barang] = 0;
				}
			}
		}

		// simple weighted average
		foreach ($data['user'] as $key) {
			foreach ($data['barang'] as $row) {
				$total_atas = 0;
				$total_bawah = 0;
				foreach ($data['barang'] as $value) {
					$total_atas = ($detail_pesanan[$key->id][$value->id_barang]*$total_adjusted[$row->id_barang][$value->id_barang]) + $total_atas;
					$total_bawah = abs($total_adjusted[$row->id_barang][$value->id_barang]) + $total_bawah;
				}

				if ($total_atas != 0) {
					$w_average[$key->id][$row->id_barang] = $total_atas/$total_bawah;
				}else{
					$w_average[$key->id][$row->id_barang] = 0;
				}
			}
		}
		$result_id[][] ="";
		$result_total[][] = "";
		foreach ($data['user'] as $key) {
			$a = 0;
			foreach ($data['barang'] as $row) {
				if ($w_average[$key->id][$row->id_barang] > 0) {
					$result_id[$key->id][$row->id_barang] = $row->id_barang;
					$result_total[$key->id][$row->id_barang] = $w_average[$key->id][$row->id_barang];
					$a++;
				}
			}
		}
		$data['detail_pesanan'] 		= $detail_pesanan;
		$data['total_pesanan_user'] 	= $total_pesanan_user;
		$data['jumlah_pesanan_user'] 	= $jumlah_pesanan_user;
		$data['rata_rating'] 			= $rata_rating;
		$data['total_adjusted'] 		= $total_adjusted;
		$data['w_average'] 				= $w_average;
		$data['result_id'] 				= $result_id;
		$data['result_total'] 			= $result_total;
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('rekomendasi' , $data);
		$this-> load->view('templates/footer');
	}
}
