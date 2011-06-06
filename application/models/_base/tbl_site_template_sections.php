<?

class tbl_site_template_sections extends CI_Model
{
	public function __construct() {
		parent::__construct('tbl_site_template_sections');
		$this->fields->add_field('id','tinyint(4) unsigned','NO','PRI','','auto_increment');
		$this->fields->add_field('parent_id','tinyint(4) unsigned','NO','','','');
		$this->fields->add_field('label','varchar(100)','NO','','','');
		$this->fields->add_field('tag_id','varchar(50)','NO','','','');
		$this->fields->add_field('container_tag_id','varchar(50)','NO','','','');
		$this->fields->add_field('is_horizontal','tinyint(1)','YES','','0','');
		$this->fields->add_field('is_configurable','tinyint(1)','NO','','0','');
		$this->_init();
	}
}

?>