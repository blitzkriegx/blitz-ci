<?

class_exists('tbl_site_page_sections') || require_once(APPPATH.'models/_base/'.'tbl_site_page_sections'.'.php');

class Site_page_sections extends tbl_site_page_sections {
	protected function _init() {
		$this->init_field('id', 'Options', 'trim|required|integer', FORM_INPUT, ''); // dbtype: smallint(5) unsigned
		$this->init_field('page_id', 'Page Id', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(3) unsigned
		$this->init_field('template_section_id', 'Template Section Id', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(3) unsigned
		$this->init_field('heading', 'Heading', 'trim|required|min_length[1]|min_length[200]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(200)
		$this->init_field('heading_image', 'Heading Image', 'trim|required|min_length[1]|min_length[200]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(200)
		$this->init_field('content', 'Content', 'trim|required|min_length[1]|xss_clean', FORM_INPUT, ''); // dbtype: text
		$this->init_field('has_footer', 'Has Footer', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(1)
		$this->init_field('order_by', 'Order By', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(3) unsigned
		$this->init_field('date', 'Date', 'trim|required|min_length[1]|xss_clean', FORM_INPUT, ''); // dbtype: date		
	}
}

?>