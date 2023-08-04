<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function index()
	{
		$data['title'] = "Akun User";
        $data['akun'] = $this->UserModel->getAkun();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('user/akun', $data);
		$this->load->view('template/footer', $data);
	}

    public function new()
	{
        $data = array(
			'username'	=>  $this->input->post('username'),
			'password'	=>  $this->input->post('password'),
			'id_biodata'	=>  $this->input->post('id_biodata'),
			'role'	=>  $this->input->post('role')
		);

		$tambah = $this->UserModel->newAkun($data);

		if ($tambah == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menambahakan Akun Pengguna Baru.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menambahakan Akun Pengguna Baru.');
		}
		redirect('user/akun');
	}

    public function hapus($id)
	{
        $hapus = $this->MasterModel->deleteLaboratorium($id);

		if ($hapus == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menghapus Laboratorium.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menghapus Laboratorium.');
		}
		redirect('master/laboratorium');
	}
}
