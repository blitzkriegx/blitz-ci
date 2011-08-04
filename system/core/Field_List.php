<?  if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Custom Field_List Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Sean 'Blitz' Homer
 */

class Field_List {
	protected $_fields = array();
	public $_columns = array();
	public $_is_dirty = false;
	public $_validation = null;

	public function __construct() {
		// @todo: temporary work around to allow validation to separate to each model, yet it creates new instances, need to be revised
		$this->_validation = new CI_Form_validation();
	}

	public function __set($field, $value) {
		if (in_array($field, $this->_columns)) {
			$this->_fields[$field]->value = $value;
			$this->_is_dirty = true;
			//die("Setting::$field = $value...equals ".$this->_fields[$field]->value.print_array($this->_columns).print_array($this->_fields));
		}
	}

	public function __get($field) {
		if (in_array($field, $this->_columns)) {
			return $this->_fields[$field]->value;
		}
	}

	public function __isset($field) {
		return isset($this->_fields[$field]);
	}

	public function __unset($field) {
		unset($this->_fields[$field]);
	}

	public function __toString() {
		$str = '';
		foreach ($this->_columns as $field) {
			$str .= "<p><b>$field = </b>" . $this->_fields[$field]->value . "</p>";
		}
		return $str;
	}

	/**
	 * @param  $field
	 * @param  $type
	 * @param  $null
	 * @param  $key_type
	 * @param  $default
	 * @param  $extras
	 * @return void
	 */
	function add_field($field, $type, $null, $key_type, $default, $extras) {
		list($type, $size) = preg_split("/[()]/", $type); // In the event type contains a size, i.e. smallint(5), break apart to make usable
		$this->_fields[$field] = new Field(array('name' => $field, 'type' => $type, 'size' => $size, 'null' => $null == 'NO'
					? false : true, 'primary_key' => $key_type == 'PRI' ? true
					: false, 'unique' => $key_type == 'PRI' || $key_type == 'UNI' ? true
					: false, 'default' => $default == '' || $default == 'NULL' ? NULL
					: $default, 'auto_increment' => $extras == 'auto_increment' ? true : false));
		$this->_columns[] = $field;
	}

	/**
	 * @param  $field
	 * @param  $input_label
	 * @param  $validation
	 * @param  $input_type
	 * @param string $attrs
	 * @return void
	 */
	function init_field($field, $input_label, $validation, $input_type, $attrs = '') {
		if ($this->_fields[$field] && get_class($this->_fields[$field]) == 'Field') {
			$this->_fields[$field]->init($input_label, $input_type, $attrs);
			$this->_validation->set_rules($field, $input_label, $validation); // $this->_table,
			// @todo Currently adds rule set to a mass _validation object... need to split into model specific rule sets
		}
	}

	public function print_fields() {
		$str = '';
		foreach ($this->_columns as $field) {
			$str .= $this->_fields[$field]->render();
		}
		print $str;
	}

	function has_parent() {
		return in_array('parent', $this->_columns);
	}

	function has_order_by() {
		return in_array('order', $this->_columns);
	}

	function is_valid() {
		return $this->_validation->run();
	}

}
// END Field_List Class

/* End of file Field_List.php */
/* Location: ./system/core/Field_List.php */