<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include(BASEPATH."core/CI_Model.php");
include(BASEPATH."core/Model_Field.php");

/*

need to add validation handling
		
$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean','callback_username_check'); $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5','callback_password_check'); $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required'); $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

More: htmlspecialchars|md5|trim

Callbacks, if passing all the manditory validation, then allows for custom validation following, once the main validation request is running


if ($this->form_validation->run() == FALSE)
{
	$this->load->view('myform');
}
else
{
	$this->load->view('formsuccess');
}

If you include %s in your error string, it will be replaced with the "human" name you used for your field when you set your rules.

In the "callback" example above, the error message was set by passing the name of the function:
$this->form_validation->set_message('username_check')

You can also override any error message found in the language file. For example, to change the message for the "required" rule you will do this:
$this->form_validation->set_message('required', 'Your custom message here');




If you would like to store the "human" name you passed to the set_rules() function in a language file, and therefore make the name able to be translated, here's how:

First, prefix your "human" name with lang:, as in this example:
$this->form_validation->set_rules('first_name', 'lang:first_name', 'required');

Then, store the name in one of your language file arrays (without the prefix):
$lang['first_name'] = 'First Name';

Note: If you store your array item in a language file that is not loaded automatically by CI, you'll need to remember to load it in your controller using:
$this->lang->load('file_name');



To globally change the error delimiters, in your controller function, just after loading the Form Validation class, add this:
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

In this example, we've switched to using div tags.
Changing delimiters Individually

Each of the two error generating functions shown in this tutorial can be supplied their own delimiters as follows:
<?php echo form_error('field name', '<div class="error">', '</div>'); ?>

Or:
<?php echo validation_errors('<div class="error">', '</div>'); ?> 





The Form Validation class supports the use of arrays as field names. Consider this example:
<input type="text" name="options[]" value="" size="50" />

If you do use an array as a field name, you must use the EXACT array name in the Helper Functions that require the field name, and as your Validation Rule field name.

For example, to set a rule for the above field you would use:
$this->form_validation->set_rules('options[]', 'Options', 'required');

Or, to show an error for the above field you would use:
<?php echo form_error('options[]'); ?>

Or to re-populate the field you would use:
<input type="text" name="options[]" value="<?php echo set_value('options[]'); ?>" size="50" />

You can use multidimensional arrays as field names as well. For example:
<input type="text" name="options[size]" value="" size="50" />

Or even:
<input type="text" name="sports[nba][basketball]" value="" size="50" />

As with our first example, you must use the exact array name in the helper functions:
<?php echo form_error('sports[nba][basketball]'); ?>

If you are using checkboxes (or other fields) that have multiple options, don't forget to leave an empty bracket after each option, so that all selections will be added to the POST array:
<input type="checkbox" name="options[]" value="red" />
<input type="checkbox" name="options[]" value="blue" />
<input type="checkbox" name="options[]" value="green" />

Or if you use a multidimensional array:
<input type="checkbox" name="options[color][]" value="red" />
<input type="checkbox" name="options[color][]" value="blue" />
<input type="checkbox" name="options[color][]" value="green" />

When you use a helper function you'll include the bracket as well:
<?php echo form_error('options[color][]'); ?>



The following is a list of all the native rules that are available to use:
Rule 	Parameter 	Description 	Example
required 	No 	Returns FALSE if the form element is empty. 	 
matches 	Yes 	Returns FALSE if the form element does not match the one in the parameter. 	matches[form_item]
min_length 	Yes 	Returns FALSE if the form element is shorter then the parameter value. 	min_length[6]
max_length 	Yes 	Returns FALSE if the form element is longer then the parameter value. 	max_length[12]
exact_length 	Yes 	Returns FALSE if the form element is not exactly the parameter value. 	exact_length[8]
greater_than 	Yes 	Returns FALSE if the form element is less than the parameter value or not numeric. 	greater_than[8]
less_than 	Yes 	Returns FALSE if the form element is greater than the parameter value or not numeric. 	less_than[8]
alpha 	No 	Returns FALSE if the form element contains anything other than alphabetical characters. 	 
alpha_numeric 	No 	Returns FALSE if the form element contains anything other than alpha-numeric characters. 	 
alpha_dash 	No 	Returns FALSE if the form element contains anything other than alpha-numeric characters, underscores or dashes. 	 
numeric 	No 	Returns FALSE if the form element contains anything other than numeric characters. 	 
integer 	No 	Returns FALSE if the form element contains anything other than an integer. 	 
decimal 	Yes 	Returns FALSE if the form element is not exactly the parameter value. 	 
is_natural 	No 	Returns FALSE if the form element contains anything other than a natural number: 0, 1, 2, 3, etc. 	 
is_natural_no_zero 	No 	Returns FALSE if the form element contains anything other than a natural number, but not zero: 1, 2, 3, etc. 	 
valid_email 	No 	Returns FALSE if the form element does not contain a valid email address. 	 
valid_emails 	No 	Returns FALSE if any value provided in a comma separated list is not a valid email. 	 
valid_ip 	No 	Returns FALSE if the supplied IP is not valid. 	 
valid_base64 	No 	Returns FALSE if the supplied string contains anything other than valid Base64 characters. 	 

The following is a list of all the prepping functions that are available to use:
Name 	Parameter 	Description
xss_clean 	No 	Runs the data through the XSS filtering function, described in the Input Class page.
prep_for_form 	No 	Converts special characters so that HTML data can be shown in a form field without breaking it.
prep_url 	No 	Adds "http://" to URLs if missing.
strip_image_tags 	No 	Strips the HTML from image tags leaving the raw URL.
encode_php_tags 	No 	Converts PHP tags to entities.


*/


/**
 * Extened CI_Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Sean 'Blitz' Homer
 */
class CI_Model extends CI_Model_Base {

	public $_table = '';
	public $_fields = array();
	protected $_is_dirty = false;

	/**
	 * Constructor
	 *
	 * @access public
	 */
	function __construct($table = '')
	{
		parent::__construct();
		
		$this->load->library('form_validation');

		$this->_table = $table;
	}

	protected function _init() {
		// MUST BE OVERRIDDEN
	}
	
	/*
	FIELD STORAGE FUNCTIONS
	*/
	function add_field($field, $type, $null, $key_type, $default, $extras) {
		list($type,$size) =  preg_split("/[()]/",$type); // In the event type contains a size, i.e. smallint(5), break apart to make usable
		$this->_fields[$field] = new Model_Field(array(
			'name' => $field,
			'type' => $type,
			'size' => $size,
			'null' => $null == 'NO' ? false : true,
			'primary_key' => $key_type == 'PRI' ? true : false,
			'unique' => $key_type == 'PRI' || $key_type == 'UNI' ? true : false,
			'default' => $default == '' || $default == 'NULL' ? NULL : $default,
			'auto_increment' => $extras == 'auto_increment' ? true : false
		));
	}
	
	function init_field($field, $input_label, $validation, $input_type, $attrs = '')
	{
		if($this->_fields[$field] && get_class($this->_fields[$field]) == 'Model_Field')
		{
			$this->_fields[$field]->init($input_label, $input_type, $attrs);
			$this->form_validation->set_rules($field, $input_label, $validation); // $this->_table,
            // @todo Currently adds rule set to a mass form_validation object... need to split into model specific rule sets
		}
	}
	
	function set_field($field, $value)
	{
		$this->_field[$field] = $value;
		$this->_is_dirty = true;
	}
	
	function has_parent() 
	{
		return array_key_exists('parent_id',$this->_fields);
	}
	
	function has_order_by() 
	{
		return array_key_exists('order_by',$this->_fields);
	}

    function is_valid() {
        return $this->form_validation->run();
    }
	
	function get_fields()
	{
		return $this->_fields;
	}
	
	function get_field_columns()
	{
		$columns = array();
		foreach($this->_fields as $field)
		{
			$columns[$field->name] = $field->value;
		}
		return $columns;
	}
	
	// Active Records db class http://codeigniter.com/user_guide/database/active_record.html
	/*
	SELECT FUNCTIONS
	*/
	function select_entries($limit = 0, $offset = 0)
    {
		if($limit)
	        $query = $this->db->get($this->_table, $limit, $offset);
		elseif(!$limit && $offset)
	        $query = $this->db->get($this->_table, $offset, $offset); 
		else
			$query = $this->db->get($this->_table);
			
        return $query->result();
    }
	
	function select_entry($id = 0, $limit = 0, $offset = 0)
    {
		if($id > 0)
		{
			$this->db->where('id',$id);
			$query = $this->db->get($this->_table, $limit, $offset);
	        return $query->result();
		}
		return NULL;
    }
	
	function select_sum($field = '', $limit = 0, $offset = 0) 
	{
		if($field != '')
		{
			$this->db->select_sum($field);
			$query = $this->db->get($this->_table, $limit, $offset);
	        return $query->result();
		}
		return NULL;
	}
	
	function select_entries_in($field = '', $values = '', $limit = 0, $offset = 0)
    {
		if($field != '' && $values != '')
		{
			$this->db->where_in($field,preg_split("/[\s]?,[\s]?/", $values));
			$query = $this->db->get($this->_table, $limit, $offset);
			return $query->result();
		}
		return NULL;
    }
	
	function select_entries_in2($field = '', $values = '', $limit = 0, $offset = 0)
    {
		if($field != '' && $values != '')
		{
			$this->db->like($field,str_replace("%","",$values));
			$query = $this->db->get($this->_table, $limit, $offset);
			return $query->result();
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
		if($use_post)
		{
			$post = $this->input->post();
			foreach($post as $field => $value)
			{
				$this->_fields[$field]->value = $value;
				$this->db->set($field,$value);
			}
		}
		else
		{
			foreach($this->_fields as $field)
			{
				$this->db->set($field->name,$field->value);
			}
		}
		
		$this->db->insert($this->_table);
		
		// Set the objects id upon success
		$this->_fields['id']->value = $this->db->insert_id();
		return $this->_fields['id']->value;
	}
	
	/*
	UPDATE FUNCTIONS
	*/
	function update_entry($use_post = false)
	{
		if($this->_is_dirty)
		{
			foreach($this->_fields as $field)
			{
				$this->db->set($field->name,$field->value);
			}
			$this->db->where('id',$this->_fields['id']->value);

			return $this->db->update($this->_table);
		}
		else if($use_post)
		{
			$post = $this->input->post();
			foreach($post as $field => $value)
			{
				$this->_fields[$field]->value = $value;
				$this->db->set($field,$value);
			}
			$this->db->where('id',$this->input->post('id'));
			
			return $this->db->update($this->_table);
		}
		return NULL;
	}
	
	/*
	DELETE FUNCTIONS
	*/
	function delete_entry($id = 0)
	{
		if(!$id)
		{
			$id = $this->_fields['id']->value;
		}
		
		$this->db->where('id',$id);
		return $this->db->delete($this->_table);
	}
}
// END Model Class

/* End of file Model.php */
/* Location: ./system/core/Model.php */