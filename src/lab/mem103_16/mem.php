<?php session_start();
ini_set("display_errors","Off");
if($_SESSION['auth']!="rahulMEM103_2016swarupsharma")
{
header("location:mem103.php");
}
else
{
?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manufacturing Processes-I</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/mem.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;">
<div id="header">
<br/>
<b>MEM-103 Manufacturing Processes-I</b></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table width="100%"><tr>
<td width="25%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="workshop.php" title="Bench Work">Bench Work</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Processes-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../home.php" title="Metal Forming Virtual Simulation lab">MFVL Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<a href="MEM103/QB_MEM_103.pdf" target="_blank" title="Download MEM-103 QUESTION BANK 2016">MEM-103 QUESTION BANK 2016 Download</a><br/><br/>
<b>UNIT 1:&nbsp;&nbsp;&nbsp;Foundry Practice</b><br/>
<table border="0" width="100%">
<tr><td width="50%">LESSON 1&nbsp;&nbsp;&nbsp;<a href="Unit1lesson0.php" title="Socio Economic Susutainability">Socio Economic Susutainability</a></td><td></td></tr>
<tr><td valign="top">LESSON 2&nbsp;&nbsp;&nbsp;<a href="Unit1lesson1.php" title="Overview of Manufacturing">Overview of Manufacturing</a></td>
<tr><td>LESSON 3&nbsp;&nbsp;&nbsp;<a href="Unit1lesson2.php" title="Properties of Materials">Properties of Materials</a></td>
<tr><td>LESSON 4&nbsp;&nbsp;&nbsp;<a href="Unit1lesson3.php" title="General Shop Safety">General Shop Safety</td></tr>
<tr><td>LESSON 5&nbsp;&nbsp;&nbsp;<a href="Unit1lesson4.php" title="Body Protection Products">Body Protection Products</td></tr>
<tr><td>LESSON 6&nbsp;&nbsp;&nbsp;<a href="Unit1lesson6.php" title="Non-Ferrous Metals">Non-Ferrous Metals</td></tr>
<tr><td>LESSON 7&nbsp;&nbsp;&nbsp;<a href="Unit1lesson7.php" title="Ferrous Metals">Ferrous Metals</td></tr>
<tr><td>LESSON 8&nbsp;&nbsp;&nbsp;<a href="Unit1lesson8.php" title="Heat Treatment">Heat Treatment</td></tr>
<tr><td>LESSON 9&nbsp;&nbsp;&nbsp;<a href="Unit1lesson9.php" title="Plastics">Plastics</td></tr>
<tr><td>LESSON 10&nbsp;&nbsp;&nbsp;<a href="Unit1lesson10.php" title="Ceramics">Ceramics</td></tr>
<tr><td>LESSON 11&nbsp;&nbsp;&nbsp;<a href="Unit1lesson11.php" title="Smart Materials">Smart Materials</td></tr>
<tr><td>LESSON 12&nbsp;&nbsp;&nbsp;<a href="Unit1lesson12.php" title="Wood Working">Wood Working</td></tr>
<tr><td>LESSON 13&nbsp;&nbsp;&nbsp;<a href="Unit1lesson13.php" title="Wood Working Operations">Wood Working Operations</td></tr>
<tr><td><b>Supplementary Material</b></td></tr>
<tr><td>1. <a href="MEM103/Unit1/Unit1HistoricalMilestones.pdf" target="_blank" title="Historical Milestones in Evolution of Manufacturing">Historical Milestones in Evolution of Manufacturing</a></td></tr>
<tr><td>2. <a href="MEM103/Unit1/Unit1ShapesMethods.pdf" target="_blank" title="Shapes and some common Methods of Production">Shapes and some common Methods of Production</a></td></tr>
<tr><td>3. <a href="MEM103/Unit1/Unit1ProblemSheet.pdf" target="_blank" title="Problems Sheet: Mechanical Properties of Materials">Problems Sheet: Mechanical Properties of Materials</a></td></tr>
<!--<tr><td>4. <a href="MEM103/Unit1/Unit1CourseReviewQuiz.pdf" target="_blank" title="Course Review Quiz">Course Review Quiz</a></td></tr>-->
<tr><td>&nbsp;</td></tr>
<tr><td><b>UNIT 2:&nbsp;&nbsp;&nbsp;Principles of Metal Casting</b></td></tr>
<tr><td>LESSON 1&nbsp;&nbsp;&nbsp;<a href="Unit3lesson1.php" title="Casting Process">Casting Process</a></td>
<td rowspan="8">
<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="340" height="200"> 
	<param name="movie" value="player.swf"/>
	<param name="allowfullscreen" value="true"/>  
	<param name="wmode" value="transparent"/>
	<param name="allowscriptaccess" value="always"/> 
	<param name="flashvars" value="file=MEM103/Unit3/Simulations/Casting.mp4&autostart=true&repeat=always&image=images/DEILOGO.jpg"/>		
	<embed 
		wmode="transparent"
		type="application/x-shockwave-flash"
		id="player2"
		name="player2"
		src="player.swf" 
		width="380"
		height="230"
		allowscriptaccess="always" 
		allowfullscreen="true"
		flashvars="file=MEM103/Unit3/Simulations/Casting.mp4&autostart=true&repeat=always&image=images/DEILOGO.jpg"/>
</object></td></tr>
<tr><td>LESSON 2&nbsp;&nbsp;&nbsp;<a href="Unit3lesson2.php" title="Casting Process: Pattern Making">Casting Process: Pattern Making</a></td></tr>
<tr><td>LESSON 3&nbsp;&nbsp;&nbsp;<a href="Unit3lesson3.php" title="Casting Process: Moulding">Casting Process: Moulding</a></td></tr>
<tr><td>LESSON 4&nbsp;&nbsp;&nbsp;<a href="Unit3lesson4.php" title="Casting Process: Casting Defects">Casting Process: Cupola Furnace</a></td></tr>
<tr><td>LESSON 5&nbsp;&nbsp;&nbsp;<a href="Unit3lesson5.php" title="Casting Process: Casting Defects">Casting Process: Casting Defects</a></td></tr>
<tr><td>LESSON 6&nbsp;&nbsp;&nbsp;<a href="Unit3lesson6.php" title="Types of Pattern">Types of Pattern</a></td></tr>
<tr><td>LESSON 7&nbsp;&nbsp;&nbsp;<a href="Unit3lesson7.php" title="Special Casting Processes (Expendable)">Special Casting Processes (Expendable)</td></tr>
<tr><td>LESSON 8&nbsp;&nbsp;&nbsp;<a href="Unit3lesson8.php" title="Special Casting Processes (Permanent)">Special Casting Processes (Permanent)</td></tr>
<tr><td>LESSON 9&nbsp;&nbsp;&nbsp;<a href="Unit3lesson9.php" title="Types of Moulding Methods and Moulding Machines">Types of Moulding Methods and Moulding Machines</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><b>Supplementary Material</b></td></tr>
<tr><td>1. <a href="Unit3Simulations.php?MEM103/Unit3/Simulations/Casting.mp4">Casting Simulations</a></td></tr>
<tr><td>2. <a href="MEM103/Unit3/Unit3ProblemSheet.pdf" target="_blank" title="Problems Sheet">Problems Sheet</a></td></tr>
<!--<tr><td>3. <a href="MEM103/Unit3/Unit3CourseReviewQuiz.pdf" target="_blank" title="Course Review Quiz">Course Review Quiz</a></td></tr>-->
<tr><td>&nbsp;</td></tr>
<tr><td><b>UNIT 3:&nbsp;&nbsp;&nbsp;Deformation Processes</b></td></tr>
<tr><td valign="top">LESSON 1&nbsp;&nbsp;&nbsp;<a href="Unit2lesson1.php" title="Metal Forming Processes">Metal Forming Processes</a></td>
<td rowspan="6">
<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="360" height="240">
	<param name="movie" value="player.swf"/>
	<param name="allowfullscreen" value="true"/>  
	<param name="wmode" value="transparent"/>
	<param name="allowscriptaccess" value="always"/> 
	<param name="flashvars" value="file=MEM103/Unit2/Simulations/Upsetting.mp4&autostart=true&repeat=always&image=images/DEILOGO.jpg"/>		
	<embed 
		wmode="transparent"
		type="application/x-shockwave-flash"
		id="player2"
		name="player2"
		src="player.swf" 
		width="360"
		height="240"
		allowscriptaccess="always" 
		allowfullscreen="true"
		flashvars="file=MEM103/Unit2/Simulations/Upsetting.mp4&autostart=true&repeat=always&image=images/DEILOGO.jpg"/>
</object></td></tr>
<tr><td>LESSON 2&nbsp;&nbsp;&nbsp;<a href="Unit2lesson2.php" title="Forging Process">Forging Process</a></td></tr>
<tr><td>LESSON 3&nbsp;&nbsp;&nbsp;<a href="Unit2lesson3.php" title="Smithy (Hand Forging)">Smithy (Hand Forging)</a></td></tr>
<tr><td>LESSON 4&nbsp;&nbsp;&nbsp;<a href="Unit2lesson4.php" title="Forging Equipments">Forging Equipments</a></td></tr>
<tr><td>LESSON 5&nbsp;&nbsp;&nbsp;<a href="Unit2lesson5.php" title="Rolling Process">Rolling Processes</a></td></tr>
<tr><td>LESSON 6&nbsp;&nbsp;&nbsp;<a href="Unit2lesson6.php" title="Sheet Metal Working">Sheet Metal Working</a></td></tr>
<tr><td><b>Supplementary Material</b></td></tr>
<tr><td>1. <a href="Unit2Simulations.php?MEM103/Unit2/Simulations/Upsetting.mp4">Metal Forming Simulations</a></td></tr>
<tr><td>2. <a href="MEM103/Unit2/Unit2ProblemSheet.pdf" target="_blank" title="Problems Sheet">Problems Sheet</a></td></tr>
<!--<tr><td>3. <a href="MEM103/Unit2/Unit2CourseReviewQuiz.pdf" target="_blank" title="Course Review Quiz">Course Review Quiz</a></td></tr>-->
<tr><td>&nbsp;</td></tr>
<tr><td><b>UNIT 4:&nbsp;&nbsp;&nbsp;Welding</b></td></tr>
<tr><td>LESSON 1&nbsp;&nbsp;&nbsp;<a href="Unit4lesson1.php" title="Welding">Welding</td>
<td rowspan="6">
<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="360" height="240"> 
	<param name="movie" value="player.swf"/>
	<param name="allowfullscreen" value="true"/>  
	<param name="wmode" value="transparent"/>
	<param name="allowscriptaccess" value="always"/> 
	<param name="flashvars" value="file=MEM103/Unit4/Simulations/Welding.mp4&autostart=true&repeat=always&image=images/DEILOGO.jpg"/>		
	<embed 
		wmode="transparent"
		type="application/x-shockwave-flash"
		id="player2"
		name="player2"
		src="player.swf" 
		width="360"
		height="240"
		allowscriptaccess="always" 
		allowfullscreen="true"
		flashvars="file=MEM103/Unit4/Simulations/Welding.mp4&autostart=true&repeat=always&image=images/DEILOGO.jpg"/>
</object></td></tr>
<tr><td>LESSON 2&nbsp;&nbsp;&nbsp;<a href="Unit4lesson2.php" title="Gas Welding or Oxyfuel Gas Welding">Gas Welding or Oxyfuel Gas Welding (OFW)</a></td></tr>
<tr><td>LESSON 3&nbsp;&nbsp;&nbsp;<a href="Unit4lesson3.php" title="Electric Arc Welding Process">Electric Arc Welding Process</a></td></tr>
<tr><td>LESSON 4&nbsp;&nbsp;&nbsp;<a href="Unit4lesson4.php" title="Resistance Welding">Resistance Welding</a></td></tr>
<tr><td>LESSON 5&nbsp;&nbsp;&nbsp;<a href="Unit4lesson5.php" title="Welding Defects">Welding Defects</a></td></tr>
<tr><td>LESSON 6&nbsp;&nbsp;&nbsp;<a href="Unit4lesson6.php" title="Safety Practices in Welding Process">Safety Practices in Welding Process</a></td></tr>
<tr><td>LESSON 7&nbsp;&nbsp;&nbsp;<a href="Unit4lesson7.php" title="Flash welding & Percussion welding">Flash Welding & Percussion Welding</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><b>Supplementary Material</b></td></tr>
<tr><td>1. <a href="Unit4Simulations.php?MEM103/Unit4/Simulations/Projection.mp4">Special Welding Simulations</a></td></tr>
<tr><td>2. <a href="Unit4faq.php" title="Frequently Asked Questions">Frequently Asked Questions</a></td></tr>
<tr><td>3. <a href="Unit4tq.php" title="Terminal Questions">Terminal Questions</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><b>UNIT 5:&nbsp;&nbsp;&nbsp;Machine Tool</b></td></tr>
<tr><td>LESSON 1&nbsp;&nbsp;&nbsp;<a href="Unit5lesson1.php" title="Lathe">Lathe</td>
<td rowspan="6">
<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="380" height="250"> 
	<param name="movie" value="player.swf"/>
	<param name="allowfullscreen" value="true"/>  
	<param name="wmode" value="transparent"/>
	<param name="allowscriptaccess" value="always"/> 
	<param name="flashvars" value="file=MEM103/Unit5/Simulations/LatheTurning1.mp4&autostart=true&repeat=always&image=images/DEILOGO.jpg"/>		
	<embed 
		wmode="transparent"
		type="application/x-shockwave-flash"
		id="player2"
		name="player2"
		src="player.swf" 
		width="300"
		height="300"
		allowscriptaccess="always" 
		allowfullscreen="true"
		flashvars="file=MEM103/Unit5/Simulations/LatheTurning1.mp4&autostart=true&repeat=always&image=images/DEILOGO.jpg"/>
</object></td></tr>
<tr><td>LESSON 2&nbsp;&nbsp;&nbsp;<a href="Unit5lesson2.php" title="Metal Cutting & Cutting Tool for Lathe">Metal Cutting & Cutting Tool for Lathe</td></tr>
<tr><td>LESSON 3&nbsp;&nbsp;&nbsp;<a href="Unit5lesson3.php" title="Operating conditions on Lathe">Operating conditions on Lathe</td></tr>
<tr><td>LESSON 4&nbsp;&nbsp;&nbsp;<a href="Unit5lesson4.php" title="Operations on Lathe">Operations on Lathe</td></tr>
<tr><td>LESSON 5&nbsp;&nbsp;&nbsp;<a href="Unit5lesson5.php" title="Work-Holding devices used on Lathe">Work-Holding devices used on Lathe</td></tr>
<tr><td>LESSON 6&nbsp;&nbsp;&nbsp;<a href="Unit5lesson6.php" title="Shaping, Planing & Slotting Operations">Shaping, Planing & Slotting Operations</td></tr>
<tr><td>LESSON 7&nbsp;&nbsp;&nbsp;<a href="Unit5lesson7.php" title="Drilling">Drilling</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><b>Supplementary Material</b></td></tr>
<tr><td>1. <a href="Unit5Simulations.php?MEM103/Unit5/Simulations/Lathe.mp4">Machining Simulations</a></td></tr>
</table>
<?php
 	//Opening file to get counter value
	$fp = fopen ("../counter.txt", "r");
	$count_number = fread ($fp, filesize ("../counter.txt"));
	fclose($fp);
	$counter = (int)($count_number) + 1;
    $count_number = (string)($counter);
	$fp = fopen ("../counter.txt", "w");
	fwrite ($fp, $count_number);
	fclose($fp);
?>
</div>
<dt style="text-align:right;"><b><a href="#header">Back to Top</a></b></dt>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute (www.dei.ac.in)</div>
</body>
</html>
<?php
}
?>