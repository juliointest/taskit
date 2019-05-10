<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Controller {
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
		$this->db->order_by("taskdatetime", "desc");
		$dataBinder['tasks'] = $this->db->get('task')->result();

		$this->load->view('task', $dataBinder);
	}

	public function remove()
	{
		$id 		= $this->input->post('taskid');

		$this->db->delete('task', array(
			'taskid' => $id,
			'userid' => getUserId()
		));

		$this->db->where('taskid', $id);
		$tasks = $this->db->get('task');

		if ($tasks->num_rows() == 0) {
			echo '{ "removed": true }';
			exit;
		} else {
			echo '{ "removed": false }';
			exit;
		}
	}

	public function changestatus()
	{
		$id 		= $this->input->post('taskid');
		$done 	= $this->input->post('taskdone');

		$this->db->where('taskid', $id);
		$this->db->where('userid', getUserId());
		$this->db->update('task', array(
			'taskdone' => ($done == 'yes') ? 'not' : 'yes'
		));

		$this->db->where('taskid', $id);
		$task['data'] = $this->db->get('task')->row_array();

		if ($task['data']['taskdone'] != $done) {
			$task['changed'] = true;
		} else {
			$task['changed'] = false;
		}

		echo json_encode($task);
		exit;
	}

	public function save() {
		$title 	  = $this->input->post('title');
		$text 		= $this->input->post('text');
		$datetime	= $this->input->post('datetime');
		$taskdone	= $this->input->post('taskdone');

		$data = array(
			"tasktitle" => $title,
			"taskdatetime" => $datetime,
			"taskdone" => $taskdone,
			"taskdescription" => $text,
			"userid" => getUserId()
		);

		$this->db->insert('task', $data);

		$this->db->limit(1);
		$this->db->select('taskid, tasktitle, taskdatetime, taskdone, taskdescription');
		$tasks = $this->db->get_where('task', $data);

		if ($tasks->num_rows() == 1) {
			$task['data']  = $tasks->row_array();
			$task['data']['taskdatetime'] = friendlyDate($task['data']['taskdatetime']);
			$task['saved'] = true;
			echo json_encode($task);
			exit;
		} else {
			echo '{ "saved": false }';
			exit;
		}
	}
}
