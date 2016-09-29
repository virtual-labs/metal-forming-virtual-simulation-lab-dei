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
	<li><a href="Swaging.php">Swaging</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="SwagingSimulation.php?https://www.youtube.com/embed/ocIGt5FCL7U">SWAGING</a></li>
	<li><a href="SwagingSimulation.php?https://www.youtube.com/embed/8jjSTsh17fw">SWAGING WITH EQUIVALENT STRAIN</a></li>
	<li><a href="SwagingSimulation.php?https://www.youtube.com/embed/cdd6oOoN4tY">SWAGING WITH GRAPH</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Swaging.php">Self Check Quiz</a></li>
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
if(stristr($value,"cdd6oOoN4tY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Swaging is a process that is used to reduce or increase the diameter of tubes. A swaged piece created by placing the tube inside a die that applies compressive force by hammering radially. In this simulation, we will observe the way the billet is being shaped to the desired geometry with profiles on both internal and external surfaces.<br/>
Initially the four radial punches with certain profiles on each of them comes together with certain force and velocity; forcing the billet to shape itself along the profiles existing between the dies and mandrel. The bore diameter and  thickness of the billet gets reduced as it has been compressed between the four sets of well profiled punches, in compensation with the increase in overall length (which we will observe at the end). 
As the billet is been deformed we can also see certain irregular deflections been observed on the positioning of the billet on the mandrel at it incoming end. This is due to the irregular bending been applied when they lack in some sort of irregularity on the synchronisation of all four punches. The final part produced by this method possess physical properties like decrease in outer diameter, decrease in thickness, increase in mechanical strength, etc.
</td></tr></table>
<?php
}elseif(stristr($value,"ocIGt5FCL7U"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation depicts the set-up  of the swaging process along-with the  initial and the finally formed billet. In this video, we could see that on the left side of the screen, we have the assembly of this swaging process in motion, 
the four symmetric punches been pressed against the workpiece to and fro in the radial inward and outward directions. The right side of the screen shows the sketch of the initial billet taken and on below of it the finally formed billet after this process.
</td></tr></table>
<?php
}elseif(stristr($value,"8jjSTsh17fw"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation depicts the results obtained from the swaging process, i.e. distribution of pressure and temperature profiles along various zones of the billet. In this video, we could see that on the top end of the screen, we have the varying pressure zones ranging from -50 to 50 MPa of the punch force on the billet surface. 
The bottom end of the screen shows varying temperature profile acting  along the surface of the billet. Observe that as the billet comes out after being punched the temperature slowly falls down from 600<sup>o</sup>C to 300<sup>o</sup>C.
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