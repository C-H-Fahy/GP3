<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		/* (Task 3.1) Alex: Clear styling of elements in a given screen */
		h1 { text-align: center; font-size: 2em; font-family: 'Open Sans Light', sans-serif; color: purple; font-weight: 500;}
		.Table__Members { margin: 0 5% 0 5%; }
		.dataTablesContainer { font-size: 1em; font-family: 'Open Sans', sans-serif; }
		.DataTables_sort_wrapper { color: purple; }
		div.dataTables_wrapper .ui-widget-header { background: hsl(220, 12%, 95%); border: 0px solid black; box-shadow:0 4px 6px 0 hsla(0,0%,0%,0.2);}
		table.dataTable {box-shadow:0 4px 6px 0 hsla(0,0%,0%,0.2);}
		p.p-centre { text-align: center; font-size: 1em; font-family: 'Open Sans', sans-serif; }
	</style>
<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>

<?php
if($_SESSION['role'] === 'member' || $_SESSION['role'] === 'usher'){
    echo "You do not have permission to view this page";
    return;
}

?>

<h1>Members</h1>
	<p class="p-centre">
		This table documents registered members and staff on the system.
	</p>
	<div class="Table__Members">
		<?php echo $output; ?>
<script>
const btn = $('.add_button');
const link = btn.attr('href');
const tmp = window.location.href.split('/');
const CURRENT_PAGE = tmp[tmp.length-1];
const x = link.split(CURRENT_PAGE+'/add');
btn.attr('href', x[0] + 'register');

$('tbody').children().each((i)=>{
  const row = $('tbody').children().eq(i).children();
  const uid = row.eq(0).html();
  const stat = row.eq(4).html();
  
  const onclickBook = stat !== 'Active' ? `onclick="alert('Member does not have an active account.')"` : `href="${x[0]}performance?uid=${uid}"`;

  row.eq(6).prepend(
	`<a href="${x[0]}userbooking?uid=${uid}" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
		<span class="ui-button-icon-primary ui-icon ui-icon-document"></span>
		<span class="ui-button-text">&nbsp;View Bookings</span>
	</a>`);

  row.eq(6).prepend(
	`<a ${onclickBook} class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
		<span class="ui-button-icon-primary ui-icon ui-icon-document"></span>
		<span class="ui-button-text">&nbsp;Book</span>
	</a>`);

});
</script>

    </div>
</body>

</html>
