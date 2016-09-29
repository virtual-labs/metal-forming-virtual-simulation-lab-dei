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
	<li><a href="Stretchforming.php">Stretch Forming</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="StretchSimulation.php?https://www.youtube.com/embed/dWEui2Ss3oI">STRETCH FORMING</a></li>
	<li><a href="StretchSimulation.php?https://www.youtube.com/embed/6SIVo6ALCL8">STRETCH FORMING WITH GRAPH</a></li>
	<li><a href="StretchSimulation.php?https://www.youtube.com/embed/10eA9m6MpeQ">STRETCH FORMING-2</a></li>
	<li><a href="StretchSimulation.php?https://www.youtube.com/embed/6FIoGt5WSBs">STRETCH FORMING-2 WITH GRAPH</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Stretchforming.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Stretch Forming</h2><br/>
Stretch forming is a metal forming process in which a piece of sheet metal is stretched and bent simultaneously over a die in order to form large contoured parts. Stretch forming is performed on a stretch press, in which a piece of sheet metal is securely gripped along its edges by gripping jaws. The gripping jaws are each attached to a carriage that is pulled by pneumatic or hydraulic force to stretch the sheet. 
The tooling used in this process is a stretch form block, called a form die, which is a solid contoured piece against which the sheet metal will be pressed. The most common stretch presses are oriented vertically, in which the form die rests on a press table that can be raised into the sheet by a hydraulic ram. As the form die is driven into the sheet, which is gripped tightly at its edges, the tensile forces increase and the sheet plastically deforms into a new shape. 
Horizontal stretch presses mount the form die sideways on a stationary press table, while the gripping jaws pull the sheet horizontally around the form die.
<br/><center><img src="images/Stretchforming.png" alt="Stretch Forming" height="430" width="475"><br/>Figure: Stretch Forming</center>
Stretch forming is a very accurate and precise method for forming metal shapes, economically. The level of precision is so high that even intricate multi-components and snap-together curtain wall components can be formed without loss of section properties or original design function. Stretch forming capabilities include portions of circles, ellipses, parabolas and arched shapes. These shapes can be formed with straight leg sections at one or both ends of the curve. This eliminates several conventional fabrication steps and welding.
Stretch formed parts are typically large and possess large radius bends. The shapes that can be produced vary from a simple curved surface to complex non-uniform cross sections. Stretch forming is capable of shaping parts with very high accuracy and smooth surfaces.
The stretch forming process involves stretch forming a metal piece over a male stretch form block (STFB) using a pneumatic and hydraulic stretch press. Stretch forming is widely used in producing automotive body panels. Unlike deep drawing, the sheet is gripped by a blank holder to prevent it from being drawn into the die. It is important that the sheet can deform by elongation and uniform thinning.
<br/><br/>Material:- Ductile materials are preferable, the most commonly used being aluminium, steel, and titanium.
<br/><br/><span class="blue">Applications</span>:<br/>
Typical stretch formed parts are large curved panels such as door panels in cars or wing panels on aircraft. The variety of shapes and cross sections that can be stretch formed is almost unlimited. Window systems, skylights, store fronts, signs, flashings, curtain walls, walkway enclosures, and hand railings can be accurately and precisely formed to the desired profiles.. Other stretch formed parts can be found in window frames and enclosures.
Close and consistent tolerances, no surface marring, no distortion or ripples, and no surface misalignment of complex profiles are important benefits inherent in stretch forming. A smooth and even surface results from the stretch forming process.
This process is ideally suited for the manufacture of large parts made from aluminium, but does just as well with stainless steel and commercially pure titanium. It is quick, efficient, and has a high degree of repeatability.
<br/><br/><span class="blue">Sheet Stretch Forming</span>: Sheet Stretch Forming is commonly used by aircraft builders to manufacture fuselage skin sections from special aerospace aluminium alloy sheets.
<br/><br/><span class="blue">Extrusion Stretch Forming</span>: Extrusion stretch forming press designs for contouring aluminium aerospace alloys in the form of extrusion roll formed profiles, or press braked shapes.  These presses are sometimes called stretch wrap or swing arm presses. The basic press design has two arms or carriage beams that hold multiple-positioning gripping jaws.  The jaws are attached to hydraulic tension cylinders that provide the stretch of the work-piece. 
The arms swing by rotating on large machined pins with bearings, thus allowing the work-piece to wrap around and against the forming die.
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