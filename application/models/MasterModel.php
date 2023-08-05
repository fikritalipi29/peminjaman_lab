<?php

class MasterModel extends CI_Model
{
	public function getProdi()
	{
		return $this->db->select('a.*')->from('tbl_mst_prodi a')->where_not_in('id_prodi',1)->get()->result();
	}

	public function newProdi($data)
	{
		return $this->db->insert('tbl_mst_prodi',$data);
	}

	public function deleteProdi($id)
	{
		$this->db->where('id_prodi', $id);
		$this->db->delete('tbl_mst_prodi');

		return true;
	}

	public function getLaboratorium()
	{
		return $this->db->select('a.*, b.*')->from('tbl_laboratorium a')->join('tbl_mst_prodi b','a.id_prodi = b.id_prodi','left')->where_not_in('a.id_prodi',1)->get()->result();
	}

	public function getLaboratoriumByProdi($id)
	{
		return $this->db->select('a.*, b.*')->from('tbl_laboratorium a')->join('tbl_mst_prodi b','a.id_prodi = b.id_prodi','left')->where('a.id_prodi',$id)->get()->result();
	}

	public function newLaboratorium($data)
	{
		return $this->db->insert('tbl_laboratorium',$data);
	}

	public function deleteLaboratorium($id)
	{
		$this->db->where('id_laboratorium', $id);
		$this->db->delete('tbl_laboratorium');

		return true;
	}
}