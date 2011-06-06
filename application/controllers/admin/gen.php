<?
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'ci';
define("BASE_CLASS","CI_Model");
define("MODEL_PATH","");

$db_connect = mysql_connect($db['default']['hostname'],$db['default']['username'],$db['default']['password']) or die ("Could not connect to database".$db['default']['hostname']);
mysql_select_db($db['default']['database']) or die ("Could not select database!");

$tables = array();
$sql = "SHOW TABLES;";
$q = mysql_query ($sql);
while($table_name = mysql_fetch_array($q))
	$tables[] = $table_name[0];

foreach($tables as $table_name)
{
	$data = array();
	$data['classname'] = $table_name;
	$data['final_classname'] = ucwords(array_pop(preg_split("/_/",$table_name, 2)));
	$data['data_table'] = $table_name;
	$data['baseclass'] = BASE_CLASS;
	
	$data['fields'] = $data['sql_insert_list'] = $data['sql_update_list'] = array();
	$sql = "DESCRIBE $table_name";
	$q = mysql_query($sql);
	while($column = mysql_fetch_array($q))
	{
		list($field,$type,$null,$key,$default,$extra) = $column;
		if($field !== 'id') {
			if(strpos($type,"(") !== false) {
				list($type,$size,$unsigned) =  preg_split("/[()]+/",$type); // In the event type contains a size, i.e. smallint(5), break apart to make usable
				$unsigned = trim($unsigned);
				//die("$type,$size,$unsigned");
			}
			/*
			$validation[] = "trim";
			$validation[] = "required";
			$validation[] = "min_length[1]";
			if($size)
				$validation[] = "min_length[$size]";
			$validation[] = "xss_clean";
			$validation[] = "regex_match[/^$/]";
			$validation[] = "matches[other_field_name]";
			$validation[] = "exact_length[size]";
			$validation[] = "greater_than[min]";
			$validation[] = "less_than[max]";
			$validation[] = "alpha";
			$validation[] = "alpha_numeric";
			$validation[] = "alpha_dash";
			$validation[] = "numeric";
			$validation[] = "is_numeric";
			$validation[] = "integer";
			$validation[] = "decimal";
			$validation[] = "is_natural";
			$validation[] = "is_natural_no_zero";
			$validation[] = "valid_phone";
			$validation[] = "valid_email";
			$validation[] = "valid_emails";
			$validation[] = "valid_ip";
			$validation[] = "valid_base64";
			$validation[] = "prep_for_form";
			$validation[] = "prep_url";
			$validation[] = "strip_image_tags";
			$validation[] = "encode_php_tags";
			$validation[] = "htmlspecialchars";
			$validation[] = "md5";
			*/

			$validation = array();

			$type = strtolower($type);
			if(strpos($type,"char") !== false)
			{
				$validation[] = "trim";
				$validation[] = "required";
				$validation[] = "min_length[1]";
				if($size)
					$validation[] = "min_length[$size]";

				if(strpos($field,"email") !== false)
				{
					$validation[] = "valid_email";
				}
				else if(strpos($field,"phone") !== false || strpos($field,"fax") !== false)
				{
					$validation[] = "valid_phone";
				}

				$validation[] = "xss_clean";
			}
			else if(strpos($type,"text") !== false || strpos($type,"blob") !== false)
			{
				$validation[] = "trim";
				$validation[] = "required";
				$validation[] = "min_length[1]";
				$validation[] = "xss_clean";
			}
			else if(strpos($type,"date") !== false || strpos($type,"time") !== false)
			{
				$validation[] = "trim";
				$validation[] = "required";
				$validation[] = "min_length[1]";
				$validation[] = "xss_clean";
			}
			else if(strpos($type,"int") !== false)
			{
				$validation[] = "trim";
				$validation[] = "required";
				$validation[] = "integer";
				/*
				if(!$unsigned) {
					$validation[] = "greater_than[".(-1*floor((pow(256,$size))/2)+1)."]";
					$validation[] = "less_than[".(floor((pow(256,$size))/2))."]";
				}
				else {
					$validation[] = "greater_than[-1]";
					$validation[] = "less_than[".floor((pow(256,$size))-1)."]";
				}
				*/
			}
			else if($type == 'float' || $type == 'decimal' || $type == 'double' || $type == 'real')
			{
				$validation[] = "trim";
				$validation[] = "required";
				$validation[] = "decimal";
				$size = explode(",",$size);
				$size = $size[0];
				/*
				if(!$unsigned) {
					$validation[] = "greater_than[".(-1*floor((pow(256,$size))/2)+1)."]";
					$validation[] = "less_than[".(floor((pow(256,$size))/2))."]";
				}
				else {
					$validation[] = "greater_than[-1]";
					$validation[] = "less_than[".floor((pow(256,$size))-1)."]";
				}
				*/
			}

			$column['Validation'] = implode("|",$validation);
    	}
		$data['fields'][$field] = $column;
		$data['sql_select_list'][] = $field;
		$data['sql_insert_list'][] = $field;
		$data['sql_update_list'][] = $field;
	}
	
	$tables[$table_name] = $data;
}

$built = array();

$bypassed = array();

foreach($tables as $table)
{
	if($table['classname'] == 't')
		continue;

    // revised constructor
    // public function __construct(\$arrData = NULL) {
$class = "<?

class $table[classname] extends $table[baseclass]
{
	public function __construct() {
		parent::__construct('$table[data_table]');";
foreach($table['fields'] as $field)
{
$class .= "
		\$this->fields->add_field('$field[Field]','$field[Type]','$field[Null]','$field[Key]','$field[Default]','$field[Extra]');";
}
$class .= "
		\$this->_init();
	}
}

?>";

	/*
	if(!is_dir("Model"))
		mkdir("Model", 0775);
	if(!is_dir("Model/_base"))
		mkdir("Model/_base", 0775);
	*/
	//'Models/_base/'.
	$handle = fopen(APPPATH.'models/_base/'.$table['classname'].".php", "w");
	if($handle)
	{
		fwrite($handle,$class);
		fclose($handle);
		$built[] = APPPATH.'models/_base/'.$table['classname'].".php - file created/rebuilt<br />";
	}
	

$class = "<?

class_exists('$table[classname]') || require_once(APPPATH.'models/_base/'.'$table[classname]'.'.php');

class $table[final_classname] extends $table[classname] {
	protected function _init() {";
	
foreach($table['fields'] as $field)
{
$class .= "
		\$this->fields->init_field('$field[Field]', '".($field['Field'] == 'id' ? 'Options' : ucwords(str_replace("_"," ",$field['Field'])))."', '$field[Validation]', ".($field['Field'] == 'id' ? 'FORM_HIDDEN' : 'FORM_INPUT').", ''); // dbtype: $field[Type]";
}
$class .= "		
	}
}

?>";
	//'Models/'.

	if(!is_file(APPPATH.'models/'.$table['final_classname'].".php")) {
		$handle = fopen(APPPATH.'models/'.$table['final_classname'].".php", "x");
		if($handle)
		{
			fwrite($handle,$class);
			fclose($handle);
			$built[] = APPPATH.'models/'.$table['final_classname'].".php - file created/rebuilt<br />";
		}
	}
	else {
		$bypassed[] = APPPATH.'models/'.$table['final_classname'].".php - file already exists; bypassed<br />";
	}

	//print "<textarea style='width:100%;height:100%'>".$class."</textarea>";
}

print "<h1>Classes Built</h1>";
foreach($built as $b)
	print $b;
	
print "<h1>Classes Bypassed</h1>";
foreach($bypassed as $b)
	print $b;
?>

