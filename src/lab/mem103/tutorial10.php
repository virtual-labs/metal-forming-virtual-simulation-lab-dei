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
<b>MEASUREMENT, MEASURING TOOLS & LAYOUT TOOLS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Workshop/Tutorial10.pdf" target="_blank" title="Download Tutorial 10">Tutorial 10 Download</a><br/><br/>
<b>Using Angle Measurement</b><br/><br/>
An angle can be an expression of a rotation. Every angle can be expressed in either a clockwise or a counter-clockwise rotation. The checking of angle can be done with various tools as per the requirement. Generally Plate Protractor, Bevel protractor, V-Block and sine bar are used.<br/><br/>
<b>Plate Protractor</b><br/>
The simplest angle-measuring device used in the machining industry is the plate protractor. The plate protractor is capable of measuring to within 1-degree. The flat back of the plate protractor makes it especially useful for layout work.<br/><br/>
<center><img src="images/mem/Workshop/99.jpg" width="450" height="220"><br/><b>Figure 1: Bevel protractor</b></center>
<b>Bevel Protractor</b><br/>
The bevel protractor picks up where the blade protractor leaves of. The bevel protractor is designed for precision measuring and layout of precision angles.<br/>
The bevel protractor consists of an adjustable blade with a graduated dial (main scale). The blade is usually 12 inches long. The main component of the bevel protractor is the (dial) main scale. The dial is graduated in degrees through a complete circle of 360<sup>o</sup>. The dial (main scale) is graduated into four 90-degree components i.e. the main scale is numbered to read from 0 to 90 degrees and then back from 90 degrees to 0.<br/><br/>
As with other vernier measuring tools, the vernier scale of the bevel protractor allows the tool to divide each degree into smaller increments. The vernier scale is used for accurate angle adjustments and is accurate to 5 minutes or 1/12<sup>o</sup>. The vernier scale is divided into 24 equal graduations, 12 graduations on either side of the zero. Each graduation on the vernier scale is, therefore, one-twelfth of a degree.<br/><br/>
<center><img src="images/mem/Workshop/100.jpg" width="600" height="420"><br/><b>Figure 2: Measuring an angle with bevel protractor</b></center><br/>
The universal bevel protractor is capable of measuring obtuse angles as well as acute angles when accompanied with the correct attachments. Look at figure below to give you an idea as to the uses of the universal bevel protractor.<br/><br/>
<center><img src="images/mem/Workshop/101.jpg" width="700" height="220"><br/><b>Figure 3: When reading from 90 degrees, make sure to note the positions where the angle and the supplement are formed</b></center><br/>
<b>Using the bevel protractor</b><br/>
1. The blade of the protractor is held firmly in position and clamped.<br/>
2. Behind the protractor there should be arrangement of sufficient light to see that it is properly set.<br/>
3. Check that the protractor is correctly aligned with respect to the angle being measured.<br/>
4. To read the protractor, note where the zero on the vernier scale lines up with the degrees on the dial.<br/>
5. The degrees are read directly from the main scale while the minutes are read on the vernier scale.<br/>
6. Always read the vernier in the same direction that you read the dial.<br/><br/>
Any angle can be measured with the vernier bevel protractor, but you have to be careful to note which part of a full circle are you measuring. For every position of the bevel protractor, four angles are formed.<br/><br/>
<center><img src="images/mem/Workshop/102.jpg" width="350" height="315"><br/><br/><b>Figure 4: Set up of Sine bar</b></center><br/>
Two of the angles can be read directly on the main scale and the vernier scale while the other two are supplemental angles. Keep track of the obtuse and acute angles and try to read from zero whenever possible. There is no general rule for use, just keep in mind what you are adding to 90 degrees to make up the angle being measured.<br/><br/>
<b>Sine bar</b><br/>
The sine bar is used for accurately setting up work for machining or for inspection. Basically a sine bar is a bar of known length. When gauge blocks are placed under one end, the sine bar will tilt to a specific angle. Gage blocks are usually used for establishing the height. Rule for determining the height of the sine bar setting for a given angle: multiply the sine of the angle by the length of the sine bar. The sine of the angle is taken from the tables of trigonometric functions.<br/><br/>
Limitation of the Sine bar is, when using a sine bar, the height setting is limited by the gauge block divisions available.<br/><br/>
<center><img src="images/mem/Workshop/103.jpg" width="600" height="400"><br/><br/><b>Figure 5: Set up of Sine bar</b></center>
Where,<br/>
L=distance between centers of ground cylinders, generally 5inches or 10 inches<br/>
H=height of the gage blocks<br/>
?=Angle of the plate<br/>
?=sin(h/l)<br/><br/>
<b>Using Sine bar</b><br/>
1. Set the sine bar onto the granite surface plate.<br/>
2. Use the screws and knurled knobs to attach one workpiece to the sine bar in such a manner that the longest edge of the workpiece rests firmly on the surface plate and tighten the knurled knobs.<br/>
3. Ascertain that both rollers of the sine bar and the edge of the workpiece, along its full length, is in contact with the surface plate.<br/>
4. Calculate the height of the gage block stack that must be placed under one of the legs of the sine bar in order to make the top edge.<br/>
5. Check the parallelity with the test indicator mounted on a height gauge. If not parallel, change the height of the gauge block stack accordingly until parallelity is obtained.<br/>
6. Note that the hypotenuse, the length along the base of the sine bar, is five inches.<br/><br/>
<b>Degrees of accuracy of common measuring tools</b><br/><br/>
<center><table border="1" cellspacing="0" width="700">
<tr><th rowspan="2" width="150">Measuring tool</th><th colspan="2">Degree of accuracy</th></tr>
<tr><th>Measuring tool</th><th>Degree of accuracy</th></tr>
<tr><td>Steel Rule</td><td>0.5 mm</td><td>1/64 inch</td></tr>
<tr><td>Vernier caliper</td><td>0.5 mm with main scale and 0.02&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mm with vernier scale</td><td>0.01 inch with main scale and 0.001 inch with vernier scale</td></tr>
<tr><td>Micrometer</td><td>0.02 mm</td><td>0.001 inch</td></tr>
<tr><td>Dial Indicator</td><td>0.002 mm</td><td>0.0001 inch</td></tr>
</table></center>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="tutorial9.php" title="Workshop Practice">Tutorial 9</a></td>
<td style="text-align:right; font-weight:bold;"><a href="tutorial11.php" title="Workshop Practice">Tutorial 11</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>