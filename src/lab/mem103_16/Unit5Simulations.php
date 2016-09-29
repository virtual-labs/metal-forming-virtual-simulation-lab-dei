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
<b>MACHINING SIMULATIONS</b><br/><br/>
<table><tr><td width="40%">
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/Lathe.mp4" title="Lathe">Lathe</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheOverview1.mp4">Lathe overview-I</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheOverview2.mp4">Lathe overview-II</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheCuttingTool.mp4">Lathe Checking Centre of Cutting Tool</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheTurning1.mp4">Lathe Turning</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheTurning2.mp4">Lathe Turning Operation</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheFeedControl.mp4">Lathe Automatic Tool Feed Control</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheFeedTurning.mp4">Lathe Automatice Feed Turning</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheFacing1.mp4">Lathe Facing-I</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheFacing2.mp4">Lathe Facing-II</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheFacingTop.mp4">Lathe Facing view from top</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheTraversing.mp4">Lathe Turning Automating Traversing</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheTaperTurning.mp4">Lathe Taper turning</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheTaperturningTop.mp4">Lathe Taper turning view from top</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheChamfering.mp4">Lathe Chamfering</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheToolTraverse.mp4">Lathe Automatic Tool Traverse</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheDrilling1.mp4">Lathe Drilling Operation-I</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheDrilling2.mp4">Lathe Drilling Opeartion-II</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheKnurling1.mp4">Lathe Knurling Operation-I</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheKnurling2.mp4">Lathe Knurling Operation-II</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheKnurling3.mp4">Lathe Knurling Operation-III</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheHeadstock.mp4">Lathe Headstock inside view</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/LatheTailstock.mp4">Lathe Tailstock Centre</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/ShaperOperation1.mp4">Shaper Operation-I</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/ShaperOperation2.mp4">Shaper Operation-II</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/ShaperOperation3.mp4">Shaper Operation-III</a><br/><br/>
<a href="Unit5Simulations.php?MEM103/Unit5/Simulations/Quick_Return_Mechanism.mp4">Quick Return Mechanism</a><br/><br/>
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