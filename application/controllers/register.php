<?php 

	class register extends CI_Controller{
		public function index()
		{
			$this->form_validation->set_rules('nama','nama','required',['required' => 'Nama Wajib Diisi!']);
			$this->form_validation->set_rules('username','username','required',['required' => 'Username Wajib Diisi!']);
			$this->form_validation->set_rules('password_1','password','required|matches[password_2]',['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sesuai!']);
			$this->form_validation->set_rules('password_2','password','required|matches[password_1]');



			if ($this->form_validation->run()==FALSE){
				$this->load->view('templates/header');
				$this->load->view('register');
				$this->load->view('templates/footer');
			}else {
				$data = array(
					'id'		=>'',
					'nama'		=>$this->input->post('nama'),
					'username'	=>$this->input->post('username'),
					'password'	=>$this->input->post('password_1'),
					'role_id'	=>2,
				);

				$this->db->insert('tb_user', $data);
				redirect('auth/login');
			}
		}
	}
 ?>