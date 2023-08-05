<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	
	public function prodi()
	{
		$data['title'] = "Master Data Prodi";
        $data['prodi'] = $this->MasterModel->getProdi();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('master/prodi', $data);
		$this->load->view('template/footer', $data);
	}

    public function prodi_new()
	{
        $data = array(
			'prodi_name'	=>  $this->input->post('prodi')
		);

		$tambah = $this->MasterModel->newProdi($data);

		if ($tambah == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menambahakan Program Studi Baru.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menambahakan Program Studi Baru.');
		}
		redirect('master/prodi');
	}

    public function prodi_hapus($id)
	{
        $hapus = $this->MasterModel->deleteProdi($id);

		if ($hapus == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menghapus Program Studi.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menghapus Program Studi.');
		}
		redirect('master/prodi');
	}


    public function laboratorium()
	{
		$data['title'] = "Master Data Laboratorium";
		if ($this->session->userdata('role') == '0') {
			$data['prodi'] = $this->MasterModel->getProdi();
			$data['lab'] = $this->MasterModel->getLaboratorium();
		}else {
			$data['lab'] = $this->MasterModel->getLaboratoriumByProdi($this->session->userdata('prodi'));
		}
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('master/lab', $data);
		$this->load->view('template/footer', $data);
	}

    public function laboratorium_new()
	{
		if ($this->session->userdata('role') == '0') {
			$prodi = $this->input->post('id_prodi');
		}else {
			$prodi = $this->session->userdata('prodi');
		}

        $data = array(
			'id_prodi'	=>  $prodi,
			'lab_name'	=>  $this->input->post('lab'),
			'capacity'	=>  $this->input->post('kapasitas')
		);

		$tambah = $this->MasterModel->newLaboratorium($data);

		if ($tambah == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menambahakan Laboratorium Baru.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menambahakan Laboratorium Baru.');
		}
		redirect('master/laboratorium');
	}

    public function laboratorium_hapus($id)
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
