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
	<li class="dir"><a href="Ring_Rolling.php">Ring Rolling</a>
	<ul>
	<li><a href="Rolling_Process.php">Rolling Process</a></li>
	<li><a href="ThreadRolling.php">Thread Rolling</a></li>
	<li><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">FLAT RING</a>
	<ul>
	<li><a href="RingRoll.php?https://www.youtube.com/embed/sApzuJQNMGE">Flat ring setup</a></li>
	<li><a href="RingRoll.php?https://www.youtube.com/embed/qann4xxi71Y">Flat ring with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">CURVED RING</a>
	<ul>	
	<li><a href="RingRoll.php?https://www.youtube.com/embed/d5DZ3Id27h0">Curved ring setup</a></li>
	<li><a href="RingRoll.php?https://www.youtube.com/embed/WVUnAjPmGQM">Curved ring with strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_RingRolling.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Ring Rolling</h2><br>
Ring rolling is a specialized type of metal forming operation, which reduces the thickness (cross section) and enlarges the diameter (circumference) of the work piece by a squeezing action as it passes between two rotating rolls. The ring rolling process is widely used to produce seamless rings with outer diameters ranging from 100 millimetres all the way up to 8 meters with cold or hot work pieces. These rings are commonly used as flanges, pipe flanges, ring gears, structural rings, gas-turbine rings etc. Titanium and super alloy rings are used as housing parts for jet engines in the aerospace industry. Advantages of the process include the attainment of uniform quality, smooth surface finish, close tolerance, short production time and relatively small material loss, especially for rings of complex profiles. There are, however, certain disadvantages in this process compared to the forging process. For example, ring rolling is poor in adequate filling the roll cavities, especially when they are too deep. This is due to the fact that during the ring rolling process the reduction in the cross-section of the ring tends to enlarge the diameter of the ring, instead of forcing the material to fill the roll cavities.<br/>
A typical ring-rolling process has two sets of rolls: a radial set that reduces the radial thickness of the ring, and an axial set that controls the width of the ring, as shown in Figure 1. During the ring rolling process, the main deformation occurs between the king (main) roll and the mandrel (pressure) roll. The rotation of the king roll, coupled by friction at the roll/ring interface, drives the ring through the roll gap, and its wall thickens decreases continuously by the advancing pressure roll. The gap between the main roll and the mandrel roll therefore steadily decreases. As the cross-section of the ring is gradually reduced, the diameter of the ring progressively grows due to incompressibility of the material. The axial rollers named conical rolls used to keep the width of the constant.<br/>
<br/><center><img src="images/RingRolling/3D_RingRolling.jpg" alt="Ring Rolling Ajay Knat Upadhyay" height="250" width="400">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/RingRolling/RingRolling.png" alt="Ring Rolling Ajay Kant Upadhyay" height="250" width="400"><br/>
<br/>Figure: (a) 3-D View of Ring Rolling Process, (b) Schematic View of Ring Rolling Process</center>
<br/><span class="blue">RING ROLLING PROCESS:-</span> There are two types ring-rolling process based on the temperature effect. Cold rolling has the effect of increasing the yield strength of steel by cold working significantly into the strain-hardening range. These increases are predominant in high-strain zones of the cross-sectional shape. The effect of cold working is thus to enhance the mean yield stress by 15% - 30% on average. For purposes of design, the yield stress may be regarded as having been enhanced by a minimum of 15%. Some of the main advantages of cold rolled sections,as compared with their hot-rolled counterparts are as follows:
<br/><br/>•	Cross sectional shapes are formed to close tolerances and these can be consistently repeated for as long as required.
<br/>•	Cold rolling can be employed to produce almost any desired shape to any desired length.
<br/>•	Pre-galvanised or pre-coated metals can be formed, so that high resistance to corrosion as well as an attractive surface finish can be achieved.
<br/><br/><span class="blue">ANALYTICAL DESCRIPTION OF RING ROLLING:</span> The flat rolling analysis of Kalpakjian and Schmid is extended to the ring rolling process. Process parameters are defined as in Figure:
<br/><br/><center><img src="images/RingRolling/RingRollingDescription.png" alt="Ring Rolling Ajay Kant Upadhyay" height="300" width="400"><br/>Figure: Ring Rolling Process Description</center><br/>
The Parameters Used in the analysis are
d<sub>i</sub> = Inner diameter
d<sub>o</sub> = Outer diameter
d<sub>r</sub> = King roll diameter
d<sub>m</sub> = Mandrel diameter
n<sub>r</sub> = Roller rotational speed
n<sub>o</sub> = Ring rotational speed
v<sub>a</sub> = Advance velocity of mandrel<br/><br/>The first relationship to be established is the dependence between cross-sectional thickness and diameter through volume conservation. In this case, plan strain is assumed, so there is no strain in the width direction.
<br/><br/><center>
<table>
<tr>
	<td></td>
	<td>V=V<sub>0</sub></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>&pi;</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td><strike>&nbsp;&nbsp;&nbsp;</strike>&nbsp;&nbsp;</td>
	<td>(d<sup>2</sup><sub>o</sub>-d<sup>2</sup><sub>i</sub>)w</td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td>(d<sup>2</sup><sub>o,0</sub>-d<sup>2</sup><sub>i,0</sub>)w</td>
	<td></td>
</tr>
<tr>
	<td>4</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr></table>
<table>
<tr>
	<td></td>
	<td>d<sub>i</sub>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td>&radic;[d<sup>2</sup><sub>o</sub>-(d<sup>2</sup><sub>o,0</sub>-d<sup>2</sup><sub>i,0</sub>)]</td>
	<td></td>
	<td></td>
</tr>
</table></center>
The inner diameter is therefore dependent on the outer diameter and original blank volume as calculated from original diametral dimensions.<br/>
The next step in analysis is to provide equivalence to the flat rolling process through equating contact lengths between the material and roll or mandrel. This analysis targets defining the equivalent diameter of a flat rolling process roll to represent the more complex curvilinear ring roll.A result for the forming rolls which undergoes
Convex-convex contact is
<br/><br/><center><table>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td><center>d<sub>r</sub></center></td>
	<td></td>
</tr>
<tr>
	<td>d<sub>r,eq</sub></td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td></td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td><center>2d<sub>r</sub></center></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td>1&nbsp;+&nbsp;<strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d<sub>o,0</sub>+d<sub>o</sub>)</td>
	<td></td>
</tr>
</table></center>
d<sub>r</sub>&nbsp;&nbsp;&equiv;&nbsp;&nbsp;roll diameter<br/>
d<sub>o,0</sub>&nbsp;&nbsp;&equiv;&nbsp;&nbsp;initial outer diameter<br/>
d<sub>o</sub>&nbsp;&nbsp;&equiv;&nbsp;&nbsp;ring outer diameter
<br/><br/>
The equivalent flat rolling diameter (convex-flat contact) is therefore smaller than the true diameter of the larger form roll undergoing convex-convex contact. Similarly for the mandrel (inner surface roll):
<br/><br/><center><table>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td><center>d<sub>m</sub></center></td>
	<td></td>
</tr>
<tr>
	<td>d<sub>m,eq</sub></td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td></td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td><center>2d<sub>m</sub></center></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td>1&nbsp;+&nbsp;<strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d<sub>i,0</sub>+d<sub>i</sub>)</td>
	<td></td>
</tr>
</table></center>
d<sub>m</sub>&nbsp;&nbsp;&equiv;&nbsp;&nbsp;mandrel diameter<br/>
d<sub>i,0</sub>&nbsp;&nbsp;&equiv;&nbsp;&nbsp;initial inner diameter<br/>
d<sub>i</sub>&nbsp;&nbsp;&equiv;&nbsp;&nbsp;ring inner diameter
<br/><br/>
The equivalent flat roll diameter is larger due to translation of the convex-concave contact of mandrel to inner ring surface to convex-flat contact of flat rolling.<br/>
Now that the ring rolling process has been translated to flat rolling, the issue of draft must be addressed. The draft is defined as the height reduction in rolling. For flat rolling, the initial and final heights are independent outside of the rolling process itself. However, for ring rolling, the entrance and exit heights are coupled as the exit height in one rotation becomes the entrance height for the next rotation. This coupling effect can be described in terms of the mandrel advance velocity and the rotational speed of the system. If we take the instantaneous advance velocity to be
<br/><br/><center><table>
<tr>
	<td></td>
	<td></td>
	<td>dh</td>
</tr>
<tr>
	<td>V<sub>a</sub></td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td>dt</td>
</tr>
</table></center>
and assume constant velocity over the mandrel travel, we can represent the height change in a single rotation asa finite difference of the form
<br/><br/><center><table>
<tr>
	<td></td>
	<td></td>
	<td>h<sub>1</sub>&nbsp;-&nbsp;h<sub>2</sub></td>
</tr>
<tr>
	<td>V<sub>a</sub></td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td>t<sub>rotation</sub></td>
</tr>
</table></center>
The time for a single rotation is derived from the rotational velocity and diameter of the ring and roll:
<br/><br/><center><table>
<tr>
	<td></td>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60</td>
	<td></td>
	<td>60&pi;d</td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>t<sub>rotation</sub>[sec]</td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td>n<sub>o,1</sub>[rpm]</td>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;V<sub>1</sub></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td>60&pi;d</td>
	<td></td>
	<td>120&pi;d<sub>0</sub></td>
	<td></td>
	<td>60d<sub>o</sub></td>
</tr>
<tr>
	<td>t<sub>rotation</sub>[sec]</td>
	<td>&nbsp;&nbsp;&asymp;&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td>V<sub>roll</sub></td>
	<td></td>
	<td>2&pi;d<sub>r</sub>n<sub>r</sub></td>
	<td></td>
	<td>d<sub>r</sub>n<sub>r</sub></td>
</tr>
</table></center>
Therefore, the height change can be described as
<br/><br/><center><table>
<tr>
	<td></td>
	<td></td>
	<td>&nbsp;60d<sub>0</sub>V<sub>a</sub></td>
</tr>
<tr>
	<td>h1&nbsp;&minus;&nbsp;h2</td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
</tr>
<tr>
	<td></td>
	<td></td>	<td>&nbsp;&nbsp;&nbsp;&nbsp;d<sub>r</sub>n<sub>r</sub></td>
</tr>
</table></center>
Note that h1 and h2 represent the heights into and out of the rolling zone, not the initial and final ring thicknesses, and the strain undergone by the ring section is relative to the original sectional dimensions, as there is no annealing operation between rotations.<br/>
If we take the maximum draft condition to be the point where frictional and normal forces balance in the rolling direction, a maximum angle of acceptance can be defined for flat rolling. This situation is represented in Figure7, where n F represents the normal force against the work piece and F<sub>f</sub>the frictional force tangential to the roll.
<br/><br/><center><img src="images/RingRolling/CriticalRolling.png" alt="Ring Rolling Ajay Kant Upadhyay" height="320" width="250"><br/>Figure: Force Balance at Critical Rolling Height</center><br/>
In order to pull the material into the process, the following force component constraint must be respected:
<br/><br/><center>F<sub>f</sub> cos &alpha; &gt; F<sub>n</sub> sin &alpha;<br />
F<sub>f</sub> = &mu;F<sub>n</sub><br />
&mu;F<sub>n</sub> &gt; F<sub>n</sub> tan &alpha;<br />
&mu; &gt; tan &alpha;</center>
If we assume the roll radius much greater than the height change (large roll assumption),
<br/><br/><center><img src="images/RingRolling/Formulla.jpg" alt="Formulla Ring Rolling Ajay Kant Upadhyay" height="120" width="150"></center>
If we assume the roll radius much greater than the height change (large roll assumption),
<br/><br/><center><table>
<tr>
	<td></td>
	<td></td>
	<td>&mu;<sup>2</sup>d<sub>r</sub></td>
	<td></td>
	<td>60d<sub>0</sub>V<sub>a,max</sub></td>
</tr>
<tr>
	<td>&Delta;h<sub>max</sub></td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;2</td>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d<sub>r</sub>n<sub>r</sub></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td>&mu;<sup>2</sup>d<sup>2</sup><sub>r</sub>n<sub>r</sub></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>V<sub>a,max</sub></td>
	<td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
	<td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td>120d<sub>0</sub></td>
	<td></td>
	<td></td>
</tr>
</table></center>
Therefore, an upper limit on the prescribed mandrel advance velocity is established in order to maintain rotation of the ring during rolling.
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