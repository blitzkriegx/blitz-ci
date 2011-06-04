<?

class_exists('tbl_site_template_sections') || require_once(APPPATH.'models/_base/'.'tbl_site_template_sections'.'.php');

class Site_template_sections extends tbl_site_template_sections {
	protected function _init() {
		$this->init_field('id', 'Options', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(4) unsigned
		$this->init_field('parent_id', 'Parent Id', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(4) unsigned
		$this->init_field('label', 'Label', 'trim|required|min_length[1]|min_length[100]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(100)
		$this->init_field('tag_id', 'Tag Id', 'trim|required|min_length[1]|min_length[50]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(50)
		$this->init_field('container_tag_id', 'Container Tag Id', 'trim|required|min_length[1]|min_length[50]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(50)
		$this->init_field('is_horizontal', 'Is Horizontal', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(1)
		$this->init_field('is_configurable', 'Is Configurable', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(1)		
	}
}

?>