<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function login()
	{
		$data['title'] = "Login";
		$this->load->view('auth/login', $data);
	}

    public function proses()
	{
        $email = $this->input->post('username');
		$password = MD5($this->input->post('password'));

		$cekEmail = $this->db->where('username', $email)->from('tbl_user')->get()->row();

		if ($cekEmail == true) {
			if ($cekEmail->password == $password) {
                    $biodata = $this->db->where('id_biodata', $cekEmail->id_biodata)->from('tbl_biodata')->get()->row();
					$data_session = array(
                        'id' =>  $biodata->id_biodata,
						'nama' => $biodata->id_biodata,
						'prodi' => $biodata->id_prodi,
						'role' => $cekEmail->role
					);
					$this->session->set_userdata($data_session);

					redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Password Yang Anda Masukan Tidak Sesuai.');
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Username Tidak Ditemukan.');
			redirect('auth/login');
		}
	}

    public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('prodi');
		$this->session->unset_userdata('role');
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
