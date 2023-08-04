<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function login()
	{
		$data['title'] = "Login";
		$this->load->view('auth/login', $data);
	}

    public function proses()
	{
        // Proses
	}

    public function logout()
	{
        // Log out
	}
}
