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
<div><table width="100%"><tr>
<td width="50%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="memHome.php" title="Manufacturing Processes-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../home.php" title="Metal Forming Virtual Simulation lab">MFVL Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/>
<a href="MEM103/TentativeSchedule.pdf" target="_blank" title="MEM-103, Tentative Schedule of Lectures">Tentative Schedule of Lectures Download</a><br/><br/></div>
<div>
<b>TENTATIVE SCHEDULE OF LECTURES</b><br/>MEM-103, Manufacturing Processes &ndash; I, July &ndash; December 2019<br/><br/>
<center><table border="1" cellspacing="0" width="100%">
<tr><td width="95">Lecture 1.</td><td>What is manufacturing?, types of production systems, professionalism and ethics.</td></tr>
<tr><td>Lecture 2.</td><td>The evolution of manufacturing, socio-economic role of manufacturing, sustainable manufacturing, types of manufacturing processes.</td></tr>
<tr><td>Lecture 3.</td><td>Properties of Materials, Engineering Materials, Type of materials, Chemical, Dimensional, Physical, Mechanical Properties.</td></tr>
<tr><td>Lecture 4.</td><td>Stress strain curve. Problems on strength of materials.</td></tr>
<tr><td>Lecture 5.</td><td>Ferrous metals & alloys.</td></tr>
<tr><td>Lecture 6.</td><td>Non-Ferrous metals & alloys.</td></tr>
<tr><td>Lecture 7.</td><td>Non-Metallic Materials (Wood, Ceramics, Plastics, Composites). Smart materials.</td></tr>
<tr><td>Lecture 8.</td><td>Heat treatment process.</td></tr>
<tr><td>Lecture 9.</td><td>General shop safety, safety guidelines for hand tools, safety helmet, ear protectors, face mask, eye protectors, welder&rsquo;s face mask, gloves and gauntlets, welder&#39;s apron, accidents &ndash; what to do, common hazards and their sources, emergencies &mdash; what to do, safety in - wood working, foundry, forging, welding, machine tools, electrical equipment, material handling equipment.</td></tr>
<tr><td>Lecture 10.</td><td>Review of unit-1, self check quiz of unit 1.</td></tr>
<tr><td>Lecture 11.</td><td>Introduction to casting process, advantages of casting process, applications, sand casting process, production steps in a sand-casting process.</td></tr>
<tr><td>Lecture 12.</td><td>Casting terminology, gating system. Problems on gating system.</td></tr>
<tr><td>Lecture 13.</td><td>Pattern: making, functions, material, factors for selection of material, types, allowances. Problems on calculation of allowances.</td></tr>
<tr><td>Lecture 14</td><td>Moulding, moulding sand, properties of moulding sand, types of moulds, moulding tools, procedure for making a mould, core.</td></tr>
<tr><td>Lecture 15.</td><td>Moulding machines.</td></tr>
<tr><td>Lecture 16.</td><td>Cupola furnace.</td></tr>
<tr><td>Lecture 17.</td><td>Casting defects.</td></tr>
<tr><td>Lecture 18.</td><td>Die casting, die casting machines and materials</td></tr>
<tr><td>Lecture 19.</td><td>Centrifugal casting.</td></tr>
<tr><td>Lecture 20.</td><td>Moulding methods - shell, CO<sub>2</sub> and plaster.</td></tr>
<tr><td>Lecture 21.</td><td>Investment casting, Continuous Casting.</td></tr>
<tr><td>Lecture 22.</td><td>Review of unit-2, self check quiz of unit 2</td></tr>
<tr><td>Lecture 23.</td><td>Fundamentals of metal forming, benefits & applications of forging, common metal forming processes, state of stress, cold and hot working.</td></tr>
<tr><td>Lecture 24.</td><td>Forging, open die hammer forging, impression die drop forging, press forging, drawing down or swaging, setting down, cutting out, punching and drifting, bending, welding or shutting, riveting.</td></tr>
<tr><td>Lecture 25.</td><td>Upset forging, swaging, rotary forging, roll forging.</td></tr>
<tr><td>Lecture 26.</td><td>Equipments of forging shop, forging hammers.</td></tr>
<tr><td>Lecture 27.</td><td>Drop hammers- mechanical friction board and belt type.</td></tr>
<tr><td>Lecture 28.</td><td>Wire drawing, wire drawing terms, die pull, drawing equipment.</td></tr>
<tr><td>Lecture 29.</td><td>Rolling process.</td></tr>
<tr><td>Lecture 30.</td><td>Spinning process.</td></tr>
<tr><td>Lecture 31.</td><td>Review of unit-3, self check quiz of unit 3.</td></tr>
<tr><td>Lecture 32.</td><td>Principles of welding, advantages, disadvantages, applications, weldability, types and classification of welding process, autogeneous welding, heterogeneous welding, pressure welding, non-pressure welding, solidstate welding, fusion welding.</td></tr>
<tr><td>Lecture 33.</td><td>Features of the completed weld, features of joints, types of welds and welded joints, types of fillet weld, size of the weld, welding positions, tips for arc welding, tips for gas welding.</td></tr>
<tr><td>Lecture 34.</td><td>Gas welding, welding techniques for gas welding, advantages, disadvantages, process variables for oxy-fuel welding, oxy-acetylene flame types, oxy-acetylene gas welding process, equipment used in oxy-acetylene welding.</td></tr>
<tr><td>Lecture 35.</td><td>Fluxes, characteristics of a good flux, filler metals. Features of a good fusion wield.</td></tr>
<tr><td>Lecture 36.</td><td>Basic electricity fundamentals, arc, arc welding, characteristics of manual arc welding process.</td></tr>
<tr><td>Lecture 37.</td><td>Arc welding procedure, mechanics of arc, metal transfer in arc welding process from the tip of the electrode, polarity in welding, comparison between ac and dc arc welding, arc welding electrodes, arc welding equipment.</td></tr>
<tr><td>Lecture 38.</td><td>Resistance welding, characteristics of resistance welding, advantages, disadvantages, applications.</td></tr>
<tr><td>Lecture 39.</td><td>Types of resistance welding, spot welding, seam welding, projection welding, flash welding, upset welding.</td></tr>
<tr><td>Lecture 40.</td><td>Welding defects.</td></tr>
<tr><td>Lecture 41.</td><td>Review of unit-4, self check quiz of unit 4.</td></tr>
<tr><td>Lecture 42.</td><td>Machining processes, lathe, constructional features of lathe.</td></tr>
<tr><td>Lecture 43.</td><td>Cutting tool for lathes, shapes of standard cutting tool.</td></tr>
<tr><td>Lecture 44.</td><td>Types of lathe, turning, operating conditions in turning.</td></tr>
<tr><td>Lecture 45.</td><td>Milling, milling machine, constructional features of milling machine, classification of milling. Methods of milling.</td></tr>
<tr><td>Lecture 46.</td><td>Operating conditions in milling.</td></tr>
<tr><td>Lecture 47.</td><td>Shapers and planers, constructional features of shapers and planers, Shaping operation, slotters, planing operation.</td></tr>
<tr><td>Lecture 48.</td><td>Operating conditions in shaper.</td></tr>
<tr><td>Lecture 49.</td><td>Drilling, drilling machine (drill press), constructional features of drilling machine., types of drilling machines.</td></tr>
<tr><td>Lecture 50.</td><td>Cutting tool for drilling machine, nomenclature of twist drills.</td></tr>
<tr><td>Lecture 51.</td><td>Operating conditions in drilling.</td></tr>
<tr><td>Lecture 52.</td><td>Review of unit-5, self check quiz of unit 5.</td></tr>
</table></center><br/>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>