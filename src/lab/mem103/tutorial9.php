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
<table border="0" width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="workshop.php" title="Bench Work">Bench Work</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem.php" title="Lecture Notes, MEM-103 Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div style="text-align:justify">
<b>MEASUREMENT, MEASURING TOOLS & LAYOUT TOOLS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Workshop/Tutorial9.pdf" target="_blank" title="Download Tutorial 9">Tutorial 9 Download</a><br/><br/>
<b>Using Cylindrical Square</b><br/><br/>
The cylindrical square is a simple tool for checking squareness of two planes or a plane and an edge. The direct reading cylindrical square indicates "out-of-squareness" of work in units of .0002" without transfer tools. The cylindrical square and the workpiece are placed on a surface plate, with the angular end down and the base of the cylinder in contact with the part to be checked, the square is rotated until light is shut out. Reading up the topmost dotted curve in contact with the part.<br/><br/>
<center><img src="images/mem/Workshop/94.jpg" width="170" height="380"><br/><b>Figure 1: Direct Reading Cylindrical square</b></center>
<b>Universal Master Square</b><br/>
The universal master square is a high-precision square that can be used in any position. The combination of two broad sides and two knife edged sides make it suitable for many applications.<br/><br/>
<center><img src="images/mem/Workshop/95.jpg" width="220" height="380"><br/><b>Figure 2: Universal Master Square</b></center>
<b>Dial Indicators</b><br/>
A dial indicator is a gauge used to measure very small distances. It is used to measure slight movement of a part, centering workpieces to machine tool spindles, offsetting lathe tailstocks, aligning a vise on a milling machine, checking dimensions. We also use it to measure the distortion of a part. The measurement is shown by a pointer on the face of the gauge. It converts a linear displacement into a radial movement to measure over a small range of movement for the plunger. The most common type of dial indicator uses a small rod called a plunger. The plunger is connected to the pointer by a gear built into the instrument. Movement of the plunger is shown by movement of the pointer on the dial face. Because of the gearing inside the dial, movement of the pointer is greatly increased. This allows one to see these small measurements with the naked eye. The scale on the metric dial indicator face is divided into 100 divisions. Each division represents 1/100th millimeter.<br/><br/>
<center><img src="images/mem/Workshop/96a.jpg" width="320" height="420"><br/><b>Figure 3: Dial Indicator; Indicator is moved along the face</b></center>
<b>Adjustable parallels</b><br/>
This is a useful tool, especially for measuring slots or keyways. Adjustable parallels consist of two pieces each one is wedge-shaped. They are assembled with a dovetail joint so that as one piece is moved against the other, the outside edges remain parallel, but the unit will increase or decrease in size. Adjustable parallels have a screw that can be tightened to hold the position that you have set.<br/><br/>
<center><img src="images/mem/Workshop/96b.jpg" width="400" height="500"><br/><b>Figure 4: Using adjustable parallel</b></center><br/>
1. Make sure that the feature of the workpiece to be measured is clean and free of dirt, oils, or machining burrs.<br/>
2. Choose the properly sized parallel for the job.<br/>
3. Place the parallel in the workpiece to be measured. Press the ends of the adjustable parallels together tightly. Leave a portion of the parallel exposed for measuring it with micrometer without removing from the feature.<br/>
4. If you remove the adjustable parallel from the workpiece to measure it, tighten the locking screw to maintain position and size, and remove it carefully.<br/><br/>
<center><img src="images/mem/Workshop/97.jpg" width="600" height="150"><br/><b>Figure 5: Measuring a slot using an adjustable parallel and a micrometer</b></center>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="tutorial8.php" title="Workshop Practice">Tutorial 8</a></td>
<td style="text-align:right; font-weight:bold;"><a href="tutorial10.php" title="Workshop Practice">Tutorial 10</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>