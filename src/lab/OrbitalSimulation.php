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
	<li><a href="Orbital.php">Orbital Forming</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/CrW5icA7EB4">ORBITAL FORMING</a></li>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/_3c7HIgol20">ORBITAL FORMING WITH EQUIVALENT STRAIN</a></li>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/OuqVurbIM68">ORBITAL FORMING-2</a></li>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/pEq_8Q9Ziv8">RIVET FORMING USING ORBITAL FORMING</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Orbital.php">Self Check Quiz</a></li>
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
if(stristr($value,"CrW5icA7EB4"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the given video one can see the hot orbital forming process. Orbital forming is a metal forming process in which the upper die moves in orbital path and form the part in continuous increments. 
Orbital forming uses a peen tool, mounted in a rotating spindle and inclined at a slight angle toward the centre of the spindle. The tool rotates at a fixed angle — typically 3<sup>o</sup> to 6<sup>o</sup> and typically takes 1.5 to 6 sec to complete.
In the given simulation video, the left hand side shows the position of the upper die, tube and lower die. The lower die moves in upward direction. The tube material is brass and its initial temperature in 350<sup>o</sup>C. 
As the process starts, lower die starts pressing the tube in upper direction and the upper die rocks and rolls to increase the internal diameter of tube. The right hand top side of the video shows the top view where the process of expansion of the diameter of tube is shown. 
The right hand bottom side shows the initial, intermediate and the final shape of the tube after completion of orbital forming process.
</td></tr></table>
<?php
}
else if(stristr($value,"_3c7HIgol20"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the given simulation video of hot orbital forming process, one can see the variation of strain generated in the tube. Initially the strain in the tube is zero. The left hand side of the video shows the strain generated in tube side walls. 
While right hand side of the video shows the inclined view of the tube. Initial the strain in the tube is zero. As the process starts the deformation on the top circumference and the side walls start. 
With time the deformation increases and hence the strain also increases. Till the end of the process the strain on the top of the tube reaches up to 2.45 while on the side walls it reaches upto 1.75.
</td></tr></table>
<?php
}
else if(stristr($value,"OuqVurbIM68"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Orbital forming is a metal forming process used for spreading internal diameter of  axis symmetric cylindrical objects. In the present simulation a cylindrical specimen (length = 121 mm  and internal diameter  27 mm) is subjected to orbital forming.  
Metal specimen is placed in the lower die holder and orbital forming probe (rotating plunger) is placed in the  specimen initial cavity. Now probe rotates along the vertical axis and simultaneously tilt at certain angle (rocking angle), 
angle of inclination is time dependent and gradually increases. Angle can be pre-adjustable to impart desirable shape to the object.
</td></tr></table>
<?php
}
else if(stristr($value,"pEq_8Q9Ziv8"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the given video of the simulation of orbital forming one can see the riveting process using orbital forming process. Orbital forming can also be used for fastening the plates with rivets. With orbital forming, the force required for riveting is very less.
The upper die tool rotates at a fixed angle — typically 3<sup>o</sup> to 6<sup>o</sup> — and apply radial force  and the lower die press the rivet axially. Orbital forming requires several tool revolutions and takes 1.5 to 6 sec to complete. 
Initially the rivet is placed in the hole provided between the plates. The material of the rivet is brass and temperature is 150<sup>o</sup>C. As the rivet is pressed by the lower die the upper die starts rotating and rocking about its vertical axis. 
As the process succeed, deformation occurs and finally the rivet tightly fasten the plates. The left hand side of the video shows the position of the upper die, rivet, plates and lower die. The right hand top side of the video shows the amount of strain generated in the rivet. 
Initially the strain in the rivet is zero. It increases with increases in the deformation. The right hand bottom side of the video shows the rivet and the plates initially and finally after the orbital forming of rivet.
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