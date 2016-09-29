<?php session_start();
ini_set("display_errors","Off"); ?>
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
	<li class="dir"><a href="Rolling_Process.php">Rolling Process</a>
	<ul>
	<li><a href="Ring_Rolling.php">Ring Rolling</a></li>
	<li><a href="ThreadRolling.php">Thread Rolling</a></li>
	<li><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a></li>
	</ul>
	</li>
	<li><a href="Rolling.php">Simulation Bench</a></li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Flat Plate Rolling</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/t6VKzjRu6Gw">Flat Plate</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/FaG4fXe1UrQ">Close-up View</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Angle Rolling</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/v0wYMR2vQGI">Angle Rolling</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/cYAQY360hnY">Angle Rolling with Graph</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/Hpwo8x_Hi10">Angle Bar Rolling</a></li>	
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/jc8VUbC2rfM">Circular Bar Rolling</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">I-Section</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/WV-PlH7Kkcg">I-Section with 4-Roller</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/HVFRCMP7EJA">I-Section with 2-Roller</a></li>	
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/fJexvf_16Gw">I-Section with graph</a></li>
	</ul>
	</li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/4vL0vnRppVo">Seamless pipe using Rolling</a></li>
	</ul> 
	</li>
	<li><a href="MCQ_Rolling.php">Self Check Quiz</a></li>	
EOQ;
?>
</ul></div>
<div><center>
<?php
$value = $_SERVER['QUERY_STRING'];
//$plist=array_pop( explode('/', $value) );
$plist = basename($_SERVER['REQUEST_URI']);
$speech = $_SESSION['speech'];
print <<<EOQ
<iframe width="1020" height="600" src=$value?rel=0&autoplay=1&loop=1&playlist=$plist frameborder="0" allowfullscreen></iframe> 
EOQ;
if(!empty($speech)){
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
<?php
echo $speech;
?>
</td></tr></table>
<?php
}
session_destroy();
//unset($_SESSION['speech']);
if(stristr($value,"Hpwo8x_Hi10"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The video shows the process of manufacturing of angle iron by iron by rolling procedure. Angle iron is generally used in frames and structures. In the video, one could observe the roller deforming the plate. 
The shape of the roller is such that as the plate progresses forward it takes up the shape in between the rollers. The equivalent strain generated during manufacturing angle iron can be determined using scale on the left.
The final deformed plate is later cut using metal cutter in the final step of manufacturing.
</td></tr></table>
<?php
}elseif(stristr($value,"jc8VUbC2rfM"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This video shows the circular bar rolling procedure. On left hand side, one could see the setup of the circular bar rolling and the process of rolling. The circular groove in the roller rolls the rectangular billet transforms it into circular billet. 
The equivalent strain generated can be determined by the scale on left hand side. On the right hand side, one could view the billet being deformed and the strains being generated over the surface which can be determined by the scale on left side.
</td></tr></table>
<?php
}elseif(stristr($value,"WV-PlH7Kkcg"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The video shows the continuous manufacturing of I- Beam using rolling process. The process has been shown in three views. In the setup one could see two side roller for deforming the rectangular section into I section. 
Two top rollers are provided for preventing undesired bending over the top. Four side support rollers are also provided in the setup. On the top left hand corner a scale is provided for determining the equivalent strain generated during the process.
</td></tr></table>
<?php
}elseif(stristr($value,"t6VKzjRu6Gw"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the video, one can observe Rolling Process for commercially used copper sheet of length, breadth and thickness of 100mm, 50 mm and 10 mm. On the right side, one can view the process of rolling reducing the thickness of sheet to half. 
The upper roller is revolving anti clockwise and the lower roller revolving anticlockwise when the sheet is moving to right. The different contours in shear zone indicates the equivalent strain generated in the shear zone in sheet during rolling operation.
On the left hand top end, the rolling simulation shows the deformation in sheet and the equivalent strains generated in the sheet can be compared with the scale shown on the extreme left. 
On the left hand bottom end, the rolling simulation shows the deformation in sheet and the meshing with different contours.
</td></tr></table>
<?php
}elseif(stristr($value,"FaG4fXe1UrQ"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the video, one can observe Rolling Process for Aluminium sheet. The rollers having mesh and are reducing the sheet thickness. The coloured contours over the sheet describe the equivalent strains generated over the sheet which can be compared with the scale on the left side.
</td></tr></table>
<?php
}elseif(stristr($value,"4vL0vnRppVo"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In this simulation seamless pipe is manufactured by continuous rolling process, here stationary rotating mandrel is placed in front of solid billet. Two rollers are rotating simultaneously and forced the 
billet towards the mandrel; rotating mandrel fabricated a continuous inner diameter in the billet and formed a continuous seamless pipe.
</td></tr></table>
<?php
}elseif(stristr($value,"HVFRCMP7EJA"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The video shows the continuous manufacturing of I- Beam using rolling process. The material of the billet is manganese alloy steel. Due to high deforming force and high billet temperature, material starts deforming plastically. 
Right hand side of video shows variation of equivalent strain on billet. maximum stresses develop at the point of contact of roller and billet.  On the top left hand corner a scale is provided for determining the equivalent strain generated during the process.
</td></tr></table>
<?php
}elseif(stristr($value,"fJexvf_16Gw"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The video shows the continuous manufacturing of I- Beam using rolling process. The material of the billet is manganese alloy steel. Due to high deforming force and high billet temperature, material starts deforming plastically. 
Right hand side of video shows variation of forces on rollers and pilot height. right upper hand side shows initial anf final billet. maximum stresses develop at the point of contact of roller and billet.  On the top left hand corner a scale is provided for determining the equivalent strain generated during the process.
</td></tr></table>
<?php
}elseif(stristr($value,"v0wYMR2vQGI"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Angle rolling is formed by rolling operation. In a given simulation of angle rolling, hot rollingprocess is used. Considering the various perimeters of rolling  simulation. The material  of the billet (sheet) is plane carbon steel and the temperature of the billet is high. 
In the simulation video the billet is infinite elements to have better analysis of the force. The rolling press is used. In the left handside of the simulation video we  can see the manufacturing of angle rolling. 
And in the right hand top side of the video we can see the plain sheet and final final sheet. The right hand bottom side of the videowe can see the variation of strain in the billet during the rolling operation. 
Initially the strain in the billet is zero while during the operation the strain rises due to deformation. It rises up to 6.4806 greater strain indicates more deformation, more grain refinement and hence better mechanical properties.
</td></tr></table>
<?php
}elseif(stristr($value,"cYAQY360hnY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left hand side of the video one can see the variation of strain with mesh in the billet during the rolling operation. Initially the strain in the billet is zero while during the operation the strain rises due to deformation. 
It rises upto 6.8406.Greater strain indicates more deformation, more grain refinement and hence better mechanical properties.
In the right hand top side we can see the upper roller and lower roller. Similarly in the right hand bottom side of the video we can see the variation in the billet during the operation by the graph. 
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