<?php  if (!defined('BASEPATH'))
	exit('No direct script access allowed');

include(BASEPATH . "core/CI_Model.php");
include(BASEPATH . "core/Field.php");
include(BASEPATH . "core/Field_List.php");

/**
 * Extend from CI_Model(_Base) Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Sean 'Blitz' Homer
 *
 * As a base class, this is never used directly, and therefore has been made abstract to accommodate certain
 * functionality which must be overwritten
 */


 class CI_Model extends CI_Model_Base {
	protected $_table = '';
	public $fields = null;

	/**
	 * Constructor
	 *
	 * @param string $table
	 */
	public function __construct($table = '') {
		parent::__construct();

		$this->_table = $table;
		$this->fields = new Field_List();
	}

	/**
	 * _init
	 *
	 * MUST BE OVERWRITTEN
	 *
	 * This function is expected to be ran in the child 'tbl_' classes,
	 * while the function itself is defined within the grandchild class, the direct models
	 * which are used and interacted with through the controllers.
	 *
	 * The model construct when ran on the child 'tbl_' class only initialize the basic
	 * database definitions, how the fields for the class will be used in db interactions,
	 * whereas the grandchild classes have additional specifications such as input label,
	 * validation methods to be applied, etc.
	 *
	 * The reason for having this flexibility, is to allow the child 'tbl_' classes to be
	 * recreated and overwritten at will with small db changes, while the grandchild classes
	 * once set up will be filled with custom methods and attributes, and not be overwritten.
	 * By simply forcing the child 'tbl_' class to call into the grandchild class, it creates
	 * that flexibility.
	 *
	 * @abstract
	 * @return void
	 */
	protected function _init(){}

	/**
	 * Select Entry
	 *
	 * Allows you to select and load a single entry of this model, and auto-propagate itself.
	 * Returns model id if found.
	 *
	 * @param int $id
	 * @return int
	 */
	public function select_entry($id = 0) {
		if ($id !== 0) {
			$this->db->where('id', $id);
			$query = $this->db->get($this->_table);
			if ($query->num_rows() === 1) {
				$result = $query->result(get_class($this));
				return $result[0];
			}
		}

		return null;
	}

	/**
	 * Select Entries
	 *
	 * Allows you to select a specific amount of rows if needed, or a complete listing of rows where required.
	 * Returns array of database rows.
	 *
	 * @param string $select
	 * @param array $where
	 * @param int $limit
	 * @param int $offset
	 * @return array
	 */
	function select_entries($select = '', $where = array(), $limit = 0, $offset = 0) {
		// Using compounding queries
		// $this->db->select('(SELECT SUM(payments.amount) FROM payments WHERE payments.invoice_id=4') AS amount_paid', FALSE);
		if ($select !== '')
			$this->db->select($select, false);

		if ($limit)
			$query = $this->db->get_where($this->_table, $where, $limit, $offset);
		elseif (!$limit && $offset)
			$query = $this->db->get_where($this->_table, $where, $offset, $offset);
		else
			$query = $this->db->get_where($this->_table, $where);

		return $query->result(get_class($this));
	}

	/**
	 * Select Sum
	 *
	 * Allows you to determine the total sum of a specific field within a table
	 *
	 * @param string $field
	 * @param array $where
	 * @param int $limit
	 * @param int $offset
	 * @return int
	 */
	function select_sum($field = '', $where = array(), $limit = 0, $offset = 0) {
		if ($field != '') {
			$this->db->select_sum($field);
			$query = $this->db->get($this->_table, $limit, $offset);
			return $query->result(get_class($this));
		}
		return NULL;
	}

	function select_entries_in($field = '', $values = '', $limit = 0, $offset = 0) {
		if ($field != '' && $values != '') {
			$this->db->where_in($field, preg_split("/[\s]?,[\s]?/", $values));
			$query = $this->db->get($this->_table, $limit, $offset);
			return $query->result(get_class($this));
		}
		return NULL;
	}

	function select_entries_like($field = '', $values = '', $limit = 0, $offset = 0) {
		if ($field != '' && $values != '') {
			$this->db->like($field, str_replace("%", "", $values));
			$query = $this->db->get($this->_table, $limit, $offset);
			return $query->result(get_class($this));
		}
		return NULL;
	}

	function select_num_rows() {
		return $this->db->count_all($this->_table);
	}

	/**
	 * @param string $select
	 * @param array $where
	 * @param int $limit
	 * @param int $offset
	 * @return array|null
	 */
	function list_entries($select = '', $where = array(), $limit = 0, $offset = 0) {
		$list = $this->select_entries($select, $where, $limit, $offset);
		$list_count = count($list);
		if ($list_count) {
			return $list;
		}
		return null;
	}

	/**
	 * @param bool $use_post
	 * @return int
	 */
	function insert_entry($use_post = true) {
		if ($use_post) {
			foreach ($this->fields->_columns as $field) {
				$value = $this->input->post($field);
				$this->fields->$field = $value;
				$this->db->set($field, $value);
			}
		}
		else {
			foreach ($this->fields->_columns as $field)
				$this->db->set($field, $this->fields->$field);
		}

		$this->db->insert($this->_table);

		// Set the objects id upon success
		$this->fields->id = $this->db->insert_id();
		return $this->fields->id;
	}

	/**
	 * @param bool $use_post
	 * @return bool|null
	 */
	function update_entry($use_post = true) {
		if ($this->fields->_is_dirty) {
			//die("update_entry::is_dirty");
			foreach ($this->fields->_columns as $field)
				$this->db->set($field, $this->fields->$field);
			$this->db->where('id', $this->_fields->id);
			return $this->db->update($this->_table);
		}
		else if ($use_post) {
			//die("update_entry::use_post");
			foreach ($this->fields->_columns as $field) {
				$value = $this->input->post($field);
				$this->fields->$field = $value;
				$this->db->set($field, $value);
			}
			$this->db->where('id', $this->input->post('id'));

			return $this->db->update($this->_table);
		}
		//die("update_entry::wtf?");
		return NULL;
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	function delete_entry($id = 0) {
		if (!$id) {
			$id = $this->_fields->id->value;
		}

		$this->db->where('id', $id);
		return $this->db->delete($this->_table);
	}
}
// END Model Class

/* End of file Model.php */
/* Location: ./system/core/Model.php */