<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		h1 { text-align: center; 	font-family: Calibri; }
		p.p-centre { text-align: center; font-family: Arial; }
		#nav { font-family: Arial; font-size: 14px; width: 100%; float: center; margin: 0 0 1em 0; padding: 0; list-style: none;}
		#cogs { display: block; padding-top: 20px; margin-left: auto; margin-right: auto; }		
	</style>
</head>
<body>

<h1>Mice cinemas</h1>

<p class="p-centre">You are <?php 
session_start();

if($_SESSION && $_SESSION["loggedin"]){
    echo " a " . $_SESSION["role"];
}else{
    echo " not logged in";
}
?>.</p>


</div>
</body>
</html>
