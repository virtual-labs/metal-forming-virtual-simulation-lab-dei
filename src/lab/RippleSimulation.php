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
	<li><a href="Ripple.php">Ripple Process</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="RippleSimulation.php?https://www.youtube.com/embed/Z3litIX16iY">Ripple Process</a></li>
	<li><a href="RippleSimulation.php?https://www.youtube.com/embed/tvSJxa0r0wA">Ripple Process with Strain</a></li>
	</ul>
	</li>
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
if(stristr($value,"Z3litIX16iY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the given simulation video one can see ripple formation or bellow manufacturing process. In this process the tube is compressed axially and bulge is produced at several equidistant locations. Finally the bulged tube is compressed axially to collapse the bulged regions and finally bellows are formed.
In the left hand side of the video one can see the full in section of tube and die assembly. Upper and lower die are used to press the tube. Upper and lower supports are used to hold the tube ends. The central support is used to create a bulge in the tube under axial compression. The material of the tube is mild steel. The hydraulic presses are used to compress the tube.  
Right hand top side of the video shows the outer surface of the assembly. While the lower right hand side of the video shows the various stages of the tube from initial stage to intermediate stage and finally the bellow tube.
</td></tr></table>
<?php
}elseif(stristr($value,"tvSJxa0r0wA"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the given simulation video of ripple formation process one can see the strain generated in the tube and variation of force with time. In the left hand side of the video one can see the strain generated inside the tube during the bulging and collapsing process. In the left hand side one can see the vertical scale with different colours.
Each colour shows different level of strain generated inside the tube starting from blue which correspond to zero strain level. More strain in the tube indicates more deformation and more deformation gives more strength to the tube. The maximum strain generated inside the tube is about 1.4.
In the right hand top side of the video shows the strain generated on the outer surface of the tube. Maximum strain generated on the outer surface of the tube is about 1.4 but overall average strain generated on the outer surface of the tube is about 0.4.
The right hand bottom side of the video shows the graph showing variation of force acting on the tube by upper die with time. The maximum force generated on the tube is 0.8896 tonnes.
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