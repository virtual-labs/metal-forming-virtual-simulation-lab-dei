<?php session_start();
if($_SESSION['auth']!="ajayMEM103kant2019upadhyay")
{
header("location:mem103.php");
}
else
{
?>
<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manufacturing Processes-I</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/mem.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;">
<div id="header"><br/>MEM-103 Manufacturing Processes-I<br /><br /></div>
<div>
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<script type="text/javascript">
//Google Analytics Code
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38541839-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table border="0" width="100%">
<tr><td width="65%"><b>Lesson 2 Metal Cutting & Cutting Tool for Lathe</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/UNIT5/Unit5Lesson2.pdf" target="_blank" title="Download Lesson 2">Lesson 2 Download</a></td></tr>
<tr><td><a href="#introduction">2.0&nbsp;&nbsp;&nbsp;Introduction</a></td></tr>
<tr><td><a href="#deformation">2.1&nbsp;&nbsp;&nbsp;Plastic deformation in Metal cutting</a></td></tr>
<tr><td><a href="#cutting">2.2&nbsp;&nbsp;&nbsp;Types of cutting</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1.1&nbsp;&nbsp;&nbsp;Orthogonal cutting</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.2.2&nbsp;&nbsp;&nbsp;Oblique cutting</td></tr>
<tr><td><a href="#tools">2.3&nbsp;&nbsp;&nbsp;Types of cutting tools</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3.1&nbsp;&nbsp;&nbsp;Single-point cutting tool</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3.2&nbsp;&nbsp;&nbsp;Multipoint cutting tool</td></tr>
<tr><td><a href="#conditions">2.4&nbsp;&nbsp;&nbsp;Cutting conditions</a></td></tr>
<tr><td><a href="#machinability">2.5&nbsp;&nbsp;&nbsp;Machinability</a></td></tr>
<tr><td><a href="#terminology">2.6&nbsp;&nbsp;&nbsp;Cutting tool terminology</a></td></tr>
<tr><td><a href="#shapes">2.7&nbsp;&nbsp;&nbsp;Shapes of standard cutting tool</a></td></tr>
<tr><td><a href="#properties">2.8&nbsp;&nbsp;&nbsp;Properties of Cutting Tools</a></td></tr>
<tr><td><a href="#materials">2.9&nbsp;&nbsp;&nbsp;Cutting tool Materials</a></td></tr>
<tr><td><a href="#effect">2.10&nbsp;&nbsp;&nbsp;Effect of alloying elements</a></td></tr>
<tr><td><a href="#speed">2.11&nbsp;&nbsp;&nbsp;High speed steel (HSS) toolbits</a></td></tr>
<tr><td><a href="#wear">2.12&nbsp;&nbsp;&nbsp;Types of wear observed in cutting tools</a></td></tr>
<tr><td><a href="#formation">2.13&nbsp;&nbsp;&nbsp;Chip Formation</a></td></tr>
<tr><td><a href="#fluids">2.14&nbsp;&nbsp;&nbsp;Cutting Fluids</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="introduction">2.0 &nbsp;&nbsp;&nbsp;Metal Cutting & Cutting Tool for Lathe</a></b></dt>
<dd><p>
The process in which a thin layer of excess metal (chip) is removed by a wedge-shaped single-point or multipoint cutting tool with defined geometry from a work piece, through a process of extensive plastic deformation.<br/><br/>
<center><table border="0" width="800"><tr><td><img src="images/mem/Unit5/Lesson2/1.jpg"></td><td><img src="images/mem/Unit5/Lesson2/2.jpg"></td></tr>
<tr><td>Close-up view of a turning operation in which a thin layer of metal (chip) is removed from the work surface of a rotating work piece by a cutting tool. The newly generated surface is referred to as a machined surface. Cutting process requires both primary and feed motions.</td>
<td width="300" valign="top">Schematics of metal cutting process showing the basic terminology. Two basic angles in cutting tool shown for plate machining with fixed tool and moving plate.</td></tr>
</table><b>Figure: 1</b></center>
</p></dd>
<dt><b><a name="deformation">2.1 &nbsp;&nbsp;&nbsp;Plastic deformation in Metal cutting</a></b></dt>
<dd><p>
The cutting itself is a process of extensive plastic deformation to form a chip that is removed afterward. The basic mechanism of chip formation is essentially the same for all machining operations. Assuming that the cutting action is continuous, we can develop so-called continuous model of cutting process shown in the figure:<br/><br/>
<center><table border="0" width="800"><tr><td><img src="images/mem/Unit5/Lesson2/3.jpg"></td><td><img src="images/mem/Unit5/Lesson2/4.jpg"></td><td><img src="images/mem/Unit5/Lesson2/5.jpg"></td></tr>
<tr><td>Chip formation in metal cutting is accompanied by substantial shear and frictional deformations in the shear plane and along the tool face.</td>
<td valign="top">2-d cutting process, d and w are the thickness (depth) of cut and width (feed) of cut respectively, c is the chip thickness, a is the tool rake angle, and F is the shear plane angle</td>
<td valign="top">Cutting with positive and negative rake angles. Note the change in the shear plane angle and chip thickness shown by broken line.</td></tr>
</table><b>Figure: 2</b></center>
</p></dd>
<dt><b><a name="cutting">2.2 &nbsp;&nbsp;&nbsp;Types of cutting</a></b></dt>
<dd><p>
Depending on whether the stress and deformation in cutting occur in a plane (2-d case) or in the space (3-d case), we consider two principle types of cutting:<br/><br/>
<b>2.2.1 Orthogonal cutting</b> the cutting edge is straight and is set in a position that is perpendicular to the direction of primary motion. This allows us to deal with stresses and strains that act in a plane.<br/><br/>
<b>2.2.2 Oblique cutting</b> the cutting edge is set at an angle (the tool cutting edge inclination ?s). This is the case of three-dimensional stress and strain conditions.
<center><table style="text-align:center" border="0" width="800"><tr><td><img src="images/mem/Unit5/Lesson2/6.jpg"></td><td><img src="images/mem/Unit5/Lesson2/7.jpg"></td></tr>
<tr><td colspan="2">Orthogonal cutting with a cutting tool set normally to the direction of primary motion</td></tr>
<tr><td><img src="images/mem/Unit5/Lesson2/8.jpg"></td><td><img src="images/mem/Unit5/Lesson2/9.jpg"></td></tr>
<tr><td colspan="2">Oblique cutting with a cutting tool set at the tool cutting edge inclination angle &lambda;s to the direction of primary motion.</td></tr>
</table><b>Figure: 3</b></center>
</p></dd>
<dt><b><a name="tools">2.3 &nbsp;&nbsp;&nbsp;Types of cutting tools</a></b></dt>
<dd><p>
Cutting tools are most important components in machining process and the efficiency of operation depends on the performance of tools. According to the number of active cutting edges engaged in cutting, we distinguish again two types of cutting:<br/><br/>
<b>2.3.1 Single-point cutting tool</b> has only one major cutting edge. Examples: turning, shaping, boring.<br/><br/>
<b>2.3.2 Multipoint cutting tool</b> has more than one major cutting edge Examples: drilling, milling, broaching, reaming. Abrasive machining is by definition a process of multipoint cutting.
<center><table border="0" width="500">
<tr><td><img src="images/mem/Unit5/Lesson2/10.jpg"></td><td><img src="images/mem/Unit5/Lesson2/11.jpg"></td></tr>
<tr><td>Single point cutting tool</td><td>Multipoint cutting tool for milling</td></tr>
</table><b>Figure: 4</b></center>
</p></dd>
<dt><b><a name="conditions">2.4 &nbsp;&nbsp;&nbsp;Cutting conditions</a></b></dt>
<dd><p>
Each machining operation is characterized by cutting conditions, which comprises a set of three elements:<br/><br/>
<b>Cutting velocity (V)</b>: the traveling velocity of the tool relative to the work piece (speed difference between the cutting tool and the surface of the work piece). It is measured in m/s or m/min.<br/><br/>
<b>Depth of cut (d)</b>: the axial projection of the length of the active cutting tool edge, measured in mm. In orthogonal cutting it is equal to the actual width of cut.<br/><br/>
<b>Feed (f)</b>: the relative velocity of the tool at which it is advanced along the workpiece in order to process the entire surface of the work piece. In orthogonal cutting it is equal to the thickness of and is measured in mm/revolution in turning, or mm/min in milling and drilling. Feed rate units depend on the motion of the tool and workpiece; when the workpiece rotates (e.g., in turning and boring), the units are almost always distance per spindle revolution [mm/rev]). When the workpiece does not rotate (e.g., in milling), the units are typically distance per time [mm/min]).
</p></dd><br/>
<dt><b><a name="machinability">2.5 &nbsp;&nbsp;&nbsp;Machinability</a></b></dt>
<dd><p>
Machinability is a term indicating how the work material responds to the cutting process. In the most general case good machinability means that material is cut with good surface finish, long tool life, low force and power requirements, and low cost.
</p></dd><br/>
<dt><b><a name="terminology">2.6 &nbsp;&nbsp;&nbsp;Cutting tool terminology</a></b></dt>
<dd><p>
Most of the cutting tools have three angles, i.e. rake angle, clearance angle and setting angle. A general purpose hand chisel is shown in the figure below with all these three angles. These angles are provided to make the process of cutting easier in terms of reduced friction between work and the tool, easy disposal of cut material (chip), reduced cutting forces, low wear and more tool life.<br/><br/>
The standard terminology is shown in the following figure. For single point cutting tools, the most important angles are the rake angles, end relief angle and side relief angle.<br/><br/>
<center><img src="images/mem/Unit5/Lesson2/12.jpg"><br/>
Oblique view of tool from cutting edge: Standard terminology to describe the geometry of single-point cutting tool<br/><br/>
<table style="text-align:center" border="0" width="600">
<tr><td></td><td><img src="images/mem/Unit5/Lesson2/13.jpg"></td></tr>
<tr><td></td><td><b>Top view</b></td></tr><tr><td>&nbsp;</td></tr>
<tr><td><img src="images/mem/Unit5/Lesson2/14.jpg"></td><td><img src="images/mem/Unit5/Lesson2/15.jpg"></td></tr>
<tr><td><b>Side view</b></td><td><b>Side shank view or front view</b></td></tr></table>
Standard terminology to describe the geometry of single-point cutting tool: (a) 3-D views of single point cutting tool.<br/><b>Figure: 5</b></center>
The actual geometry varies with the type of work to be done.<br/><br/>
<b>Cutting edge</b>: The cutting edge is the part of the tool bit that actually cuts into the work piece, located behind the nose and adjacent to the side and face.<br/>
<b>Shank</b>: The shank is the main body of the tool bit. Shank is held in tool holder.<br/>
<b>Nose</b>: Tip of cutting tool formed by junction of cutting edge and front face. The nose radius is the rounded end of the tool bit. Finishing of process depends on nose radius.<br/>
<b>Face</b>: The face is the top surface of the tool bit upon which the chips slide as they separate from the work piece.<br/>
<b>Flank</b>: The flank of the tool is the surface just below and adjacent to the cutting edge.<br/>
<b>Base</b>: The base is the bottom surface of the tool bit, which usually is ground flat during tool bit manufacturing.<br/>
<b>Heel</b>: The heel is the portion of the tool bit base immediately below and supporting the face.<br/>
<b>Point</b>: End of tool that has been ground for cutting purposes.<br/><br/>
<center><img src="images/mem/Unit5/Lesson2/16.jpg"><br/>
<b>Figure 6: Sample shape and dimensions of lathe single point cutting tool</b></center><br/>
<b>Side rake angle</b>: If viewed behind the tool down the length of the toolholder, it is the angle formed by the face of the tool and the centerline of the workpiece. A positive side rake angle tilts the tool face down toward the floor, and a negative angle tilts the face up and toward the workpiece.<br/><br/>
<b>Note</b>:<br/>
<b>Negative angle</b>: If the cutting edge of the tool is ahead of the perpendicular, the angle is, by definition, negative.<br/>
<b>Positive angle</b>: If the leading edge of the blade is behind the perpendicular, the angle is by definition, positive.<br/><br/>
<center><table border="0" width="600">
<tr><td><img src="images/mem/Unit5/Lesson2/17.jpg"></td><td><img src="images/mem/Unit5/Lesson2/18.jpg"></td>
<td><img src="images/mem/Unit5/Lesson2/19.jpg"></td><td><img src="images/mem/Unit5/Lesson2/20.jpg"></td></tr>
<tr><td>Positive side rake angle</td><td>Negative side rake angle</td><td>Positive back rake angle (top face slopes downward away from point)</td>
<td>Negative back rake angle (top face slopes upward away from point)</td></tr>
</table><b>Figure: 7</b></center><br/>
<b>Back rake angle</b>: If viewed from the side facing the end of the workpiece, it is the angle formed by the face of the tool and a line parallel to the floor. A positive back rake angle tilts the tool face back, and a negative angle tilts it forward and up.<br/><br/>
<center><img src="images/mem/Unit5/Lesson2/21.jpg"><br/><b>Figure: 8</b></center><br/>
<b>End cutting edge angle</b>: If viewed from above looking down on the cutting tool, it is the angle formed by the end flank of the tool and a line parallel to the workpiece centerline. Increasing the end cutting edge angle tilts the far end of the cutting edge away from the workpiece.<br/>
<b>End relief angle</b>: If viewed from the side facing the end of the workpiece, it is the angle formed by the end flank of the tool and a vertical line down to the floor. Increasing the end relief angle tilts the end flank away from the workpiece.<br/>
<b>Side cutting edge angle</b>: If viewed from above looking down on the cutting tool, it is the angle formed by the side flank of the tool and a line perpendicular to the workpiece centerline. A positive side cutting edge angle moves the side flank into the cut, and a negative angle moves the side flank out of the cut.<br/>
<b>Side relief angle</b>: If viewed behind the tool down the length of the toolholder, it is the angle formed by the side flank of the tool and a vertical line down to the floor. Increasing the side relief angle tilts the side flank away from the workpiece. Permits side of tool to advance into work.<br/>
<b>Angle of keenness</b>: Formed by side rake and side clearance.<br/><br/>
<b>Functions of rake angle</b><br/>
(1) The strength of the cutting tool depends on rake angle.<br/>
(2) Allows the chip being cut to flow out.<br/>
(3) Changing the rake changes the power used in cutting and the heat generated.<br/>
(4) Positive (large) rake may be used for soft ductile materials. Positive rake angles improve the cutting operation with regard to forces and deflection; however, a high positive rake angle may result in early failure of the cutting edge. Positive rake angles are generally used in lower-strength materials. It reduces friction and heat. Allows chip to flow freely along chip tool interface.<br/>
(5) Negative (or small) rake may be used for higher-strength, hard, brittle materials. It has more cross sectional area for resisting the cutting forces. Strength of the tool is maximum when rake angle is negative.<br/>
(6) Back rake usually controls the direction of chip flow and is of less importance than the side rake.<br/><br/>
<b>Functions of side cutting angle</b><br/>
(1) The side cutting-edge angle influences the length of chip contact and the true feed.<br/>
(2) Small end cutting-edge angles may create excessive force normal to the workpiece.<br/>
(3) The greater the angle, the more tool deflection and weakens the tool point.<br/>
(4) The smaller the angle, the bigger the chip and more the tool will wear.<br/><br/>
<b>Functions of clearance angle</b><br/>
(1) The purpose of relief angles is to avoid interference and rubbing between the workpiece and tool flank surfaces, i.e. it ensures only the cutting edge of the tool touches the work<br/>
(2) Too much clearance angle weakens the tool and causes chatter<br/>
(3) In general, they should be small for high-strength materials and larger for softer materials.<br/><br/>
<center><img src="images/mem/Unit5/Lesson2/29.jpg"><br/><b>Figure 9: Cutting tool in action. Effect of clearance and relief angles can be observed</b></center>
<b>Functions of nose radius</b><br/>
(1) The purpose of the nose radius is to give a smooth surface finish and to obtain longer tool life by increasing the strength of the cutting edge.<br/>
(2) A large nose radius gives a stronger tool and may be used for roughing cuts; however, large radii may lead to tool chatter and more power requirement.<br/>
(3) The nose radius should be tangent to the cutting-edge angles.<br/>
(4) A small nose radius reduces forces and is therefore preferred on thin or slender workpieces.<br/><br/>
<b>Factors for choosing type and rake angle for cutting tool</b><br/>
1. Hardness of metal to be cut<br/>
2. Type of cutting operation, i.e. continuous or interrupted<br/>
3. Material and shape of cutting tool<br/>
4. Strength of cutting edge
</p></dd><br/>
<dt><b><a name="shapes">2.7 &nbsp;&nbsp;&nbsp;Shapes of standard cutting tool</a></b></dt>
<dd><p>
With respect to direction of feed, single point cutting tools may be classified as either left hand or right hand, depending on their cutting edge on the specified side and will cut when moved from left to right or right to left.<br/><br/>
In <b>right hand cutting tool</b> the side cutting edge is on the side of the thumb when the right hand is placed on the tool with the hand fingers pointing towards the tool nose. Right hand tool cuts from right to left.<br/><br/>
In <b>left hand cutting tool</b> the side cutting edge is on the thumb side when the left hand is placed on the tool. Left hand cutting tools are designed to cut best when traveling from left to right.<br/><br/>
<center><img src="images/mem/Unit5/Lesson2/22.jpg"><img src="images/mem/Unit5/Lesson2/23.jpg"><br/>
<img src="images/mem/Unit5/Lesson2/24.jpg"><br/>Lathe tools are usually shaped by the machinist using a grinding wheel<br/><b>Figure: 10</b></center>
Facing tools are ground to provide clearance with a center.<br/><br/>
Roughing tools have a small side relief angle to leave more material to support the cutting edge during deep cuts.<br/><br/>
Finishing tools have a more rounded nose to provide a finer finish. They have no back or side rake to permit cutting in either direction.
</p></dd><br/>
<dt><b><a name="properties">2.8 &nbsp;&nbsp;&nbsp;Properties of Cutting Tools</a></b></dt>
<dd><p>
A wide variety of cutting-tool materials are available. The selection of a proper material depends on such factors as the cutting operation involved, the machine to be used, the work piece material, production requirements, cost, and surface finish and accuracy desired.<br/><br/>
Cutting tools are subjected to abrasion, high temperature and contact stresses. Therefore, major qualities (properties) required in a cutting tool are (See Table 1):<br/>
(1) hard<br/>
(2) hot hardness, ability of cutting tool to maintain sharp cutting edge even when turns red because of high heat during cutting<br/> 
(3) resistance to mechanical impact and thermal shock,<br/>
(4) wear resistance, and<br/>
(5) chemical stability and inertness to the workpiece material being machined.<br/> 
(6) Shaped so edge can penetrate work
</p></dd><br/>
<dt><b><a name="materials">2.9 &nbsp;&nbsp;&nbsp;Cutting tool Materials</a></b></dt>
<dd><p>
Lathe toolbits generally made of five materials<br/>
a.	High-speed steel<br/>
b.	Cast alloys (such as stellite)<br/>
c.	Cemented carbides<br/>
d.	Ceramics<br/>
e.	Cermets<br/>
f.	More exotic finding wide use<br/>
g.	Borazon and polycrystalline diamond
</p></dd><br/>
<dt><b><a name="effect">2.10 &nbsp;&nbsp;&nbsp;Effect of alloying elements</a></b></dt>
<dd><p>
Understanding the different types of tool steels requires knowledge of the role of different alloying elements. These elements are added to:<br/>
(1) obtain greater hardness and wear resistance,<br/> 
(2) obtain greater impact toughness,<br/> 
(3) impart hot hardness to the steel such that its hardness is maintained at high cutting temperatures, and<br/> 
(4) decrease distortion and warpage during heat treating.
</p></dd><br/>
<dt><b><a name="speed">2.11 &nbsp;&nbsp;&nbsp;High speed steel (HSS) toolbits</a></b></dt>
<dd><p>
a.	May contain combinations of tungsten, chromium, vanadium, molybdenum, cobalt<br/>
b.	Can take heavy cuts, withstand shock and maintain sharp cutting edge under red heat<br/>
c.	Generally two types (general purpose)<br/>
Molybdenum-base (Group M)<br/>
Tungsten-base (Group T)<br/>
Cobalt added if more red hardness desired
<center><img src="images/mem/Unit5/Lesson2/25.jpg"><br/><b>Figure 11: Characteristics of Cutting-Tool Materials</b></center>
</p></dd><br/>
<dt><b><a name="wear">2.12 &nbsp;&nbsp;&nbsp;Types of wear observed in cutting tools</a></b></dt>
<dd><p>
<b>Crater wear</b>: consists of a concave section on the tool face formed by the action of the chip sliding on the surface.<br/><br/>
<b>Flank wear</b>: occurs on the tool flank as a result of friction between the machined surface of the workpiece and the tool flank.<br/><br/>
<b>Corner wear (nose wear)</b>: occurs on the tool corner. Can be considered as a part of the wear land and respectively flank wear since there is no distinguished boundary between the corner wear and flank wear land.<br/><br/>
<center><img src="images/mem/Unit5/Lesson2/26.jpg"><br/><b>Figure 12: Types of wear observed in cutting tools</b></center>
</p></dd>
<dt><b><a name="formation">2.13 &nbsp;&nbsp;&nbsp;Chip Formation</a></b></dt>
<dd><p>
<b>There are three types of chips that are commonly produced in cutting</b><br/>
(i) discontinuous chips<br/>
(ii) continuous chips<br/>
(iii) continuous chips with built up edge<br/><br/>
<b>A discontinuous chip comes off as small chunks or particles. When we get this chip it may indicate</b><br/>
(1) brittle work material<br/>
(2) small or negative rake angles<br/>
(3) coarse feeds and low speeds<br/><br/>
<b>A continuous chip looks like a long ribbon with a smooth shining surface. This chip type may indicate</b><br/>
(1)  ductile work materials<br/>
(2) large positive rake angles<br/>
(3) fine feeds and high speeds<br/><br/>
Continuous chips with a built up edge still look like a long ribbon, but the surface is no longer smooth and shining.<br/><br/>
<center><img src="images/mem/Unit5/Lesson2/27.jpg"><br/><b>Figure: 13</b></center>
<b>Discontinuous chips are generally desired because they</b>:<br/>
(1) are less dangerous for the operator<br/>
(2) do not cause damage to workpiece surface and machine tool<br/>
(3) can be easily removed from the work zone<br/>
(4) can be easily handled and disposed after machining.<br/><br/>
<b>There are three principle methods to produce the favourable discontinuous chip</b>:<br/>
(i) proper selection of cutting conditions<br/>
(ii) use of chip breakers<br/>
(iii) change in the work material properties
</p></dd><br/>
<dt><b><a name="fluids">2.14 &nbsp;&nbsp;&nbsp;Cutting Fluids</a></b></dt>
<dd><p>
Cutting fluids, frequently referred to as lubricants or coolants, comprise those liquids and gases which are applied to the cutting zone in order to facilitate the cutting operation. A cutting fluid is used:<br/>
(1) to keep the tool cool and prevent it from being heated to a temperature at which the hardness and resistance to abrasion are reduced;<br/> 
(2) to keep the workpiece cool, thus preventing it from being machined in a warped shape to inaccurate final dimensions;<br/> 
(3) through lubrication to reduce friction and power consumption, wear on the tool, and generation of heat;<br/> 
(4) to provide a good finish on the workpiece;<br/>
(5) to aid in providing a satisfactory chip formation;<br/> 
(6) to wash away the chips (this is particularly desirable in deep-hole drilling, hacksawing, milling, and grinding); and<br/>
(7) to prevent corrosion of the workpiece and machine tool.<br/><br/>
<center><img src="images/mem/Unit5/Lesson2/28.jpg"><br/><b>Figure 14: Application of cutting fluid during machining</b></center>
<b>Classification of cutting fluids</b><br/>
Cutting fluids may be classified as follows:<br/>
(1) emulsions,<br/> 
(2) oils, and<br/> 
(3) solutions (semisynthetics and synthetics).
</p></dd><br />
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit5lesson1.php" title="Lathe">Lecture 1</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit5lesson3.php" title="Operating conditions on Lathe">Lecture 3</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>