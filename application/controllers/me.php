<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Me extends CI_Controller {
	public function __construct()
  {
		parent::__construct();

		if (!isLogged()) {
			redirect(base_url(), 'refresh');
		}
  }

	public function index()
	{
		$this->db->where('userid', getUserId());
		$dataBinder['userdatas'] = $this->db->get('userdata')->result();

		$this->load->view('me', $dataBinder);
	}
}
