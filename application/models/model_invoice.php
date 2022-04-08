<?php 
	class model_invoice extends CI_Model{
		public function index()
		{
			date_default_timezone_set('Asia/Jakarta');
			$nama	= $this->input->post('nama');
			$alamat	= $this->input->post('alamat');
			$token = "";
		        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		        $codeAlphabet.= "0123456789";
		        $max = strlen($codeAlphabet) - 1;
		        for ($i=0; $i < 5; $i++) {
		            $token .= $codeAlphabet[mt_rand(0, $max)];
		        } 
			$invoice	= array (
				'kode_invoice'		=>date("Ymd").$token,
				'nama'			=> $nama,
				'alamat'		=> $alamat,
				'tgl_pesan'		=> date('Y-m-d H:i:s'),
				'batas_bayar'	=> date('Y-m-d H:i:s' , mktime(date('H'),date('i'),date('s'),date('m'),date('d') +1,date('Y'))),
				'created_by'			=>$this->session->userdata('id_user'),
			);
			$this->db->insert('tb_invoice', $invoice);
			$id_invoice = $this->db->insert_id();

			foreach ($this->cart->contents() as $items){
				
				$data = array(
					'id_invoice'		=>$id_invoice,
					'id_barang'			=>$items['id'],
					'id_user'			=>$this->session->userdata('id_user'),
					'nama_barang'		=>$items['name'],
					'jumlah'			=>$items['qty'],
					'harga'				=>$items['price'],
				);

				$this->db->insert('tb_pesanan',$data);
			}
			return TRUE;
		}

		public function edit($id,$tabel,$data,$primary_key){
			$this->db->where($primary_key,$id);
			$this->db->update($tabel,$data);
		
		}
		public function tampil_data()
		{	$this->db->order_by('id', 'DESC');
			$result = $this->db->get('tb_invoice');
			if($result->num_rows() > 0){
				return $result -> result();
			}else {
				return FALSE;
			}
		}

		public function ambil_id_invoice($id_invoice)
		{
			$result = $this ->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
			if($result->num_rows()>0){
				return $result->row();
			}else{
				return false;
			}
		}

		public function ambil_id_pesanan($id_invoice)
		{
			$result = $this ->db->where('id', $id_invoice)->get('tb_pesanan');
			if($result->num_rows()>0){
				return $result->result();
			}else{
				return false;
			}
		}
	}
 ?>