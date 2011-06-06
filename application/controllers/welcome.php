<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	/*
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}
	*/	 

	public function index()
	{
		$this->load->view('welcome_message');
		
		/*
		To cache ANY controller method for a length of time, which uses the pre-generated page vs generating it again use:
		$this->output->cache($minutes);
		Warning: Because of the way CodeIgniter stores content for output, caching will only work if you are generating display for your controller with a view.
		Note: Before the cache files can be written you must set the file permissions on your application/cache folder such that it is writable.
	
		*/
	}
	
	public function admin()
	{
		//$this->load->controller('admin/Dashboard');
	}
	
	public function say_what()
	{
		/*
		if ("joo" == "")
		{
			log_message('error', 'Some variable did not contain a value.');
		}
		else
		{
			log_message('debug', 'Some variable was correctly set');
		}
		
		log_message('info', 'The purpose of some variable is to provide some value.');
		*/
		//set_status_header(401, 'Unauthorized');
		//set_status_header(403, 'Access Forbidden');
		//show_error("401 - Unauthorized",401);
		show_error("403 - Access Forbidden",403);
		//show_404();
	}
	
	/*
	public function _remap($method)
	{
		if ($method == 'some_method')
		{
			$this->$method();
		}
		else
		{
			$this->default_method();
		}
	}
	public function _remap($method, $params = array())
	{
		$method = 'process_'.$method;
		if (method_exists($this, $method))
		{
			return call_user_func_array(array($this, $method), $params);
		}
		show_404();
	}
	
	// Ran after the view is completed, final post-processing code applied
	public function _output($output)
	{
		echo $output;
	}

	// functions hidden from URI usage, class level only	
	private function _utility()
	{
	  // some code
	}
	*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */