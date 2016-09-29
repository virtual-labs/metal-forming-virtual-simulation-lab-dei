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
<div><center>
<?php
$value = $_SERVER['QUERY_STRING'];
$plist = basename($_SERVER['REQUEST_URI']);
print <<<EOQ
<iframe width="1020" height="600" src=$value?rel=0&autoplay=1&loop=1&playlist=$plist frameborder="0" allowfullscreen></iframe>
EOQ;
if(stristr($value,"D6YR5faHQW8"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The video shows the process of gear formation using extrusion process. On the left side, one can observe the setup for gear extrusion. The extrusion die is shown with green and the punch is shown with yellow. The billet with mesh is shown in red. As the punch pushes the billet in the extrusion die, 
teeth of gear embossed in the die are engraved in the billet. On the right hand side, the picture shows three pictures. The red picture at top is the initial billet, the red picture in middle is the billet with teeth engraved after extrusion and the bottom picture shows the final gear after machining.
</td></tr></table>
<?php
}elseif(stristr($value,"66lKziHcVBU"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The video shows the process of gear formation using extrusion process. On the left side, one can observe the setup for gear extrusion. The extrusion die is shown with green and the punch is shown with yellow. The billet with mesh is shown in red. As the punch pushes the billet in the extrusion die, 
teeth of gear embossed in the die are engraved in the billet. On the right hand side, the graph is drawn between Force on Punch versus Pilot Height taking Pilot Height in milli-meters on X axis and Force in Tonnes on Y axis.
</td></tr></table>
<?php
}elseif(stristr($value,"aMaUviFYOLM"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The video shows the process of gear formation using extrusion process. On the left side, one can observe the setup for gear extrusion. The extrusion die is shown with green and the punch is shown with yellow. The billet with mesh is shown in red. As the punch pushes the billet in the extrusion die, 
teeth of gear embossed in the die are engraved in the billet. On the right hand side, one can see the different strain contours, which can be determined by comparison with scale on the left of screen.
</td></tr></table>
<?php
}elseif(stristr($value,"Nk5TE3EgtRc"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation shows the formation of straight bevel gears using forging. The right side shows the dies used for the step -1. Simulation for step 1 shows the initial billet placed with the dies used in step 1. The yellow die deforms the initial billet into an intermediate phase. 
The yellow die is moving in downward direction whereas green die is stationary. On the right is shown the billet deformed in the first step.
</td></tr></table>
<?php
}elseif(stristr($value,"XtJd1N1JKgY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This is a simulation for step 2 of bevel gear formation. The resultant billet from step 1 is used for the final gear for formation in the second step. The image on the top right corner shows the dies used for step-2. 
The yellow is the upper die which forces down the billet to the required shape. The yellow die is moving in downward direction whereas green die is stationary. The image of billet on the right shows the deformation produced in the billet from step-1 to the desired shape.
</td></tr></table>
<?php
}elseif(stristr($value,"krjK2leLfgg"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation shows the generation of equivalent strain during the step -1 of bevel gear formation. The top right simulation shows the formation of equivalent strain as the upper die moves down. The average equivalent strain generated is 0.61 . 
The graph for the forging force is shown in the bottom right corner. The maximum force is 10.2 Tones. The simulation at left shows the simulation for bevel gear forging for step -1.
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