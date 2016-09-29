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
<div>
<table border="0" width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="workshop.php" title="Bench Work">Bench Work</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem.php" title="Lecture Notes, MEM-103 Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div style="text-align:justify">
<b>MEASUREMENT, MEASURING TOOLS & LAYOUT TOOLS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Workshop/Tutorial11.pdf" target="_blank" title="Download Tutorial 11">Tutorial 11 Download</a><br/><br/>
<b>Using Laying out work</b><br/><br/>
Layout is a shop term, which means planning of the work on the surface of the material to be made into the finished part. It is the scribing of lines, circles, centers, and so forth, upon the surface of any material to serve as a guide to you in shaping and completing the job. This laying out procedure is similar to mechanical drawing but differs from it in one important respect. The lines on a mechanical drawing are used for reference purposes only and are not measured or transferred. 
The precision of the finished job depends largely on the care you take in making the layout. <b>In layout work, main thing to remember is to measure twice, check twice, mark once, and cut once - cut metal can't be put back</b>, even a slight error in scribing a line or center may result in a corresponding or greater error in the finished workpiece. Therefore, all scribed lines should be exactly located and all scriber, divider, and punches should be exact and sharp.<br/><br/>
<b>Steps to follow for laying out work</b><br/>
1. Plan before beginning any layout, it is one of the most important steps. Different jobs may require different layout tools and procedure depending on the type of job.<br/><br/>
2. Follow the correct procedures for using the tools.<br/><br/>
3. Study the drawing carefully before you start laying out work on the workpiece.<br/><br/>
4. Check if enough material exists on all of surfaces of the workpiece to "clean up" or "machine out." Allow enough material to square the ends if required.<br/><br/>
5. The work surface must be cleaned and made free from scratches, nicks, and burrs that would impact the accuracy of the reference surface and the layout work being done on it.<br/><br/>
6. Coat the workpiece with a "wet chalk" or layout dye. As shiny surface, found on most metals, makes it difficult to see the layout lines. Layout dye , when applied to the metal surface, makes it easier for the layout lines to be seen. Layout dye is usually blue and offers an excellent contrast between the metal and the layout lines.<br/><br/>
7. This makes the scribed lines highly visible, thus contributing to the accuracy of the work.<br/><br/>
8. Locate and scribe a reference or base line. All the other measurements should be made from this. If the workpiece already has one true edge, it can be used in place of the reference line.<br/><br/>
9. Using the base line as a reference line, locate and scribe all center lines for each circle, radius, or arc.<br/><br/>
10. Mark the points where the center lines intersect using a sharp prick punch.<br/><br/>
11. Scribe all circles, radii, and arcs using the divider or trammel.<br/><br/>
12. Using the protractor, locate and scribe all straight and angular lines.<br/><br/>
13. All layout lines should be clean, sharp, and fine.<br/><br/>
14. All scriber, divider, and punches should be exact and sharp.<br/><br/>
<center><img src="images/mem/Workshop/104.jpg" width="450" height="320"><br/><br/><b>Figure 1: Coating the workpiece with layout dye</b></center><br/>
Layout and measuring devices are precision tools. They are carefully machined, accurately marked and, in many cases, are made up of very delicate parts. When using these tools, be careful not to drop, bend, or scratch them. To get a finished product with high accuracy it is very important to understand how to read, use, and care for these tools.<br/><br/>
Tools used to do measuring and layout work include precision steel rules, layout rules, vernier caliper, micrometers, squares, bevel protractors, surface gages, height gages, scribers, hermaphrodite calipers, dividers, prick punches, center punches, V-blocks, adjustable parallels, angle plates, and a variety of clamps, hammers, telescoping gage, small hole gage, feeler gage, pitch gage. These layout tools are described in the following section.
</div>
<dt style="text-align:right;"><b><a href="#header">Back to Top</a></b></dt>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute (www.dei.ac.in)</div>
</body>
</html>
<?php
}
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