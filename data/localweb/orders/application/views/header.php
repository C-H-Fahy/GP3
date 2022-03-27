<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
        .nav {display: inline-grid; grid-template-columns: auto auto auto auto auto auto auto auto auto auto; justify-content: center; font-family: 'Open Sans', sans-serif; font-size: 14px; width: 100%; float: left; margin: 0 0 1em 0; padding: 0; list-style: none;}
        .nav {list-style: none; border:0;}
        .rightnav { list-style: none; }
        .nav li { float: left; }
        .rightnav li { float: right; }
	
        .nav li a.button { font-family: 'Open Sans', sans-serif; font-size: 1em; transition-duration: 0.1s; margin: 0 3px 0 0; display: block; padding: 8px 15px; text-decoration: none; color: #000; background-color: #f2f2f2; }
        .nav li a.button:hover {background-color: purple; color: white; transition-duration: 0.2s;}
        .nav a.button:link, a.button:visited {border-radius: 6px 6px 6px 6px; }
		
        a.button-logout, a.button-logout:visited { border-radius: 6px 6px 6px 6px; font-family: 'Open Sans', sans-serif; font-size: 1em; transition-duration: 0.1s; margin: 0 3px 0 30px; display: block; padding: 8px 15px; text-decoration: none; color: white; background-color: purple; }
        a.button-logout:hover {background-color: black; transition-duration: 0.2s;}

        .fg-toolbar_ui-toolbar_ui-widget-header_ui-corner-tl_ui-corner-tr_ui-helper-clearfix {
            background: purple;
        }

    </style>
</head>
<body>
    <div>
        <?php
        session_start();
        if($_SESSION && $_SESSION["loggedin"] === 1){
            echo "<ul class='nav'><li><a class='button' href='" . site_url('') . "'>Home</a></li>" 
                . "<li><a class='button' href='" . site_url('main/cinema') . "'>Cinemas</a></li>"
                . "<li><a class='button' href='" . site_url('main/performance') . "'>Performances</a></li>";
          if($_SESSION["role"] !== 'member')
            echo "<li><a class='button' href='" . site_url('main/screen') . "'>Screens</a></li>"
                . "<li><a class='button' href='" . site_url('main/film') . "'>Film</a></li>"
                . "<li><a class='button' href='" . site_url('main/member') . "'>Members</a></li>"
                . "<li><a class='button' href='" . site_url('main/booking') . "'>Bookings</a></li>"
                . "<li><a class='button' href='" . site_url('main/checkin') . "'>Checkin Guest</a></li>";
          if($_SESSION["role"] === 'manager')
                echo "<li><a class='button' href='" . site_url('main/querynav') . "'>Queries</a></li>";

            echo "<li><a class='button-logout' href='" . site_url('main/login') . "'>Log Out</a></li>";
        }
        ?>
    </div>
</body>
</html>



