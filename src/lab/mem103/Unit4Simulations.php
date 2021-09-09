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
<video width="500" height="300" autoplay loop controls>
<source src="$value" type="video/mp4">
</video>
EOQ;
?>
</td></tr></table></div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>