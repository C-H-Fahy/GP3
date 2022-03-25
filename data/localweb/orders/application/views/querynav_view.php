<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		/* (Task 3.1) Alex: Clear styling of elements in a given screen */
		h1 { text-align: center; font-size: 2em; font-family: 'Open Sans Light', sans-serif; color: purple; font-weight: 500;}
		p.p-centre { text-align: center; font-size: 1em; font-family: 'Open Sans', sans-serif; }
		
		button { font-family: 'Open Sans', sans-serif; font-size: 0.9em; border: 0px solid; padding: 5px 10px 5px; border-radius: 6px; transition-duration: 0.2s;}
		button:hover { background: purple; color: white; transition-duration: 0.1s; cursor: pointer;}	
	</style>
</head>
<body>
<?php
if($_SESSION['role'] !== 'manager'){
    echo "You do not have permission to view this page";
    return;
}
?>
<h1>Queries</h1>
<div align='center'>
	<p class="p-centre">
		Here you can view pre-defined queries regarding profits and earnings.
	</p>
	<button type="submit" onclick="location.href='<?php echo site_url('main/query1')?>'">Profits From Films</button>
	<button type="submit" onclick="location.href='<?php echo site_url('main/query2')?>'">Profits From Bookings</button>
	<button type="submit" onclick="location.href='<?php echo site_url('main/query3')?>'">Profits From Performances</button>
</div>
    
</body>
</html>
