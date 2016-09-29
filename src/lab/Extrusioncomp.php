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
<div id="header_main">
</div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
echo <<<EOQ
	<li><a href="home.php">Home</a></li>
	<li><a href="Extrusion.php">Extrusion</a></li>
	<li class="dir"><a href="#">Simulation Bench</a>
	<ul>
	<li><a href="Aluminium.php">Simulation bench for aluminium</a></li>
	<li><a href="Titanium.php">Simulation bench for titanium</a></li>		
	</ul> 
	</li>
	<li><a href="Extrusioncomp.php">Comparative Simulation</a></li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Seamless Pipe</a>
	<ul>	
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/8mIMYowzbYE">Seamless pipe</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/Na10qT1cDMQ">Seamless pipe with forging force</a></li>
	</ul>
	</li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/pO88pA3wZws">Pipe Extrusion</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/VJ_UKF6uMwk">Turbine Blade</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/Je-bS79yw88">Golf Stick</a></li>	
	</ul>
	</li>
	<li class="dir"><a href="#">Special Cases</a>
	<ul>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/ypzq7PwnC1U">CASE-1</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/23WMALXZZ0Y">CASE-2</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/k-FZAMpEyr8">CASE-3</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/wVc6VkvklMA">CASE-4</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/SH3Ipq3tdzM">CASE-5</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/R3ILdfi6O2Q">CASE-6</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/tYCxm7icWXw">CASE-7</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/Dc98pn2ba6c">CASE-8</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/fTekwjAQOOk">CASE-9</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/mE7Wf1GFQII">CASE-10</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/bwbIhWyCCVw">CASE-11</a></li>
	</ul> 
	</li>
	<li class="dir"><a href="#">Special Cases</a>
	<ul>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/Angle.mp4">CASE-1</a></li>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/EX1.mp4">CASE-2</a></li>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/EX2.mp4">CASE-3</a></li>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/EX3.mp4">CASE-4</a></li>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/EX4.mp4">CASE-5</a></li>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/EX5.mp4">CASE-6</a></li>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/EX6.mp4">CASE-7</a></li>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/EX7.mp4">CASE-8</a></li>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/EXFin.mp4">CASE-9</a></li>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/EXSlot1.mp4">CASE-10</a></li>
	<li><a href="Extru_Experiment.php?EXTRUSION/SpecialCases/EXSlot2.mp4">CASE-11</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Extrusion.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);margin:auto; width:1024px; min-height:550px;">
<div class="mech" id="press">
<table border="0" cellpadding="2" cellspacing="20" width="100%">
<tr>
<td width="25%">Case-1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:underline;font-weight:bold;" href="Extru_Experiment.php?https://www.youtube.com/embed/1nKgscQjpO0">Simulation</a></td>
<td>-</td>
<td>To study the <b style="font-size:18px; color:#0000FF">effect of solid and pipe</b> extrusion.</td>
</tr>
<tr>
<td>Case-2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:underline;font-weight:bold;" href="Extru_Experiment.php?https://www.youtube.com/embed/ihMNJxOXPDw">Simulation</a></td>
<td>-</td>
<td>To study the <b style="font-size:18px; color:#0000FF">effect of radius</b> during extrusion process.</td>
</tr>
<tr>
<td>Case-3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:underline;font-weight:bold;" href="Extru_Experiment.php?https://www.youtube.com/embed/9hXfec1dU20">Simulation</a></td>
<td>-</td>
<td>To study the <b style="font-size:18px; color:#0000FF">effect of temperature</b> during extrusion process.</td>
</tr>
</table>
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