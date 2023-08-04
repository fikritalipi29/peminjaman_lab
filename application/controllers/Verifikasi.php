<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {
    
    public function index()
	{
		$data['title'] = "Riwayat Peminjaman";
        $data['prodi'] = $this->MasterModel->getProdi();
        //tambahkan if untuk  membedakan peminjam, admin, kepala lab, dan super admin
        $data['verifikasi'] = $this->PeminjamanModel->getAllVerifikasi();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('verifikasi', $data);
		$this->load->view('template/footer', $data);
	}

    public function approve($id)
	{
        $data = array(
			'status'	=>  "2"
		);

        $approve = $this->PeminjamanModel->approvePeminjaman($data, $id);

		if ($approve == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menghapus Laboratorium.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menghapus Laboratorium.');
		}
		redirect('verifikasi');
	}

    public function cancled($id)
	{
        $data = array(
			'status'	=>  "3"
		);

        $cancle = $this->PeminjamanModel->canclePeminjaman($data, $id);

		if ($cancle == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Melakukan Penolakan Peminjaman.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Melakukan Penolakan Peminjaman.');
		}
		redirect('verifikasi');
	}
}
