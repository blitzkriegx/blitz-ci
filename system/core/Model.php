<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

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
 */
class CI_Model extends CI_Model_Base
{
	protected $_table = '';
	public $fields = null;

	/**
	 * Constructor
	 *
	 * @access public
	 */
	public function __construct($table = '')
	{
		parent::__construct();

		$this->_table = $table;
		$this->fields = new Field_List();
	}

	protected function _init()
	{
		// MUST BE OVERRIDDEN
	}

	/**
	 * Select Entry
	 *
	 * Allows you to select and load a single entry of this model, and auto-propagate itself.
	 * Returns model id if found.
	 *
	 * @param int $id
	 * @return int
	 */
	public function select_entry($id = 0)
	{
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
	// @todo See about having a flag to have it fill models of this class vs db rows, at the cost of more overhead
	function select_entries($select = '', $where = array(), $limit = 0, $offset = 0)
	{
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

	function select_sum($field = '', $where = array(), $limit = 0, $offset = 0)
	{
		if ($field != '') {
			$this->db->select_sum($field);
			$query = $this->db->get($this->_table, $limit, $offset);
			return $query->result(get_class($this));
		}
		return NULL;
	}

	function select_entries_in($field = '', $values = '', $limit = 0, $offset = 0)
	{
		if ($field != '' && $values != '') {
			$this->db->where_in($field, preg_split("/[\s]?,[\s]?/", $values));
			$query = $this->db->get($this->_table, $limit, $offset);
			return $query->result(get_class($this));
		}
		return NULL;
	}

	function select_entries_like($field = '', $values = '', $limit = 0, $offset = 0)
	{
		if ($field != '' && $values != '') {
			$this->db->like($field, str_replace("%", "", $values));
			$query = $this->db->get($this->_table, $limit, $offset);
			return $query->result(get_class($this));
		}
		return NULL;
	}

	function select_num_rows()
	{
		return $this->db->count_all($this->_table);
	}

	/*
	INSERT FUNCTIONS
	*/
	function insert_entry($use_post = true)
	{
		if ($use_post) {
			foreach ($this->fields->_columns as $field)
			{
				$value = $this->input->post($field);
				$this->fields->$field = $value;
				$this->db->set($field, $value);
			}
		}
		else
		{
			foreach ($this->fields->_columns as $field)
				$this->db->set($field, $this->fields->$field);
		}

		$this->db->insert($this->_table);

		// Set the objects id upon success
		$this->fields->id = $this->db->insert_id();
		return $this->fields->id;
	}

	/*
	UPDATE FUNCTIONS
	*/
	function update_entry($use_post = true)
	{
		if ($this->fields->_is_dirty) {
			//die("update_entry::is_dirty");
			foreach ($this->fields->_columns as $field)
				$this->db->set($field, $this->fields->$field);
			$this->db->where('id', $this->_fields->id);
			return $this->db->update($this->_table);
		}
		else if ($use_post) {
			//die("update_entry::use_post");
			foreach ($this->fields->_columns as $field)
			{
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

	/*
	DELETE FUNCTIONS
	*/
	function delete_entry($id = 0)
	{
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