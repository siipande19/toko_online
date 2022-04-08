<?php 
	class invoice extends CI_Controller{
		
		public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
     					Anda Belum Login!
  						<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
			redirect('auth/login');
		}
	}

		public function index()
		{
			$data['invoice'] = $this->model_invoice->tampil_data();
			$status_nama[0] = 'Belum Bayar';
			$status_nama[1] = 'Sudah Bayar';
			$status_nama[2] = 'Dikirim';
			$status_nama[3] = 'Diterima/Selesai';
			foreach ($data['invoice'] as $key) {
				$status_invoice[$key->id] = $key->status;
				$status_invoice_nama[$key->id] = $status_nama[$key->status];

				if ($key->status == 0) {
					$button_nama[$key->id] = "Sudah Dibayar";
					$button_status[$key->id] = "btn-primary";
					$button_able[$key->id] = "";
				}else if($key->status == 1){
					$button_nama[$key->id] = "Dikirim";
					$button_status[$key->id] = "btn-warning";
					$button_able[$key->id] = "";
				}else if($key->status == 2){
					$button_nama[$key->id] = "Selesai";
					$button_able[$key->id] = "";
					$button_status[$key->id] = "btn-danger";
				}else{
					$button_nama[$key->id] = "Terselesaikan";
					$button_able[$key->id] = "disabled";
					$button_status[$key->id] = "btn-secondary";
				}
			}
			
			$data['status_invoice'] 		= $status_invoice;
			$data['status_invoice_nama'] 	= $status_invoice_nama;
			$data['button_nama'] 			= $button_nama;
			$data['button_able'] 			= $button_able;
			$data['button_status'] 			= $button_status;
			// print_r($status_invoice);
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/invoice',$data);
			$this->load->view('templates_admin/footer');
		}
		public function detail($id_invoice)
		{
			$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
			$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/detail_invoice',$data);
			$this->load->view('templates_admin/footer');
		}
		public function status($id)
		{
			$data['invoice'] = $this->model_invoice->tampil_data();
			foreach ($data['invoice'] as $key) {
				if($key->id == $id){
					$status_invoice = $key->status;
				}
			}
			$dat = array(
		        "status"=> $status_invoice+1,
		    );
		    $this->model_invoice->edit($id,'tb_invoice',$dat,'id');
			redirect('admin/invoice','refresh');
		}
	}
 ?>