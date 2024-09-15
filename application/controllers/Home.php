<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$data = [
			'konten'=> $this->load->view('v_dashboard',[],TRUE)

		];
		$this->load->view('widget/template', $data);
	}
}
