<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		h1 { text-align: center; 	font-family: Calibri; }
		p.p-centre { text-align: center; font-family: Arial; }
		#nav { font-family: Arial; font-size: 14px; width: 100%; float: center; margin: 0 0 1em 0; padding: 0; list-style: none;}
		#cogs { display: block; padding-top: 20px; margin-left: auto; margin-right: auto; }
		
		/* Alex: Added tooltip CSS to hide the tooltip text (use .tooltiptext class to use tooltips) */
		.tooltip { position: relative; display: inline-block; border-bottom: 1px dotted black; }
		.tooltip .tooltiptext { visibility: hidden; width: 120px; background-color: #555; color: #fff; text-align: center; padding: 5px 0; border-radius: 6px; position: absolute; z-index: 1; bottom: 125%; left: 50%; margin-left: -60px; opacity: 0; transition: opacity 0.3s; }
  
		/* Tooltip arrow */
		.tooltip .tooltiptext::after { content: ""; position: absolute; top: 100%; left: 50%; margin-left: -5px; border-width: 5px; border-style: solid; border-color: #555 transparent transparent transparent; }
  
		/* Show the tooltip text when you mouse over the tooltip container */
		.tooltip:hover .tooltiptext { visibility: visible; opacity: 1; }	
	</style>
</head>
<body>

<h1>Mice Cinemas</h1>

<p class="p-centre">
	Are you a <a class="tooltip">member<span class="tooltiptext">Members can access bookings they've made.</span></a> or the <a class="tooltip">director<span class="tooltiptext">The director can access more than the user.</span></a>? 
</p>
 <ul id="nav">
 <li> <a href='<?php echo site_url('')?>'>Member</a></li>
 <li> <a href='<?php echo site_url('')?>'>Director</a></li>
 </ul>




</div>
</body>
</html>
