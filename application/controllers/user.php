<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function signup()
	{
		$name 		= $this->input->post('name');
		$login 		= $this->input->post('login');
		$password = $this->input->post('password');

		$password = md5($password);

		$users = $this->db->get_where('user', array('userlogin' => $login));

		if ($users->num_rows() > 0) {
			redirect(base_url(), 'refresh');
			exit;
		}

		$this->db->insert('user', array(
	   'username' => $name,
	   'userlogin' => $login,
	   'userpassword' => $password
		));

		$this->db->select('userid, username, userlogin');
		$user = $this->db->get_where('user', array(
			'userlogin' => $login
		))->row_array();

		$user['logged'] = true;
		$this->session->set_userdata($user);

		redirect(base_url(), 'refresh');
	}

	public function signin()
	{
		$login 		= $this->input->post('login');
		$password = $this->input->post('password');

		$password = md5($password);

		$users = $this->db->get_where('user', array(
			'userlogin' => $login,
			'userpassword' => $password
		));
		if ($users->num_rows() == 0) {
			redirect(base_url(), 'refresh');
			exit;
		}

		$this->db->select('userid, username, userlogin');
		$user = $this->db->get_where('user', array(
			'userlogin' => $login,
			'userpassword' => $password
		))->row_array();

		$user['logged'] = true;
		$this->session->set_userdata($user);

		redirect(base_url(), 'refresh');
	}

	public function exists()
	{
		$login 	= $this->input->post('login');
		$this->db->where('userlogin', $login);
		$users = $this->db->get('user');

		if ($users->num_rows() == 0) {
			echo '{ "exists": false }';
			exit;
		} else {
			echo '{ "exists": true }';
			exit;
		}
	}

	public function validate()
	{
		$login 		= $this->input->post('login');
		$password = $this->input->post('password');

		$password = md5($password);

		$this->db->where('userpassword', $password);
		$this->db->where('userlogin', $login);

		$users = $this->db->get('user');

		if ($users->num_rows() == 0) {
			echo '{ "valid": false }';
			exit;
		} else {
			echo '{ "valid": true }';
			exit;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

	public function change()
	{
		if (isLogged()) {
			$name 		= $this->input->post('name');
			$password	= $this->input->post('password');

			$data = [];

			if (!empty($name)) {
				$data["username"] = $name;
			}

			if (!empty($password)) {
				$data["userpassword"] = md5($password);
			}

			$this->db->where('userid', getUserId());
			$this->db->update('user', $data);

			$data['userid'] = getUserId();

			$this->db->select('userid, username, userlogin');
			$user = $this->db->get_where('user', $data)->row_array();

			$user['logged'] = true;
			$this->session->set_userdata($user);

			echo '{ "changed": true }';
			exit;
		} else {
			echo '{ "changed": false }';
			exit;
		}
	}
}
