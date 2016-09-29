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
<div id="header_main">
</div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
echo <<<EOQ
	<li><a href="home.php">Home</a></li>
	<li class="dir"><a href="Rolling_Process.php">Rolling Process</a>
	<ul>
	<li><a href="Ring_Rolling.php">Ring Rolling</a></li>
	<li><a href="ThreadRolling.php">Thread Rolling</a></li>
	<li><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a></li>
	</ul>
	</li>
	<li><a href="Rolling.php">Simulation Bench</a></li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Flat Plate Rolling</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/t6VKzjRu6Gw">Flat Plate</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/FaG4fXe1UrQ">Close-up View</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Angle Rolling</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/v0wYMR2vQGI">Angle Rolling</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/cYAQY360hnY">Angle Rolling with Graph</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/Hpwo8x_Hi10">Angle Bar Rolling</a></li>	
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/jc8VUbC2rfM">Circular Bar Rolling</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">I-Section</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/WV-PlH7Kkcg">I-Section with 4-Roller</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/HVFRCMP7EJA">I-Section with 2-Roller</a></li>	
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/fJexvf_16Gw">I-Section with graph</a></li>
	</ul>
	</li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/4vL0vnRppVo">Seamless pipe using Rolling</a></li>
	</ul> 
	</li>
	<li><a href="MCQ_Rolling.php">Self Check Quiz</a></li>	
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Rolling Process</h2><br>
It is the process of plastically deforming metal by passing it between rolls. Rolling may be defined as the reduction of the cross-sectional area of the metal stock, or the general shaping of the metal products, through the use of the rotating rolls. It allows a high degree of closed-loop automation and very high speeds, and is thus capable of providing high-quality, close tolerance starting material for various secondary sheet metal working processes at a low cost.<br><br>
• Rolling is the most widely used forming process, which provides high production and close control of final product. <br>
• The metal is subjected to high compressive stresses as a result of the friction between the rolls and the Rolling process metal surface.. <br><br>
<span class="blue">Introduction -</span> Hot and cold rolling processes: <br><br>
<span class ="blue">Hot rolling:- </span><br>
 The initial breakdown of  ingots into blooms and billets is generally done by hot-rolling. This is followed by further hot rolling into plate, sheet, rod, bar, pipe, rail. The distinctive mark of hot rolling is not a crystallized structure, but the simultaneous occurrence of dislocation propagation and softening processes, with or without re-crystallization during rolling. <br><br>
Hot rolling offers several advantages:<br>
a)	Flow stresses are low, hence forces and power requirements are relatively low, and even very large work pieces can be deformed with equipment of reasonable size. <br>
b)	Ductility is high; hence large deformations can be taken (in excess of 99% reduction). <br>
c)	Complex part shapes can be generated<br><br>
<span class ="blue">Cold rolling:-</span><br>
The cold-rolling of metals has played a major role in industry by providing sheet, strip, foil with good surface finishes and increased mechanical strength with close control of product dimensions. Cold rolling, in the everyday sense, means rolling at room temperature, although the work of deformation can raise temperatures to 100-200°C. Cold rolling usually follows hot rolling. <br><br>
Cold rolling has several advantages: <br>
a)	In the absence of cooling and oxidation, tighter tolerances and better surface finish can be obtained. <br>
b)	Thinner walls are possible. <br>
c)	The final properties of the workpiece can be closely controlled and, if desired, the high strength obtained during cold rolling can be retained or, if high ductility is needed, grain size can be controlled before annealing. <br>
d)	Lubrication is, in general, easier. <br><br>
<span class ="blue">TYPICAL ARRANGEMENT OF ROLLERS FOR ROLLING MILLS</span><br><br>
<span class ="blue">TWO-HIGH MILL, PULLOVER:- </span> The stock is returned to the entrance for further reduction. <br><br>
<center><img src="images/Rolling/r1.jpg" height="275" width="350"><br>Figure:1 Two-high mill, pullover</center><br>
 <span class ="blue">TWO-HIGH MILL, REVERSING:- </span>The work can be passed back and forth through the rolls by reversing their direction of rotation. <br><br>
<center><img src="images/Rolling/r2.jpg" height="275" width="350"><br>Figure:2 Two-high mill, reversing</center><br><span class ="blue">THREE-HIGH MILL:- </span> Consist of upper and lower driven rolls and a middle roll, which rotates by friction. <br><br>
 <center><img src="images/Rolling/r3.jpg" height="275" width="350"><br>Figure:3 Three-high mill</center><br>
<span class ="blue">FOUR-HIGH MILL:- </span>Small-diameter rolls (less strength &rigidity) are supported by larger-diameter backup rolls. <br><br> 
<center><img src="images/Rolling/r4.jpg" height="275" width="225">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/Rolling/r5.jpg" height="275" width="225"><br>Figure:4 Four-high mill</center><br>
<span class ="blue">CLUSTER MILL OR SENDZIMIR MILL: </span> Each of the work rolls is supported by two backing rolls. <br><br>
<center><img src="images/Rolling/r6.jpg" height="300" width="350"><br>Figure:5 Cluster mill or sendzimir mill</center><br>
 <span class ="blue">CONTINUOUS ROLLING</span><br><br>
•	Use a series of rolling mill and each set is called a stand. <br>
•	The strip will be moving at different velocities at each stage in the mill. <br>
•	The un coiler and windup reel not only feed the stock into the rolls and coiling up. <br>
•	the final product but also provide back tension and front tension to the strip. <br>
•	The speed of each set of rolls is synchronised so that the input speed of each stand is equal to the output speed of preceding stand. <br >
Given below is the example of a four stand continuous mill or tandem mill. <br>
Typical arrangement of rollers for rolling mills.<br><br>
<span class ="blue">Planetary mill:-</span> Consist of a pair of heavy backing rolls surrounded by a large number of planetary rolls. <br><br>
•	Each planetary roll gives an almost constant reduction to the slab as it sweeps out a circular path between the backing rolls and the slab. <br>
•	As each pair of planetary rolls ceases to have contact with the work piece, another pair of rolls makes contact and repeat that reduction. <br>
•	The overall reduction is the summation of a series of small reductions by each pair of rolls. <br>
•	Therefore, the planetary mill can hot reduces a slab directly to strip in one pass through the mill. <br>
•	The operation requires feed rolls to introduce the slab into the mill, and a pair of planishing rolls on the exit to improve the surface finish. <br><br>
<center><img src="images/Rolling/r7.jpg" height="275" width="350"><br>
Figure:6 Typical arrangement of rollers for rolling mill</center><br>
<span class ="blue">ROLLING MILLS:-</span> Rolling mill is a machine or a factory for shaping metal by passing it through rollers Successive stands of a large continuous mill. <br><br>
A rolling mill basically consists of: <br>
• rolls<br>
• bearings<br>
• a housing for containing these parts<br>
• a drive (motor) for applying power to the rolls and controlling the speed<br>
• Requires very rigid construction, large motors to supply enough power (MN). <br><br>
<span class ="blue">CONVENTIONAL HOT OR COLD-ROLLING</span><br><br>
The objective is to decrease the thickness of the metal with an increase in length and with little increase in width. <br><br>
• The material in the centre of the sheet is constrained in the z direction (across
the width of the sheet) and the constraints of undeformed shoulders of material on each side of the rolls prevent extension of the sheet in the width direction. <br>
• This condition is known as plane strain. The material therefore gets longer and not wider. <br><br>
<span class ="blue">TRANSVERSE ROLLING</span><br><br>
• Using circular wedge rolls. <br>
• Heated bar is cropped to length and fed in transversely between rolls. <br>
• Rolls are revolved in one direction. <br><br>
<center><img src="images/Rolling/r8.jpg" height="275" width="275"><br>Figure:7 Transverse rolling</center><br>
<span class ="blue">SHAPED ROLLING OR SECTION ROLLING</span><br><br>
<center><img src="images/Rolling/r9.jpg" height="275" width="225"><br>Figure:8 Shaped rolling</center><br>
• A special type of cold rolling in which flat slap is progressively bent into complex shapes by passing it through a series of driven rolls. <br>
• No appreciable change in the thickness of the metal during this process. <br>
• Suitable for producing moulded sections such as irregular shaped channels and trim.
A variety of sections can be produced by roll forming process using a series of forming rollers in a continuous method to roll the metal sheet to a specific shape. <br><br>
<span class ="blue">Fundamental concept of metal rolling</span>
<br><br>
<span class ="blue">ASSUMPTIONS:-</span><br><br>
1)The arc of contact between the rolls and the metal is a part of a circle. <br>
2)The coefficient of friction,µ, is constant in the theory, but in reality µ varies along the arc of contact. <br>
3)The metal is considered to deform plastically during rolling. <br>
4)The volume of metal is constant before and after the rolling. In practical the volume might decrease a little bit due to close-up of pores. <br>
5)The velocity of the rolls is assumed to be constant. <br>
6)The metal only extends in the rolling direction and no extension in the width of the material. <br>
7)The cross sectional area normal to the rolling direction is not distorted. <br><br>
<center><img src="images/Rolling/r10.jpg" height="275" width="375"></center><br>
<span class ="blue">FORCES AND GEOMETRICAL RELATIONSHIPS IN ROLLING</span><br><br>
•	A metal sheet with a thickness h0 enters the rolls at the entrance plane xx with a velocity vo . <br>
•	It passes through the roll gap and leaves the exit plane yy with a reduced thickness hf  and at a velocity vr. <br>
•	Given that there is no increase in width, the vertical compression of the metal is translated into an elongation in the rolling direction. <br>
•	Since there is no change in metal volume at a given point per unit time throughout the process, therefore<br><br> 
<center>bh<sub>o</sub>&nu;<sub>o</sub>&nbsp;=&nbsp;bh&nu;&nbsp;=&nbsp;bh<sub>f</sub>&nu;<sub>f</sub>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..Eq.1</center><br>
where b is the width of the sheet<br>
v is the velocity at any thickness h intermediate between ho and hf.
From Eq.1 <br><br>
<center><img src="images/Rolling/r11.jpg" height="175" width="350"><br><br>
<table width="150" border="0">
  <tr>
    <td>bh<sub>o</sub>v<sub>o</sub></td>
    <td>=</td>
    <td>bhv</td>
	<td>=</td>
    <td>bh<sub>f</sub>v<sub>f</sub></td>
  </tr>
  <tr>
    <td>given</td>
    <td>that,&nbsp;</td>
    <td>b<sub>o</sub></td>
    <td>=</td>
    <td>b<sub>f</sub></td>
  </tr>
  <tr>
    <td></td>
    <td>L<sub>o</sub></td>
    <td></td>
    <td></td>
    <td>L<sub>f</sub></td>
  </tr>
  <tr>
    <td>h<sub>o</sub></td>
    <td><strike>&nbsp;&nbsp;&nbsp;</strike></td>
    <td>=</td>
    <td>h<sub>f</sub></td>
    <td><strike>&nbsp;&nbsp;&nbsp;</strike></td>
  </tr>
  <tr>
    <td></td>
    <td>t</td>
    <td></td>
    <td></td>
    <td>t</td>
  </tr>
  <tr>
    <td>then</td>
    <td>we</td>
    <td>have</td>
  </tr>
  <tr>
    <td>v<sub>o</sub>h<sub>o</sub></td>
    <td>=</td>
    <td>v<sub>f</sub>h<sub>f</sub></td>
  </tr>
  <tr>
    <td>v<sub>o</sub></td>
    <td></td>
    <td>h<sub>f</sub></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><strike>&nbsp;&nbsp;&nbsp;</strike></td>
    <td>=</td>
    <td><strike>&nbsp;&nbsp;&nbsp;</strike></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>v<sub>f</sub></td>
    <td></td>
    <td>h<sub>o</sub></td>
    <td></td>
    <td></td><td>..Eq.2</td>
  </tr>
</table></center><br>									                                                                                                                 
The velocity of the sheet must steadily increase from entrance to exit such that a vertical element in the sheet remain undistorted. <br><br>
• At only one point along the surface of the contact between the roll and the sheet, the two forces act on the metal:<br> <span class ="blue">1- a radial force P</span>r <br><span class ="blue">2- a tangential frictional force F</span>. <br>
• If the surface velocity of the roll vr equal to the velocity of the sheet, this point is called neutral point or no-slip point. For example, point N. <br>
• Between the entrance plane(xx) and the neutral point the sheet is moving slower than the roll surface, and the tangential frictional force, F, act in the direction (see fig.)to draw the metal into the roll. <br>
• On the exit side(yy) of the neutral point, the sheet moves faster than the roll surface. The direction of the frictional force is then reversed and oppose the delivery of the sheet from the rolls. <br><br>
<center><img src="images/Rolling/r12.jpg" height="300" width="450"></center><br>
	Pr, is the radial force, with a vertical component P(<b>rolling load-</b>the load with which the rolls press against the metal). <br>
The specific roll pressure, p ,is the rolling load divided by the contact area.<br><br>
<center><table width="150" border="0">
  <tr>
    <td></td>
    <td></td>
    <td>P</td>
  </tr>
  <tr>
    <td>p&nbsp;&nbsp;</td>
    <td>=&nbsp;&nbsp;</td>
    <td><strike>&nbsp;&nbsp;&nbsp;</strike></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>bl<sub>p</sub></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..Eq.3</td>
  </tr>
</table></center><br>						
where b is the width of the sheet.	<br><br>
<center><img src="images/Rolling/r13.jpg" height="400" width="400"></center><br>				
L<sub>p</sub> is the projected length of the arc of the contact<br><br>
<center><img src="images/Rolling/e3.jpg" width=500; height=60;>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..Eq.4</center><br>
<center><table width="110" border="0">
  <tr>
    <td>L<sub>p</sub></td>
    <td>&asymp;</td>
    <td>&radic;<b style="font-family:Arial; text-decoration:overline;">R&Delta;h</b></td>
  </tr>
</table></center><br><br>
• The <span class ="blue">distribution of the roll pressure </span>along the arc of contact shows that the pressure rises to a maximum at the neutral point ant then falls off. <br>
• The pressure distribution does not come to a sharp peak at the neutral point ,which indicate that  the<span class ="blue"> neutral point is not really a line</span> on the roll surface but an area. <br>
• The area under the curve is proportional to the rolling load. <br><br>
<center><img src="images/Rolling/r14.jpg" height="300" width="400"></center><br>
• The area in <span class ="blue">shade </span>represent the force required to
 overcome frictional forces between the roll and the sheet. <br>
• The area <span class ="blue">under the dashed line AB</span>
represents the force required to deform the metal in plane homogeneous compression<br><br>
<center><img src="images/Rolling/r15.jpg" height="250" width="200"></center><br>
<span class ="blue">ROLL BITE CONDITION</span><br><br>
For the work piece to enter the throat of the roll. The component of the friction force must be equal to or greater than the horizontal component of the normal force. <br><br>
<center>
<table width="300" border="0">
  <tr>
    <td>F cos &alpha;&nbsp;&nbsp;</td>
    <td>&ge;&nbsp;&nbsp;</td>
    <td>P<sub>r</sub> sin &alpha;</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;F</td>
    <td></td>
    <td>sin &alpha;</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<strike>&nbsp;&nbsp;&nbsp;</strike></td>
    <td>&ge;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;<strike>&nbsp;&nbsp;&nbsp;</strike></td>
    <td>&ge;&nbsp;&nbsp;</td>
    <td>tan &alpha;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;P<sub>r</sub></td>
    <td></td>
    <td>cos &alpha;</td>
    <td></td>
    <td></td>
  </tr>
</table></center><br>
<center><img src="images/Rolling/r16.jpg" height="250" width="375"></center><br>
 But we know that<center><table><tr><td>
 F&nbsp;&nbsp;</td><td>=&nbsp;&nbsp;</td><td>&mu;P<sub>r</sub></td></tr>
 <tr><td>&mu;&nbsp;&nbsp;</td><td>=&nbsp;&nbsp;</td><td>tan &alpha;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..Eq.5</td></tr></table></center><br>
•	If tan&alpha;>&mu;,the work piece cannot be drawn.<br>
•	If  &mu;=0, rolling  cannot occur.<br><br>
Therefore Free engagement will occur when &mu;>tan&alpha;<br><br> 
<center><img src="images/Rolling/r17.jpg" height="400" width="600"></center><br>
<span class ="blue">THE MAXIMUM REDUCTION</span><br><br>
From triangle ABC, we have	<br><br>
<center><img src="images/Rolling/r18.jpg" height="300" width="400"><br>
<table width="300" border="0">
  <tr>
    <td>R<sup>2</sup></td><td>=&nbsp;</td><td>L<sub>p</sub><sup>2</sup></td><td>+</td><td>(R&nbsp;-&nbsp;a)<sup>2</sup></td>
  </tr>
  <tr>
    <td>L<sub>p</sub><sup>2</sup></td><td>=</td><td>R<sup>2</sup></td><td>-</td><td>(R<sup>2</sup>&nbsp;-&nbsp;2Ra&nbsp;+&nbsp;a<sup>2</sup>)</td>
  </tr>
  <tr>
    <td>L<sub>p</sub><sup>2</sup></td><td>=</td><td>2Ra</td><td>-</td><td>a<sup>2</sup></td>
  </tr>
</table>
</center><br><br>
As a is much smaller than R, we can then ignore a2<br><br>
 <center><img src="images/Rolling/e8.jpg" width=400 height=180></center><br>
<span class ="blue">Torque and power</span><br><br>
<span class ="blue">Torque</span> is the measure of the force applied to a member to produce rotational motion. <br><br>
<span class ="blue">Power</span> is applied to a rolling mill by applying a torque to the rolls and by means of strip tension. <br><br>
<span class ="blue">The power is spent principally in four ways: </span><br><br>
a)	The energy needed to deform the metal. <br>
b)	The energy needed to overcome the frictional force. <br>
c)	The power lost in the pinions and power-transmission system. <br>
d)	Electrical losses in the various motors and generators. <br><br>
<span class ="blue">Remarks:-</span> Losses in the windup reel and uncoiler must also be considered. <br><br>
The total rolling load is distributed over the arc of contact in the typical friction-hill pressure distribution. <br>
However the total rolling load can be assumed to be concentrated at a point along the arc of the contact at a distance a from the line of centres of the rolls. <br>
The ratio of the moment arm a to the projected length of the act of the contact Lp can be given as<br><br>
<center><table width="150" border="0">
  <tr>
    <td></td>
    <td></td>
    <td>&nbsp;a</td>
    <td></td>
    <td>&nbsp;&nbsp;a</td>
  </tr>
  <tr>
    <td>&lambda;&nbsp;</td>
    <td>=&nbsp;&nbsp;</td>
    <td><strike>&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
    <td>&nbsp;&nbsp;=&nbsp;&nbsp;</td>
    <td><strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strike></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>&nbsp;L<sub>p</sub></td>
    <td></td>
    <td>&radic;<b style="font-family:Arial; text-decoration:overline;">R&Delta;h</b></td>
  </tr>
</table></center><br>
where &lambda; is 0.5 for hot-rolling and 0.45 for cold rolling. <br><br>
<center><img src="images/Rolling/r19.jpg" height="300" width="350"></center><br>
    The <span class ="blue">torque-MT</span> is equal to the <span class ="blue">total rolling load P</span> multiplied by the <span class ="blue">effective moment arm a</span>. Since there are two rolls, the torque is given by<br>
<center>M<sub>T</sub>&nbsp;&nbsp;=&nbsp;&nbsp;2Pa</center><br>
During one revolution of the top roll the resultant <span class ="blue">rolling load P</span> moves along the circumference of a circle equal to <span class ="blue">2&pi;a</span>.Since there are two work rolls, the <span class ="blue">work done</span> W is equal to<br><br><center>
Work&nbsp;&nbsp;=&nbsp;&nbsp;2(2&pi;a)P</center><br>
Since the power is defined as the <span class ="blue">rate of doing work</span>, i.e.,1W=1Js<sup>-1</sup>,the power (in watts) needed to operated a pair of rolls revolving at N Hz(s<sup>-1</sup>) in deforming metal as it flows through the roll gap is given by <br><br><center>
W&nbsp;&nbsp;=&nbsp;&nbsp;4&pi;aPN</center><br>
where P is in Newton and a is in meters<br><br>
<center><img src="images/Rolling/r20.jpg" height="300" width="350"></center>
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