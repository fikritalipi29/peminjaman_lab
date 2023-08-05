<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
    
    public function index()
	{
		$data['title'] = "Riwayat Peminjaman";
		if ($this->session->userdata('role') == '0') {
			$data['riwayat'] = $this->PeminjamanModel->getAllPinjam();
		}elseif ($this->session->userdata('role') == '3') {
			$data['riwayat'] = $this->PeminjamanModel->getAllPinjamByBiodata($this->session->userdata('id'));
		}else{
			$data['riwayat'] = $this->PeminjamanModel->getAllPinjamByProdi($this->session->userdata('prodi'));
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('riwayat', $data);
		$this->load->view('template/footer', $data);
	}
}
