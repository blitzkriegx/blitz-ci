<?

class tbl_site_page_sections extends CI_Model
{
	public function __construct() {
		parent::__construct('tbl_site_page_sections');
		$this->fields->add_field('id','smallint(5) unsigned','NO','PRI','','auto_increment');
		$this->fields->add_field('page_id','tinyint(3) unsigned','NO','','1','');
		$this->fields->add_field('template_section_id','tinyint(3) unsigned','NO','','9','');
		$this->fields->add_field('heading','varchar(200)','NO','','','');
		$this->fields->add_field('heading_image','varchar(200)','YES','','','');
		$this->fields->add_field('content','text','NO','','','');
		$this->fields->add_field('has_footer','tinyint(1)','NO','','0','');
		$this->fields->add_field('order_by','tinyint(3) unsigned','YES','','1','');
		$this->fields->add_field('date','date','YES','','','');
		$this->_init();
	}
}

?>