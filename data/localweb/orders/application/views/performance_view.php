




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		/* (Task 3.1) Alex: Clear styling of elements in a given screen */
		h1 { text-align: center; font-size: 2em; font-family: 'Open Sans Light', sans-serif; color: purple; font-weight: 500;}
		.Table__Perf { margin: 0 5% 0 5%;}
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

<h1>Performances</h1>
<p class="p-centre">
	This table keeps a record of the scheduled Performances at a given Cinema.
</p>

    <div class="Table__Perf">
		<?php echo $output; ?>
    </div>

<script>
const actions = $('a.edit_button[href]');
actions.each((i)=>{
    const btn = actions.eq(i);
    const link = btn.attr('href');
    const tmp = window.location.href.split('/');
    const CURRENT_PAGE = tmp[tmp.length-1].split("?")[0];

    if(link.includes('read')){
        //split localhost.... and the rows ID
        const x = link.split(CURRENT_PAGE+'/read/');
        //use a ? like this when adding it back with a name
        console.log({x, link, CURRENT_PAGE});
<?php
 if($_SESSION["role"] != 'member'){
      // Check if user is empty
      if(!isset($_GET['uid']) || empty(trim($_GET['uid']))){
        $err = "Invalid User";
      } else{
        $uid = $_GET['uid'];
        echo "btn.attr('href', x[0] + 'createbooking?pid='+x[1]+'&uid='+$uid);";
      }
    }else{
      echo "btn.attr('href', x[0] + 'createbooking?pid='+x[1]);";
    }
?>
        btn.children().eq(1).html('Book Now');
    }

    if(link.includes('edit')){
        //split localhost.... and the rows ID
        const x = link.split(CURRENT_PAGE+'/edit/');
        //use a ? like this when adding it back with a name
        <?php 
        if($_SESSION['role'] !== 'manager'){
          echo "btn.remove()";
        }else{
          //echo "btn.attr('href', x[0] + 'createbooking?pid='+x[1]);";
        }
        ?>
    }

});

<?php if($_SESSION['role'] !== 'manager'){
     echo "$('.add_button').remove();";   
} ?>

const deletebtn = $('a.delete_button[onclick]');
deletebtn.each((i)=>{
    const btn = deletebtn.eq(i);
    const tmp = window.location.href.split('/');
    const CURRENT_PAGE = tmp[tmp.length-1].split("?")[0];
    const x = window.location.href.split(CURRENT_PAGE)[0];

    const id = btn.parent().parent().children().eq(0).html();
    const onclick = `if(confirm('Are you sure you want to cancel a booking')) window.location.href = '${x}cancel_check?PerfID=' + ${id}`;
    <?php
    if($_SESSION['role'] !== 'manager'){
         echo "btn.remove()";
    }else{
          echo "btn.attr('href', 'javascript: void(0)');";
          echo "btn.attr('onclick', onclick);";
    }
    ?>
});
</script>

</body>
</html>

