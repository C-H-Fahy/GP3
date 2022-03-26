<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		/* (Task 3.1) Alex: Clear styling of elements in a given screen */
		h1 { text-align: center; font-size: 2em; font-family: 'Open Sans Light', sans-serif; color: purple; font-weight: 500;}
		.Table__Booking { margin: auto; width: 50%;}
		.dataTablesContainer { font-size: 1em; font-family: 'Open Sans', sans-serif; }
		.DataTables_sort_wrapper { color: purple; }
		div.dataTables_wrapper .ui-widget-header { background: hsl(220, 12%, 95%); border: 0px solid black; box-shadow:0 4px 6px 0 hsla(0,0%,0%,0.2);}
		table.dataTable {box-shadow:0 4px 6px 0 hsla(0,0%,0%,0.2);}
		p.p-centre { text-align: center; font-size: 1em; font-family: 'Open Sans', sans-serif; }
	</style>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>

<h1>Your Bookings</h1>
<p class="p-centre">
	This table keeps track of each customer's Bookings for a scheduled Performance.
</p>
    <div class="Table__Booking">
		<?php echo $output; ?>
    </div>
<script>
function alter_row(delete_url , redirect)
{
	if(confirm('This will delete your booking and allow you to create a new one.'))
	{
		$.ajax({
			url: delete_url,
			dataType: 'json',
			success: function(data)
			{
				if(data.success)
				{
					window.location.href=redirect;

				}
				else
				{
					error_message(data.error_message);
				}
			}
		});
	}

	return false;
}

$('tbody').children().each((i)=>{
  const row = $('tbody').children().eq(i).children();
  const id = row.eq(0).html();
  const pid = row.eq(2).html();
  console.log({id, pid});

  row.eq(5).children().each((ii)=>{
    const btn = row.eq(5).children().eq(ii);
    const link = btn.attr('href');
    const tmp = window.location.href.split('/');
    const CURRENT_PAGE = tmp[tmp.length-1];

    if(link.includes('edit')){
        //split localhost.... and the rows ID
        const x = link.split(CURRENT_PAGE+'/edit/');
        //use a ? like this when adding it back with a name

          btn.attr('href', 'javascript: void(0)');
          btn.attr('onclick', `alter_row('http://localhost:8080/orders/index.php/main/userbooking/delete/${id}', '${x[0]}createbooking?pid=${pid}');`);
        
    }
  });

});
</script>

</body>
</html>
