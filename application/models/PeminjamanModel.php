<?php

class PeminjamanModel extends CI_Model
{
	public function newPinjam($data)
	{
		return $this->db->insert('tbl_peminjaman',$data);
	}
}