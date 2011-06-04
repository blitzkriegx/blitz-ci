<?

class tbl_site_template_sections extends CI_Model
{
	public function __construct() {
		parent::__construct('tbl_site_template_sections');
		$this->add_field('id','tinyint(4) unsigned','NO','PRI','','auto_increment');
		$this->add_field('parent_id','tinyint(4) unsigned','NO','','','');
		$this->add_field('label','varchar(100)','NO','','','');
		$this->add_field('tag_id','varchar(50)','NO','','','');
		$this->add_field('container_tag_id','varchar(50)','NO','','','');
		$this->add_field('is_horizontal','tinyint(1)','YES','','0','');
		$this->add_field('is_configurable','tinyint(1)','NO','','0','');
		$this->_init();
	}
}

?>