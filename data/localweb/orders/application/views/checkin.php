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
</head>
<body>

<?php

$init_view = "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method=\"post\">"
.            "<div class=\"form-group\">"
.                "<label>Please enter a booking ID below</label>"
.                "<input autofocus type=\"text\" name=\"id\" class=\"form-control\">"
.            "</div>    "
.            "<div class=\"form-group\">"
.                "<input type=\"submit\" class=\"btn btn-primary\" value=\"Check in\">"
.            "</div>"
.        "</form>";
$button = "<input autofocus type=\"button\" class=\"btn btn-primary\" value=\"Back\" onclick=\"window.location.href='".site_url('main/checkin?')."'\">";

if($_SESSION['role'] !== 'usher'){
    echo "You do not have permission to view this page";
    return;
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = trim($_POST["id"]);

    // Check if id empty
    if(empty($id)){
        echo $init_view;
    } else{
        $sql = "SELECT b.member, b.seats, p.time, c.name, f.title "
              ."FROM booking AS b "
              ."INNER JOIN performance p ON p.id=b.performance "
              ."INNER JOIN cinema c ON c.id=p.cinema "
              ."INNER JOIN film f ON f.id=p.film "
              ."WHERE b.id = ?";
  
        $query = $this->db->query($sql, [$id]); 
        $valid = $query->num_rows() == 1;          

        if($valid){
                    // Bind result variables
                    $row = $query->row();
                    $time = $row->time;
                    $member = $row->member;
                    $seats= $row->seats;
                    $name = $row->name;
                    $title = $row->title;
                    echo "This showing is valid for <b>".$seats."</b> seats at <b>".$name."</b> for the <b>".$time."</b> showing of <b>".$title."</b>";
        }else{
		$sql = "INSERT INTO entrylogs(date, time) VALUES(NOW(), NOW());";
         
        	$query = $this->db->query($sql); 
            	echo "That is not a valid booking ID<br>This attempt has been logged.";
        }

	echo $button;
    }
}else{
        echo $init_view;
}
?>
</body>
</html>
