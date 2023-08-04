<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
    
    public function index()
	{
		$data['title'] = "Pinjam Laboratorium";
        $data['prodi'] = $this->MasterModel->getProdi();
        $data['akun'] = $this->UserModel->getAkun();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('pinjam', $data);
		$this->load->view('template/footer', $data);
	}

    public function lab()
	{
        $id	=	$this->input->post('id_prodi');
		$data	=	$this->db->where('id_prodi', $id)->get('tbl_laboratorium')->result();
		echo json_encode($data);
	}

    public function new()
	{
        $data = array(
			'id_lab'	=>  $this->input->post('id_lab'),
			'id_biodata'	=>  1, //diganti dengan id_biodata user
			'start_time'	=>  date('Y-m-d H:i:s', strtotime($this->input->post('tgl'))),
			'end_time'	=>  date('Y-m-d H:i:s', strtotime($this->input->post('tgl') . ' + 8 hours')),
			'status'	=>  "1"
		);

		$tambah = $this->PeminjamanModel->newPinjam($data);

		if ($tambah == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Melakukan Peminjaman Baru.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Melakukan Peminjaman Baru.');
		}
		redirect('peminjaman');
	}
}
