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
	<li class="dir"><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a>
	<ul>
	<li><a href="Rolling_Process.php">Rolling Process</a></li>
	<li><a href="Ring_Rolling.php">Ring Rolling</a></li>
	<li><a href="ThreadRolling.php">Thread Rolling</a></li>
	</ul>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="WedgeSimulation.php?https://www.youtube.com/embed/IiRYd57_BGc" title="Transverse Wedge Rolling">Using Planetary Rolls</a></li>
	<li><a href="WedgeSimulation.php?https://www.youtube.com/embed/d8lFBeBmr2g" title="Transverse Wedge Rolling">Using Three Rolls</a></li>
	</ul>
	</li>
	</li>
	<li><a href="MCQ_WedgeRolling.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Transverse Wedge Rolling</h2><br>
Transverse Wedge Rolling is a process in which a round billet is inserted between appropriately shaped rolls or flat plates that deform the workpiece as it rotates. These tools incorporate a wedge shaped profile, from which the process takes its name.<br/><br/>
<span class="blue">There are several versions of Transverse Wedge Rolling:</span><br/><br/>
• If rolls are used, they rotate in the same direction and drive the workpiece. Here either two or three rolls (figure1) can be used.<br/> 
• If flat tools are used, they move in opposite directions while rotating the workpiece between them.<br/>
• A planetary system with a single large work roll and a fixed work segment is possible(figure2), or a concave-tooling segments can also be used.<br/>
<center><img src="images/Rolling/WedgeRolling/PlanetaryRolls.jpg" width="350" height="380" alt="Transverse Wedge Rolling using planetary rolls"><br/>Figure 1: Transverse Wedge Rolling using planetary rolls<br/><br/>
<img src="images/Rolling/WedgeRolling/ThreeRolls.jpg" width="370" height="380" alt="Transverse Wedge Rolling using three rolls"><br/>Figure 2: Transverse Wedge Rolling using three rolls
</center>
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