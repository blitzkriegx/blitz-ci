<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Database extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$method = $this->uri->segment(3,'_data_infrastructure');
		$m = '_data_infrastructure';
		$this->data->method = ucwords($method); // segment 3 (instead of 2) needed since Admin is a subfolder of the controllers
		
		$this->load->model($m, 'm');
		
		$this->data->id = $this->uri->segment(4, 1);
	}

	public function index()
	{
		$this->load->view('admin/database', $this->data);
	}

	public function insert()
	{
		if ($this->input->post('submit')) {
			if($this->m->insert_entry()) {
				$this->listing();
			}
		}

		$this->load->view('admin/database', $this->data);
	}

	public function update()
	{
		if($this->data->row) {
			$this->data->m = $this->m->select_entry($this->data->row);
			if ($this->input->post('submit')) {
				if($this->data->m->update_entry()) {
					$this->listing();
				}
				else
					die("Woot, not dirty");
			}
			//die(print_array($data['di']));
		}
		$this->load->view('admin/database', $this->data);
	}
	
	public function listing()
	{
		/*$entries = $e = array();
		$e = $this->m->select_entries('',array(),10);
		foreach($e as $entry)
			$entries[$entry->fields->prefix][$entry->fields->table][] = $entry;
		$this->data->entries = $entries;*/

		$this->load->view('admin/database', $this->data);
	}

	public function gen()
	{
		print "Admin :: Dashboard :: gen";
		include(APPPATH . "controllers/admin/gen.php");
	}
}

/* End of file database.php */
/* Location: ./application/controllers/admin/database.php */