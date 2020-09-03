<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channels extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('channels/channels');
		$this->load->view('footer');
	}
}
