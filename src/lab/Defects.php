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
	<li class="dir"><a href="Defects.php">Forging Defects</a>
	<ul>
	<li><a href="PreformDefects.php">Preformed Defects</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">LAPS AND FOLDS</a>
	<ul>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/xWOiSTigMyE">BUCKLING DEFECT - INITIAL KINEMATICS</a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/T0zHkzg8P6E">BUCKLING DEFECT - EQUIVALENT STRAIN</a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/-GWXeGt7oIs">SHEARING DEFECT - INITIAL KINEMATICS</a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/H9Rs03_b9kg">SHEARING DEFECT - EQUIVALENT STRAIN</a></li>
	</ul>
	</li>	
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/stdPr3cUgNM">OVERFILLS</a></li>
	<li class="dir"><a href="#">UNDER FILLS</a>
	<ul>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/EW2gy2NaOcM"><abbr title="Due to incorrect billet size">CASE-1</abbr></a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/uiIGG6KMa0k"><abbr title="Due to incomplete material flow at corners">CASE-2</abbr></a></li>
	</ul>
	</li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/hhSrDIcKqM4">MULTIPLE DEFECTS</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Defects.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Forging Defects</h2><br>
Though forging process give generally prior quality product as compared
to the other manufacturing processes. There are some defects that are lightly
to come a proper care is not taken in forging process design.<br/>
Forging Defects can be categorized into two broad categories:<br/>
• Geometrical Defects<br/>
• Non Geometrical Defects<br/><br/>
<span class="blue">Geometrical Defects:</span> The main types of geometrical defects are<br/><br/>
1. Laps and folds<br/>
2. Underfills<br/>
3. Overfills<br/><br/>
There are a number of other different geometrical defects that can occur during forging. These include:<br/>
• Piping<br/>
• Forging shape does not match design<br/>
• Die deflection, yielding or wear<br/>
• Eccentricity or buckling<br/><br/>
<span class="blue">A) Unfilled Section:</span> In this some section of the die cavity are not completely filled by the flowing metal. The causes of this defects are improper design of the forging die or using forging techniques.
<br/><br/><span class="blue">B) Cold Shut:</span> This appears as a small cracks at the corners of the forging. This is caused mainly by the improper design of die. Where in the corner and
the fillet radii are small as a result of which metal does not flow properly into the corner and the ends up as a cold shut.<br/><br/>
<span class="blue">C) Laps and Folds:</span> This is caused by the improper die design, making the laps created onto the final part which is very much undesirable as they distort the surface finish and also tend to weaken the product due to internal or external cracks.
<br/>Less-than-optimum process and preform design is the principal cause of most geometrical defects. By understanding the process issues, the forge is better able to design its processes to minimize the occurrence of such defects.<br/> 
When the press or hammer dies close, the workpiece will move in a path of least resistance. It is imperative that the die and pre-form design create this least resistant path so that the net result is a sound forging. On occasion,
 the die design may create a situation in which the path of least resistance is the one that results in a defect during forging. By examining the various types of geometrical defects, the fundamental cause can be understood and the die designer can produce a die that creates a sound, defect-free product<br/>
<br/><span class="blue">Non Geometrical Defects:</span> The main type of Non geometrical defects are:<br/><br/>
<span class="blue">A) Flakes:</span> These are basically internal ruptures caused by the improper cooling of the large forging. Rapid cooling causes the exterior to cool
quickly causing internal fractures. This can be remedied by following proper cooling practices.<br/><br/>
<span class="blue">B) Scale Pits:</span> This is seen as irregular deputations on the surface of the forging. This is primarily caused because of improper cleaning of the
stock used for forging. The oxide and scale gets embedded into the finish forging surface. When the forging is cleaned by pickling, these are seen as deputations on the forging surface.
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