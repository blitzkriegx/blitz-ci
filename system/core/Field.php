<?  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Custom Field Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Sean 'Blitz' Homer
 */

define('FORM_INPUT','input');
define('FORM_PASS','password');
define('FORM_TEXT','textarea');
define('FORM_TEXT_LIMITED','mceSuperLight');
define('FORM_HTML','html');
define('FORM_BOOL','checkbox');
define('FORM_RADIO','radio');
define('FORM_SELECT','select');
define('FORM_BUTTON','button');
define('FORM_HIDDEN','hidden');
define('FORM_DATE','date');
define('FORM_EMAIL','email');
define('FORM_URL','url');
define('FORM_FILE','file');
 
class Field {
	public $name = '';
	private $type = '';
	private $size = '';
	private $null = '';
	private $primary_key = '';
	private $unique = '';
	private $default = '';
	private $auto_increment = '';
	public $label = '';
	public $input = '';
	public $attrs = '';
	
	public $value = '';
	
	public function __construct($data = array()) {
		$this->name = $data['name'];
		$this->type = $data['type'];
		$this->size = $data['size'];
		$this->null = $data['null'];
		$this->primary_key = $data['primary_key'];
		$this->unique = $data['unique'];
		$this->default = $data['default'];
		$this->auto_increment = $data['auto_increment'];
	}
	
	public function init($label, $input, $attrs) {
		$this->label = $label;
		$this->input = $input;
		$this->attrs = $attrs;
	}

	public function render() {
		$value = $this->value ? $this->value : $value = $this->default;
		$required = $this->null ? '' : 'required';
		
		if($this->input != FORM_HIDDEN)
			$str = "<label id=\"".$this->name."-label\" for=\"".$this->name."\">".$this->label."</label>\n";
		
		switch($this->input)
		{
			/* moved to default
			case FORM_INPUT:
			case FORM_RADIO:
			case FORM_BUTTON:
			case FORM_HIDDEN:
			case FORM_EMAIL:
			case FORM_URL:
				break;
			*/
			case FORM_BOOL:
				$checked = $value ? 'checked="checked"' : '';
				$str .= "<input name=\"$this->name\" type=\"$this->input\" value=\"1\" class=\"$required\" $checked $this->attrs />\n";
				break;
			case FORM_TEXT:
				global $System;
				if($System->managing_site)
					$class = 'mceLight';
				$str .= "<textarea name=\"$this->name\" type=\"$this->input\" class=\"$class $required\" $this->attrs >".htmlentities($value,ENT_QUOTES)."</textarea><br />\n";
				break;
			case FORM_TEXT_LIMITED:
				global $System;
				if($System->managing_site)
					$class = FORM_TEXT_LIMITED;
				$str .= "<textarea name=\"$this->name\" type=\"$this->input\" class=\"$class $required\" $this->attrs >".htmlentities($value,ENT_QUOTES)."</textarea><br />\n";
				break;
			case FORM_HTML:
				$str .= "<textarea name=\"$this->name\" type=\"$this->input\" class=\"mceCoder $required\" $this->attrs >".nl2br(mysql_real_escape_string($value))."</textarea>\n";
				break;
			case FORM_SELECT:
				$str .= "
				<select name=\"$this->name\" type=\"$this->input\" value=\"".form_prep($value)."\" class=\"$required ajaxSelect\" $this->attrs selected=\"$this->value\">
					<option>Select An Option</option>
				</select>\n";
				break;
			case FORM_DATE:
				/*
				if($value == 'CURRENT_TIMESTAMP' || $value == '')
					$value = date("Y-m-d");
				*/
				$str .= "<input name=\"$this->name\" type=\"$this->input\" value=\"".form_prep($value)."\" maxlength=\"$this->size\" class=\"$required datefield\" $this->attrs />\n";			
				break;
			case FORM_HIDDEN:
				$str .= "<input name=\"$this->name\" type=\"$this->input\" value=\"".form_prep($value)."\" class=\"$required\" $this->attrs />\n";			
				break;
			case FORM_FILE:
				$str .= "<input name=\"$this->name\" type=\"$this->input\" maxlength=\"$this->size\" class=\"$required\" $this->attrs />\n";			
				break;
			default:
				$str .= "<input name=\"$this->name\" type=\"$this->input\" value=\"".form_prep($value)."\" maxlength=\"$this->size\" class=\"$required\" $this->attrs />\n";
				//$str .= "<textarea name=\"$this->name\" type=\"$this->input\" value=\"".form_prep($value)."\" class=\"mceSuperLight $required\">$value</textarea>\n";
		}
			
		$this->input = "<div>$str</div>";
		return $this->input;
	}
	
	public function __toString() {
		die("toString called");
		return (string)$this->value;
	}
}

function print_array($arr)
{
	return "<pre>".print_r($arr,true)."</pre>";
}

function getTimestamp() {
	//return date("Y-m-d h:m:s");
	return time();
}
// END Field Class

/* End of file Field.php */
/* Location: ./system/core/Field.php */