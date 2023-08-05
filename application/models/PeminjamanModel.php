<?php

class PeminjamanModel extends CI_Model
{
	public function newPinjam($data)
	{
		return $this->db->insert('tbl_peminjaman',$data);
	}

	public function getAllPinjam()
	{
		return $this->db->select('a.*,b.*,c.*')
						->from('tbl_peminjaman a')
						->join('tbl_laboratorium b','a.id_lab = b.id_laboratorium', 'left')
						->join('tbl_biodata c','a.id_biodata = c.id_biodata', 'left')
						->get()
						->result();
	}

	public function getAllPinjamByProdi($id)
	{
		return $this->db->select('a.*,b.*,c.*')
						->from('tbl_peminjaman a')
						->join('tbl_laboratorium b','a.id_lab = b.id_laboratorium', 'left')
						->join('tbl_biodata c','a.id_biodata = c.id_biodata', 'left')
						->where('b.id_prodi',$id)
						->get()
						->result();
	}

	public function getAllPinjamByBiodata($id)
	{
		return $this->db->select('a.*,b.*,c.*')
						->from('tbl_peminjaman a')
						->join('tbl_laboratorium b','a.id_lab = b.id_laboratorium', 'left')
						->join('tbl_biodata c','a.id_biodata = c.id_biodata', 'left')
						->where('a.id_biodata',$id)
						->get()
						->result();
	}

	public function getAllVerifikasi()
	{
		return $this->db->select('a.*,b.*,c.*')
						->from('tbl_peminjaman a')
						->join('tbl_laboratorium b','a.id_lab = b.id_laboratorium', 'left')
						->join('tbl_biodata c','a.id_biodata = c.id_biodata', 'left')
						->where('a.status','1')
						->get()
						->result();
	}

	public function getAllVerifikasiByProdi($id)
	{
		return $this->db->select('a.*,b.*,c.*')
						->from('tbl_peminjaman a')
						->join('tbl_laboratorium b','a.id_lab = b.id_laboratorium', 'left')
						->join('tbl_biodata c','a.id_biodata = c.id_biodata', 'left')
						->where('a.status','1')
						->where('b.id_prodi',$id)
						->get()
						->result();
	}

	public function approvePeminjaman($data, $id)
	{
		$this->db->where('id_peminjaman', $id);
		$this->db->update('tbl_peminjaman', $data);

		return true;
	}

	public function canclePeminjaman($data, $id)
	{
		$this->db->where('id_peminjaman', $id);
		$this->db->update('tbl_peminjaman', $data);

		return true;
	}
}