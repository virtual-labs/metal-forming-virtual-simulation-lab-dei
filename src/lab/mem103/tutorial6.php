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
<b>MEASUREMENT, MEASURING TOOLS & LAYOUT TOOLS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Workshop/Tutorial6.pdf" target="_blank" title="Download Tutorial 6">Tutorial 6 Download</a><br/><br/>
<b>Using Reading a inch system micrometer</b><br/><br/>
The scale on the sleeve on an inch system micrometer has ten major divisions representing 0.1 inch.<br/><br/>
<center><img src="images/mem/Workshop/65.jpg" width="500" height="80"><br/><br/><b>Figure 1: Each mark or graduation equal to 0.1 inch</b></center><br/>
Further subdivided into four equal parts, each representing 0.025 inch thus there is a mark on the micrometer sleeve for every 0.025-inch increment.<br/><br/>
<center><img src="images/mem/Workshop/66.jpg" width="400" height="70"><br/><br/><b>Figure 2: Each 0.1-inch mark or graduation is equally divided into four parts</b></center><br/>
The circumferential scale on the thimble over the sleeve is divided into 25 parts, each representing 0.001 inch.<br/><br/>
<center><img src="images/mem/Workshop/67.jpg" width="400" height="100"><br/><br/><b>Figure 3: Each mark or graduation on circumferential scale is equal to 0.001-inch</b></center><br/>
One revolution of the spindle produces a movement of one-fortieth of an inch i.e. 0.025inch.<br/><br/>
<b>To read an inch micrometer, follow these steps:</b><br/>
(An example of how to read the micrometer is shown)<br/>
In the example the micrometer reads from zero to one inch.<br/>
<center><img src="images/mem/Workshop/68.jpg" width="550" height="220"><br/><b>Figure 4: Taking an inch micrometer reading</b></center><br/>
1. Look at the scale on the sleeve. The last number that can be visible in the above figure is 5, so that is equal to half of an inch i.e. 0.5.<br/><br/>
2. Now look at the subdivisions of twenty-five thousandth of an inch (0.025), possibilities of subdivisions are 0 or 0.025 or 0.050 or 0.075. Do not read between the lines on the sleeve. Read only the last division on the sleeve left exposed by the thimble. Two marks can be seen in the above figure, add 0.025 inch for each additional mark.<br/><br/>
3. Note the mark on the circumferential scale on thimble that line up with the index line. Each graduation on this scale is equal to 0.001 inch so this value is to be added to the final measurement. It is 23 in the above figure. That equals twenty-three thousandths of an inch (0.023).<br/><br/>
4. Now add the readings obtained in step 1-3 together. The reading is 0.500 + 0.050 + 0.023 = 0.573 inch.<br/><br/>
5. Repeat each step to recheck the feel of the measurement and the accuracy of the reading.<br/><br/>
<b>Some more examples:<br/>
Example-1<br/><br/>
Main linear scale reading + [Thimble reading x Least count]</b><br/><br/>
Where,<br/>
<b>Least Count</b> = (number of complete turns of thimble required to move the thimble one division on main linear scale X number of divisions on circumferential scale) ÷ smallest division on main linear scale<br/><br/>
<center><img src="images/mem/Workshop/69.jpg" width="500" height="220"><br/><b>Figure 5: Inch micrometer reading</b></center><br/>
Last number that can be visible at the scale on sleeve = 4 = 4 X 0.1 = 0.4 inch.<br/>
Number of subdivisions that can be seen = 2 = 2 X 0.025inch = 0.050inch<br/>
Thimble reading, graduation which aligns with the index line on the sleeve = 23 = 23 X least count = 23X 0.001 = 0.023inch<br/>
Total Inch micrometer reading = 0.473inch.<br/><br/>
<b>Example-2</b><br/>
<center><img src="images/mem/Workshop/70.jpg" width="500" height="220"><br/><b>Figure 6: Inch micrometer reading</b></center><br/>
Last number that can be visible at the scale on sleeve = 4 = 4 X 0.1 = 0.4inch.<br/>
Number of subdivisions that can be seen = 2 = 2 X 0.025inch = 0.050inch.<br/>
Thimble reading, graduation which aligns with the index line on the sleeve = 11 = 11 X least count = 11 X 0.001 = 0.011 inch.<br/>
Total Inch micrometer reading = 0.461inch.
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="tutorial5.php" title="Workshop Practice">Tutorial 5</a></td>
<td style="text-align:right; font-weight:bold;"><a href="tutorial7.php" title="Workshop Practice">Tutorial 7</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>