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
<div id="header"><br/>
<b>MEM-103 Manufacturing Processes-I</b></div>
<div>
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="home.php" title="Metal Forming Virtual Simulation lab">MFVL Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table border="0" width="100%">
<tr><td width="60%"><b>Lesson 5 CASTING PROCESS: CASTING DEFECTS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson5/Unit3Lesson5.pdf" target="_blank" title="Download Casting Process: Casting Defects">Lesson 5 Download</a></td><td><b>Supplementary Material</b></td></tr>
<tr><td><dt><a href="#objectives">5.0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Objectives</a></dt></td><td><a href="Unit3lesson5scq.php">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Self-check questions</a></td></tr>
<tr><td><dt><a href="#defects">5.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Defects in sand casting</a></dt></td><td><a href="Unit3lesson5faq.php">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Frequently asked questions</a></td></tr>
<tr><td></td><td><a href="Unit3lesson5tq.php">3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terminal questions</a></td></tr>
<tr><td></td><td><a href="Unit3lesson5Assignment.php">4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assignments</a></td></tr>
</table><br/></div>
<div>
<b>CASTING PROCESS: CASTING DEFECTS</b><dt><br/>
<b><a name="objectives">5.0&nbsp;&nbsp;&nbsp;Objectives</a></b></dt>
<dd>
<p>
After going through this lesson, you will be able to understand:<br/>
1. Various defects found in cast products.</p><br/>
</dd>
<dt><b><a name="defects">5.1&nbsp;&nbsp;&nbsp;Defects in sand casting</a></b></dt>
<dd>
<p>
Several types of defects may occur in castings, considerably reducing the total output of castings besides increasing the cost of their production. Defective castings offer an ever-present problem to the foundry industry. A defect may be the result of a single clearly defined cause or of a combination of factors. It is therefore essential to understand defects and the causes behind these defects so that they may be minimized or eliminated. The common types of defects found in castings, their causes and remedies are discussed below.<br/><br/>
<b>Blowholes</b><br/>
Blowholes generally appear as smooth walled, round voids or cavities opened to the casting surface. Blowholes are caused by the entrapped bubbles of gas with smooth walls. Blowholes may occur in clusters or there may be one large smooth depression. Blowholes are caused due to excessive moisture in the moulding sand, low permeability of sand, hard ramming of sand or gas producing ingredients in the mould.<br/><br/>
<center><img src="images/mem/lesson5/Blowholes.jpg" width="250" height="200" alt="Blowholes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Blowholes.jpg" alt="Blowholes">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/blowholes3.jpg" alt="Blowholes"><br/><br/><img src="images/mem/lesson6/blowholes4.jpg" alt="Blowholes">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/blowholes5.jpg" alt="Blowholes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/blowholes2.jpg" alt="Blowholes"></center>
<b>Scab</b><br/>  
Splattering during pouring forming solid globules. Redesign of pouring procedure or gating system is needed.<br/><br/>
<center><img src="images/mem/lesson5/Scab.jpg" width="200" height="150" alt="Scab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Scab4.jpg" alt="Scab">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Scab2.jpg" alt="Scab"><br/><br/><img src="images/mem/lesson6/Scab3.jpg" alt="Scab">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Scab1.jpg" alt="Scab"></center>
<b>Misruns</b><br/>
A misrun casting is one that remains incomplete due to the failure of metal to fill the entire mould cavity. This can happen when the section thickness of a casting is too thin or the metal temperature is too cold, so that the entire section is not filled during pouring before the metal solidifies. This defects is called a misrun.<br/><br/>
<center><img src="images/mem/lesson5/Misruns.jpg" width="200" height="150" alt="Misruns">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Misrun.jpg" alt="Misruns"><br/><br/>
<img src="images/mem/lesson6/Misrun2.jpg" alt="Misruns">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Misrun3.jpg" alt="Misruns"></center>
<b>Cold shuts</b><br/>
When two streams of metal, which is too cold, meet in side the mould cavity and do not fuse together, the defect is known as cold shut. In cold shut, a discontinuity is formed due to the imperfect fusion of two streams of metal in the mould cavity and the defect may appear like a crack or seam with smooth rounded edges.<br/><br/>
<center><img src="images/mem/lesson5/ColdShut.jpg" width="250" height="200" alt="ColdShut">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/ColdShut.jpg" alt="ColdShut"><br/><br/>
<img src="images/mem/lesson6/ColdShut1.jpg" alt="ColdShut">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/ColdShut2.jpg" alt="ColdShut"></center>
<b>Shrinkage defects</b><br/>
When metals solidify, there is a volumetric shrinkage, and if adequate feeding does not compensate for the shrinkage, voids will occur inside the casting. It was discussed above and shown in Figure. This defect can be prevented by adequate feeding of molten metal and designing a gating system to enable directional solidification.<br/><br/>
<center><img src="images/mem/lesson5/Shrinkage.jpg" width="250" height="200" alt="Shrinkage">&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Shrinkage.jpg" alt="Shrinkage">&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Shrinkage2.jpg" width="200" height="160" alt="Shrinkage"></center>
<b>Microporosity</b><br/>
Network of small voids caused by localised solidification shrinkage. Caused by the freezing manner of the alloy.<br/><br/>
<center><img src="images/mem/lesson5/Microporosity.jpg" width="300" height="200" alt="Microporosity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Microporosity.jpg" width="180" height="150" alt="Microporosity"><br/><br/>
<img src="images/mem/lesson6/Microporosity2.jpg" alt="Microporosity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Microporosity3.jpg" width="280" height="250" alt="Microporosity"></center>
<b>Hot tears</b><br/>
Hot tears are internal or external cracks or discontinuities on the casting surface. Hot tearing occurs at location with high stress because the casting cannot shrink freely during cooling, owing to constraints in various portions of the moulds and cores. Resolve by mould collapsing or removing from the mould immediately after freezing. Hot tears can also be due to hard ramming, too much shrinkage of metal during solidification etc. Exothermic (heat producing) compounds may be used (exothermic padding) to control cooling at critical sections to avoid hot tearing.<br/><br/>
<center><img src="images/mem/lesson5/HotTears.jpg" width="650" height="220" alt="HotTears"><img src="images/mem/lesson6/HotTears.jpg" height="220" alt="HotTears"></center>
<b>Pin holes</b><br/>
Pin holes are small gas cavities.<br/><br/>
<center><img src="images/mem/lesson5/Pinholes.jpg" width="325" height="225" alt="Pinholes"><img src="images/mem/lesson6/Pinholes1.jpg" alt="Pinholes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Pinholes2.jpg" alt="Pinholes"></center>
<b>Sand wash</b><br/>
Erosion of sand mould during pouring.<br/><br/>
<center><img src="images/mem/lesson5/SandWash.jpg" width="285" height="250" alt="SandWash">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/SandWash1.jpg" alt="SandWash"><br/><br/>
<img src="images/mem/lesson6/SandWash2.jpg" alt="SandWash">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/SandWash3.jpg" alt="SandWash">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/SandWash4.jpg" alt="SandWash"></center>
<b>Penetration</b><br/>
Penetration of molten metal into the sand. Harder packing of sand is needed.<br/><br/>
<center><img src="images/mem/lesson5/Penetration.jpg" width="220" height="150" alt="Penetration">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Penetration.jpg" width="220" height="150" alt="Penetration"><br/><br/>
<img src="images/mem/lesson6/Penetration2.jpg" width="200" height="160" alt="Penetration">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/Penetration3.jpg" width="200" height="160" alt="Penetration"></center>
<b>Mould shift</b><br/>
Shift of the cope relative to the drag.<br/><br/>
<center><img src="images/mem/lesson5/MouldShift.jpg" width="350" height="180" alt="MouldShift">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/MouldShift.jpg" alt="MouldShift">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/MouldShift2.jpg" width="185" height="155" alt="MouldShift"></center>
<b>Core shift</b><br/>
Shift of the core, usually vertical.<br/><br/>
<center><img src="images/mem/lesson5/CoreShift.jpg" width="385" height="155" alt="CoreShift">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/CoreShift.jpg" width="185" height="155" alt="CoreShift">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/lesson6/CoreShift2.jpg" width="185" height="155" alt="CoreShift"></center>
<b>Mould crack</b><br/>
Mould strength insufficient, liquid metal form a fin of the final casting.<br/><br/>
<center><img src="images/mem/lesson5/MouldCrack.jpg" width="275" height="160" alt="MouldCrack"></center></p></dd>
</div>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit3lesson4.php" title="Casting Process: Cupola Furnace">Lecture 4</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit3lesson6.php" title="Types of Pattern">Lecture 6</a></td></tr></table>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute (www.dei.ac.in)</div>
</body>
</html><br/>
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