<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		#nav {display: inline-grid; grid-template-columns: auto auto auto auto auto auto auto auto; justify-content: center; font-family: Arial; font-size: 14px; width: 100%; float: left; margin: 0 0 1em 0; padding: 0; list-style: none;}
		#nav {list-style: none; border:0;}
		#rightnav { list-style: none; }
		#nav li { float: left; }
		#rightnav li { float: right; }
	
		#nav li a { font-family: 'Open Sans', sans-serif; font-size: 1em; transition-duration: 0.1s; margin: 0 3px 0 0; display: block; padding: 8px 15px; text-decoration: none; color: #000; background-color: #f2f2f2; }
		#nav li a:hover {background-color: purple; color: white; transition-duration: 0.2s;}
		#nav a:link, a:visited {border-radius: 6px 6px 6px 6px; }
		
		.fg-toolbar_ui-toolbar_ui-widget-header_ui-corner-tl_ui-corner-tr_ui-helper-clearfix {
			background: purple;
		}
	</style>
</head>
<body>
	<div>
		<ul id="nav">
			<li><a href='<?php echo site_url('')?>'>Home</a></li>
			<li><a href='<?php echo site_url('main/cinema')?>'>Cinema</a></li>
			<li><a href='<?php echo site_url('main/screen')?>'>Screen</a></li>
			<li><a href='<?php echo site_url('main/film')?>'>Films</a></li>
			<li><a href='<?php echo site_url('main/member')?>'>Members</a></li>
			<li><a href='<?php echo site_url('main/performance')?>'>Performance</a></li>
			<li><a href='<?php echo site_url('main/booking')?>'>Booking</a></li>
			<li><a href='<?php echo site_url('main/querynav')?>'>Queries</a></li>
		</ul>		
	</div>
</body>
</html>
