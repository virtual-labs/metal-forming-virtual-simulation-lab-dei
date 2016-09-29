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
echo <<<EOQ
	<li><a href="home.php">Home</a></li>
	<li><a href="Gear.php">Gear Manufacturing</a></li>	
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Gear</a>
	<ul>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/D6YR5faHQW8">Gear setup</a></li>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/aMaUviFYOLM">Gear with strain</a></li>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/66lKziHcVBU">Gear with curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Bevel Gear</a>
	<ul>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/Nk5TE3EgtRc">Bevel gear step-1</a></li>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/XtJd1N1JKgY">Bevel gear step-2</a></li>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/krjK2leLfgg">Bevel gear with strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_Gear.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Gear</h2><br/>
A gear is a rotating machine part having cut teeth, or cogs, which mesh with another toothed part in order to transmit torque. Two or more gears working in tandem are called a transmission and can produce a mechanical advantage through a gear ratio and thus may be considered a simple machine. Geared devices can change the speed, torque, and direction of a power source.
<br/><center><img src="images/Gear.png" alt="Gear" height="160" width="220"><br/>Figure: Gear</center><br/>
<span class="blue">Manufacturing Gears by Extrusion</span>: Extruding is used to form teeth on long rods, which are then cut into usable lengths and machined for bores and keyways etc. Nonferrous materials such as Aluminium and Copper alloys are commonly extruded rather than steels. This result in good surface finishes with clean edges and pore free dense structure with higher strength.
<br/><br/><center><img src="images/GearsManufacturing.png" alt="Gears Manufacturing"><br/>Figure: Gears Manufacturing</center><br/>
References:<br/>
http://en.wikipedia.org/wiki/Gear<br/>
http://nptel.iitm.ac.in/courses/IIT-MADRAS/Machine_Design_II/pdf/2_5.pdf
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