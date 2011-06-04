<?

class tbl_site extends CI_Model
{
	public function __construct() {
		parent::__construct('tbl_site');
		$this->add_field('id','tinyint(3) unsigned','NO','PRI','','auto_increment');
		$this->add_field('name','varchar(50)','NO','','','');
		$this->add_field('url','varchar(50)','NO','','','');
		$this->add_field('template','varchar(100)','NO','','','');
		$this->_init();
	}
}

?>