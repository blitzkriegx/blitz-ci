<?

class tbl_site_user extends CI_Model
{
	public function __construct() {
		parent::__construct('tbl_site_user');
		$this->fields->add_field('id','tinyint(3) unsigned','NO','PRI','','auto_increment');
		$this->fields->add_field('site_id','tinyint(4) unsigned','NO','','','');
		$this->fields->add_field('email','varchar(100)','NO','','','');
		$this->fields->add_field('username','varchar(100)','NO','','','');
		$this->fields->add_field('password','varchar(20)','NO','','','');
		$this->fields->add_field('first_name','varchar(25)','NO','','','');
		$this->fields->add_field('last_name','varchar(25)','NO','','','');
		$this->fields->add_field('site_permission_id','tinyint(4)','NO','','','');
		$this->_init();
	}
}

?>