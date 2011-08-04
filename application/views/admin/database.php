<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>BlitzCi Manager</title>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>global.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo JQUI_PATH ?>css/jquery.ui.all.min.css"/>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript" src="<?php echo JS_PATH ?>_init.min.js"></script>
</head>
<body>

<h1>Database > <?php echo $method ?></h1>

<p>
	<a href="?/admin/database/insert">Insert</a>
	<a href="?/admin/database/update">Update</a>
	<a href="?/admin/database/listing">Listing</a>
</p>

<?php

/*if ($entries) {
	foreach ($entries as $prefix => $table) {
		echo "<code><b>$prefix</b>:";
		foreach ($table as $tname => $t) {
			echo "<code><b>$tname</b>:";
			foreach ($t as $e)
				foreach ($e as $f)
					echo "<code>" . $f . "</code>";
			echo "</code>";
		}
		echo "</code>";
	}
}*/

/* echo "<code>".nl2br("CREATE TABLE IF NOT EXISTS `tbl_site` (
	  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
	  `name` varchar(50) NOT NULL,
	  `url` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'comments',
	  `template` varchar(100) NOT NULL,
	  `test` varchar(12) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'asdfasdf',
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `test` (`test`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;")."</code>";*/
?>


<?php
echo form_open($this->uri->uri_string());
//die(print_array($di));
if ($m != null) {
	$di->fields->print_fields();
	echo form_submit('submit', "$_method Entry");
	echo form_button(array('name' => 'button', 'id' => 'button', 'value' => 'true', 'type' => 'reset', 'content' => 'Reset'));
	echo form_close();
}
?>

<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User
	Guide</a>.</p>

<p><br/>Page rendered in {elapsed_time} seconds</p>

</body>
</html>