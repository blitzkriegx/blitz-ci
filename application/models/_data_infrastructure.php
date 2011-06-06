<?

class_exists('__data_infrastructure') || require_once(APPPATH.'models/_base/'.'__data_infrastructure'.'.php');

class _data_infrastructure extends __data_infrastructure {
	protected function _init() {
		$this->fields->init_field('id', 'Options', '', FORM_HIDDEN, ''); // dbtype: int(11)
		$this->fields->init_field('prefix', 'Prefix', 'trim|required|min_length[1]|min_length[10]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(10)
		$this->fields->init_field('table', 'Table', 'trim|required|min_length[1]|min_length[50]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(50)
		$this->fields->init_field('field', 'Field', 'trim|required|min_length[1]|min_length[50]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(50)
		$this->fields->init_field('type', 'Type', 'trim|required|min_length[1]|min_length[11]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(11)
		$this->fields->init_field('size', 'Size', 'trim|required|integer', FORM_INPUT, ''); // dbtype: smallint(5) unsigned
		$this->fields->init_field('default', 'Default', 'trim|required|min_length[1]|min_length[100]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(100)
		$this->fields->init_field('attributes', 'Attributes', 'trim|required|min_length[1]|min_length[25]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(25)
		$this->fields->init_field('nullable', 'Nullable', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(1) unsigned
		$this->fields->init_field('index', 'Index', 'trim|required|min_length[1]|min_length[10]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(10)
		$this->fields->init_field('auto_increment', 'Auto Increment', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(1) unsigned
		$this->fields->init_field('comments', 'Comments', 'trim|required|min_length[1]|min_length[200]|xss_clean', FORM_INPUT, ''); // dbtype: varchar(200)
		$this->fields->init_field('order', 'Order', 'trim|required|integer', FORM_INPUT, ''); // dbtype: tinyint(3) unsigned
	}
}

?>