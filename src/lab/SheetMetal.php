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
	<li><a href="SheetMetal.php">Sheet Metal</a></li>
	<li class="dir"><a href="#">Bending Operations</a>
	<ul>
	<li class="dir"><a href="#">Bending Operations to reduce springback</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/SJStL4uRDYk">V-Shape Punch</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/xLxuA_actmU">U-Shape Punch</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ZJ_9jxHXuqI">V-Shape Punch & Curve</a></li>
	</ul>
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/8top1LwUJnU">Bending operation to remove springback</a></li>
	<li class="dir"><a href="#">Common Die Bending</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hD0n0zgxZns">V-Bending</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ND_EaxJaHsw">Circular Bending</a></li>
	</ul> 
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/y2b2QzRkmM0">Wipe Die Bending</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/D4eseTSohpA">Air Bending</a></li>
	</ul> 
	</li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Corrugated Sheet</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/0ZyTuDyknsA">Corrugated sheet</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/2cRDg6Ro8oM">Corrugated sheet with forging force</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/UTTKqDZTHBQ">Circular corrugated sheet</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ww1yCCP0yk8">Conical corrugated sheet</a></li>	
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/5qClMR0AWZc">Continuous corrugated sheet</a></li>	
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/MddaXm2bSvs">Discrete corrugated sheet</a></li>	
	</ul>
	</li>
	<li class="dir"><a href="#">Bead Forming</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/MvAU9SrcPn8">Bead forming of rod</a></li>	
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/Y-VsvDi-TKI">Bead forming of rod with strain</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hEU-MCawgb8">Bead forming of rod with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/JcJo4Cqvs2A">Bead forming of sheet</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/6qjFiM5JdTY">Bead forming of sheet with strain</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/r7HNMUxlp5U">Bead forming of sheet with curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Deep Drawing</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/AbJJ4akaXIE">Deep drawing-Downward</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/LkzLlvCbAbQ">Deep drawing-Upward</a></li>
	</ul> 
	</li>
	<li class="dir"><a href="#">Roll Forming</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/2mphVzWWVY0">Roll forming</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/B5hcRJHSdI4">Roll forming with curve</a></li>
	</ul> 
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hFtXJzH1new">Roll Bending</a></li>
	<li class="dir"><a href="#">Piercing</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/1-jmYZJvyJs">Piercing process</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/NIX1y2IgDd8">Piercing Setup</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/iR-CQmNtwT8">Piercing with strain</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/D2yQkArgikQ">Piercing with forging force</a></li>
	</ul> 
	</li>
	<li class="dir"><a href="#">Bush</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/wM7dtEBY1zU">Bush Forming</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/PMXnqgVKe0o">Bush Forming with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/c-5vaUJT-Bs">Bush step-1</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/CbhRzpTMcYE">Bush step-1 with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/_7JNBldI4bY">Bush step-2</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/f2FS0MdIPMQ">Bush step-2 with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/NbIa3YBY2pY">Bush step-3</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/bdwUY7twT9Y">Bush step-3 with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/BtJWSXCZ9hA">Final Bush</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Punching</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/fjxemYABsuY">Punching Operation</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ZcTo5SJBkFY">Punching with Contour</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/gRreMPrJ72c">Punching with Graph</a></li>
	</ul>
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hZPfU78odag">Coining</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/tEulKL2tDrU">Door Handle</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/1RHUg3eCGa4">Cover Plate</a></li>
	</ul>
	</li>
	<li><a href="MCQ_SheetMetal.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Sheet Metal Working</h2><br>
1. <span class="blue"> Introduction</span><br><br>
Sheet metal is simply metal formed into thin and flat pieces. It is one of the fundamental forms used in metalworking, and can be cut and bent into a variety of different shapes. Countless everyday objects are constructed of the material. Thicknesses can vary significantly, although extremely thin thicknesses are considered foil or leaf, and pieces thicker than 6 mm (0.25 in) are considered plate.<br><br>
2.<span class="blue"> Sheet metal processing</span><br><br>
The raw material for sheet metal manufacturing processes is the output of the rolling process. Typically, sheets of metal are sold as flat, rectangular sheets of standard size. If the sheets are thin and very long, they may be in the form of rolls. Therefore the first step in any sheet metal process is to cut the correct shape and sized ‘blank’ from larger sheet.<br><br> 
3. <span class="blue">Sheet metal forming processes</span><br><br> 
Sheet metal processes can be broken down into two major classifications and one minor classification<br><br>
•	<span class="blue">Shearing processes:</span> processes which apply shearing forces to cut, fracture, or separate the material.<br> 
•	<span class="blue">Forming processes:</span> processes which cause the metal to undergo desired shape changes without failure, excessive thinning, or cracking.  This includes bending and stretching.<br> 
•	<span class="blue">Finishing processes:</span> processes which are used to improve the final surface characteristics.<br><br>
3.1 <span class="blue">Shearing Process</span><br><br>
1.	<span class="blue">Punching:</span> Punching is a metal forming process that uses a punch press to force a tool, called a punch, through the workpiece to create a hole via shearing. The punch often passes through the work into a die. A scrap slug from the hole is deposited into the die in the process. Depending on the material being punched this slug may be recycled and reused or discarded. 
Punching is often the cheapest method for creating holes in sheet metal in medium to high production volumes. When a specially shaped punch is used to create multiple usable parts from a sheet of material the process is known as blanking. In forging applications the work is often punched while hot, and this is called hot punching. Production rate of this process is very high so it is good for the industrial purpose. In given figure industrial punching machine is shown.
A die is located on the opposite side of the workpiece and supports the material around the perimeter of the hole and helps to localize the shearing forces for a cleaner edge. There is a small amount of clearance between the punch( upper die) and the lower die to prevent the punch from sticking in the die and so less force is needed to make the hole. The amount of clearance needed depends on the thickness, with thicker materials requiring more clearance, but the clearance is always less than the thickness of the workpiece. 
The clearance is also dependent on the hardness of the workpiece. The punch press forces the punch through a workpiece, producing a hole that has a diameter equivalent to the punch, or slightly smaller after the punch is removed. we also used a pressure pad to provide proper pressure on working sheet.
<br/><center><img src="images/SheetMetal/WorkSheet.png" width="250" height="200"><br>Figure: Initial Work Sheet<br><br><img src="images/SheetMetal/PunchView.png" width="400" height="350"><br>Figure: Punching Operation<br><br><img src="images/SheetMetal/WorkSheetAfterPunching.png" width="300" height="250"><br>Figure: Work Sheet after Punching Operation<br><br><img src="images/SheetMetal/PunchSheet.png" width="250" height="200"><br>Figure: Final Sheet</center>
2.<span class="blue"> Blanking:</span> shearing process using a die and punch where the exterior portion of the shearing operation is to be discarded.
<center><img src="images/SheetMetal/Blanking&punching.jpg" width="550" height="350"><br>
Figure: Shearing Operations - Punching and Blanking</center><br>
3.<span class="blue"> Perforating:</span> punching a number of holes in a sheet.<br>
4.	<span class="blue">Parting:</span> shearing the sheet into two or more pieces.<br>
5.	<span class="blue">Notching:</span> removing pieces from the edges.<br>
6.	<span class="blue">Lancing:</span> leaving a tab without removing any material.<br><br> 
3.2 <span class="blue">Forming Processes</span><br><br>
3.2.1 <span class="blue">Sheet Metal Bending</span><br><br>
<span class="blue">Introduction: </span> Bending is a manufacturing process by which metal can be deformed by plastically deforming the material and changing its shape. The material is stressed beyond its yield strength but below its ultimate tensile strength. There is little change to the materials surface area. Bending generally refers to deformation about one axis only.<br/>
Bending along a straight line is the most common of all sheet forming processes; it can be done in various ways such as forming along the complete bend in a die, or by wiping, folding or flanging in special machines, or sliding the sheet over a radius in a die.<br/>
Bending is done using Press Brakes. Press Brakes can normally accommodate stock from 1m to 4.5m (3 feet to 15 feet).Thickness can vary significantly, although extremely thin thicknesses are considered foil or leaf, and pieces thicker than 6 mm (0.25 in) are considered plate. The thickness of the sheet metal is called its gauge.<br/><br/>
<span class="blue">Bend Allowances: </span> When sheet metal is bent, the inside surface of the bend is compressed and the outer surface of the bend is stretched. Somewhere within the thickness of the metal lies its Neutral Axis, which is a line in the metal that is neither compressed nor stretched.<br><br>
<center><img src="images/SheetMetal/bend1.jpg" width="400" height="250"><br/>
<img src="images/SheetMetal/bendallowance.jpg" width="450" height="350"><br/>
Figure: Tension and Compression in the bend area of the sheet</center>
In practical terms is that if we want a work piece with a 90 degree bend in which one leg measures A, and the other measures B, then the total length of the flat piece is NOT A + B as one might first assume.<br><br>
<center><img src="images/SheetMetal/bendtable.jpg" width="500" height="400"></center><br/>
<span class="blue">Bending Allowance Formula (when bending is at some particular angle)</span><br><br>
<center><img src="images/SheetMetal/bend2.jpg" width="450" height="300"><br/>
Figure: Bending allowance atttributes<br/>
<img src="images/SheetMetal/formulla1.jpg" width="200" height="70"></center>
where A<sub>b</sub> =  bend allowance, a = bend angle, R= bend radius, t = stock thickness,<br/>
K<sub>ba</sub>  is factor to estimate stretching.
<center>If R < 2t, K<sub>ba</sub> = 0.33<br> If R  = 2t, K<sub>ba</sub> = 0.50</center><br/>
<span class="blue">Spring Back:</span> Because all materials have a finite modulus of elasticity, plastic deformation is followed by elastic recovery upon removal of the load; in bending, this recovery is known as spring back. The amount of spring back depends on the material, thickness, grain and temper. The spring back will usually range from 5 to 10 degrees.<br>
As shown in Figure below, the final bend angle after spring back is smaller and the final bend radius is larger than before. This phenomenon can easily be observed by bending a piece of wire or a short strip metal.<br>
<br><b>Approximate formula to estimate spring back :</b><br><br>
<center><img src="images/SheetMetal/formulla2.jpg" width="200" height="70"><br/>
<img src="images/SheetMetal/bend3.jpg" width="400" height="200"><br/>
Figure: Spring Back after Banding</center><br/>
where Ri and Rf are the initial and final bend radii, respectively.<br/>
<b>Y</b> - Yield strength of the material. <br/>
<b>E</b> - Modulus of elasticity of the material.<br/>
<b>T</b> - Thickness of the material. <br/><br/>
<span class="blue">Bending Force Formula: </span> The equation for estimating the maximum bending force is<br/> 
<center><img src="images/SheetMetal/formulla3.jpg" width="220" height="70"></center>
where k is a factor, T is the ultimate tensile strength of the metal. L and t are Length and thickness of sheet metal respectively.
<br/><br/>
<span class="blue">Types of Bending processes: </span> There are three basic types of bending on a press brake, each is defined by the relationship of the end tool position to the thickness of the material. These three are:<br/>
<br/>I. <span class="blue">AIR BENDING: </span> Air Bending is a bending process in which the punch touches the work piece and the work piece does not bottom in the lower cavity. As the punch is released, the work piece springs back a little and ends up with less bend than that on the punch.<br>
In air bending, there is no need to change any equipment or dies to obtain different bending angles because the bend angles are determined by the punch stroke. The forces required to form the parts are relatively small, but accurate control of the punch stroke is necessary to obtain the desired bend angle.
<center><img src="images/SheetMetal/airbending1.jpg" width="450" height="275"><br/>
Figure: Air Bending</center>
II. <span class="blue">BOTTOMING:</span> In bottoming, the sheet is forced against the V opening in the bottom tool. U-shaped openings cannot be used. Space is left between the sheet and the bottom of the V opening.  Bottoming is a bending process where the punch and the work piece bottom on the die. This makes for a controlled angle with very little spring back. The tonnage required on this type of press is more than in air bending. The inner radius of the work piece should be a minimum of 1 material thickness.<br/>
<br/>III. <span class="blue">COINING:</span> Coining is a cold working process which is similar to forging which takes place at an elevated temperature. It uses a great force to deform a workpiece plastically. More concisely, it is the squeezing of metal while it is confined in a closed set of dies.<br/>For a particular operation, the dies are shown below:
<br><center><img src="images/SheetMetal/UpperDie.png" width="250" height="220"><br/>Figure: Upper Die<br/><br/><img src="images/SheetMetal/LowerDie.png" width="250" height="220"><br/>Figure: Lower Die</center>
The billet used is a machined thin cylindrical metal as shown below. The billet used for this purpose is of 100 mm diameter and 10 mm height.
<br><center><img src="images/SheetMetal/Billet.png" width="250" height="220"><br/>Figure: Billet</center>
A work piece is placed a confined (lower) die as shown below . A movable punch is located within the die. The action of this punch cold works the material and can form intricate features.
<br/><br><center><img src="images/SheetMetal/Coining.png"><br/>Figure: Coining Process</center>
Coining is a form of precision stamping in which a workpiece is subjected to a high stress such that a plastic flow is developed on its surface. After the process the billet looks like:
<br/><br><center><img src="images/SheetMetal/Coin.png" width="250" height="220"><br/>Figure: Billet after Process</center>
Generally, a high tonnage pressure is required in coining than in stamping because the work piece is not cut but deformed plastically. Hence, coining is used where high tonnage is required.
<br/><br><center><img src="images/SheetMetal/FinalCoin.png" width="250" height="220"><br/>Figure: Final Coin</center>
The coining process can be done by using hydraulic press, gear driven press or, mechanical press.<br/><br/>
<span class="blue">The beneficial features provided by coining are:</span><br/><br/>
1. In some metals, it reduces surface grain size<br/>
2. It results in hardening of surface<br/>
3. Material retains its toughness while it is deep in the part<br/>
It is used in manufacturing parts when there is requirement of high relief or very fine features.
For example: It is used to produce coins, medals, buttons and batches etc.
<br/><br>IV. <span class="blue">Bead Forming:</span>
Bending is one of the most common forming operations. A large amount of parts and components are shaped by bending. It is used not only to form flanges, seams and corrugations but also to impart stiffness to the part.<br/>There are many types of bending operations.
Beading is one of the common bending operations which are used to form beads at the end of the sheets. In beading, the periphery of the sheet metal is bent into the cavity of the die as shown in following figure. A bead or a round corner is formed at the end of the sheet. The bead imparts the stiffness to the part by increasing the moment of inertia of the section. Also, it improves the appearance of the part and eliminates exposed sharp edges. Some of the beading operations are shown in the following figure.
<br/><br/><center><img src="images/SheetMetal/BeadingOperation.jpg" alt="Beading Operation Ajay Kant Upadhyay" height="300" width="400"><br/>Figure: Beading Operation</center>In over simulations we have to type of billets. One is rod and other is a chip, bead is to be formed at the end of these two billets. 
The first video is of beading of rod. In beading of the rod a groove has to be cut in the upper die for the movement of the rod without bending in the other direction. Symmetric planes are taken to prevent bending of the rod. The initial billet and final product of the process are shown in figure (i).<br/>
<br/><center><img src="images/SheetMetal/Die1.jpg" alt="Die of Beading Operation Ajay Kant Upadhyay" height="550" width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/SheetMetal/Die2.jpg" alt="Die of Beading Operation Ajay Kant Upadhyay" height="400" width="200"><br/>
Figure (i)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Figure (ii)<br/>Arrangement of dies in Beading Process</center>The second video is of beading operation of the sheet. In this video a bead is formed at the end of the sheet by beading process. All the planes of symmetry are considered to prevent the bending of the sheet. The initial and final form of the sheet is shown in following figure.
<br/><br/><center><img src="images/SheetMetal/Sheet.jpg" alt="Sheet through Beading Ajay Kant Upadhyay" height="400" width="300"><br/>Figure: initial and final form of the sheet</center>
<br/>V. <span class="blue">OTHER COMMON TYPES OF BENDING</span><br>
<br/>a) <span class="blue">V Bending:</span> In V-bending, the clearance between punch and die is constant (equal to the thickness of sheet blank). It is used widely. The thickness of the sheet ranges from approximately 0.5 mm to 25 mm.<br>
<br/><center><img src="images/SheetMetal/bending.jpg" width="500" height="300"></center>
b) <span class="blue">U Die Bending:</span> U-die bending is performed when two parallel bending axes are produced in the same operation. A backing pad is used to force the sheet contacting with the punch bottom. It requires about 30% of the bending force for the pad to press the sheet contacting the punch.<br>
<br/><center><img src="images/SheetMetal/bend4.jpg" width="500" height="300"><br/>
Figure: U Bending</center>
c) <span class="blue">Wiping Die Bending:</span> Wiping die bending is also known as flanging. One edge of the sheet is bent to 90 while the other end is restrained by the material itself and by the force of blank-holder and pad. The flange length can be easily changed and the bend angle can be controlled by the stroke position of the punch.<br/>
<center><img src="images/SheetMetal/bendingwipingdie.jpg" width="600" height="350"></center>
3.2.2 <span class="blue">Stretching:</span> Forming process causes the sheet metal to undergo the desired shape change by stretching without failure. Ref fig.3<br>
<br/>3.2.3 <span class="blue">Deep Drawing:</span> &nbsp;&nbsp;Deep Drawing is a sheet metal process in which metal sheet is radial drawn into a forming die by the mechanical action of punch. It is thus shape transformation process with material retention. The process is considered 'deep' drawing when depth of drawn part is more then its diameter. The sheet metal in the die shoulder area (flanged region) experiences a radial drawing stress and tangential compressive stress due to material retention properties. Deep drawing is always accompanied by other forming technique within the press. These other forming method includes trimming, bulging, sidewall piercing, crimping, date or pattern stamping and etc. Industrial uses of deep drawing processes include automotive body, structural parts, aircraft components, utensil, etc. 
<br><br><center><img src="images/SheetMetal/deep_draw.jpg" width="500" height="350">
<img src="images/SheetMetal/drawingprocess2.jpg" width="500" height="300"><br>
<img src="images/SheetMetal/drawingprocess.jpg" width="400" height="300"><br>
 Figure: Schematic of the Drawing process<br></center>
3.2.4 <span class="blue">Roll forming:</span> Roll forming is a process by which a metal strip is progressively bent as it passes through a series of forming rolls.<br>
 <center>
<img src="images/SheetMetal/rollbending2.jpg" width="350" height="250"><br>
<img src="images/SheetMetal/rollbending1.jpg" width="350" height="250"><br>
<img src="images/SheetMetal/rollbending2.jpg" width="350" height="250"><br>
Figure: Various Bending Operations<br>
 <img src="images/SheetMetal/Boxchannel.jpg"><br>
Figure: Eight-roll sequence for the roll forming of a box channel</center><br>
4. <span class="blue">Dies and Punches</span><br><br>
• <span class="blue">Simple: </span> Single operation with a single stroke.<br>
• <span class="blue">Compound: </span> Two operations with a single stroke.<br>
• <span class="blue">Combination: </span> Two operations at two stations.<br>
• <span class="blue">Progressive: </span> Two or more operations at two or more stations with each press stroke, creates what is called a strip development.<br/><br/><span class="blue">Corrugated Sheet</span>: Most of us are familiar with corrugated cardboards, used to make cartons, boxes and shipping containers. Corrugated cardboards, made of flimsy paper, are more rigid and stronger than a stack of plain paper. This is due to the wavy pattern in which the papers are arranged. The same principle applies in case of corrugated sheet metal roofing too. Corrugated metal sheet roofing uses metal sheets as roofing materials which have a wave-like pattern (with ridges and grooves). This pattern gives them extra strength, despite being lightweight. These corrugated metal roofing sheets are stronger than plain metal sheets.
<br/><br/><center><img src="images/CorrugatedSheet/CorrugatedSheet.png" alt="Corrugated Sheet Ajay Kant Upadhyay"><br/>Figure: Corrugated Sheet</center>
<br/>Corrugated sheet metal roofing is available in copper, aluminium, zinc alloy and stainless steel. All these types vary in their features like durability, appearance and cost. Among them, aluminium is most preferred for residential purposes, as it is inexpensive and extremely lightweight. It is also durable and is resistant to rust, even if there is no coating, though for better looks and a longer lifespan, they are usually coated and painted. Stainless steel corrugated sheets come with a 'tern' coating, which gives a natural matte-grey finish to the roofing. However, this type is very expensive. Corrugated metal sheet roofing is also available in copper. They are resistant to rust and corrosion, and are very easy to install, but very expensive. Metal sheet roofing can also be made of alloys, which are very strong and durable, but again, the cost of alloys are on the higher side.
<br/><br/><span class="blue">Advantages of Corrugated Sheet Metal Roofing:</span> The most popular feature of this roofing material is its durability. These roofing sheets can easily last for about 20 to 50 years. Corrugated metal roofing sheets are treated and coated with chemicals to prevent the growth of algae and mildew. They are also resistant to rot, rust and insects. Other beneficial feature include its non-combustible nature. These sheets have a Class A fire rating, which is the highest rating as far as fire-resistance is concerned. They are also lightweight, which facilitates easy installation and reduces the load on the roof structure Large sprung curves. Most metal roofing products require very little or no maintenance.
<br/><br/><span class="blue">Disadvantages of Corrugated Sheet Metal Roofing:</span> One of the common problems of corrugated metal sheet roofing is that it is prone to denting. It can be caused by any heavy object which falls on the roofing. Even hailstorms can lead to dents in your metal sheet roofing. Another drawback is the high cost of installation, but this is usually offset by the very less maintenance or repair work required by this type of roofing. Most people also complain about the noise created by rain falling on these metal sheets. This, however, can be reduced by using any insulation beneath the sheet at the time of installation. Corrugated sheet metal roofing, though long lasting, may scratch, chip, peel or fade with time. Care must be taken on large roofs to provide for thermal expansion and movement.
Movement caused by differences in temperature may cause objectionable noises in some roofs; for example, curved roof surfaces. However, this is not a common occurrence. Care must be taken with all metal roof products to avoid the use of incompatible materials. Dissimilar metals can cause unexpected and rapid corrosion. 
<br/><br/><span class="blue">Applications:-</span><br/>
•	Green houses<br/>
•	Swimming Pool and Stadium Roofing<br/>
•	Industrial Roofings<br/>
•	Building and Construction<br/><br/>
Thickness: 0.76 mmto 1.5 mm<br/>Colours: Clear, Opal, Bronze, Grey, Green, Blue, and Customized Colours.<br/><br/>
<center><img src="images/CorrugatedSheet/Sheet1.png" alt="Corrugated Sheet Ajay Kant Upadhyay" height="220" width="240"><br/><img src="images/CorrugatedSheet/Sheet2.png" alt="Corrugated Sheet Ajay Kant Upadhyay"></center><br/>
Teeth distance id as 5 mm<br/>
Teeth height is as 6 mm
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