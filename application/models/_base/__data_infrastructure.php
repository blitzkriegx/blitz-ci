<?

class __data_infrastructure extends CI_Model
{
	public function __construct() {
		parent::__construct('__data_infrastructure');
		$this->fields->add_field('id','int(11)','NO','PRI','','auto_increment');
		$this->fields->add_field('prefix','varchar(10)','NO','','','');
		$this->fields->add_field('table','varchar(50)','NO','','','');
		$this->fields->add_field('field','varchar(50)','NO','','','');
		$this->fields->add_field('type','varchar(11)','NO','','','');
		$this->fields->add_field('size','smallint(5) unsigned','NO','','','');
		$this->fields->add_field('default','varchar(100)','YES','','','');
		$this->fields->add_field('attributes','varchar(25)','YES','','','');
		$this->fields->add_field('nullable','tinyint(1) unsigned','YES','','','');
		$this->fields->add_field('index','varchar(10)','YES','','','');
		$this->fields->add_field('auto_increment','tinyint(1) unsigned','YES','','','');
		$this->fields->add_field('comments','varchar(200)','YES','','','');
		$this->fields->add_field('order','tinyint(3) unsigned','YES','','','');
		$this->_init();
	}
}

?>