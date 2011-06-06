<?

class_exists('tbl_site_page') || require_once(APPPATH.'models/_base/'.'tbl_site_page'.'.php');

class Site_page extends tbl_site_page {
	protected function _init() {
		$this->fields->init_field('id', 'Options', '', FORM_HIDDEN, ''); // dbtype: tinyint(3) unsigned
		$this->fields->init_field('site_id', 'Site Id', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(4) unsigned
		$this->fields->init_field('tag', 'Tag', 'trim|required|min_length[1]|min_length[100]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(100)
		$this->fields->init_field('title', 'Title', 'trim|required|min_length[1]|min_length[100]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(100)
		$this->fields->init_field('heading_image', 'Heading Image', 'trim|required|min_length[1]|min_length[4]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(4)
		$this->fields->init_field('script', 'Script', 'trim|required|min_length[1]|min_length[2000]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(2000)
		$this->fields->init_field('css', 'Css', 'trim|required|min_length[1]|min_length[2000]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(2000)
		$this->fields->init_field('description', 'Description', 'trim|required|min_length[1]|min_length[2000]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(2000)
		$this->fields->init_field('keywords', 'Keywords', 'trim|required|min_length[1]|min_length[2000]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(2000)		
	}
}

?>