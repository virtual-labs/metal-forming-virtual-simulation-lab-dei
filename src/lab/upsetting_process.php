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
	<li><a href="upsetting_process.php">Upsetting</a></li>
	<li><a href="upsetting_simulation.php">Simulations</a></li>
	<li class="dir"><a href="#">Simulation Bench</a>
	<ul>
	<li><a href="Hydraulic.php">SIMULATION BENCH FOR HYDRAULIC PRESS</a></li>
	<li><a href="Mechanical.php">SIMULATION BENCH FOR MECHANICAL PRESS</a></li>		
	</ul> 
	</li>
	<li><a href="upsetcomp.php">Comparative Simulations</a></li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">ALLOY WHEEL</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/7XsEMIKKrGY">Alloy wheel</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/iwKH3PeUNmA">Alloy wheel with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">BRASS FORGED PART</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/IKfMmkMPr9I">Brass forged part</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/Lhs9kW-XySU">Brass forged part with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">FORGED PISTON</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/PpoEzA19Q3o">Forged piston-Setup</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/uUURe5wU81s">Forged piston with graph</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/oRnruCNjq8c">Forged piston-Section view</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">MUDGUARD</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/olYwov1mZAs">Mudguard-Setup</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/M1O5SbdZYOE">Mudguard with strain in Upward Direction</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/AKhl2OKXAmU">Mudguard with strain in Downward Direction</a></li>
	</ul>
	</li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/ob2lwdSvbvI">PATTERN MAKING</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Upsetting.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Upsetting Process: An Overview</h2><br>
Upset Forging or Upsetting is defined as 'free forming', by which a billet or a portion of a workpiece is reduced in height between usually plane, parallel plates [ASM Handbook 1988]. Upsetting is a basic deformation process which can be varied in many ways. Upsetting of metals is a deformation process in which a (usually round) billet is compressed between two dies in a press or a hammer. This operation reduces the height of a part while increasing its diameter. The process is mostly used as an intermediate step in multiple step forging operations. The billet may be cold, warm or hot forged. A large segment of industry primarily depends on the upsetting process for producing parts ranging in complexity from simple bolts, screws, nuts, rivets or flanged shafts to wrench sockets that require simultaneous upsetting and piercing. Hot upsetting is also occasionally used as a finishing operation following hammer or press forging, such as in making crankshafts. A sketch of the upsetting process is shown in the below figure.<center><br>
<img src="images/Upsetting/UpsetProcess.jpg" alt="Scrap"><br>Figure 1: Upsetting process<br><br>
<iframe width="600" height="400" src="https://www.youtube.com/embed/kqJR-_fp8AY?rel=0" frameborder="0" allowfullscreen></iframe>
</center><br>
In upsetting a rigid tool is pushed onto a block of material (billet). The material is free to move at the right hand side.  Successful upsetting mainly depends on two process limitations: <br> 1.Upset strain, : that affects the forming limit or forgeability of the workpiece material<br> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;h<sub>0</sub><br><span class="oline">&epsilon;</span>&nbsp=&nbsp;ln&nbsp;&nbsp;&mdash;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;h<sub>1</sub><br><br> 2. Upset Ratio (Ru): that affects the buckling of the workpiece <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;h<sub>0</sub><br>R<sub>u</sub>&nbsp;&nbsp;=&nbsp;&nbsp;<strike>&nbsp;&nbsp;&nbsp;&nbsp;</strike><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d<sub>0</sub>
<br><br>
<center><img src="images/Upsetting/upset.jpg"><br>Figure 2: Upset Forging of a Cylinder<br><br>
<img src="images/Upsetting/Velocity.jpg"><br>
Figure 3: Metal flow in non-steady state upset forging processes</center><br>
In upsetting a ratio of Ru&le;2.3 can be achieved in one hit if the deformation occurs over a portion of the workpiece. Larger values   require several deformation stages. In upsetting the parameters that are significant are dimensions of the workpiece, its strength, its formability, the required upset ratio, the desired accuracy and the surface quality. When forming in several stages, the design of the heading preforms affects the fiber structure of the final shape. Heading preforms are to be shaped such that the workpiece is guided correctly to avoid buckling and folding.  In metal forming, the flow of metal is caused by the pressure transmitted from the dies to the deforming workpiece.  Therefore, the frictional conditions at the die/workpiece interface greatly influence metal flow, formation of surface and internal defects, stresses acting on the dies, and load and energy requirements</p>
<br/>
In metal forming, the flow of metal is caused by the pressure transmitted from the dies to the deforming workpiece.  Therefore, the frictional conditions at the die/workpiece interface greatly influence metal flow, formation of surface and internal defects, stresses acting on the dies, and load and energy requirements.  Figure above illustrates this phenomenon as it applies to the upsetting of a cylindrical workpiece.  The figure(a) shows, under frictionless conditions, the workpiece deforms uniformly and the resulting normal stress is constant across the diameter.  However, figure (b) shows that under actual conditions, where some level of frictional stress is present, the deformation of the workpiece is not uniform (i.e. barreling).  As a result, the normal stress increases from the outer diameter to the center of the workpiece and the total upsetting force is greater than for the frictionless conditions.<br/><br/><span class="blue">
Piston</span><br/><br/>
Pistons are vital component of reciprocating engines, reciprocating pumps, gas compressors and pneumatic cylinders etc. It is the reciprocating component which moves inside the cylinder and converts the reciprocating motion into rotary motion or vice versa.
<br/><center><img src="images/Piston/Piston.png" width="180" height="160"><br/>Figure 4: Piston</center>
<br/><span class="blue">Forged Piston Vs Casted Piston:</span> The majority of original equipment and aftermarket pistons are manufactured through casting.  The technical description is 'gravity die casting'.  However for the sake of simplicity, a cast piston is manufactured by pouring molten aluminium /silicon alloy into a mold.  Forged pistons differ fundamentally in manufacturing and inherent character.  As opposed to casting, the forging process basically takes a lump of billet alloy and stamps the shape of the piston from a die.
<br/>Casting and forging results in two different types of piston.  A die for forged piston must be designed so it can easily be removed and, as a result, the forged blank (or unfinished piston) has a relative simple shape.  Casting can achieve a more complex blank and, therefore, facilitate lightweight construction.  Also, due to relative manufacturing procedures, forged pistons tend to be more expensive than cast items.
A cast pistons is more likely to shatter and damage the engine, as a whole, more than a forged piston where as a big advantage with forged pistons is they generally result in a more ductile material, with the effect being the piston can take a higher level of detonation before failing.  In extremely high rpm/high horsepower applications, the great strength of the forged piston can add reliability.
<br/><br/><span class="blue">Manufacturing Forged Piston:</span> During Manufacturing of Piston the billet of Aluminium alloy is taken and hot forging operation is performed over it. The billet is preheated to a temperature of about 427 C before placing it onto the lower die and performing forging operation over it.. This leads to the upsetting operation taking place in the billet. The change in microstructure tends to increase the strength of piston.
Dies used for the process consists of impression of the piston on lower die as well as the upper die as shown in the following figures:
<br/><br/><center><img src="images/Piston/LowerDie.png" width="200" height="175">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/Piston/UpperDie.png" width="200" height="175"><br/>Figure 5: Lower Die&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Figure 6: Upper Die</center>
<br/>The manufacturing process used in the process is shown in the following figure:<br/><br/><center><img src="images/Piston/Process.png" height="250" width="550"><br/>Figure 7: Manufacturing process</center><br/> <span class="blue">Alloy Whee</span>: Alloy wheels are automobile (car, motorcycle and truck) wheels which are made from an alloy of aluminum or magnesium. They are typically lighter for the same strength and provide better heat conduction and improved cosmetic appearance. There are quality standards to govern the production of wheels. A wheel is comprised of a hub, spokes and rim. Sometimes these components will be one piece, sometimes two or three. The hub is the centre portion of the wheel and is what attaches the wheel to the suspension. The spokes radiate out from the hub and attach to the rim.
Most alloy wheels are manufactured using casting, but some are forged. Forged wheels are usually lighter, stronger, but much more expensive than cast wheels.
There are basically three processes when it comes to manufacturing alloy wheel which are one piece in construction: cast alloy, forged alloy wheels, and billet alloy wheels. Each one of these will produce a highest quality alloy wheels however there are some distinct difference in the strength of the finished product worth nothing.
<br/><br/><span class="blue">A CAST ALLOY WHEEL -</span> is a manufacturing process whereby molten aluminium is pored into an alloy wheel mould and once it is cooled, the result is a wheel. There are three types of cast wheel production: Gravity fed, low- pressure fed, spun-rim.
<br/><br/><span class="blue">A FORGED ALLOY WHEEL -</span> is a manufacturing process in which intense heat and pressure is used to force a chunk of aluminium (often called a slug or stock) into the alloy wheel shape desired. This process will create an alloy wheel which is up to 300% stronger than a cast alloy wheel and is lighter as well.
<br/><br/><span class="blue">A BILLET ALLOY WHEEL -</span> is a manufacturing process here by a chunk of aluminium is machined into the alloy wheel design. This involves a very expensive machine called CNC (computer numeric control) which reads specific instructions then drives the machine tool to complete the task.
<br/>Magnesium alloy wheels, or "mag wheels", are sometimes used on racing cars, in place of heavier steel or aluminium wheels, for better performance. Magnesium wheels can be produced through various methods.
<br/><br/><span class="blue">FORGING:</span> Forging can be done by a one or multi-step process forging from various magnesium alloys, most commonly AZ80, ZK60 (MA14 in Russia). Wheels produced by this method are usually of higher toughness and ductility than aluminium wheels, although the costs are much higher.
<br/><br/><span class="blue">HIGH PRESSURE DIE CASTING (HPDC):</span> This process uses a die arranged in a large machine that has high closing force to clamp the die closed. The molten magnesium is poured into a filler tube called a shot sleeve. A piston pushes the metal into the die with high speed and pressure, the magnesium solidifies and the die is opened and the wheel is released. Wheels produced by this method can offer reductions in price and improvements in corrosion resistance but they are less ductile and of lower strength due to the nature of HPDC.
<br/><br/><span class="blue">LOW PRESSURE CASTING (LPDC):</span> This process usually employs a steel die; it is arranged above the crucible filled with molten magnesium. Most commonly the crucible is sealed against the die and pressurized air/cover gas mix is used to force the molten metal up a straw like filler tube into the die. When processed using best practice methods LPDC wheels can offer improvements in ductility over HPDC magnesium wheels and any cast aluminium wheels, they remain less ductile than forged magnesium.
<br/><br/><span class="blue">GRAVITY CASTING (PERMANENT MOLD AND SAND CASTING):</span> Gravity cast magnesium wheels have been in production since the early 1920's. This method offers wheels with good ductility, and relative properties above what can be made with aluminium casting. Tooling costs for gravity cast wheels are among the cheapest of any process. This has allowed small batch production, flexibility in design and short development time.
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