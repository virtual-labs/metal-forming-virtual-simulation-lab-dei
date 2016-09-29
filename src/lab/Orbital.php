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
	<li><a href="Orbital.php">Orbital Forming</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/CrW5icA7EB4">ORBITAL FORMING</a></li>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/_3c7HIgol20">ORBITAL FORMING WITH EQUIVALENT STRAIN</a></li>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/OuqVurbIM68">ORBITAL FORMING-2</a></li>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/pEq_8Q9Ziv8">RIVET FORMING USING ORBITAL FORMING</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Orbital.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Orbital Forming</h2><br/>
Orbital forming is a metal forming process in which the upper die moves in orbital path and  form the part in continuous increments. Orbital forming uses a peen tool, mounted in a rotating spindle and inclined at a slight angle toward the centre of the spindle. The peen intersects the work piece on a line of contact and gently moves material to the desired final form. The process is similar to impact and compression forming, where the tool applies a compressive axial load to plastically deform the part.
In orbital forming, the tool rotates at a fixed angle, typically 3<sup>o</sup> to 6<sup>o</sup> and applies both axial and radial forces to progressively move malleable material into a desired, predetermined shape. Unlike impact or compression forming, where the process is complete in a single pass, orbital forming requires several tool revolutions and typically takes 1.5 to 6 sec to complete. Most of the work during orbital forming is focused at the tool's line of contact, not along the entire tool surface.
<br/>Orbital forming can complete the same amount of forming work with a fraction of the force of conventional processes like staking and pressing. It can be used to replace loose fasteners, be applied with exacting process control and be used over a wide range of materials (metals, plastics, delicate, hard, etc.).
<br/><br/><center><img src="images/OrbitalForming/Orbital.jpg" alt="Orbital Forming" width="250" height="280">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/OrbitalForming/OrbitalForming.png" alt="Orbital Forming" width="250" height="280"><br/>Figure: Orbital Forming</center>
It is a robust and precise process. Orbital forming can be used to crown, flare, swag, peen, roll, curl, broach, seal, retain and crimp material. Orbital forming also allows fine control of final form, clamp force, etc. with unequalled repeatability.
<br/>Compared to conventional cold forming, the orbital forging process offers the following advantages:<br/>
•	smaller presses (investment, space requirement)<br/>
•	smaller stresses in dies (tooling costs)<br/> 
•	longer die life<br/> 
•	reduction of noise and vibrations<br/> 
•	Orbital forming produces a smooth surface finish and, in some applications, eliminates cracks caused by impact riveting.<br/> 
•	Because less axial load is required for forming, a smaller press can be used, which reduces equipment tonnage, floor space, and costs typically associated with producing large parts.<br/> 
•	Due to lower forming forces, less rigid fixturing is required, and tools last longer.<br/> 
•	Orbital forming is quieter than other cold-forming processes such as impact forming or peening.
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