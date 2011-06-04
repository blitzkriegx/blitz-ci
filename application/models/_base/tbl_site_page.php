<?

class tbl_site_page extends CI_Model
{
	public function __construct() {
		parent::__construct('tbl_site_page');
		$this->add_field('id','tinyint(3) unsigned','NO','PRI','','auto_increment');
		$this->add_field('site_id','tinyint(4) unsigned','NO','','1','');
		$this->add_field('tag','varchar(100)','NO','','','');
		$this->add_field('title','varchar(100)','NO','','','');
		$this->add_field('heading_image','varchar(4)','NO','','','');
		$this->add_field('script','varchar(2000)','YES','','','');
		$this->add_field('css','varchar(2000)','YES','','','');
		$this->add_field('description','varchar(2000)','YES','','','');
		$this->add_field('keywords','varchar(2000)','YES','','','');
		$this->_init();
	}
}

?>