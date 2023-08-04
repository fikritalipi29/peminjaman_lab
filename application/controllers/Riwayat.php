<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
    
    public function index()
	{
		$data['title'] = "Riwayat Peminjaman";
        $data['prodi'] = $this->MasterModel->getProdi();
        //tambahkan if untuk  membedakan peminjam, admin, kepala lab, dan super admin
        $data['riwayat'] = $this->PeminjamanModel->getAllPinjam();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('riwayat', $data);
		$this->load->view('template/footer', $data);
	}
}
