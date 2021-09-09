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
<td style="text-align:right;"><a href="Unit3Lesson1.php" title="Lesson 1 Casting Process">Lesson 1 Casting Process</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<b>CASTING SIMULATIONS</b>
<table><tr><td width="40%">
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/Casting.mp4" title="Mold Section">Casting Simulation-1</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CastingSimulation1.mp4" title="Casting Simulation">Casting Simulation-2</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CastingSimulation2.mp4" title="Casting Simulation">Casting Simulation-3</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CastingSimulation3.mp4" title="Casting Simulation">Casting Simulation-4</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CastingSimulation4.mp4" title="Casting Simulation">Casting Simulation-5</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CastingSimulation5.mp4" title="Casting Simulation">Casting Simulation-6</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CastingSimulation6.mp4" title="Casting Simulation">Casting Simulation-7</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CastingSimulation7.mp4" title="Casting Simulation">Casting Simulation-8</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CastingSimulation8.mp4" title="Casting Simulation">Casting Simulation-9</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CastingSimulation9.mp4" title="Casting Simulation">Casting Simulation-10</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CastingSimulation10.mp4" title="Casting Simulation">Casting Simulation-11</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/SandCasting.mp4" title="Sand Casting Simulation">Casting Simulation-12<br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CupolaFurnace.mp4" title="Pattern with Draft">Cupola Furnace</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/PatternDraft.mp4" title="Pattern with Draft">Pattern with Draft</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/PressurizedGating.mp4" title="Pressurized Gatting System">Pressurized Gatting System</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/UnPressuredGating.mp4" title="Un-Pressurized Gatting System">Un-Pressurized Gatting System</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/GatingSystem.mp4" title="Gatting System">Gatting System</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/PressureDieCasting.mp4" title="Pressure Die Casting">Pressure Die Casting</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/PressureDieCold.mp4" title="Pressure Die Casting-Cold chamber">Pressure Die Casting-Cold chamber</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/PressureDieHot.mp4" title="Pressure Die Casting-Hot chamber">Pressure Die Casting-Hot chamber</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/GravityDie.mp4" title="Gravity Die Casting-1">Gravity Die Casting-1</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/GravitySteel.mp4" title="Gravity Die Casting-2">Gravity Die Casting-2</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CentrifugalCasting.mp4" title="Centrifugal Casting">Centrifugal Casting</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CentrifugalHorizontal.mp4" title="Centrifugal Casting-Horizontal">Centrifugal Casting-Horizontal</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/CentrifugalVertical.mp4" title="Centrifugal Casting-Vertical">Centrifugal Casting-Vertical</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/Investment.mp4" title="Investment (Lost-Wax) Casting-1">Investment (Lost-Wax) Casting-1</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/LostWaxCasting.mp4" title="Investment (Lost-Wax) Casting-2">Investment (Lost-Wax Casting) Casting-2</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/LostWaxTurbine.mp4" title="Investment (Lost-Wax) turbine house casting">Investment (Lost-Wax) turbine house casting</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/GravityPressurized.mp4" title="Gravity Die casting with pressurized gating system">Gravity Die casting with pressurized gating system</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/GravityNonPressurized.mp4" title="Gravity Die casting with non-pressurized gating system">Gravity Die casting with non-pressurized gating system</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/HighPressure1.mp4" title="High pressure die casting-1">High pressure die casting-1</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/HighPressure2.mp4" title="High pressure die casting-2">High pressure die casting-2</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit3/Simulations/HighPressure3.mp4" title="High pressure die casting-3">High pressure die casting-3</a><br/><br/>
<a href="Unit3Simulations.php?MEM103/Unit2/Simulations/FoundrySandMolding.mp4" title="Foundry Sand Molding">Foundry Sand Molding</a><br/><br/>
<td width="50%" valign="top">
<?php
$value = $_SERVER['QUERY_STRING'];
print <<<EOQ
<video width="500" height="280" autoplay loop controls>
<source src="$value" type="video/mp4">
</video>    
EOQ;
?>
</td></tr></table></div>
<dt style="text-align:right;"><b><a href="#header">Back to Top</a></b></dt>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>