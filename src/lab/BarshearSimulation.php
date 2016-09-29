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
	<li><a href="Barshear.php">Bar Shearing</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="BarshearSimulation.php?https://www.youtube.com/embed/a1RYCKkFBAA">Bar Shearing</a></li>
	<li><a href="BarshearSimulation.php?https://www.youtube.com/embed/6vM_LKZpjbY">Bar Shearing with forging force</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Barshear.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div><center>
<?php
$value = $_SERVER['QUERY_STRING'];
$plist = basename($_SERVER['REQUEST_URI']);
print <<<EOQ
<iframe width="1020" height="600" src=$value?rel=0&autoplay=1&loop=1&playlist=$plist frameborder="0" allowfullscreen></iframe>
EOQ;
if(stristr($value,"a1RYCKkFBAA"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation shows a Bar shearing process. The green and yellow dies are movable whereas blue and pink are stationary. On the top right one can see the initial and the sheared billet. The bottom right shows the top shear and bottom shear dies used in the process.
On the left one can see the complete simulation of bar shearing process. The press applies force on the top shear die shown in green. The bottom shear die yellow in colour rests on a hydraulic cushion and moves when a force on it reaches 5 Ton or more.
</td></tr></table>
<?php
}elseif(stristr($value,"6vM_LKZpjbY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation shows a Bar shearing process with stress and force analysis. On the top right corner normal stress distribution on the billet can be seen as the simulation is under progress. 
On the bottom right corner the graph between the pilot height and force in tonnes experienced by the top shear yellow die can be seen. The maximum force reached during the process is 8.1 tonnes.
</td></tr></table>
<?php
}
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
</center></div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>	
</body>
</html>