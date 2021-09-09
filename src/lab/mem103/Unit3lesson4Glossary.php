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
<table Border="0" width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3lesson4.php" title="Lesson 4 Casting Process: Cupola Furnace">Lesson 4 Casting Process: Cupola Furnace</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 4 Glossary</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson4/Unit3Lesson4Glossary.pdf" target="_blank" title="Download Glossary">Glossary Download</a><br/><br/>
<b>Anchor:</b> Appliance used to hold cores in moulds.<br/>
<b>Arbor:</b> A device to reinforce or lift a mass of sand.<br/>
<b>Bedding in:</b> Sinking a pattern in to the sand by digging a "bed" in which the pattern is placed for ramming up.<br/>
<b>Bottom Board:</b> The board that the mould rests on.<br/>
<b>Chaplet:</b> A metal support used to hold a core in place in a mould.<br/> 
<b>Cheek:</b> The portion of a flask placed between the cope and drag when a mould has more than two sections.<br/>
<b>Chill:</b> A metal object placed in the wall of a mould, causing the metal to solidify more quickly at such a point.<br/>
<b>Choke:</b> The part of the gating system that most regulates the flow of metal into the mould cavity.<br/>
<b>Close Over:</b> The operation of lowering a part of the mould over some projecting portion such as a core.<br/>
<b>Contraction:</b> Decrease in size due to cooling of the metal after it is poured.<br/> 
<b>Cope:</b> The upper or topmost section of a flask.<br/>
<b>Core Dryer:</b> A metal form in which the core is baked.<br/>
<b>Core Rod:</b> Irons or bars imbedded in a core to strengthen it.<br/>
<b>Dowel:</b> A pin used between the sections of parted patterns or core boxes to locate and hold them in position.<br/>
<b>Draft:</b> Slight taper given to a pattern to allow drawing from the sand.<br/>
<b>Drawing:</b> Removing the pattern from the sand.<br/>
<b>Drop:</b> The falling away of a body of sand when the mould is jarred or lifted.<br/>
<b>Feeding:</b> delivering additional molten metal to a casting to make up for volume shrinkage during solidification.<br/> 
<b>Feed Head:</b> A reservoir of molten metal from which the casting feeds as it solidifies.<br/> 
<b>Fin:</b> A thin projection on a casting due to an imperfect joint in the mould.<br/>
<b>Fillet:</b> A concave corner piece used at the intersection of two surfaces to round out a sharp corner.<br/>
<b>Follow Board:</b> A board shaped to the parting line of the mould.<br/>
<b>Gate:</b> A channel through which the molten metal enters the casting cavity.<br/>
<b>Gaggers:</b> Metal supports shaped like the letter "L" that are used to reinforce the sand in the mould.<br/>
<b>Head:</b> The pressure exerted by a column of fluid, such as molten metal, water, etc.<br/>
<b>Match Plate:</b> A plate to which the pattern is attached at a parting line.<br/>
<b>Nowel:</b> The lower section of the flask; commonly called the drag.<br/>
<b>Overhang:</b> The extension on the vertical surface of a core print, providing clearance for closing the mould over the core, also known as "shingle."<br/>
<b>Ramming up:</b> The process of packing the sand in the mould or core box with a rammer.<br/>
<b>Rapping:</b> Loosening the pattern from the mould by jarring or knocking.<br/>
<b>Rechucking:</b> Reversing a pattern upon a face plate to permit turning the opposite face to the required shape.<br/>
<b>Rolling over:</b> Operation of turning flask over to reverse its position.<br/> 
<b>Shakeout:</b> The stage in the casting process where the sand from the mould is cleaned off of the newly formed castings through dynamic vibration.<br/>
<b>Shrink Hole:</b> A cavity in a casting due to insufficient feed metal.<br/>
<b>Sizing:</b> A primary coating of glue applied to the end grain of wood to seal the pores.<br/>
<b>Soldiers:</b> Wooden hooks used to reinforce a body of sand.<br/>
<b>Strike:</b> A straightedge used for removing excess sand from a mould or core box.<br/>
<b>Stripping Plate:</b> A plate, formed to the contour of the pattern, which holds the sand in place while the pattern is drawn through the plate.<br/>
<b>Sweep or Skree:</b> A board shaped to a required profile. It is used to remove excess material from a mould or core.<br/>
<b>Tucking:</b> Pressing the sand in place with the hands.<br/>
<b>Tuyere:</b> Opening in the cupola where the air blast enters.<br/>
<b>Vibrator:</b> A mechanical device used to loosen a pattern from a mould.<br/><br/>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>