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
	<li><a href="Riveting.php">Riveting</a></li>	
	<li class="dir"><a href="#">Simulations</a>
	<ul>	
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/Uhu1Q3brMgw">Riveting process</a></li>
	<li class="dir"><a href="#">Rivet Forming</a>
	<ul>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/XBQ-wkekH5E">Rivet forming</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/Sjjjc7DqNLU">Rivet forming with strain</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/hbkvAXT1Rxg">Rivet forming with forging force</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Split riveting</a>
	<ul>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/Ae7wPrRN5kA">Split Riveting</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/0vBzcI3nWjs">Split Riveting - Initial Kinematics</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/BTVc9hS56T4">Split Riveting Cut-Section</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Flat Riveting</a>
	<ul>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/Irzahz6EMK8">Flat Riveting</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/MgkaAIwkoVw">Flat Riveting with Strain</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/ITvGk0wfe58">Flat Riveting with Graph</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_Riveting.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Riveting</h2><br/>
Riveting is a popular method of fastening and joining because of its simplicity, dependability and low cost. Dissimilar metals and assemblies having a number of parts with non-uniform thickness can readily be fastened. These joints are made in location where they either do not increase weight of the work at all (over the weight of an integral work) or increase it negligibly. Structures in which riveted joints are used may be grouped as: (a) where strength and rigidity are chief requirements, eg, coal bunkers, low pressure liquid containers, ship hulls; (b) where strength, rigidity, as well as security against leakage should be considered, eg, boiler drains, pressure vessels, high pressure liquid containers and gas tanks; and (c) where the joint must resist given outside loads and have sufficient rigidity, eg, bridges, buildings, cranes, and machine frames. Compared with screwed or bolted joints, riveting requires no additional work or supplementary parts, such as, lock washers, and supplementary nuts. Compared with welded joints, riveting makes possible consistently uniform results without resort to X-ray or other methods of inspection. 
There are several types of rivets, and some may be solid or hollow; blind rivets are inserted from one side only. Installing a rivet basically consists of placing the rivet in the hole and deforming the end of its shank by upsetting. The operation may be performed by hands or by mechanical means, including the use of robots. Riveting may be done either in room temperature or hot, using special tools, or by using explosives in the cavity of the rivet.<br/><br/>A riveted joint may fail during its service life by tearing, shearing or crushing. On a structure/machine element a failure of a joint is reported as a failure symptom or mode. This means how the failure is observed. The causes or cause events that singly, or in combination, may lead to these failure modes, or a general failure mode, include design related, process related, operation/use related and maintenance related cause events. The design related cause events include problem of strength analysis, improper selection of the type of joint, improper material selection, improper size of rivets (shank diameter and
length), improper size of rivet holes/clearance, improper layout of rivet holes and improper size of cover plates/straps. The process related cause events are improper riveting process, improper riveting environment and defective material (rivet and cover plates); while operation related cause event is improper loading; and maintenance related cause events include problems of riveting technicians and improper maintenance of material (including riveting equipment).
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