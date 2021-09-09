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
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table border="0" width="100%">
<tr><td width="65%"><b>Lesson 1 Lathe</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/UNIT5/Unit5Lesson1.pdf" target="_blank" title="Download Lesson 1">Lesson 1 Download</a></td></tr>
<tr><td><a href="#processes">1.0&nbsp;&nbsp;&nbsp;Material Removal Processes</a></td></tr>
<tr><td><a href="#machining">1.1&nbsp;&nbsp;&nbsp;Machining</a></td></tr>
<tr><td><a href="#lathe">1.2&nbsp;&nbsp;&nbsp;Lathe</a></td></tr>
<tr><td><a href="#parts">1.3&nbsp;&nbsp;&nbsp;Main Parts of Lathe</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.1&nbsp;&nbsp;&nbsp;Bed</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.2&nbsp;&nbsp;&nbsp;Guideways</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.3&nbsp;&nbsp;&nbsp;Headstock</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.4&nbsp;&nbsp;&nbsp;Spindle</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.5&nbsp;&nbsp;&nbsp;Tailstock</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.6&nbsp;&nbsp;&nbsp;Carriage Assembly</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.7&nbsp;&nbsp;&nbsp;Feed Rod</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.8&nbsp;&nbsp;&nbsp;Lead Screw</td></tr>
<tr><td><a href="#size">1.4&nbsp;&nbsp;&nbsp;Size of a Lathe</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="processes">1.0 &nbsp;&nbsp;&nbsp;Material Removal Processes</a></b></dt>
<dd><p>
A family of shaping operations through which undesired excess material is removed from a starting work piece so the remaining work piece become closer to the desired shape. Following are the categories of material removal processes:<br><br>
<i><b>Machining</b> - material removal by a sharp cutting tool, e.g., turning, milling, drilling<br>
<b>Abrasive processes</b> - material removal by hard, abrasive particles, e.g., grinding<br>
<b>Nontraditional processes</b> - various energy forms other than sharp cutting tool to remove material, e.g., electrochemical processes, chemical machining.</i>
</p></dd><br>
<dt><b><a name="machining">1.1 &nbsp;&nbsp;&nbsp;Machining</a></b></dt>
<dd><p>
Machining is the process of removing excess material from a work piece by shearing in the form of chips by cutting tools. If the work piece is metal, the process is often called metal cutting. Majority of manufactured products require machining at some stage in their production, ranging from relatively rough or non-precision work, such as cleanup of castings or forgings, to high-precision work and high-quality finishes. Thus machining undoubtedly is the most important of the basic manufacturing processes.<br><br>
<center><table>
<tr><td><img src="images/mem/Unit5/Lesson1/1.jpg" width="275"></td><td><img src="images/mem/Unit5/Lesson1/2.jpg" width="250"></td><td><img src="images/mem/Unit5/Lesson1/3.jpg" width="420"></td></tr>
<tr><td><b>Initial over size work piece</b></td><td><b>Final shape sought</b></td><td><b>Excess material to be removed from<br>the initial work piece in order<br>to achieve final shape / product</b></td></tr>
</table><b>Figure 1: Machining is a material removal process; shape is obtained by removing material from over size work piece</b></center><br>
The essential basic requirements for machining work are schematically illustrated in Figure below. The blank (work piece) and the cutting tool are properly mounted (in fixtures/chuck/jaw) and moved in a powerful device called machine tool (lathe / drilling / milling machines) enabling gradual removal of layer of material from the
work surface resulting in its desired dimensions and surface finish. Additionally some environment called cutting fluid is generally used to ease machining by cooling and lubrication.<br><br>
<center><img src="images/mem/Unit5/Lesson1/4.jpg"><br><b>Figure 2: Requirements for machining</b></center>
<b>Characteristics of machining processes</b><br>
a. Other processes such as casting, forging, and bar drawing create the general shape<br>
b. Machining provides the final shape, dimensions, finish, and special geometric details<br>
c. A variety of materials can be shaped using machining<br>
d. 'Repeatable' regular geometries with close tolerance (<0.025&mu;m) and smooth surface finish (0.4&mu;m) can be obtained.<br>
e. Machining process is expensive as it involves waste and more time. Machine Tools produce geometrical surfaces like flat, cylindrical or any contour on the preformed blanks by machining work with the help of cutting tools.<br><br>
<b>The physical functions of a machine tool in machining are</b>:<br>
1. Firmly holding the blank and the tool<br>
2. Transmit motions to the tool and the blank<br>
3. Provide power to the tool-work pair for the machining action.<br>
4. Control of the machining parameters, i.e., speed, feed and depth of cut.<br><br>
The process of metal cutting is complex because it has such a wide variety of inputs.<br>
<b>The variables are</b>:<br>
1. The machine tool selected to perform the process<br>
2. The cutting tool selected (geometry and material)<br>
3. The properties and parameters of the workpiece<br>
4. The cutting parameters selected (speed, feed, depth of cut)<br>
5. The workpiece holding devices or fixtures or jigs<br><br>
There are seven basic material removal processes (see Figure below): turning, milling, drilling, sawing, broaching, shaping (planing), and grinding (also called abrasive machining).
<center><table style="text-align:center" border="1" cellspacing="0">
<tr><td><img src="images/mem/Unit5/Lesson1/5.jpg"></td><td><img src="images/mem/Unit5/Lesson1/6.jpg"></td><td><img src="images/mem/Unit5/Lesson1/7.jpg"></td></tr>
<tr><td><b>Turning</b></td><td><b>Drilling</b></td><td><b>Milling</b></td></tr>
<tr><td><img src="images/mem/Unit5/Lesson1/8.jpg"></td><td><img src="images/mem/Unit5/Lesson1/9.jpg"></td><td><img src="images/mem/Unit5/Lesson1/10.jpg"></td></tr>
<tr><td><b>Shaping</b></td><td><b>Planing</b></td><td><b>Grinding</b></td></tr>
<tr><td><img src="images/mem/Unit5/Lesson1/11.jpg"></td><td colspan="2"><img src="images/mem/Unit5/Lesson1/12.jpg"></td></tr>
<tr><td><b>Broaching</b></td><td colspan="2"><b>Cutting</b></td></tr>
</table><b>Figure 3: Seven basic machining (material removal) processes</b></center>
</p></dd>
<dt><b><a name="lathe">1.2 &nbsp;&nbsp;&nbsp;Lathe</a></b></dt>
<dd><p>
Lathe is known as mother of machine tools. The lathe machine tool is used for producing components that have one or more cylindrical surface, which may be internal or external. With special attachments, it can also be used for producing flat surfaces, other types of surfaces, cutting threads, cutting grooves and holes. Figure below shows some typical products that are made using a lathe.<br><br>
<center><img src="images/mem/Unit5/Lesson1/13.jpg"><br><b>Figure 4: Some typical components produced on lathe</b></center><br>
Typically, to perform metal cutting operations on a lathe, the work piece is held firmly and rotated (turned) and the material is removed from the work piece by feeding the cutting tool against the rotating work piece. This is the turning operation.<br><br>
<center><img src="images/mem/Unit5/Lesson1/14.jpg"><br><b>Figure 5: Pictorial representation of lather</b><br><br>
<img src="images/mem/Unit5/Lesson1/17.jpg"><br><b>Figure 6: Schematic representation of general purpose lathe</b></center><br>
Typical products made from lathe include parts as small as miniature screws for eyeglass-frame hinges and as large as rolls for rolling mills, gun barrels.
</p></dd><br>
<dt><b><a name="parts">1.3 &nbsp;&nbsp;&nbsp;Main Parts of Lathe</a></b></dt>
<dd><p>
<b>1.3.1 Bed</b> - The bed is the foundation of the working parts of the lathe to another. Beds have a large mass and are built usually from gray cast iron to resist deflection and absorb vibrations generated during the process of cutting.<br><br>
<b>1.3.2 Guideways</b> - Guideways are formed on the upper surface of bed and run the full length of the bed. It provide the means for holding the tailstock and carriage, which slide along the ways, in alignment with the permanently attached headstock. Guideways are hardened to make them wear resistant and are machined accurately to give dimensional accuracy.<br><br>
<b>1.3.3 Headstock</b> - Headstock is located on the left end of the lathe bed. It contains the main spindle and the gearing mechanism for obtaining various spindle speeds and for transmitting power to the feeding and threading mechanism. The center of the spindle is hollow so that long bars may be put through it for machining.<br><br>
<b>1.3.4 Spindle</b> - Spindle is mounted on bearings in the headstock and is hardened and specially ground to fit different lathe holding devices. It has a hole through its entire length to accommodate long work pieces. Chucks, drive plates, and faceplates may be screwed onto the spindle or clamped onto the spindle nose.<br><br>
<b>1.3.5 Tailstock</b> - The tailstock is mounted on the guideways (opposite end of the lathe from the headstock) and is designed to be adjusted laterally by adjusting screws. It supports one end of the long work pieces when machining between centers, and holds various forms of cutting tools, such as drills, reamers, and taps. 
It has a quill, into which the dead centre, drills and reamers can be fixed. The quill can move in and out with the help of hand wheel.<br><br>
<center><img src="images/mem/Unit5/Lesson1/15.jpg"><br><b>Figure 7: Enlarged pictorial view of lathe tailstock</b><br><br>
<img src="images/mem/Unit5/Lesson1/16.jpg"><br><b>Figure 8: Enlarged pictorial view of lathe carriage assembly</b></center><br>
<b>1.3.6 Carriage assembly</b> - The main function of the carriage is to hold the cutting tool and move it to give longitudinal and/or cross feed. The carriage includes the apron, saddle, compound rest, cross slide, tool post, and the cutting tool. This provides the motion along the Z axis.<br><br>
Figure 8: Enlarged pictorial view of lathe carriage assembly<br>
The <b>saddle</b> carries the cross slide and the compound rest.<br><br>
The <b>cross slide</b> is mounted on the dovetail ways on the top of the saddle and moves radially back and forth (X axis) at 90<sup>o</sup> to the axis of the lathe by the cross slide lead screw. Thus controlling the radial position of the cutting tool.<br><br>
The <b>compound rest</b> is mounted on the cross slide and has circular base graduated in degrees. It can be swiveled and clamped at any angle in a horizontal plane. It is used for obtaining angular cuts and short tapers. The cutting tool and tool holder are secured in the tool post, which is mounted directly to the compound rest.<br><br>
The <b>apron</b> attached to the front of the carriage contains the gears and feed clutches which transmit motion from the feed rod or lead screw to the carriage and cross slide. It is equipped with mechanisms for both manual and mechanized movements.<br><br>
A <b>split nut</b> in the apron is used to engage the lead screw with the carriage.<br><br>
A <b>feed reversing lever</b>, located on the carriage, is used to cause the carriage and the cross slide to reverse the direction of travel.<br><br>
<b>1.3.7 Feed rod</b> - The feed rod is powered by a set of gears from the headstock. It rotates during operation of the lathe and provides mechanized movement to the carriage or the cross-slide by means of gears, a friction clutch, and a keyway along the length of the feed rod.<br><br>
<b>1.3.8 Lead screw</b> - The lead screw is also powered by the gears from the headstock and is used for providing specific accurate mechanized movement to the carriage for cutting threads on the workpiece. The lead screw has a definite pitch. Similarly, a lathe not meant for thread cutting will not have a lead screw.
</p></dd><br>
<dt><b><a name="size">1.4 &nbsp;&nbsp;&nbsp;Size of a Lathe</a></b></dt>
<dd><p>
The size of a lathe is specified by two or three dimensions, i.e. maximum diameter of the workpiece that can be machined (this is called swing), the maximum distance between tailstock and headstock centres, and the length of the bed. For example, a lathe is specified as having swing of 300 mm means the maximum diameter of the job that can be machined (swung) on that lathe is 300 mm.<br><br>
<center><img src="images/mem/Unit5/Lesson1/18.jpg"><br><b>Figure 9: Specification of lathe size</b></center>
</p></dd>
<table width=1024><tr><td style="text-align:right; font-weight:bold;"><a href="Unit5lesson2.php" title="Metal Cutting & Cutting Tool for Lathe">Lecture 2</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>