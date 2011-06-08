<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>BlitzCi Manager</title>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>global.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo JQUI_PATH ?>css/jquery.ui.all.min.css"/>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript" src="<?php echo JS_PATH ?>_init.min.js"></script>
	<script type="text/javascript" src="<?php echo JQUI_PATH ?>jquery.ui.min.js"></script>
</head>
<body>
<script>
	$(function() {
		debug("document::loaded");
		$("#menu1").button({
			icons: {
				primary: "ui-icon-home",
				secondary: "ui-icon-circle-triangle-s"
			}
		}).live('mouseover',
				function() {
					//$(this).next().focus();
				}).next().menu({
					select: function(event, ui) {
						$(this).hide();
						debug("menu::select");
						debug("You've selected: " + ui.item.text());//attr('data-url')
					}
				}).popup();
	});
</script>

<script>
	$(function() {
		$( "#sites" ).buttonset();
	});
	</script>

<style>
	.ui-menu {
		position: absolute;
		width:  200px;
		z-index: 9;
	}
	#toolbar {
		padding: 10px 4px;
	}
	#menubar {
		padding: 2px 5px;
	}
	#sites {
		float: right;
	}
</style>

<div id="menubar" class="ui-widget-header ui-corner-all">
	<button id="menu1">Database</button>
	<ul>
		<li><a href="#1" data-url="admin/database/insert">Insert</a></li>
		<li><a href="#2" data-url="admin/database/update">Update</a></li>
		<li><a href="#3" data-url="admin/database/delete">Delete</a></li>
		<li><a href="#"><hr/></a></li>
		<li><a href="#4" data-url="admin/database/listing">Listing</a></li>
	</ul>

	<span id="sites">
		Site:
		<input type="radio" id="site1" name="repeat" checked="checked" /><label for="site1">Main</label>
		<input type="radio" id="site2" name="repeat" /><label for="site2">Res.</label>
		<input type="radio" id="site3" name="repeat" /><label for="site3">Biz.</label>
	</span>
</div>


	<p><br/>Page rendered in {elapsed_time} seconds</p>
</body>
</html>