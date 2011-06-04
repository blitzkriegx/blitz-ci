<?

class_exists('tbl_site_settings') || require_once(APPPATH.'models/_base/'.'tbl_site_settings'.'.php');

class Site_settings extends tbl_site_settings {
	protected function _init() {
		$this->init_field('id', 'Options', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(3) unsigned
		$this->init_field('site_id', 'Site Id', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(4) unsigned
		$this->init_field('client_name', 'Client Name', 'trim|required|min_length[1]|min_length[100]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(100)
		$this->init_field('google_analytics', 'Google Analytics', 'trim|required|min_length[1]|min_length[20]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(20)
		$this->init_field('under_maintanace', 'Under Maintanace', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(1)		
	}
}

?>