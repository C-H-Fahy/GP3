<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		/* (Task 3.1) Alex: Clear styling of elements in a given screen */
		h1 { text-align: center; font-size: 2em; font-family: 'Open Sans Light', sans-serif; color: purple; font-weight: 500;}
		.Table__Cinemas { margin: auto; width: 50%;}
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

<h1>Cinemas</h1>
<p class="p-centre">
	This table provides a record of all Cinemas present on the system.
</p>
    <div class="Table__Cinemas">
		<?php echo $output; ?>
    </div>


<script>
const actions = $('a.edit_button[href]');
actions.each((i)=>{
    const btn = actions.eq(i);
    const link = btn.attr('href');
    const tmp = window.location.href.split('/');
    const CURRENT_PAGE = tmp[tmp.length-1];

    if(link.includes('read')){
        //users can still view
    }

    if(link.includes('edit')){
        //split localhost.... and the rows ID
        const x = link.split(CURRENT_PAGE+'/edit/');
        //use a ? like this when adding it back with a name
        <?php 
        if($_SESSION['role'] !== 'manager'){
          echo "btn.attr('href', '');";
        }else{
          //allow default edit
        }
        ?>
    }

});

const deletebtn = $('a.delete_button[onclick]');
deletebtn.each((i)=>{
    const btn = deletebtn.eq(i);
    <?php
    if($_SESSION['role'] !== 'manager'){
      echo "btn.attr('onclick', '');";
    }else{
      //allow default edit
    }
    ?>
});
</script>
</body>
</html>
