<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body id="draggingDisabled" bgcolor="#FFFFFF">
<div id="header_main"></div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
include("mainmenu.php");
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Metal Forming</h2><br/>
The term metal forming refers to a group of manufacturing methods by which the given material,	usually shapeless or of a simple geometry is transformed into a useful part without change in the mass or composition of the material.
This part usually has a complex geometry with well-defined (a) shape, (b) size, (c) accuracy and tolerances, (d) appearance and (e) properties.
Metal forming processes such as cold and hot forging, extrusion, rolling, bending and deep drawing where metal is formed by plastic deformation. Desirable material properties for forming include low yield strength and high ductility. These properties are affected by temperature and rate of deformation (strain rate). When the work temperature is raised, ductility 
is increased and yield strength is decreased. The effect of temperature gives rise to distinctions between<span class="blue"> COLD FORMING </span>i.e. billet initially at room temperature,<span class="blue"> WARM FORMING</span> i.e. billet heated above room temperature, but below the recrystallization temperature 
of the billet material, and<span class="blue"> HOT FORMING</span> i.e. billet heated above the recrystallization temperature. For example, the yield stress of a metal increases with deformation i.e. strain during cold forming. In hot forming, however, the yield stress, in general, increases with deformation strain rate. Forming processes are especially attractive in cases where:<br><br>
•The part geometry is of moderate complexity and the production volumes are large, so that tooling costs per unit product can be kept low (e.g., automotive applications) or<br><br>
•The part properties and metallurgical integrity are extremely important (e.g., load carrying aircraft, jet engine, and turbine components) The design, analysis and optimization of 
forming processes require: Engineering knowledge regarding metal flow, stresses and heat transfer.
</div>
<?php
 	//Opening file to get counter value
	$fp = fopen ("counter.txt", "r");
	$count_number = fread ($fp, filesize ("counter.txt"));
	fclose($fp);
	$counter = (int)($count_number) + 1;
    $count_number = (string)($counter);
	$fp = fopen ("counter.txt", "w");
	fwrite ($fp, $count_number);
	fclose($fp);
?>
</div> 
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>