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
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Thread Rolling</h2><br>
Thread rolling is used to produce threads in substantial quantities. This is a cold-forming process operation in which the threads are formed by rolling a thread blank between hardened dies that cause the metal to flow radially into the desired shape. Because no metal is removed in the form of chips, less material is required, resulting in substantial savings. In addition, because of cold working, the threads have greater strength than cut threads, and a smoother, harder and more wear resistant surface is obtained. In addition, the process is fast, with production rates of one per second being common. The quality of cold rolled products  is consistently good. Chip-less operations are cleaner and there is a savings in material.<br/>
For a mass production of the threaded objects, e.g. bolts and screws, two flat, reciprocating dies(or threaded rolls rotating in opposite directions) can be used to obtain the thread in the work-piece through plastic deformation. This is basically a rolling operation, and hence the name thread rolling. The threads are formed into a blank by pressing a shaped die against the blank, in a process similar to knurling. These processes are used for large production runs because typical production rates are around one piece per second. Rolling produce no swarf and less material is required because the blank size starts smaller than a blank required for cutting threads; there is typically a 15 to 20% material savings in the blank, by weight. 
A rolled thread can often be easily recognized because the thread has a larger diameter than the blank rod from which it has been made; however, necks and undercuts can be cut or rolled onto blanks with threads that are not rolled. Also, the end of the screw usually looks a bit different from the end of a cut-thread screw. 
Materials are limited to ductile materials because the threads are cold formed. However, this increases the thread's yield strength, surface finish, hardness, and wear resistance. Also, materials with good deformation characteristics are necessary for rolling; these materials include softer (more ductile) metals and exclude brittle materials, such as cast iron. Tolerances are typically ±0.001 in. (±0.025 mm), but tolerances as tight as ±0.0006 in (±0.015 mm) are achievable. Surface finishes range from 6 to 32 micro-inches.<br/>There are four main types of thread rolling, named after the configuration of the dies:<br/>
1. flat dies<br/>
2. two-die cylindrical<br/>
3. three-die cylindrical<br/>
4. planetary dies<br/><br/>
<span class="blue">flat dies</span>: The flat die system has two flat dies, the bottom one is held stationary and the other slides. The blank is placed on one end of the stationary die and then the moving die slides over the blank, which causes the blank to roll between the two dies forming the threads. Before the upper moving die reaches the end of its stroke the blank rolls off the stationary lower die in a finished form.<br/>
<br/><center><img src="images/ThreadRolling/FlatDieThreadRolling.jpg" alt="Thread Rolling using Flat Dies" width= "425" height= "300"><br/>Figure: Threading technique using flat dies</center><br/>
<span class="blue">Two-die cylindrical</span>: The two-die cylindrical process is used to produce threads up to 6 in (150 mm) in diameter and 20 in (510 mm) in length.<br/>
<center><img src="images/ThreadRolling/TwoRolls.jpg" alt="Thread Rolling using Two Rolls" width= "350" height= "250"><br/>Figure: Threading technique using Two Rolls</center><br/>
<span class="blue">three-die cylindrical</span>: There are two types of three-die processes:<br/>(i) The first has the three dies move radially out from the centre to let the blank enter the dies and then closes and rotates to roll the threads. This type of process is commonly employed on turret lathes and screw machines.<br/>
(ii) The second type takes the form of a self-opening die head. This type is more common than the former, but is limited by not being able form the last 1.5 to 2 threads against shoulders.<br/>
<br/><center><img src="images/ThreadRolling/ThreeRolls.jpg" alt="Thread Rolling using Three Rolls" width= "320" height= "300"><br/>Figure: Threading technique using Three Rolls</center><br/>
<span class="blue">planetary dies</span>: Planetary dies are used to mass produce threads up to 1 in (25 mm) in diameter.
Not only is thread rolling very economical but the threads are excellent as to form and strength. The cold working contributes to increased strength, particularly at the critical root areas. There is less likelihood of surface defects(produced by machining), which can act as stress raisers.<br/>
When considering the blank diameter tolerance, a change in blank diameter will affect the major diameter by an approximate ratio of 3 to 1. Production rates are usually three to five times faster than thread cutting.
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