<?

class_exists('tbl_site_menu') || require_once(APPPATH.'models/_base/'.'tbl_site_menu'.'.php');

class Site_menu extends tbl_site_menu {
	protected function _init() {
		$this->fields->init_field('id', 'Options', '', FORM_HIDDEN, ''); // dbtype: mediumint(8) unsigned
		$this->fields->init_field('parent_id', 'Parent Id', 'trim|required|integer', FORM_INPUT, ''); // dbtype: mediumint(9) unsigned
		$this->fields->init_field('site_id', 'Site Id', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(3) unsigned
		$this->fields->init_field('managed_on', 'Managed On', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(3)
		$this->fields->init_field('label', 'Label', 'trim|required|min_length[1]|min_length[50]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(50)
		$this->fields->init_field('page_id', 'Page Id', 'trim|required|integer', FORM_INPUT, ''); // dbtype: int(10) unsigned
		$this->fields->init_field('url', 'Url', 'trim|required|min_length[1]|min_length[200]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(200)
		$this->fields->init_field('width', 'Width', 'trim|required|integer', FORM_INPUT, ''); // dbtype: mediumint(8) unsigned
		$this->fields->init_field('order_by', 'Order By', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(4) unsigned		
	}
}

?>