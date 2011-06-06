<?

class_exists('tbl_site') || require_once(APPPATH.'models/_base/'.'tbl_site'.'.php');

class Site extends tbl_site {
	protected function _init() {
		$this->fields->init_field('id', 'Options', '', FORM_HIDDEN, ''); // dbtype: tinyint(3) unsigned
		$this->fields->init_field('name', 'Name', 'trim|required|min_length[1]|min_length[50]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(50)
		$this->fields->init_field('url', 'Url', 'trim|required|min_length[1]|min_length[50]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(50)
		$this->fields->init_field('template', 'Template', 'trim|required|min_length[1]|min_length[100]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(100)
		$this->fields->init_field('test', 'Test', 'trim|required|min_length[1]|min_length[12]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(12)		
	}
}

?>