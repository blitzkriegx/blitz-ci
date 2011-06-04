<?

class_exists('tbl_site') || require_once(APPPATH.'models/_base/'.'tbl_site'.'.php');

class Site extends tbl_site {
	protected function _init() {
		$this->init_field('id', 'Options', 'trim|required|integer', FORM_HIDDEN, ''); // dbtype: tinyint(3) unsigned
		$this->init_field('name', 'Name', 'trim|required|min_length[1]|min_length[50]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(50)
		$this->init_field('url', 'Url', 'trim|required|min_length[1]|min_length[50]|xss_clean', FORM_URL, ''); // dbtype: varchar(50)
		$this->init_field('template', 'Template', 'trim|required|min_length[1]|min_length[100]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(100)		
	}

    public function printFields() {
        $mf = new Model_Field();
        $str = '';
        foreach($this->_fields as $field) {
            $mf = $field;
            $str .= $mf->render();
        }
        print $str;
    }
}

?>