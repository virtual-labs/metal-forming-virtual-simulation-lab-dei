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
<b>MEASUREMENT, MEASURING TOOLS & LAYOUT TOOLS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Workshop/Tutorial12.pdf" target="_blank" title="Download Tutorial 12">Tutorial 12 Download</a><br/><br/>
<b>Try Square</b><br/><br/>
The try square is used to mark a line at right angles to an edge and to check that the corners of a frame or joint are accurate. This is used to test that one surface is square (90 degrees) to another, and for marking out lines square to the face-side or face-edge. Engineering try squares have one thick side referred to as the beam (sometimes also referred as stock), which is held against the metal and one thin edge called the blade, against which the scriber is drawn. Engineer's squares have a carbon steel blade and beam. Using a square will need some practice.<br/><br/>
<center><img src="images/mem/Workshop/105.jpg" width="320" height="220"><br/><b>Figure 1: Try Square</b></center>
<b>Using Try Square</b><br/>
1. The beam (thick arm) is held against the reference edge and you scribe up against the blade (thin arm).<br/><br/>
2. You cannot do this flat on the bench because of the thick edge, so rest the work on something, to raise the thick edge clear, but make sure that the thick edge is up against the work.<br/><br/>
3. Hold the square with the thumb and the work with the fingers of the left hand.<br/><br/>
4. For testing accuracy, Mark a line at 900 to a true edge. Turn the stock over to see if the blade coincides with the line from the other side.<br/><br/>
<center><img src="images/mem/Workshop/106.jpg" width="380" height="220"><br/><b>Figure 2</b></center><br/>
5. For checking 90 degrees lines, hold stock against edge and mark along blade and for 45 degrees lines, align angled stock against edge.<br/><br/>
<center><img src="images/mem/Workshop/107.jpg" width="350" height="250"><br/><b>Figure 3</b></center><br/>
6. Measuring internal angle, place the heel of the square into the angle. The edge of the blade should touch the other half of the joint along its entire length.<br/><br/>
<center><img src="images/mem/Workshop/108.jpg" width="320" height="220"><br/><b>Figure 4</b></center><br/>
7. For checking square ness, press beam (stock) against face side to see if inside edge of blade completely touches face being planed at right angles to it.<br/><br/>
<center><img src="images/mem/Workshop/109.jpg" width="320" height="220"><br/><b>Figure 5</b></center>
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