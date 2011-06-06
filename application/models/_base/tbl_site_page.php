<?

class tbl_site_page extends CI_Model
{
	public function __construct() {
		parent::__construct('tbl_site_page');
		$this->fields->add_field('id','tinyint(3) unsigned','NO','PRI','','auto_increment');
		$this->fields->add_field('site_id','tinyint(4) unsigned','NO','','1','');
		$this->fields->add_field('tag','varchar(100)','NO','','','');
		$this->fields->add_field('title','varchar(100)','NO','','','');
		$this->fields->add_field('heading_image','varchar(4)','NO','','','');
		$this->fields->add_field('script','varchar(2000)','YES','','','');
		$this->fields->add_field('css','varchar(2000)','YES','','','');
		$this->fields->add_field('description','varchar(2000)','YES','','','');
		$this->fields->add_field('keywords','varchar(2000)','YES','','','');
		$this->_init();
	}
}

?>