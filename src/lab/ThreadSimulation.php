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
	<li class="dir"><a href="ThreadRolling.php">Thread Rolling</a>
	<ul>
	<li><a href="Rolling_Process.php">Rolling Process</a></li>
	<li><a href="Ring_Rolling.php">Ring Rolling</a></li>
	<li><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a></li>
	</ul>	
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Thread Rolling using flat dies</a>
	<ul>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/k21Or-bdY5k">Thread Rolling - Initial kinematics</a></li>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/0o8KEqF6wyI">Thread Rolling - Equivalent strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Thread Rolling using set of two rolls</a>
	<ul>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/RK0P14eHTw0">Thread Rolling using 2-Rolls</a></li>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/oUDzfD7vVQM">Thread Rolling - Equivalent strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Thread Rolling using set of three rolls</a>
	<ul>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/OGhMF1xRxyA">Thread Rolling using 3-Rolls</a></li>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/CpwyFuRCD6U">Thread Rolling - Equivalent strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_ThreadRoll.php">Self Check Quiz</a></li>
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
if(stristr($value,"k21Or-bdY5k"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation depicts the set-up of the thread rolling technique using flat dies along with the graph. In this video, we could see that on the top section of the screen, we have the full assembly of the threading process which includes two well grooved flat dies in yellow and green 
colour and a billet in between them in red colour. The two flat dies tends to reciprocate at direction opposite to each other, thus forcing the billet to turn and create threads on its surface while rotating. The lower left side of the screen showing the enlarged view of the threaded 
region of the billet and the lower right corner of the screen showing the graph between the force applied on the dies by the formed billet at versus time period. Note that this force goes on decreasing in magnitude with the passage of time.
</td></tr></table>
<?php
}elseif(stristr($value,"0o8KEqF6wyI"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation depicts the results coming from Finite Element Analysis of the thread rolling technique, using two reciprocating well grooved dies moving against billet surface. In this video, we could see that on the upper section of the screen, we have the equilateral strain generated regions, 
coming from the thread rolling simulation at various point in time. Note that at the point where the roll first comes in contact with then billet we have the maximum strain generated, that could be seen in red colour, which slowly fades into yellow , then green and finally into blue colour as shown 
in the legend on left side of this simulation. The lower section of the screen showing the varying pressure zones coming during this process. The green colour showing the low pressure regions, the yellow colour showing slightly high pressure regions, and red colour showing very high pressure regions, 
in increasing order of magnitude, which can be as high as up-to 500 MPa of pressure.
</td></tr></table>
<?php
}elseif(stristr($value,"RK0P14eHTw0"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation depicts the set-up of the thread rolling using two rolls process. In this video, we could see that on the left side of the screen, we have the full assembly of the threading process which includes two rolls in yellow and green colour, two mutually opposite guides in blue and pink 
colours respectively, a billet in red colour. The billet is been rolled upon against the grooved surface of the rolls thus making the respective threads while rotating in the manner opposite to that of the rolls. The top right side of the screen showing the enlarged view of the treaded region of 
the billet and the lower right corner of the screen showing the graph between the force applied on the rolls by the formed billet versus time. The graph depicts the sinusoidal curve like increase and decrease of the force on rolls with the passage of time.
</td></tr></table>
<?php
}elseif(stristr($value,"oUDzfD7vVQM"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation depicts the results coming from the Finite Element Analysis of the thread rolling technique using two rolls. In this video, we could see that on the upper section of the screen, we have the equilateral strain generated regions, coming from the thread rolling process at various point in time. 
Note that at the point where the roll first comes in contact with then billet we have the maximum strain generated, that  could be seen in red colour, which slowly fades into yellow , then into green and finally into blue colour bands. The lower section of the screen showing the varying pressure zones coming during the process. 
The green colour showing the low pressure regions, the yellow colour showing slightly high pressure region, and red colour region showing very high pressure regions in increasing order of magnitude, which can be as high as up-to 200MPa of pressure.
</td></tr></table>
<?php
}elseif(stristr($value,"OGhMF1xRxyA"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation depicts the set-up of the thread rolling using three rolls. In this video, we could see that on the left side of the screen, we have the full assembly of the thread rolling process, which includes three rolls in yellow and green and dark blue colour, a billet in between them in red colour. 
The billet is been rolled upon against the grooved surface of three mutually equidistant rolls, thus making the respective threads on the billet surface, while rotating in the manner opposite to that of the rolls. The top right side of the screen showing the enlarged view of the treaded region of the billet 
whereas the lower right corner of the screen showing the graph between the force applied on the rolls by the formed billet versus time. This graph depicting the increase in force on the rolls with  time in a certain pattern of peaks and valleys.
</td></tr></table>
<?php
}elseif(stristr($value,"CpwyFuRCD6U"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation depicts the results coming from Finite Element Analysis of the thread rolling technique, using two rolls. In this video, we could see that on the upper section of the screen, we have the equilateral strain generated regions, which are coming from the thread rolling simulation at various point in time. 
Note that at the point where the roll first comes in contact with the billet we have the maximum strain generated, that could be seen in red colour, which slowly fades into yellow, then into green and finally into blue colour as shown in the legend on left side of this simulation. 
The lower section of the screen showing the varying pressure zones coming during this process. The green colour showing the low pressure regions, the yellow colour showing slightly high pressure regions, and red colour showing very high pressure regions, in increasing order of magnitude, which can be as high as up-to 500 MPa of pressure.
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