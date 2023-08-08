<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	
	public function index()
	{
		$rfid = $this->input->post('rfid');
        $jam_masuk = date('Y-m-d H:i:s');

        if (!empty($rfid)){
			$rfid_without_spaces = str_replace(' ', '', $rfid);

			$getIdBiodata = $this->db->where('no_card',$rfid_without_spaces)->get('tbl_biodata')->row();
            
            $getPeminjaman = $this->db->select('a.*')
                                      ->from('tbl_peminjaman a')
                                      ->where('start_time <=', $jam_masuk)
                                      ->where('end_time >=', $jam_masuk)
                                      ->where('status','2')->get();

            if ($getPeminjaman->num_rows() > 0) {
                echo "SILAHKAN MASUK";
            } else {
                echo "TIDAK ADA JADWAL PEMINJAMAN";
            }
		} else {
            echo "RFID TIDAK TERBACA";
        }


	}
}
