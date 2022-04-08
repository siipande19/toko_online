<?php 
	/**
	* z
	*/
	class auth extends CI_Controller{
		public function login()
		{
			$this->form_validation->set_rules('username','username','required',['required' => 'Username Wajib Diisi!']);
			$this->form_validation->set_rules('password','password','required',['required' => 'Passwords Wajib Diisi!']);
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('form_login');
				$this->load->view('templates/footer');
			}else{
				$auth =$this->model_auth->cek_login();
				if($auth == FALSE)
				{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
     					Username atau Password Anda Salah!
  						<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
					redirect('auth/login');
				}else{
					$this->session->set_userdata('id_user',$auth->id);
					$this->session->set_userdata('username',$auth->username);
					$this->session->set_userdata('role_id',$auth->role_id);
					$this->session->set_userdata('nama',$auth->nama);

					switch($auth->role_id){
						case 1 : redirect('admin/dashboard_admin');
								break;
						case 2 : redirect('dashboard');
								break;
						default: break;
					}
				}
 
			}
		}
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('auth/login');
		}
	}

 ?>