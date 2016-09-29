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
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Screw Head Forming</h2><br/>
A screw or bolt, is a type of fastener characterized by a helical ridge, known as an external thread or just thread, wrapped around a cylinder. Some screw threads are designed to mate with a complementary thread, known as an internal thread, often in the form of a nut or an object that has the internal thread formed into it. Other screw threads are designed to cut a helical groove in a softer material as the screw is inserted. The most common uses of screws are to hold objects together and to position objects.<br/>
<br/><span class="blue">Difference between bolt and screw:</span><br/><br/><span class="blue">Bolt:</span> A bolt is an externally threaded fastener designed for insertion through holes in assembled parts, and is normally intended to be tightened or released by torquing a nut.
<br/><br/><span class="blue">Screw:</span> A screw is an externally threaded fastener capable of being inserted into holes in assembled parts, of mating with a preformed internal thread or forming its own thread, and of being tightened or released by torquing the head
<br/><br/><span class="blue">Types of screws:</span><br/><br/>1. <span class="blue">Hexagonal cap screw or hexagonal bolt:</span> A hex cap screw is a cap screw with a hexagonal head, designed to be driven by a wrench .hexagonal  cap screw has somewhat tighter tolerances than a hex bolt for the head height and the shank length. Hex cap screw to always fit where a hex bolt is installed but a hex bolt could be slightly too large to be used where a hex cap screw is designed.
<br/><br/><center><img src="images/HexagonalBolt.png" alt="Hexagonal Bolt Ajay Kant Upadhyay"><br/>Hexagonal cap screw or Hexagonal Bolt</center><br/>2. <span class="blue">Phillips screw head:</span> A phillips screw is that screw in which a fastener with a tapered threaded shank and a slotted head.<br/><br/>
3. <span class="blue">Woodscrew head:</span> A metal screw with a sharp point designed to attach two pieces of wood together. Wood screws are commonly available with flat, pan or oval-heads. A wood screw generally has a partially unthreaded shank below the head. The unthreaded portion of the shank is designed to slide through the top board (closest to the screw head) so that it can be pulled tight to the board it is being attached to.
<br/><br/><span class="blue">Screw Thread:</span> Screw Thread is divided into following types:<br/>• The lead is defined as the linear distance the screw travels in one complete revolution (360°) of the shaft. The lead determines the mechanical advantage of the screw; the smaller the lead, the higher the mechanical advantage.<br/>
• The pitch is defined as the axial distance between the crests of adjacent threads.<br/><br/>In most screws, called "single start" screws, which have a single helical thread wrapped around them, the lead and pitch are equal. They only differ in "multiple start" screws, which have several intertwined threads. In these screws the lead is equal to the pitch multiplied by the number of starts. Multiple-start screws are used when a large linear motion for a given rotation is desired, for example in screw caps on bottles, and ball point pens.
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