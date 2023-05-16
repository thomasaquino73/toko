<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error_404 extends my_Controller
{


	public function index()
	{
		$this->load->view('v_error');
	}
}
