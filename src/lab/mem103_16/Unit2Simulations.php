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
<td style="text-align:right;"><a href="Unit2lesson1.php" title="Lesson 1 Metal Forming Processes">Lesson 1 Metal Forming Processes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
</div>
<div>
<b>METAL FORMING SIMULATIONS</b>
<table><tr><td width="40%">
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/Upsetting.mp4" title="Upsetting">Upsetting</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/Extrusion.mp4" title="Extrusion">Extrusion</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/Extrusion_3D.mp4" title="Extrusion_3D">Extrusion 3D</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/HotRolling.mp4" title="Hot Rolling">Hot Rolling</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/ColdRolling.mp4" title="Cold Rolling">Cold Rolling</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/ABAQUSRolling.mp4" title="ABAQUS Rolling">ABAQUS Rolling</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/RingRolling.mp4" title="Ring Rolling">Ring Rolling</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/SeamlessRolledRingForging.mp4" title="Seamless Rolled Ring Forging">Seamless Rolled Ring Forging</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/SteelMakingRolling.mp4" title="Steel Making Rolling">Steel Making Rolling</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/Forging.mp4" title="Forging">Forging</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/OpenDieForging.mp4" title="Open Die Forging">Open Die Forging</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/ClosedDieForging.mp4" title="Closed Die Forging">Closed Die Forging</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/ImpressinDieForging.mp4" title="Impressin Die Forging">Impressin Die Forging</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/GrainStructureForging.mp4" title="Grain Structure Forging">Grain Structure Forging</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/Drawing.mp4" title="Drawing">Drawing</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/FoundrySandMolding.mp4" title="Foundry Sand Molding">Foundry Sand Molding</a><br/><br/>
<a href="Unit2Simulations.php?MEM103/Unit2/Simulations/Conrod.mp4" title="Connecting Rod">Connecting Rod</a><br/><br/>
<td width="50%">
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
		height="320"
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