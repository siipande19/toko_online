<?php 


class Pesanan extends CI_controller{

	//// Pesanan //// penambahan
	public function data_pesanan()
	{
		$data['pesanan'] = $this->model_pesanan->data_pesanan()->result_array();
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('data_pesanan',$data);
		$this-> load->view('templates/footer');
	}
	public function upload_bukti($id_invoice)
	{
		$data = $this->data;
		$foto = "BUKTI_".time();
		$config['upload_path'] = './uploads/bukti/';
	    $config['allowed_types'] = 'jpg|jpeg|png';
	    $config['max_size']      = '5000000';
	    $config['file_name'] = $foto;

	    $this->load->library('upload', $config);
	    $image_data = $this->upload->data();
	    if($this->upload->do_upload('input_bukti'))
	    {
	        $image_data = $this->upload->data();
		    $dat = array(
		    	"status"=> 1,
		        "bukti" => $image_data['file_name'],
		    );
		    $this->model_invoice->edit($id_invoice,'tb_invoice',$dat,'id');
	    }
		redirect('pesanan/data_pesanan/');
	}
	public function diterima($id_invoice)
	{
		$dat = array(
	    	"status"=> 3,
	    );
		$this->model_invoice->edit($id_invoice,'tb_invoice',$dat,'id');
		redirect('pesanan/data_pesanan/');
	}
	public function detail_pesanan($kode_invoice)
	{
		$data['pesanan'] = $this->model_pesanan->detail_pesanan($kode_invoice)->result_array();
		$data['kode_invoice'] = $kode_invoice;
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('detail_pesanan',$data);
		$this-> load->view('templates/footer');
	}
	public function rating()
	{
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('rating');
		$this-> load->view('templates/footer');
	}
	public function input_rating($id_invoice,$kode_invoice,$id_produk,$value)
	{
		// echo $id_invoice."?".$kode_invoice."?".$id_produk."?".$value."?";
		$pesanan= $this->model_pesanan->input_rating($id_invoice,$id_produk,$value);
		if ($pesanan) {
			$rat = $this->model_barang->ambil_rating($id_produk)->result_array();
			$jr = 0;
			for($ii=0; $ii<count($rat);$ii++){
				$jr += $rat[$ii]['rating'];
			}
			if ($jr == 0) {
				$rating=0;
			}else{
				$rr = $jr/count($rat);
				$rating=$rr;
			}
			$this->model_barang->update_rating($id_produk,$rating);
		}
		redirect('pesanan/data_pesanan/');
		
		
		// header("location:".base_url("pesanan/detail_pesanan/".$kode_invoice));
	}
	//// End Pesanan ///
}


?>