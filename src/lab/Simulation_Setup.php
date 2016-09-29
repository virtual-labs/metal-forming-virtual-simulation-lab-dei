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
<h2>Simulation of Upsetting Process</h2><br>
<span class="blue">PURPOSE</span><br /> The purpose of upsetting is to reduce the height of a billet while increasing its diameter.  Thus, the desired material distribution, the desired geometry and size 
are achieved. In hot forging, upsetting is also used to break scale from the surface of a heated billet. In cold, warm and hot forging the upset billet is usually used for subsequent forging operations<br />
<br/>The following pages represent some typical forming simulations as well as a typical upset forging process in a hydraulic press.<br/>A clear understanding of the metal forming process is important to interpret the simulation results. 
Therefore a few variables and a graph of the simulation stages will be presented to clarify the overall forming process.<br /><br /> <span class="blue">A TYPICAL UPSET FORGING PROCESS WITH FINITE ELEMENT SIMULATION</span><br><br>
<table><tr><td>Material</td><td>: Aluminium</td></tr>
<tr><td>Dimension </td><td>:  Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100 mm</td></tr>
<tr><td>Billet Temperature</td><td>: 125°C</td></tr>
<tr><td>Die Temperature</td><td>: 20°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>: Hydraulic</td></tr>
<tr><td>Ram Speed</td><td>: 1mm/s</td></tr>
</table>
<center><img src="images/MetalForming/SimSetup.jpg" alt="Conditions of Metal Forming Simulations" width="750" height="450" /><br/>Figure:1 Conditions during Simulation<br/><br/>
<iframe width="600" height="400" src="https://www.youtube.com/embed/kqJR-_fp8AY?rel=0" frameborder="0" allowfullscreen></iframe></center>
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