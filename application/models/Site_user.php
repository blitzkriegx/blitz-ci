<?

class_exists('tbl_site_user') || require_once(APPPATH.'models/_base/'.'tbl_site_user'.'.php');

class Site_user extends tbl_site_user {
	protected function _init() {
		$this->fields->init_field('id', 'Options', '', FORM_HIDDEN, ''); // dbtype: tinyint(3) unsigned
		$this->fields->init_field('site_id', 'Site Id', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(4) unsigned
		$this->fields->init_field('email', 'Email', 'trim|required|min_length[1]|min_length[100]|valid_email|xss_clean', FORM_INPUT, ''); // dbtype: varchar(100)
		$this->fields->init_field('username', 'Username', 'trim|required|min_length[1]|min_length[100]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(100)
		$this->fields->init_field('password', 'Password', 'trim|required|min_length[1]|min_length[20]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(20)
		$this->fields->init_field('first_name', 'First Name', 'trim|required|min_length[1]|min_length[25]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(25)
		$this->fields->init_field('last_name', 'Last Name', 'trim|required|min_length[1]|min_length[25]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(25)
		$this->fields->init_field('site_permission_id', 'Site Permission Id', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(4)		
	}
}

?>