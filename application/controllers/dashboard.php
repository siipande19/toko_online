<?php 


class dashboard extends CI_controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		if($this->session->userdata('role_id') != '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
     					Anda Belum Login!
  						<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		// $result = $this->model_barang->tampil_data()->result_array();
		// $data['barang'] = json_decode(json_encode($result), FALSE);
		//konfigurasi pagination
        $config['base_url'] = site_url('dashboard/index');
        $config['total_rows'] = $this->db->count_all('tb_barang'); //total row
        $config['per_page'] = 8;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
     	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->model_barang->get_barang_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
 
        //load view mahasiswa view
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard' , $data);
		$this->load->view('templates/footer');
	}
	public function search()
	{
		$data["keyword"] = $this->input->get('keyword',TRUE);
		if (empty($this->input->get('rating',TRUE))) {
			$data['rr'] = "";
			$data["rat"] =  "0";
		}else{
			$data['rr'] = "AND rating = '".$this->input->get('rating',TRUE)."'";
			$data["rat"] =  $this->input->get('rating',TRUE);
		}
		$result = $this->model_barang->tampil_data_search($data)->result_array();
		$data['barang'] = json_decode(json_encode($result), FALSE);
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar', $data);
		$this-> load->view('search' , $data);
		$this-> load->view('templates/footer');
	}
	public function tambah_ke_keranjang($id)
	{
		$barang = $this->model_barang->find($id);

			$data = array(
	        'id'      => $barang->id_barang,
	        'qty'     => 1,
	        'price'   => $barang->harga,
	        'name'    => $barang->nama_barang
	        
	);

	$this->cart->insert($data);
	redirect('dashboard');
	}

	public function detail_keranjang()
	{
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('keranjang');
		$this-> load->view('templates/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('welcome');
	}

	public function pembayaran()
	{
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('pembayaran');
		$this-> load->view('templates/footer');
	}

	public function proses_pesanan()
	{
		$is_processed = $this->model_invoice->index();
		if($is_processed){
		$this->cart->destroy();
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('proses_pesanan');
		$this-> load->view('templates/footer');
		}else {
			echo "Maaf, Pesanan Anda Gagal Diproses !";
		}
	}

	public function detail($id_barang)
	{
		$data['barang'] = $this->model_barang->detail_barang($id_barang);
		$this-> load->view('templates/header');
		$this-> load->view('templates/sidebar');
		$this-> load->view('detail_barang',$data);
		$this-> load->view('templates/footer');
	}

	public function cari_barang($keyword){
			$keyword = $this->input->getVar('keyword');
			$data['mencari']=$this->model_product->pencarian_barang($keyword);
			$this-> load->view('templates/header');
			$this-> load->view('templates/sidebar');
			$this-> load->view('search', $data);
			$this-> load->view('templates/footer');
		}
}


?>