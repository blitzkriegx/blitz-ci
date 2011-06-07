<?php  if (!defined('BASEPATH'))
	exit('No direct script access allowed');

include(BASEPATH . "core/CI_Controller.php");

/**
 * Extend from CI_Controller(_Base) Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Sean 'Blitz' Homer
 */
class CI_Controller extends CI_Controller_Base {
	public $data = null;

	public function __construct() {
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */