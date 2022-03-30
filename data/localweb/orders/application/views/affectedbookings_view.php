


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		/* (Task 3.1) Alex: Clear styling of elements in a given screen */
		h1 { text-align: center; font-size: 2em; font-family: 'Open Sans Light', sans-serif; color: purple; font-weight: 500;}
		.Table__Perf { margin: auto; width: 50%;}
		.dataTablesContainer { font-size: 1em; font-family: 'Open Sans', sans-serif; }
		.DataTables_sort_wrapper { color: purple; }
		div.dataTables_wrapper .ui-widget-header { background: hsl(220, 12%, 95%); border: 0px solid black; box-shadow:0 4px 6px 0 hsla(0,0%,0%,0.2);}
		table.dataTable {box-shadow:0 4px 6px 0 hsla(0,0%,0%,0.2);}		
		p.p-centre { text-align: center; font-size: 1em; font-family: 'Open Sans', sans-serif; }
	</style>
	

<body>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>

<h1>Performances</h1>
<p class="p-centre">
	This table shows all the cancelled bookings.
</p>


<button onclick="location.href='<?php echo site_url('main/performance')?>'">Return to performances view</button>

 
    <div class="Table__Perf">
		<?php echo $output; ?>
    </div>
<script>
const btn = $('.add_button');
btn.remove();

$('tbody').children().each((i)=>{
  const row = $('tbody').children().eq(i).children();
  row.eq(3).html('');
});
</script>
</body>
</html>
