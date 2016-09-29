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
<table width="100%"><tr>
<td width="40%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Lecture Notes">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
</div>
<div>
<b>WELDING SIMULATIONS</b><br/><br/>
<table><tr><td width="40%">
<b>Gas Welding procedure</b><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/Plates.mp4" title="Plate held in welding pliers">Preparing joints for welding</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/TackSteelPlates.mp4" title="Tack Weld">Tack Weld</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/JointPositioned.mp4" title="Positioning of joint and tacking">Positioning of joint and tacking</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/SlowlyWeld.mp4" title="Welding along the joint">Welding along the joint</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/Joined.mp4" title="Complete Welding">Complete Welding</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/TapAwaySlag.mp4" title="Tapping away slag from finished joint">Tapping away slag from finished joint</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/Preparation.mp4" title="Preparing the Cylinders for Welding">Preparing the Cylinders for Welding</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/AcetyleneOn.mp4" title="Acetylene slowly turned on">Acetylene slowly turned on</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/AcetyleneIncreased.mp4" title="Acetylene increased and oxygen turned on slowly">Acetylene increased and oxygen turned on slowly</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/AcetyleneSlowly.mp4" title="Acetylene increased slowly and oxygen more rapidly">Acetylene increased slowly and oxygen more rapidly</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/TurnOffOxygen.mp4" title="Turning off the oxygen">Turning off the oxygen</a><br/><br/>
<b>Arc Welding</b><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/ArcWelding.mp4" title="Arc Welding-1">Arc Welding-1</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/Arc.mp4" title="Arc Welding-2">Arc Welding-2</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/AC.mp4" title="AC Arc Welding">AC Arc Welding</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/3.mp4" title="DC Arc Welding">DC Arc Welding</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/DCNegative.mp4" title="DC Arc Welding - Negative">DC Arc Welding - Negative</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/DCPositive.mp4" title="DC Arc Welding - Positive">DC Arc Welding - Positive</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/1.mp4" title="DC Arc Welding - Straight Polarity">DC Arc Welding - Straight Polarity</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/2.mp4" title="DC Arc Welding - Reverse Polarity">DC Arc Welding - Reverse Polarity</a><br/><br/>
<b>Resistance Welding</b><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/ResistanceWelding.mp4" title="Resistance Welding">Resistance Welding</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/Projection.mp4" title="Resistance Welding - Projection">Resistance Welding - Projection</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/SeamWelding.mp4" title="Resistance Welding - Seam">Resistance Welding - Seam</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/SpotWelding.mp4" title="Resistance Welding - Spot-I">Resistance Welding - Spot-I</a><br/><br/>
<a href="Unit4Simulations.php?MEM103/Unit4/Simulations/Spot.mp4" title="Resistance Welding - Spot-II">Resistance Welding - Spot-II</a><br/><br/></td>
<td valign="top" width="50%">
<?php
$value = $_SERVER['QUERY_STRING'];
print <<<EOQ
    <center><object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="500" height="320"> 
	<param name="movie" value="player.swf"/> 
	<param name="allowfullscreen" value="true"/>
	<param name="wmode" value="transparent"/>
	<param name="allowscriptaccess" value="always"/> 
	<param name="flashvars" value="file=$value&autostart=true&repeat=always&image=images/DEILOGO.jpg"/>		
	<embed 
		wmode="transparent"
		type="application/x-shockwave-flash"
		id="player2"
		name="player2"
		src="player.swf" 
		width="500"
		height="300"
		allowscriptaccess="always" 
		allowfullscreen="true"
		flashvars="file=$value&autostart=true&repeat=always&image=images/DEILOGO.jpg"/> 
	</object></center>
EOQ;
?>
</td></tr></table></div>
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