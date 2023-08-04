<?php

class UserModel extends CI_Model
{
	public function getBiodata()
	{
		return $this->db->select('a.*,b.prodi_name')->from('tbl_biodata a')->join('tbl_mst_prodi b', 'a.id_prodi = b.id_prodi', 'left')->where_not_in('a.id_prodi',1)->get()->result();
	}

	public function getBiodataById($id)
	{
		return $this->db->select('a.*,b.prodi_name')->from('tbl_biodata a')->join('tbl_mst_prodi b', 'a.id_prodi = b.id_prodi', 'left')->where('a.id_biodata',$id)->get()->row();
	}

	public function newBiodata($data)
	{
		return $this->db->insert('tbl_biodata',$data);
	}

	public function editBiodata($data, $id)
	{
		$this->db->where('id_biodata', $id);
		$this->db->update('tbl_biodata', $data);

		return true;
	}

	public function deleteBiodata($id)
	{
		$this->db->where('id_biodata', $id);
		$this->db->delete('tbl_biodata');

		return true;
	}

	public function getAkun()
	{
		return $this->db->select('a.*, b.*')->from('tbl_user a')->join('tbl_biodata b','a.id_biodata = b.id_biodata','left')->where_not_in('a.id_biodata',1)->order_by('b.id_prodi','ASC')->get()->result();
	}

	public function newAkun($data)
	{
		return $this->db->insert('tbl_user',$data);
	}

	public function resetAkun($id)
	{
		$data = array(
			'password' => MD5("Pengguna01")
		);
		$this->db->where('id_user', $id);
		$this->db->update('tbl_user', $data);

		return true;
	}

	public function deleteAkun($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tbl_user');

		return true;
	}
}