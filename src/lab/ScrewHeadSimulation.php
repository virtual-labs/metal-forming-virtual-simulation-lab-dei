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
	<li><a href="ScrewHead.php">Screw Head</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Bolt</a>
	<ul>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/mevadV1fNNs">Bolt Setup</a></li>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/wKbzdBrJrCM">Bolt with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Hexagonal Bolt</a>
	<ul>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/PQjVl-DhL4U">Hexagonal Bolt</a></li>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/_FwsTSSAJPw">Hexagonal bolt with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Screw Head</a>
	<ul>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/oMsXkfz1rMY">Screw Head</a></li>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/sP__Q7tiol4">Screw head with strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_ScrewHead.php">Self Check Quiz</a></li>
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
if(stristr($value,"mevadV1fNNs"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Screw bolt is formed by heading operation. Heading process can be defined as an upsetting process, normally performed at the end of a round rod. In the given simulation of screw  forming, cold heading process is used. The material of the billet is plain carbon steel. 
By Considering the various parameters of heading simulation like force, temp etc. like temperature of the billet is 20<sup>o</sup>C and In the simulation video the billet is divided into small finite elements to have better analysis of the force. The mechanical press is used for deformation. 
In the left hand side of the simulation video we can see the manufacturing of screw bolt. In the right hand top side we can see the upper die, lower die and initial billet, final billet. Similarly in the left hand bottom side of the video we can see the variation in billet during the operation.
</td></tr></table>
<?php
}elseif(stristr($value,"wKbzdBrJrCM"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left hand  side of the video one can depict the variation of strain in the billet during the heading operation. Initially the strain in the billet is zero while during the operation the strain rises due to deformation. It rises upto 3.36107. 
Greater strain indicates more deformation, more grain refinement and hence better mechanical properties. Similarly in the left  hand bottom side of the video we can see the variation  by the graph. Graph plot between the pilot height and punch.
</td></tr></table>
<?php
}elseif(stristr($value,"PQjVl-DhL4U"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Hexagonal bolt is formed by heading operation. Heading process may be defined as an upsetting process, normally performed at the end of a round rod or wire or blank. Heading processes can be carried out cold, warm or hot. 
In the given simulation of hexagonal bolt forming, cold heading process is used. Consider the various parameters of heading simulation. The material of the billet is plain carbon steel. The temperature of the billet is 20<sup>o</sup>C. 
In the simulation video the billet is divided into small finite elements to have better analysis of the force. The mechanical press is used for deformation. In the left hand side of the simulation video one can see the processing of hexagonal bolt. 
Similarly in the right hand top side of the video we can see the upper die or punch and lower die and initial billet and final billet. In the right hand bottom side of the video we can see the variation in the billet during the heading operation.
</td></tr></table>
<?php
}elseif(stristr($value,"_FwsTSSAJPw"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left hand side of the video we can see the variation of strain in the billet during the heading operation. Initially the strain in the billet is zero while during the operation the strain rises due to deformation. 
It rises upto 3.21625. Greater strain indicates more deformation, more grain refinement and hence better mechanical properties. Similarly in the right hand top side of the video we can see the variation of strain 
with mesh in the billet during the operation. Similarly in the right hand bottom side of the video we can see the graph. Graph plot between punch and pilot height.
</td></tr></table>
<?php
}elseif(stristr($value,"oMsXkfz1rMY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Screw is formed by heading operation. Heading process may be defined as an upsetting process, normally performed at the end of a round rod in order to produce a larger cross-section. 
Heading processes can be carried out cold, warm or hot. In the given simulation of screw  forming, cold heading process is used. The screw  forming is normally done in two steps 
but for ease of the simulation, screw is made in a single step. Consider the various parameters of heading simulation. The material of the billet is plain carbon steel. 
the temperature of the billet is 20<sup>o</sup>C. In the simulation video the billet is divided into small finite elements to have better analysis of the force. The mechanical press is used for deformation. 
In the left hand side of the simulation video one can see the processing of the screw. In the right hand bottom side of the video we can see the upper die, lower die, initial billet and final billet. 
Similarly in the left  hand bottom side of the video we can see the variation e in the billet during the operation.
</td></tr></table>
<?php
}elseif(stristr($value,"sP__Q7tiol4"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left hand side of the video we can depict the variation of strain in the billet during the heading operation. Initially the strain in the billet is zero while during the operation the strain rises due to deformation. 
It rises upto 3.36107. Greater strain indicates more deformation, more grain refinement and hence better mechanical properties. Similarly in the right hand top side if he video we can see the variation of strain 
with mesh in the billet during the operation. Similarly in the left  hand bottom side of the video one can depict the variation in the billet during the operation by the graph. Graph plot between the pilot height and upper die.
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