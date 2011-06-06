<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Database extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *		 http://example.com/index.php/welcome
	 *	- or -
	 *		 http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array('_method' => ucwords($this->uri->segment(3))); // segment 3 (instead of 2) needed since Admin is a subfolder of the controllers
		//
		// do stuff
		//
		$this->load->view('admin/database', $data);
	}

	public function insert()
	{
		$data = array('_method' => ucwords($this->uri->segment(3))); // segment 3 (instead of 2) needed since Admin is a subfolder of the controllers

		$this->load->model('_data_infrastructure', '_di');
		$data['di'] = $this->_di;

		if ($this->input->post('submit')) {
			if($this->_di->insert_entry()) {
				$this->listing();
			}
		}

		$this->load->view('admin/database', $data);
	}

	public function update()
	{
		$data = array('_method' => ucwords($this->uri->segment(3))); // segment 3 (instead of 2) needed since Admin is a subfolder of the controllers

		$this->load->model('_data_infrastructure', '_di');

		$row = $this->uri->segment(4, 1);

		if($row) {
			$di = $this->_di->select_entry($row);
			if ($this->input->post('submit')) {
				if($di->update_entry()) {
					$this->listing();
				}
				else
					die("Woot, not dirty");
			}
			$data['di'] = $di;
			//die(print_array($data['di']));
		}
		$this->load->view('admin/database', $data);
	}
	
	public function listing()
	{
		$data = array('_method' => ucwords($this->uri->segment(3))); // segment 3 (instead of 2) needed since Admin is a subfolder of the controllers

		$this->load->model('_data_infrastructure', 'di');
		$data['di'] = $this->di;

		$row = $this->uri->segment(4, 1);

		if($row) {
			$entries = $e = array();
			$e = $this->di->select_entries();
			foreach($e as $entry)
				$entries[$entry->fields->prefix][$entry->fields->table][] = $entry;
			$data['entries'] = $entries;
		}

		$this->load->view('admin/database', $data);
	}

	public function gen()
	{
		print "Admin :: Dashboard :: gen";
		include(APPPATH . "controllers/admin/gen.php");
	}
}

/* End of file database.php */
/* Location: ./application/controllers/admin/database.php */