<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userdata extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		if (!isLogged()) {
			redirect(base_url(), 'refresh');
		}
	}

	public function remove()
	{
		$id = $this->input->post('dataid');

		$this->db->delete('userdata', array(
			'userdataid' => $id,
			'userid' => getUserId()
		));

		$this->db->where('userdataid', $id);
		$userdatas = $this->db->get('userdata');

		if ($userdatas->num_rows() == 0) {
			echo '{ "removed": true }';
			exit;
		} else {
			echo '{ "removed": false }';
			exit;
		}
	}

	public function save() {
		$datatype 	= $this->input->post('datatype');
		$contact 		= $this->input->post('contact');

		$data = array(
			"userdatatype" => $datatype,
			"userdatavalue" => $contact,
			"userid" => getUserId()
		);

		$this->db->insert('userdata', $data);

		$this->db->limit(1);
		$this->db->select('userdataid, userdatatype, userdatavalue');
		$userdatas = $this->db->get_where('userdata', $data);

		if ($userdatas->num_rows() == 1) {
			$userdata['data']  = $userdatas->row_array();
			$userdata['saved'] = true;
			echo json_encode($userdata);
			exit;
		} else {
			echo '{ "saved": false }';
			exit;
		}
	}
}
