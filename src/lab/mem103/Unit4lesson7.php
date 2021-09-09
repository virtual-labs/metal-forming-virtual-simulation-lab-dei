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
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table border="0" width="100%">
<tr><td width="65%"><b>Lesson 7 Flash Welding & Percussion Welding</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit4/Unit4Lesson7.pdf" target="_blank" title="Download Lesson 7">Lesson 7 Download</a></td></tr>
<tr><td><a href="#flash">7.1&nbsp;&nbsp;&nbsp;Flash Welding</a></td></tr>
<tr><td><a href="#percussion">7.2&nbsp;&nbsp;&nbsp;Percussion Welding</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="flash">7.1&nbsp;&nbsp;&nbsp;Flash Welding</a></b></dt>
<dd><p>
Flash welding is a resistance welding process wherein coalescence is produced simultaneously over the entire area of adjoining surfaces by the heat obtained from resistance to the flow of electric current between the two surfaces, and by the application of pressure after the heating caused by flashing is substantially completed. In flash welding, the fusing of the parts is accomplished in three steps. The surfaces to be joined are brought together under light pressure, then separated slightly to allow arcing to occur. This small arc brings the metals to their melting points at the separated ends and, as a final operation, the molten surfaces are forced together under heavy pressure (on the order of 70 MPa). As they meet, the molten metal and slag are thrown out and a clean fusion is obtained. In this process the joints that are to be welded must be cut square to provide an even flash across the entire surface.<br/><br/>
<center><img src="images/mem/Unit4/Lesson7/1.jpg"><br/><img src="images/mem/Unit4/Lesson7/2.jpg"><br/><b>Figure 1: Flash welding</b></center>
<b>Advantages</b><br/>
1.	Parts can be welded at any angle<br/>
2.	The impurities are removed by flashing and metal ejection<br/>
3.	Provides highest strength factors<br/>
4.	Process is cheaper and faster.<br/><br/>
<b>Disadvantages</b><br/>
1.	The molten particles ejected during the process can be hazardous for the operator<br/>
2.	Needs high power in single phase.<br/>
3.	Parts to be joined must have identical cross sections.<br/>
4.	Metal is lost during flashing.<br/>
5.	Needs a separate arrangement for removing flash from the joined workpiece.<br/><br/>
<b>Applications</b><br/>
1.	Flash welding is extensively used by railways for welding rails in continuous length.<br/>
2.	Oil drilling pipe is attached by flash welding<br/>
3.	Band saw blades are flash welded, drills, taps and reamer bodies can be welded to low carbon steel and alloy steel shanks.
</p></dd><br/>
<dt><b><a name="percussion">7.2&nbsp;&nbsp;&nbsp;Percussion Welding</a></b></dt>
<dd><p>
Percussion welding (PEW) is a similar process, in which a rapid discharge of stored energy produces a brief period of arcing, which is followed by the rapid application of force to expel the molten metal and produce the joint. In percussion welding, the duration of the arc is on the order of 1 to 10 ms.The heat is intense but highly concentrated. In this power is supplied by a capacitor bank that is directly short-circuited across the parts to be welded. This process produces an excellent low-penetration, low heat-affected-zone weld, usually having excellent character and grain structure.<br/><br/>
<center><img src="images/mem/Unit4/Lesson7/3.jpg"><br/><b>Figure 2: Percussion welding circuit setup</b></center>
<b>Advantages</b><br/>
1.	An excellent low-penetration, low heat-affected-zone weld, usually having excellent character and grain structure is produced.<br/>
2.	No flash is produced as fusion is confined to the surface of the workpieces to be welded.<br/>
3.	Heat-treated and cold worked workpieces can be welded without affecting their properties.<br/><br/>
<b>Disadvantages</b><br/>
1.	The process is sensitive to humidity.<br/>
2.	Large welds tend to be very noisy, with a loud percussive repeat that gives the process its name.<br/>
3.	The process also is relatively slow because of the time required to recharge the capacitor bank.<br/>
4.	This process is limited to butt joints only.<br/>
5.	The joint used is limited to 15 to 30 sq.mm only because control of the path of arc is difficult.<br/><br/>
<b>Application</b><br/>
1.	Percussive arc welding is most commonly used for stud-welding precision parts.<br/>
2.	Used for welding metal tips to valve stems, fine wire leads to filaments in lamps and to terminals, and to join wire to rods.
</p></dd><br />
<table><tr><td style="font-weight:bold;"><a href="Unit4lesson6.php" title="Safety Practices in Welding Process">Lecture 6</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>