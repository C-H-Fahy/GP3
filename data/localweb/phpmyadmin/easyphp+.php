<style type="text/css" media="all">
#pma_module {clear:both;margin:2px 0px 2px 0px;padding:5px;background-color:#EEEEEE;-moz-border-radius:2px;-khtml-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;}
#pma_module .module_name {clear:both;float:left;width:500px;margin:0px;padding:0px;color:#306085;font-size:11px;}

#pma_module .module_button {float:right;width:120px;text-align:center;padding:1px;margin:0px 0px 0px 0px;}
#pma_module .module_button a {width:100%;display:block;padding:1px 0px 1px 0px;margin:0px;color:white;background-color:#63809F;-moz-border-radius:2px;-khtml-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;}
#pma_module .module_button a:hover {color:white;background-color:#31699F;}

#pma_module .module_infobulle {margin:0px 4px 0px 4px;padding:0px;}
#pma_module .module_infobulle pre {margin:0px;padding:0px;font-size:11px;}
#pma_module .module_infobulle .info {position:relative;z-index:24;margin:0px 0px 0px 0px;padding:0px 2px 0px 2px;text-align:center;color:#cfcfcf;font-size:11px;font-weight:bold;background-color:#dfdfdf;text-decoration:none;-moz-border-radius:2px;-khtml-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;}
#pma_module .module_infobulle .info:hover{z-index:25;background-color:#FBD825;color:#895902;}
#pma_module .module_infobulle .info .info_frame{display:none;}
#pma_module .module_infobulle .info:hover .info_frame{display:block;position:absolute;top:0px;left:9px;width:400px;text-align:left;margin:0px;padding:0px 15px 15px 15px;background-color:#FBD825;color:black;font-size:9px;font-weight:normal;-moz-border-radius:3px;-khtml-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;}
</style>

<?php
$module_version = '4.1.4';
$module_info = array();
$module_info = array(
	"module_name" 		=> array(
		"en"	=>	"MySQL Administration : PhpMyAdmin",
		"fr"	=>	"Administration MySQL : PhpMyAdmin"
		),
	"module_version" 	=> $module_version,
	"en"	=>	array(
		"Application"	=>	array(
				"Name"		=>	"PhpMyAdmin",
				"Version"	=>	$module_version,
				"Installation date"	=>	"2015-09-03 14:44:08",
				"Website"	=>	"<a href='http://www.phpmyadmin.net/' target='_blank'>www.phpmyadmin.net</a>"
		),
		"How to uninstall this module ?"	=>	array(
				"If you want to uninstall this module, you just have to<br />delete the folder"	=>	"<br />[modules folder]\\phpmyadmin414x150903144408",
		),	
	),
	"fr"	=>	array(
		"Application"	=>	array(
				"Nom"		=>	"PhpMyAdmin",
				"Version"	=>	$module_version,
				"Date d'installation"	=>	"2015-09-03 14:44:08",
				"Site web"	=>	"<a href='http://www.phpmyadmin.net/' target='_blank'>www.phpmyadmin.net</a>"
		),
		"Comment d&eacute;sinstaller ce module ?"	=>	array(
				"Si vous voulez d&eacute;sinstaller ce module, il suffit de supprimer le r&eacute;pertoire"	=>	"<br />[modules folder]\\phpmyadmin414x150903144408",
		),
	),	
);

$module_i18n = array();
$module_i18n = array(
	"en"	=>	array(
		"open"	=>	"open"
	),
	"fr"	=>	array(
		"open"	=>	"ouvrir"
	),
);


/* -- INFO -- */
$infobulle = '<pre>';
foreach($module_info[$lang] as $section_name => $section) {
	$infobulle .= '<br /><b style="color:#AF2D00">' . $section_name . '</b><br />';
	foreach($section as $title => $text) {
		$infobulle .= '<b>' . $title . '</b> : ' . $text . '<br />';
	}
}
$infobulle .= '</pre>';
/* ---------- */

echo '<div id="pma_module">';
	echo '<div class="module_name" style="width:480px;padding:2px 0px 0px 24px;background-image:url(../modules/' . $file . '/favicon.png);background-repeat:no-repeat;">';
		echo $module_info['module_name'][$lang] . ' ' . $module_info['module_version'];
		echo '<span class="module_infobulle"><span class="info">?<span class="info_frame">' . $infobulle . '</span></span></span>';
	echo '</div>';
	echo '<div class="module_button"><a href="../modules/' . $file . '" target="_blank">' . $module_i18n[$lang]['open'] . '</a></div>';
	echo '<br style="clear:both;" / >';
echo '</div>';
?>
