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
<body style="background:#FFFFFF; margin:auto; width: 1024px; text-align:justify;">
<div id="header"><br/>MEM-103 Manufacturing Processes-I<br /><br /></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table width="100%"><tr>
<td width="50%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Lecture Notes">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Unit 4 Welding Frequently Asked Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit4/Unit4faq.pdf" target="_blank" title="Download Frequently Asked Questions">Frequently Asked Questions Download</a><br/><br/>
<b>Q1. Enumerate the factors that are to be considered during selection of welding process.</b><br/>
Factors in the selection of a welding process are<br/>
1. The specific application<br/>
2. The joint design<br/>
3. Joint location<br/>
4. The materials being joined<br/>
5. Material dimensions<br/>
6. Number of parts<br/>
7. Operator skill<br/>
8. Equipment costs<br/>
9. Labor costs<br/><br/>
<b>Q2. What are the requirements for the high quality welding?</b><br/>
The production of a high-quality weld requires:<br/>
1. A source of satisfactory heat and/or pressure,<br/>
2. A means of protecting or cleaning the metal, and<br/>
3. Caution to avoid, or compensate for, harmful metallurgical effects.<br/><br/>
<b>Q3. What are the different ingredients used as coatings for the manufacturing of general purpose arc welding electrodes? Mention function of each ingredient.</b><br/>
1. Cellulose to provide a gaseous shield with a reducing agent in which the gas shield surrounding the arc is produced by the disintegration of cellulose;<br/>
2. Metal carbonates to adjust the basicity of the slag and to provide a reducing atmosphere;<br/>
3. Titanium dioxide to help form a highly fluid, but quick-freezing slag and to provide ionization for the arc;<br/>
4. Ferromanganese and ferrosilicon to help deoxidize the molten weld metal and to supplement the manganese content and silicon content of the deposited weld metal;<br/>
5. Clays and gums to provide elasticity for extruding the plastic coating material and to help provide strength to the coating;<br/>
6. Calcium fluoride to provide shielding gas to protect the arc, adjust the basicity of the slag, and provide fluidity and solubility of the metal oxides;<br/>
7. Mineral silicates to provide slag and give strength to the electrode covering;<br/>
8. Alloying metals including nickel, molybdenum, and chromium to provide alloy content to the deposited weld metal;<br/>
9. Iron or manganese oxide to adjust the fluidity and properties of the slag and to help stabilize the arc;<br/>
10. Iron powder to increase the productivity by providing extra metal to be deposited in the weld.<br/><br/>
<b>Q4. What are the factors that are to considered while performing Spot, Seam and projection welding?</b><br/>
The operation of spot, seam, and projection welding involves the use of electric current of proper magnitude for the correct length of tire. The current and time factors must be coordinated so that the base metal within a confined area will be raised to its melting point and then resolidified under pressure. The temperature obtained must be sufficient to ensure fusion of the base metal elements, but not so high that metal will be forced from the weld zone when the pressure is applied.<br/><br/>
<b>Q5. Suggest some methods of correction to prevent arc blow.</b><br/>
1. Weld away from the earth connection.<br/>
2. Change the position of' the earth wire on the work.<br/>
3. Wrap the welding cable a few turns around the work, if possible, on such work as I sections, etc.<br/>
4. Change the position of the work on the table if working on a bench.<br/><br/>
<b>Q6. What are the power requirements for arc welding process?</b><br/>
Arc welding requires a large electrical current, which ranges from 150A to 1000A. The load voltage is usually between 30V and 40V, with the actual voltage across the arc varying from 12V to 30V, depending on the arc length. Both AC and DC power supplies are used as per requirement. In arc welding the power supply uses dropping voltage characteristics as these characteristics have capacity to minimize changes in welding current as the welding voltage fluctuates within the usual operating range.
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>