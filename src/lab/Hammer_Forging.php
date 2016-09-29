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
	<li><a href="Hammer_Forging.php">Hammer</a></li>
	<li class="dir"><a href="#">Hammer Forging</a>
	<ul>
	<li><a href="Hammer_Experiment.php?https://www.youtube.com/embed/9Dr4ogcsabU">Quarter section & Force curve</a></li>
	<li><a href="Hammer_Experiment.php?https://www.youtube.com/embed/7BQxuml8dZs">Half section & Equivalent strain</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Hammer.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Hammer Forging</h2><br/>
Hammer forging may be defined as a open-die hot forging in which billet is compressed and deformed by continuous blows of upper die. In this process, the billet remains stationary over the lower die. The upper  die continuously strike the billet  till the required reduction in the height and desired shape is obtained.<br/>With the hammer forging process,  the material undergoes large plastic (permanent) deformation, resulting in an appreciable change in shape and cross section. During the hammer forging the grain structure of the material break into more uniform structure and hence the mechanical properties of the materials greatly improved. . As a result, forging offers potential savings in energy and material, especially in medium and large production quantities, where tool costs can be easily amortized. In addition, for a given weight, parts produced by forging exhibit better mechanical and metallurgical properties and reliability than do those manufactured by casting or machining.
<br/><br/><span class="blue">HAMMER PRESS:</span> Hammer press derive their energy from the potential energy of the ram, which is converted into kinetic energy. Unlike hydraulic presses, they operate at high speeds, and the resulting low forming time minimizes the cooling of a hot forging. Low cooling rates allow the forging of the complex shapes, particularly those with thin and deep recesses. To complete the forging, several successive blows are usually made in the same die. Hammer presses are available in a variety of designs. These are most versatile and the least expensive types of forging equipments. Some of the important hammer presses are:
<br/><br/>a) <span class="blue">Gravity drop hammer press:</span> In the operation of this hammer, the energy is derived from the free-falling ram. The available energy of the hammer is the product of the ram's weight and the height of its drop. Ram weights range from 180 kg to 4500kg, with energy capacities ranging upto 120kJ.
<br/><br/><center><img src="images/Upsetting/gravityDH.jpg" width="400" height="400"></center>
<br/>b) <span class="blue">Power Drop Hammer:</span> In this hammer, the ram's downstroke is accelerated by the steam, air , or hydraulic pressure at about 750kPa.Ram weights range from 225kg to as much as 22,500kg, with energy capacities ranging upto 1150kj.
<br/><br/>c) <span class="blue">Counterblow Hammers:</span> This hammer has two rams that simultaneously approach each other horizontally or vertically to forge the part. As in open-die forging operations, the part mat be rotated between blows for proper shaping of the workpiece during forging. Counter-blow hammers operate at high speeds and transmits less vibration to their bases. Capacities range upto 1200kJ.
<br/><br/>c) <span class="blue">High-Energy-Rate Machines:</span> In a high-energy-rate machine, the ram is accelerated by inert gas at high pressure, and part is forged in one blow at a very high speed. Although there are several types of these machines, various problems associated with their operation and maintenance, with die breakage, and safety consideration have greatly limited their actual use in forging plants.
<br/>For hot forging operations performed on hammer, it may be interesting to simulate hammer a with rigidity so as to better describe the kinematic and the energy vs time evolution. This is very important if the user wants to predict the correct number of blows which will be needed to forge the part to the final height.
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