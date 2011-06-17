<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>BlitzCi Manager</title>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>global.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo JQUI_PATH ?>css/jquery.ui.all.min.css"/>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript" src="<?php echo JS_PATH ?>_init.min.js"></script>
	<script type="text/javascript" src="<?php echo JQ_PATH ?>jquery.guid.js"></script>
	<script type="text/javascript" src="<?php echo JQUI_PATH ?>jquery.ui.min.js"></script>
	<script type="text/javascript" src="http://jqueryui.com/themeroller/themeswitchertool/"></script>

	<script type="text/javascript" src="<?php echo JS_PATH ?>blitz-ci/ui.table.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH ?>blitz-ci/ui.menu.js"></script>

	<style>
		#page {
			padding: 40px;
		}
	</style>
</head>
<body>
<div class="ui-widget">
	<div id="menu" class="ui-widget-header ui-helper-clearfix ui-state-default ui-corner-bottom">
		<button id="menu1" class="top-menu">Menu 1</button>
		<ul>
			<li><a href="#1" data-url="admin/database/insert">Insert</a>
				<ul class="submenu">
					<li><a href="#1" data-url="admin/database/insert">Insert</a></li>
					<li><a href="#2" data-url="admin/database/update">Update</a></li>
					<li><a href="#3" data-url="admin/database/delete">Delete</a>
						<ul class="submenu">
							<li><a href="#1" data-url="admin/database/insert">Insert</a></li>
							<li><a href="#2" data-url="admin/database/update">Update</a></li>
							<li><a href="#3" data-url="admin/database/delete">Delete</a></li>
							<li><a href="#">
								<hr/>
							</a></li>
							<li><a href="#4" data-url="admin/database/listing">Listing</a></li>
						</ul>
					</li>
					<li><a href="#">
						<hr/>
					</a></li>
					<li><a href="#4" data-url="admin/database/listing">Listing</a></li>
				</ul>
			</li>
			<li><a href="#2" data-url="admin/database/update">Update</a></li>
			<li><a href="#3" data-url="admin/database/delete">Delete</a>
				<ul class="submenu">
					<li><a href="#1" data-url="admin/database/insert">Insert</a></li>
					<li><a href="#2" data-url="admin/database/update">Update</a></li>
					<li><a href="#3" data-url="admin/database/delete">Delete</a></li>
					<li><a href="#">
						<hr/>
					</a></li>
					<li><a href="#4" data-url="admin/database/listing">Listing</a></li>
				</ul>
			</li>
			<li><a href="#">
				<hr/>
			</a></li>
			<li><a href="#4" data-url="admin/database/listing">Listing</a></li>
		</ul>

		<button id="menu2" class="top-menu">Menu 2</button>
		<ul>
			<li><a href="#1" data-url="admin/database/insert">Insert</a></li>
			<li><a href="#2" data-url="admin/database/update">Update</a>
				<ul class="submenu">
					<li><a href="#1" data-url="admin/database/insert">Insert</a></li>
					<li><a href="#2" data-url="admin/database/update">Update</a></li>
					<li><a href="#3" data-url="admin/database/delete">Delete</a></li>
					<li><a href="#">
						<hr/>
					</a></li>
					<li><a href="#4" data-url="admin/database/listing">Listing</a></li>
				</ul>
			</li>
			<li><a href="#3" data-url="admin/database/delete">Delete</a></li>
			<li><a href="#">
				<hr/>
			</a></li>
			<li><a href="#4" data-url="admin/database/listing">Listing</a></li>
		</ul>


		<button id="menu3" class="top-menu">Menu 3</button>
		<ul>
			<li><a href="#1" data-url="admin/database/insert">Insert</a></li>
			<li><a href="#2" data-url="admin/database/update">Update</a></li>
			<li><a href="#3" data-url="admin/database/delete">Delete</a></li>
			<li><a href="#">
				<hr/>
			</a></li>
			<li><a href="#4" data-url="admin/database/listing">Listing</a>
				<ul class="submenu">
					<li><a href="#1" data-url="admin/database/insert">Insert</a></li>
					<li><a href="#2" data-url="admin/database/update">Update</a></li>
					<li><a href="#3" data-url="admin/database/delete">Delete</a>
						<ul class="submenu">
							<li><a href="#1" data-url="admin/database/insert">Insert</a></li>
							<li><a href="#2" data-url="admin/database/update">Update</a></li>
							<li><a href="#3" data-url="admin/database/delete">Delete</a></li>
							<li><a href="#">
								<hr/>
							</a></li>
							<li><a href="#4" data-url="admin/database/listing">Listing</a></li>
						</ul>
					</li>
					<li><a href="#">
						<hr/>
					</a></li>
					<li><a href="#4" data-url="admin/database/listing">Listing</a></li>
				</ul>
			</li>
		</ul>

		<button id="menu4" class="top-menu">Menu 4</button>

		<div id="switcher"></div>

		<div id="sites">
			<button class="sites">Site:</button>
			<input type="radio" id="site1" name="repeat" checked="checked"/><label for="site1">Main</label>
			<input type="radio" id="site2" name="repeat"/><label for="site2">Res.</label>
			<input type="radio" id="site3" name="repeat"/><label for="site3">Biz.</label>
		</div>


	</div>
	<div id="page" class="ui-widget-content ui-corner-top">

		<h1>Page Content</h1>

		<h2>Sub Content</h2>

		<h3>Subsub</h3>

		<p>
			Regular content. <a href="#">This is a link!</a>
		</p>


		<style>


		</style>
		<script type="text/javascript">

		</script>

		<div class="ui-table">
			<div class="ui-table-header">
				<div>Column 1</div>
				<div>Column 2</div>
				<div>Column 3</div>
				<div>Column 4</div>
			</div>
			<div class="ui-table-content">
				<div>
					<div>Data A</div>
					<div>Data B</div>
					<div>Data C</div>
					<div>Data D</div>
				</div>
				<div>
					<div>Data A</div>
					<div>Data B</div>
					<div>Data C</div>
					<div>Data D</div>
				</div>
				<div>
					<div>Data A</div>
					<div>Data B</div>
					<div>Data C</div>
					<div>Data D</div>
				</div>
				<div>
					<div>Data A</div>
					<div>Data B</div>
					<div>Data C</div>
					<div>Data D</div>
				</div>
			</div>
		</div>
	</div>
</div>

<p><br/>Page rendered in {elapsed_time} seconds</p>

</body>
</html>