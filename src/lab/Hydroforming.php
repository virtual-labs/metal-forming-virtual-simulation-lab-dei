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
	<li><a href="Hydroforming.php">Hydroforming</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Tube Hydroforming</a>
	<ul>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/x6h5COZX6C4">Hydroforming</a></li>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/FAIeOnEjy90">Hydroforming with curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Tube Hydroforming - Single T</a>
	<ul>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/GQcHbNuxmM0">Hydroforming - Single T</a></li>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/2dz8EETtUKI">Single T with curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Tube Hydroforming - Double T</a> 
	<ul>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/vbrxMjIptPE">Double T - Same side</a></li>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/lI16lxUSPbM">Double T - Opposite side</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Sheet Hydroforming</a>
	<ul>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/KhsR4vs0dvc">Sheet Hydroforming</a></li>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/u_RIFP7SIcY">Sheet Hydroforming with Strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_Hydroforming.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Hydroforming</h2><br/>
Hydroforming enables manufacturing of closed sections with non-uniform cross-sectional areas along the length by using a circular tube as the input material. While conventional stamped and welded closed sections need a flange area to facilitate welding, hydroformed closed sections enables weight saving by avoiding the flange area. 
The capacity of the Hydroforming process enables a designer to replicate the profile of brackets / child parts directly on the components, thus reducing the number of brackets / child parts.<br/><br/>
<span class="blue">Hydroforming methods</span>: Basically there are 2 main Hydroforming methods: Tube Hydroforming and Sheet Hydroforming.<br/>
<br/><span class="blue">Tube Hydroforming</span><br/>
A pre-bended tube is placed in a tool set in a press which applies the closing force. At the ends of the tube 2 cylinders are placed that can apply axial feeding. The tube will be filled with fluid and the tube will be formed under pressure.
<br/><br/>Although Tube Hydroforming is a long known technology, the applications of hydroformed tubular components has increased in recent times, because of the more advanced pressing control technology, but also because of the availability of reliable Finite Element Models (FEM), that eliminate the expensive trial and error process in the development of the tools and components.
<br/><br/><span class="blue">Applications</span>: Single-T<br/>
First the tube will be positioned in the die set, the tools will close and the tube will be filled with water. Axial feeding will build up pressure and enable the inflow of material into the T-shape. After releasing the pressure, the dies can be opened and the part be removed.
<br/>Tube Hydroforming: Double-T<br/><br/>
<span class="blue">Sheet Hydroforming</span><br/>
Sheet hydroforming process is similar to tube hydroforming process except that instead of tube, sheet is used. There are many variation of sheet hydroforming process. In sheet hydroforming process punch draws into a blank sheet along with pressurized liquid placed between punch and the sheet. There are some cases where sheet is beck pressurised by hydraulic fluid. The die cavity is typically filled with oil or water. 
Sheet hydroforming is similar to the normal deep drawing process, except for the fact that the die cavity is filled with liquid so that hydraulic pressure is applied during the forming process. The application of hydraulic pressure from the bottom creates a huge impact on the forming process. The liquid allows the material to flow better and increases its tensile resistance to break. 
These factors increase the drawing limit ratio. As a result, it allows forming to be carried out in one process while the normal deep drawing method requires two or more processes.
<br/><br/>References:<br/>
[1] Nico Langerak, Dinesh Kumar Rout, Rahul Verma, G.Manikandan, Arunansu, Haldar, “Tube Hydroforming in Automotive Applications”.<br/>
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