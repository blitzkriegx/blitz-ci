<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

		body {
			background-color: #fff;
			margin: 40px;
			font-family: Lucida Grande, Verdana, Sans-serif;
			font-size: 14px;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 16px;
			font-weight: bold;
			margin: 24px 0 2px 0;
			padding: 5px 0 6px 0;
		}

		code {
			font-family: Monaco, Verdana, Sans-serif;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

	</style>
</head>
<body>

<h1>Database > <?php echo $_method ?></h1>
<p>
	<a href="?/admin/database/insert">Insert</a>
	<a href="?/admin/database/update">Update</a>
	<a href="?/admin/database/listing">Listing</a>
</p>
<p>Table Example:</p>

<?php
	echo print_array($this->input->post());
if ($entries) {
	foreach ($entries as $prefix => $table) {
		echo "<code><b>$prefix</b>:";
		foreach ($table as $tname => $t) {
			echo "<code><b>$tname</b>:";
			foreach($t as $e)
				foreach($e as $f)
					echo "<code>" . $f . "</code>";
			echo "</code>";
		}
		echo "</code>";
	}
}

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
if ($di != null)
	$di->fields->print_fields();
echo form_submit('submit', "$_method Entry");
echo form_button(array(
                      'name' => 'button',
                      'id' => 'button',
                      'value' => 'true',
                      'type' => 'reset',
                      'content' => 'Reset'));
echo form_close();
?>

<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>

<p><br />Page rendered in {elapsed_time} seconds</p>

</body>
</html>