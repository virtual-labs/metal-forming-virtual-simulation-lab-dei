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
<h2>Applications of Metal Forming</h2><br/>
The list mentioned below outlines some of the important areas of application of products manufactured by metal forming: <br/>
1. Fasteners, such as screws, nuts, bolts, and rivets.<br/>
2. Hand tools, such as hammers, pliers, screwdrivers, and surgical instruments.<br/> 
3. Components for industrial plant equipments, machine tools and automobiles.<br/>
4. Construction elements used in tunneling, mining and quarrying (roofing and walling elements, pit props, etc.).<br/>
5. Fittings used in the building industry, such as for doors and windows.<br/>
6. Containers, such as metal boxes, cans and canisters.<br/><br/>
<center><img src="images/MetalForming/Tools.jpg" width="800" height="400"><br/>Figure: Components manufactured using metal forming process.</center>
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