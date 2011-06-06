<?

class tbl_site extends CI_Model
{
	public function __construct() {
		parent::__construct('tbl_site');
		$this->fields->add_field('id','tinyint(3) unsigned','NO','PRI','','auto_increment');
		$this->fields->add_field('name','varchar(50)','NO','','','');
		$this->fields->add_field('url','varchar(50)','NO','','','');
		$this->fields->add_field('template','varchar(100)','NO','','','');
		$this->fields->add_field('test','varchar(12)','YES','UNI','','');
		$this->_init();
	}
}

?>