<?

class tbl_site_menu extends CI_Model
{
	public function __construct() {
		parent::__construct('tbl_site_menu');
		$this->add_field('id','mediumint(8) unsigned','NO','PRI','','auto_increment');
		$this->add_field('parent_id','mediumint(9) unsigned','NO','','0','');
		$this->add_field('site_id','tinyint(3) unsigned','NO','','1','');
		$this->add_field('managed_on','tinyint(3)','NO','','0','');
		$this->add_field('label','varchar(50)','NO','','','');
		$this->add_field('page_id','int(10) unsigned','NO','','','');
		$this->add_field('url','varchar(200)','NO','','','');
		$this->add_field('width','mediumint(8) unsigned','NO','','200','');
		$this->add_field('order_by','tinyint(4) unsigned','NO','','','');
		$this->_init();
	}
}

?>