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
<b>MEASUREMENT, MEASURING TOOLS & LAYOUT TOOLS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Workshop/Tutorial5.pdf" target="_blank" title="Download Tutorial 5">Tutorial 5 Download</a><br/><br/>
<b>Using Micrometers</b><br/><br/>
<b>Micrometers</b><br/>
Micrometers, invented by William Gascoigne in the 17th century, is often used to measure diameters of wires and spheres Micrometers are the most commonly used variable reading hand tools for measuring small lengths, such as the thickness of a wire, outside diameters, inside diameters, depths and grooves and are based on the threaded screw principle. Micrometer generally provides greater precision than a caliper. 
Measurement within 0.002 mm or 0.0001’’ can be taken with vernier micrometer. However, micrometer can measure only a smaller range of lengths. The micrometers incorporate two basic scales. One is a linear scale to measure directly the axial advancement of the spindle and is usually identical to the pitch of the micrometer screw. Other is a circumferential scale that indicates the amount of partial rotation applied to the barrel (sleeve) of the micrometer.<br/><br/>
<b>Principle</b><br/>
Micrometer scale is based on the thread principle, as a thread is turned, a large motion on the outside of the thread will result in a very small advance in the position of the thread. The operation of micrometers is based on magnification using threads. A large movement on the outside of the micrometer thimble will result in a small motion of the sleeve.<br/><br/>
As circular movement of a threaded spindle assembly is turned, the end of the spindle moves toward or away from the fixed anvil. The distance of movement per revolution depends on the pitch of the threaded spindle. The pitch is number of threads per unit length. Generally the unit length is chosen to be either 25mm or 1inch.<br/><br/>
<b>Types of Micrometer</b><br/>
The different types of micrometer available for various applications are:<br/>
1. Outside micrometer (micrometer caliper)<br/>
2. Inside micrometer<br/>
3. Depth micrometer<br/><br/>
<b>Least Count of Micrometer</b><br/>
The smallest measurement that can be taken by the micrometer is called its least count. It is different in English and Metric systems of measurements.<br/><br/>
<b>Metric System:</b><br/><br/>
<center><img src="images/mem/Workshop/44.jpg" width="700" height="270"><br/><br/><b>Figure 1: Head of Micrometer in Metric system</b></center><br/>
In metric system the longitudinal line (index line) on the barrel (sleeve) is graduated in millimeters with 25 equidistant marks from 1 to 25 millimeters, and each millimeter is subdivided in half-millimeter and graduated above or below the index line, 0.5 millimeter graduations are known as subdivisions.<br/><br/>
<center><img src="images/mem/Workshop/45.jpg" width="400" height="230"><br/><br/><b>Figure 2: Each millimeter subdivided into half millimeter</b></center><br/>
Inside the sleeve, a spindle is threaded with 50 threads in 25 mm. These threads have a pitch of 0.5 mm.<br/><br/>
<center><img src="images/mem/Workshop/46.jpg" width="500" height="250"><br/><br/><b>Figure 3: Pitch of spindle in metric system</b></center><br/>
The beveled edge of the moving thimble is graduated around with 50 equal divisions, each graduation of 0.01mm. Every fifth line is numbered from 0 to 50.<br/><br/>
<center><img src="images/mem/Workshop/47.jpg" width="300" height="200"><br/><br/><b>Figure 4: Circumferential scale on the thimble is graduated with 50 equal divisions each of 0.01mm</b></center><br/>
Each complete revolution of the thimble will expose another graduation (mark) on the sleeve (barrel) and advances the spindle towards or away from anvil by 0.5 millimeters. For instance, a partial revolution from one thimble mark to the next is 1/50th of a revolution, i.e. 1/50 X 0.5. This moves the spindle by 0.01 millimeter.<br/><br/>
<center><img src="images/mem/Workshop/48.jpg" width="300" height="175"><br/><br/><b>Figure 5: One revolution of thimble in metric system translates the spindle by 0.5 mm</b></center><br/>
This means each graduation on the thimble is equal to 1/50 of 0.5 millimeter or 0.01 millimeter. Thus least count of metric micrometer is 0.01 mm.<br/><br/>
<b>Note:</b> <i>It is important to understand that each micrometer in metric system only measures just 25 millimeters. Regardless of the size of the micrometer, the length of the spindle is always 25 mm. If you need to measure something that is in the range of 18 mm, you will have to use a micrometer that measures from 0 to 25 mm. If you need to measure something that is in the area of 35 mm, you will have to use a micrometer that measures from 25 to 50 mm. In metric system Micrometer sizes are classified as 0 to 25 mm, 25 to 50 mm, 50 to 75 mm etc., so each size of micrometer measures just 25 mm. The size of the micrometer is usually indicated on the frame</i>.<br/><br/>
<b>Reading a Metric System Micrometer</b><br/>
There are two separate rows of lines on the sleeve of the metric micrometer. The lower row represents whole millimeter graduations i.e. 1 mm, 2 mm, 3 mm etc. and the upper row represents half-millimeter i.e. each graduation (mark) of 0.5 mm. Each complete turn of the thimble moves the spindle ½ millimeter (0.5mm). The circumferential scale on the thimble is separated into 50 equal divisions each of 0.01 mm.<br/><br/>
<center><img src="images/mem/Workshop/49.jpg" width="350" height="250"><br/><br/><b>Figure 6: Spacing between graduations on the barrel and thimble</b></center><br/>
The metric micrometer reading is established by three additions. The values to be added are:<br/>
1. The largest whole millimeters (A) that is visible in the lower row of the scale on the sleeve near the thimble. It is 18mm in the figure shown above.<br/><br/>
2. The last half-millimeter (B) graduation in the upper row of the scale on the sleeve, after the largest whole millimeter, that is uncovered. It is 0.5 mm in the figure shown above.<br/><br/>
3. The graduation on the thimble which is aligned with the index line i.e. hundredths of millimeters (C). In the figure above it is 10th graduation i.e. 10 X 0.01 = 0.10.<br/><br/>
4. The final reading is 18.00 + 0.50 + 0.10 = 18.60 mm.<br/><br/>
<b>To read a micrometer, follow these steps:</b> (An example of how to read the micrometer is shown)<br/><br/>
<center><img src="images/mem/Workshop/50.jpg" width="450" height="270"><br/><br/><b>Figure 7: Taking a metric micrometer reading</b></center><br/>
1. First read the number of whole millimeters that are visible on the lower row of the scale on the sleeve of the micrometer. It is 23mm in the above figure.<br/><br/>
2. Now read the upper row of the scale if there is an additional mark uncovered or visible after the whole millimeter, this is equal to half millimeter. (Possibilities of this reading are, 0 or 1). Do not read between the lines on the sleeve. Read only the last division on the sleeve left exposed by the thimble after the whole millimeter. So 0.5 mm would need to be added to the measurement if 1 division is exposed. No 0.5 mm millimeters divisions are uncovered in the above figure = 0.0 millimeters.<br/><br/>
3. Note the mark on the circumferential scale on thimble that line up with the index line. Each graduation on this scale is equal to 0.01 mm so this value (hundredths of millimeter) is to be added to the final measurement. It is 15 – 0.01 millimeter divisions line
up on the thimble with index line in the above figure = 0.15 millimeters.<br/><br/>
4. Estimate (if needed) any fractional part between two divisions on the thimble at the index line. Add this as the estimated three-place millimeter value.<br/><br/>
5. Add all the above readings obtained during step 1-4 to get the final measurement. Metric micrometer reading equals 23.00 + 0.00 + 0.15 = 23.15 millimeters.<br/><br/>
6. Repeat each step to recheck the feel of the measurement and the accuracy of the reading.<br/><br/>
<b>Some more examples</b><br/>
Example-1<br/><br/>
<b>Main linear scale reading + [Thimble reading x Least count]</b><br/><br/>
Where,<br/>
<b>Least Count</b> = (number of complete turns of thimble required to move the thimble one division on main linear scale X number of divisions on circumferential scale) ÷ smallest division on main linear scale<br/><br/>
<center><img src="images/mem/Workshop/51.jpg" width="300" height="200"><br/><br/><b>Figure 8: Metric micrometer reading</b></center><br/>
Whole millimeter divisions exposed = 15 = 15 X 1.00 = 15.00mm<br/>
Half millimeter division exposed = 1 = 1 X 0.50 = 0.50mm<br/>
Thimble reading, graduation which aligns with the index line on the sleeve = 13 = 13 X least count = 13 X 0.01 = 0.13mm<br/>
Total Metric micrometer reading = 15.63 mm<br/><br/>
<b>Metric Vernier Micrometer</b><br/>
The addition of the Vernier scale to the barrel of a micrometer extends its use in making more precise measurements. The vernier metric micrometer has the ability to measure to two thousandths of a millimeter (0.002mm). This reading is added to the three place reading. The result is a four-place vernier micrometer reading. The vernier is graduated in increments of 0.002 mm starting and ending with 0. If either 0 on the vernier graduation scale lines up with the thimble reading, no additional thousandths of a millimeter are added to the reading. The two-thousandths vernier scale line that lines up with the graduated line on the thimble is added to the reading.<br/><br/>
<center><img src="images/mem/Workshop/52.jpg" width="800" height="290"><br/><br/><b>Figure 9: Vernier micrometer scales</b></center><br/>
<b>Reading the Metric Vernier Micrometer</b><br/>
The reading of the vernier metric micrometer is accomplished by adding the whole millimeter, the half-millimeter, and the hundredths of a millimeter just as before in the case of general micrometer. Further to this reading is added the number of two-thousandths of a millimeter which is read off of the vernier scale. In the above diagram shown, 0.006 mm must be added.<br/><br/>
<center><img src="images/mem/Workshop/53.jpg" width="400" height="280"><br/><br/><b>Figure 10: Taking metric vernier micrometer reading</b></center><br/>
Whole millimeter divisions exposed = 15 = 15 X 1.00 = 15.00mm<br/>
Half millimeter division exposed = 1 = 1 X 0.50 = 0.50mm<br/>
Thimble reading, graduation which aligns with the index line on the sleeve = 8 = 8 X 0.01 = 0. 08mm<br/>
vernier scale division that aligns up with the graduated line on the thimble = 2 = 2 X least count = 2 X 0.002 = 0.004mm<br/>
Total metric vernier micrometer reading = 15.584mm<br/><br/>
<b>Outside micrometer</b><br/>
Outside micrometer (micrometer caliper) is essentially a precision screw mounted in an open frame with suitable scales. It is used for very precise outside measurements. The measuring surfaces are at the ends of the stationary anvil and the movable spindle. The construction and parts of outside micrometer are descried below.<br/><br/>
<center><img src="images/mem/Workshop/54.jpg" width="600" height="300"><br/><b>Figure 11: Outside micrometer</b></center><br/>
<b>Construction and Parts of an outside micrometer</b><br/><br/>
<b>Steel Frame</b> - The steel frame, which is either cast, or machined.<br/><br/>
<b>Anvil</b> - The anvil, which is pressed into the frame as a positive stop. It is generally made up of chromium steel and its one end is fitted with tungsten carbide tip.<br/><br/>
<b>Spindle</b> - The spindle, which is the core of the tool and is made with a hardened-steel surface. The spindle is actually an extension of a precision ground screw that threads into the sleeve, i.e. thread is cut directly on the spindle.<br/><br/>
<b>Stem</b> - The stem, which has internal threads lapped to mate with the spindle.<br/><br/>
<b>Graduated sleeve</b> - The spindle passes through this graduated sleeve that carries only a graduated linear scale to measure directly the axial advancement of the spindle. The graduated sleeve indicates the range of the instrument also i.e. the limit of measurement that can be taken by the micrometer, it is generally 25 mm in metric system and 1 inch in English system.<br/><br/>
<b>Thimble</b> - Other end of the screw (extension of spindle) is attached to the thimble, which is made of chromium steel. Its one end is knurled and the other end is bevel in shape on which circumferential scale is graduated that indicates the amount of partial rotation applied to the barrel (sleeve) of the micrometer. Turning the thimble moves the spindle toward or away from the anvil.<br/><br/>
<b>Locknut</b> -locknut surrounds the spindle and causes it to stop spindle travel. It is designed to hold the reading so that it can be more easily viewed.<br/><br/>
<b>Ratchet</b> - As micrometer is a contact instrument. Therefore, sufficient torque is applied to the micrometer to make good positive contact between the specimen and the instrument. This torque is applied with the help of ratchet. It is a small knob at the far right of the micrometer. It assures more consistent contact pressure and eliminates the human influence. Once the right pressure has been achieved and the jaws are closed sufficiently, ratchet clicks and begins to slip. This is called as ratchet mechanism.<br/><br/>
<b>Measuring with outside micrometer</b><br/>
1. Determine the size of the divisions on the linear scale graduated on sleeve, e.g. 1mm or 0.5mm or 0.1inch or 0.025inch. Whether the scale is in metric or English system.<br/>
2. Next note the number of divisions on circumferential scale graduated on the thimble, e.g. 50 or 25.<br/>
3. Determine the number of complete turns required to move the thimble one division on the linear scale graduated on sleeve.<br/>
4. Alter the micrometer opening so it is slightly larger than the feature to be measured.<br/>
5. The part to be measured is placed between the anvil and spindle.<br/><br/>
<center><img src="images/mem/Workshop/55.jpg" width="550" height="250"><br/><b>Figure 12: Setting a workpiece between the spindle and anvil of micrometer</b></center><br/>
6. Gently rotate the thimble, until the ratchet begins to slip, to bring the spindle and anvil in contact with workpiece.<br/>
7. Lock the spindle with the help of locknut onto the size. Now reading the measurement is as easy as counting change.<br/>
8. The measurement is read using the graduated markings found on the sleeve and the thimble.<br/>
9. Add up the two readings on the sleeve and thimble to get the total measurement.<br/><br/>
<b>Handling Outside Micrometer</b><br/>
The first step in making a measurement is to use a clean rag to wipe any dirt from the measuring surfaces of the spindle and anvil. Any dirt in this area will give you an inaccurate reading. Also wipe off the area to be measured on the valve stem.<br/>
The line of the physical measurement should be such that it is coincident with the measurement axis of the instrument. If the measurement is out of line, it may lead to misreadings caused by deflections in the instrument. You cannot get a correct measurement with a micrometer unless the anvil and spindle are at right angles to
the part being measured. Make sure the spindle and anvil are centered exactly across the diameter of the specimen or the reading will be undersize.<br/><br/>
<center><img src="images/mem/Workshop/56.jpg" width="550" height="250"><br/><b>Figure 13: Alignment of workpiece with spindle and anvil of micrometer</b></center><br/>
Keep in mind when you are taking a micrometer measurement that there is a right way to hold the micrometer when measuring an object. You can hold a micrometer with one hand by resting the frame in the palm of the hand; insert one finger through the frame and use the thumb and forefinger to turn the spindle. You will find that this gives you good control over the position of the anvil and spindle.<br/><br/>
<center><img src="images/mem/Workshop/57.jpg" width="180" height="280"><br/><br/><b>Figure 14: Holding the micrometer</b></center><br/>
Or, Place the micrometer over the area of specimen you wish to measure, by gripping the frame at two places. Use the right hand to make adjustments with the thimble, and then return the hand to the frame.<br/><br/>
<center><img src="images/mem/Workshop/58.jpg" width="200" height="300"><br/><br/><b>Figure 15: Correct micrometer and finger positions for taking measurement</b></center><br/>
<center><img src="images/mem/Workshop/59.jpg" width="300" height="250"><br/><br/><b>Figure 16: Roll the thimble gently for long spindle movements</b></center><br/>
<b>Note</b>: <i>Keep in mind that a micrometer is a precision tool, not a C-clamp. If you force the spindle down too hard, the reading will not only be incorrect, but the frame may become distorted, which makes the micrometer useless</i>.<br/><br/>
<b>Micrometer in English system</b>:<br/><br/>
<center><img src="images/mem/Workshop/60.jpg" width="700" height="250"><br/><br/><b>Figure 17: Head of Micrometer in English System</b></center><br/>
In this system, the scale (longitudinal line) on the sleeve is of 1 inch, divided into 10 equal graduations, each equal to 0.1 inch, marked from 1 to 10, known as main divisions. Further each main division is subdivided into four equal parts, each equal to 0.025 inch, known as subdivision.<br/><br/>
<center><img src="images/mem/Workshop/61.jpg" width="500" height="200"><br/><b>Figure 18: Inch micrometer scale</b></center><br/>
Inside the sleeve, a spindle is threaded with 40 threads in 1 inch, threads having a pitch exactly of 1/40 inch or 0.025 inch. Which means that one revolution of the screw moves the spindle by 0.025 inch toward or away from the anvil. Therefore, 40 turns of the screw will move the spindle exactly 1 inch (40 x 0.025 = 1.000).<br/><br/>
<center><img src="images/mem/Workshop/62.jpg" width="500" height="200"><br/><br/><b>Figure 19: Pitch of spindle in English system</b></center><br/>
The beveled edge on the front of the moving thimble is graduated around with 25 equal divisions because the thimble and spindle travel 0.025 inch per revolution.<br/>
<center><img src="images/mem/Workshop/63.jpg" width="300" height="250"><br/><br/><b>Figure 20: Circumferential scale on the thimble is graduated with 25 equal divisions each of 0.001 inch</b></center><br/>
Every fifth line is numbered from 0 to 25. These divisions make it possible to read the amount of spindle travel for partial revolutions.<br/>
Therefore, each complete revolution of the thimble advances the spindle towards or away from anvil by 0.025 inch. For instance, a partial revolution from one thimble mark to the next is 1/25th of a revolution, which moves the spindle by 0.001 inch.<br/><br/>
<center><img src="images/mem/Workshop/64.jpg" width="350" height="180"><br/><br/><b>Figure 21: One revolution of thimble in English system translates the spindle by 0.025 inch</b></center><br/>
This means each graduation on the thimble is equal to 0.001 inch. Thus least count of inch micrometer is 0.001 inch.<br/><br/>
<b>Note:</b> <i>It is important to understand that each size of inch system micrometer only measures just one inch. Regardless of the size of the micrometer, the length of the spindle is always 1 inch in English system. If one needs to measure something that is in the range of 1/2 inch, he will have to use a micrometer that measures from 0 to 1 inch. If one needs to measure something that is in the range of 1 1/2 inch, he will have to use a micrometer that measures from 1 to 2 inches. Micrometer sizes are classified as 0 to 1 inch, 1 to 2 inches, 2 to 3 inches, 9 to 10 inches, etc., so each size of micrometer measures just 1 inch. The size of the micrometer is usually indicated on the frame</i>.
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="tutorial4.php" title="Workshop Practice">Tutorial 4</a></td>
<td style="text-align:right; font-weight:bold;"><a href="tutorial6.php" title="Workshop Practice">Tutorial 6</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>