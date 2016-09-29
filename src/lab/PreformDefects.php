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
	<li class="dir"><a href="PreformDefects.php">Preformed Defects</a>
	<ul>
	<li><a href="Defects.php">Forging Defects</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="PreformSimulation.php?https://www.youtube.com/embed/SMjtsIZ63Ew">Effect of flat surface with the sharp corner</a></li>
	<li><a href="PreformSimulation.php?https://www.youtube.com/embed/N1xcnq7uN6A">Effect of small web thickness</a></li>
	<li><a href="PreformSimulation.php?https://www.youtube.com/embed/-xcGv8_sn1c">Surface defect</a></li>
	<li><a href="PreformSimulation.php?https://www.youtube.com/embed/HSyhzI_eZR8">Shearing defect</a></li>
	<li><a href="PreformSimulation.php?https://www.youtube.com/embed/oiE4T2ZgaYg">Combination of defects</a></li>
	</ul>
	</li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Preformed Defects analysis in upsetting process</h2><br>
Upsetting process comprises of increasing the diameter of the workpiece by compressing its length. Based on number of pieces produced this is the most widely used forging process. A few examples of common parts produced using the upset forging process are engine valves, couplings, bolts, screws, and other fasteners.<br><br>
Upset forging is usually done in special high-speed machines called crank presses, but upsetting can also be done in a vertical crank press or a hydraulic press. The machines are usually set up to work in the horizontal plane, to facilitate the quick exchange of workpieces from one station to the next. The initial workpiece is usually wire or rod, but some machines can accept bars up to 25 cm (9.8 in) in diameter and a capacity of over 1000 tons. The standard upsetting machine employs split dies that contain multiple cavities. The dies open enough to allow the workpiece to move from one cavity to the next; the dies then close and the heading tool, or ram, then moves longitudinally against the bar, upsetting it into the cavity.<br><br>
These rules must be followed when designing parts to be upset forged:<br>
•	The length of unsupported metal that can be upset in one blow without injurious buckling should be limited to three times the diameter of the bar.<br>
•	Lengths of stock greater than three times the diameter may be upset successfully provided that the diameter of the upset is not more than 1.5 times the diameter of the stock.<br>
•	In an upset requiring stock length greater than three times the diameter of the stock, and where the diameter of the cavity is not more than 1.5 times the diameter of the stock, the length of unsupported metal beyond the face of the die must not exceed the diameter of the bar.<br><br>
<span class="blue">Features of Pre-formed defects</span>:<br>
•	Pre-form defects are coincidental therefore defects of pre-forms is hardly ever detected. If defects are detected, the question is asked “how many may have already passed?<br>
•	Low quality of pre-forms or defects will frequently cause problems in the bottle blow-moulder.<br>
•	Pre-form defects are hardly visible to the eye.<br>
•	Pre-forms found insufficient by the pre-form Inspector are returned to the supplier.
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