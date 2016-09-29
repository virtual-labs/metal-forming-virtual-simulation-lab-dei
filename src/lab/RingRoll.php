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
	<li class="dir"><a href="Ring_Rolling.php">Ring Rolling</a>
	<ul>
	<li><a href="Rolling_Process.php">Rolling Process</a></li>
	<li><a href="ThreadRolling.php">Thread Rolling</a></li>
	<li><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">FLAT RING</a>
	<ul>
	<li><a href="RingRoll.php?https://www.youtube.com/embed/sApzuJQNMGE">Flat ring setup</a></li>
	<li><a href="RingRoll.php?https://www.youtube.com/embed/qann4xxi71Y">Flat ring with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">CURVED RING</a>
	<ul>	
	<li><a href="RingRoll.php?https://www.youtube.com/embed/d5DZ3Id27h0">Curved ring setup</a></li>
	<li><a href="RingRoll.php?https://www.youtube.com/embed/WVUnAjPmGQM">Curved ring with strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_RingRolling.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div><center>
<?php
$value = $_SERVER['QUERY_STRING'];
$plist=array_pop( explode('/', $value) );
print <<<EOQ
<iframe width="1020" height="600" src=$value?rel=0&autoplay=1&loop=1&playlist=$plist frameborder="0" allowfullscreen></iframe> 
EOQ;
if(stristr($value,"sApzuJQNMGE"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Ring Rolling is a metal forming process, which is used for rolling of rings. In this video, one can easily understand, how the ring rolling process is performed. The king in yellow color roll rolls over the ring which is shown in red against friction and the mandrel in green color exert pressure on opposite face, 
due to this the thickness of the ring continuously decreases and the diameter of the ring increases. The two conical rolls are placed axially to ensure that the width of the ring remains constant during the process. The shape of the ring can be made of different shapes by changing the surface of the king roll and the mandrel. 
In this video the ring is of flat surface. The image shows the initial and final condition of the ring. In the close up view one can clearly see the change in the shape of the ring, the change in mesh elements and position during the process.
</td></tr></table>
<?php
}elseif(stristr($value,"qann4xxi71Y"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Ring rolling process is used to roll a ring. It is rolled by the help of king roll and the mandrel. The width is maintained by the help of conical rolls. This video shows the equivalent strain generated and the plot of force applied by the mandrel in rolling the ring to its desired flat shape during hot ring rolling process. 
The value of equivalent strain increases from 0 to 4.56 as the mandrel rolls the ring. Change in the value of equivalent strain refers to the refinement of the microstructure of the material. Higher the equivalent strain more finer is the microstructure. 
As the process initiates the force applied increases very steeply then remains approximately constant. The maximum value of the force applied is 78 tones. Lower the value of forging force, more easily a metal forming process can be done, and there is a requirement of machinery of lower size.
</td></tr></table>
<?php
}elseif(stristr($value,"d5DZ3Id27h0"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Ring Rolling is a metal forming process, which is used for rolling of rings. In this video, one can easily understand, how the ring rolling process is performed. The king in yellow color roll rolls over the ring which is shown in red against friction and the mandrel in green color exert pressure on opposite face, 
due to this the thickness of the ring continuously decreases and the diameter of the ring increases. The two conical rolls are placed axially to ensure that the width of the ring remains constant during the process. The shape of the ring can be made of different shapes by changing the surface of the king roll and the mandrel. 
In this video the ring is of curved surface. The image shows the initial and final condition of the ring. In the close up view one can clearly see the change in the shape of the ring, the change in mesh elements and position during the process.
</td></tr></table>
<?php
}elseif(stristr($value,"WVUnAjPmGQM"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Ring rolling process is used to roll a ring. It is rolled by the help of king roll and the mandrel. The width is maintained by the help of conical rolls. This video shows the equivalent strain generated and the plot of force applied by the mandrel in rolling the ring to its desired curved shape during hot ring rolling process. 
The value of equivalent strain increases from 0 to 13.9083 as the mandrel rolls the ring. Change in the value of equivalent strain refers to the refinement of the microstructure of the material. Higher the equivalent strain more finer is the microstructure. 
As the process initiates the force applied increases very steeply then remains approximately constant. The maximum value of the force applied is 78 tones. Lower the value of forging force, more easily a metal forming process can be done, and there is a requirement of machinery of lower size.
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