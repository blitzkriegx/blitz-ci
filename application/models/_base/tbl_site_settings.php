<?

class tbl_site_settings extends CI_Model
{
	public function __construct() {
		parent::__construct('tbl_site_settings');
		$this->add_field('id','tinyint(3) unsigned','NO','PRI','','auto_increment');
		$this->add_field('site_id','tinyint(4) unsigned','NO','','','');
		$this->add_field('client_name','varchar(100)','NO','','','');
		$this->add_field('google_analytics','varchar(20)','YES','','','');
		$this->add_field('under_maintanace','tinyint(1)','YES','','0','');
		$this->_init();
	}
}

?>