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
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table border="0" width="100%">
<tr><td width="65%"><b>Lesson 5 Welding Defects</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit4/Unit4Lesson5.pdf" target="_blank" title="Download Lesson 5">Lesson 5 Download</a></td></tr>
<tr><td><a href="#defects">5.0&nbsp;&nbsp;&nbsp;Welding Defects</a></td></tr>
<tr><td><a href="#undercut">5.1&nbsp;&nbsp;&nbsp;Undercut</a></td></tr>
<tr><td><a href="#fusion">5.2&nbsp;&nbsp;&nbsp;Lack of Fusion</a></td></tr>
<tr><td><a href="#slag">5.3&nbsp;&nbsp;&nbsp;Slag Inclusions</a></td></tr>
<tr><td><a href="#profile">5.4&nbsp;&nbsp;&nbsp;Incorrect Profile</a></td></tr>
<tr><td><a href="#penetration">5.5&nbsp;&nbsp;&nbsp;Incomplete Penetration</a></td></tr>
<tr><td><a href="#cracks">5.6&nbsp;&nbsp;&nbsp;Cracks</a></td></tr>
<tr><td><a href="#porosity">5.7&nbsp;&nbsp;&nbsp;Porosity</a></td></tr>
<tr><td><a href="#distortions">5.8&nbsp;&nbsp;&nbsp;Distortions</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="defects">5.0 &nbsp;&nbsp;&nbsp;Welding Defects</a></b></dt>
<dd><p>
Weld defects can contribute towards the failure of a complete plant.
</p></dd><br/>
<dt><b><a name="undercut">5.1 &nbsp;&nbsp;&nbsp;Undercut</a></b></dt>
<dd><p>
Undercut is the term given to a sharp narrow groove along the toe of the weld due to the rubbing action of the arc removing the metal and not replacing it with weld metal. It reduces strength but more importantly it provides a notch into the heat affected area of the joint that will act as a stress raiser and possible point of crack initiation.<br/><br/>
<center><img src="images/mem/Unit4/Lesson5/1a.jpg" width="600"><img src="images/mem/Unit4/Lesson5/1b.jpg"><br>
<b>Figure 1: Undercut welding defect</b></center>
<b>Causes</b><br/>
a. Excessive welding current.<br/>
b. Improper manipulation of electrode, i.e. fast travel speed, incorrect weaving technique and incorrect electrode angles.<br/><br/>
<b>Cures</b><br/>
a. Use a moderate welding current and do not try to travel too rapidly.<br/>
b. Excessive weaving will cause under cut.<br/>
c. If an electrode is held too near the vertical plane when making a horizontal fillet weld, under cut will be obtained on the vertical plate.
</p></dd><br/>
<dt><b><a name="fusion">5.2 &nbsp;&nbsp;&nbsp;Lack of Fusion</a></b></dt>
<dd><p>
In this defect, weld metal lies adjacent to unfused base metal, i.e., the two sections are not welded together. This is usually associated with the opposite situation that causes undercut in that too much molten metal is flowing within the joint area without sufficient direct arc action on the base metal beneath.<br/><br/>
<center><img src="images/mem/Unit4/Lesson5/2a.jpg"><img src="images/mem/Unit4/Lesson5/2b.jpg"><br>
<b>Figure 2: Lack of fusion welding defect</b></center>
<b>Causes</b><br/>
a. Failure to raise the temperature of base metal to the melting point.<br/>
b. Failure to dissolve during welding the oxides and other foreign material present on the surfaces with which the deposited metal should fuse.<br/><br/>
<b>Cures</b><br/>
a. Keep the surfaces to be welded clean from foreign materials<br/>
b. Using proper welding technique<br/>
c. Use a moderate welding current and do not try to travel too rapidly.
</p></dd><br/>
<dt><b><a name="slag">5.3 &nbsp;&nbsp;&nbsp;Slag Inclusions</a></b></dt>
<dd><p>
Slag may be associated with undercut, incomplete penetration and lack of fusion in addition to its presence within a bead. Slag inclusions not only reduce cross sectional area strength of the joint but may serve as an initiation point for serious cracking, particularly in the harder steels.<br/><br/>
<center><img src="images/mem/Unit4/Lesson5/3.jpg"><br><b>Figure 3: Slag inclusion welding defect</b></center>
<b>Cause</b><br/>
a. Excessive weaving and the use of too large an electrode in a narrow groove and too low amperage can also cause slag pockets.<br/>
b. Insufficient cleaning out of slag along an undercut toe of a multipass weld and incorrect electrode manipulation leave pockets of slag.<br/><br/>
<b>Cure</b><br/>
a. Cleaning out of slag along an undercut toe.<br/>
b. Proper electrode.
</p></dd><br/>
<dt><b><a name="profile">5.4 &nbsp;&nbsp;&nbsp;Incorrect Profile</a></b></dt>
<dd><p>
Excessive concavity results in insufficient throat thickness in relation to the nominated weld size. Excessive convexity results in poor weld contour which in multilayer welds can give rise to slag inclusions while in the finished weld it provides a poor stress pattern and a local notch effect at the toe of the weld. This efect is one not only relating to appearance but also to overall strength of the joint.<br/><br/>
<b>Cause</b><br/>
a. Excessive concavity, which is due to excessive current and longer arc<br/>
b. Excessive convexity is due to insufficient current and by using improper welding technique.<br/><br/>
<b>Cure</b><br/>
Selection of correct size and type of electrode with correct current and electrode manipulation will not give these defects.
<center><img src="images/mem/Unit4/Lesson5/4.jpg"><br><b>Figure 4: Incorrect weld profile</b></center>
</p></dd>
<dt><b><a name="penetration">5.5 &nbsp;&nbsp;&nbsp;Incomplete Penetration</a></b></dt>
<dd><p>
Joints must be prepared to permit full and proper access to the electrode and weld metal so as to achieve the full throat thickness of the weld. A butt weld or fillet weld where the weld metal does not penetrate to the root resulting in insufficient throat thickness suffers from incomplete penetration and reduced joint strength.<br/><br/>
<center><img src="images/mem/Unit4/Lesson5/5.jpg"><br><b>Figure 5: Incomplete penetration welding defect</b></center>
<b>Cause</b><br/>
a. Improper preparation of joint<br/>
b. Use of too large an electrode.<br/>
c. Insufficient welding current.<br/>
d. Too fast a welding speed.<br/><br/>
<b>Cure</b><br/>
a. Be sure to allow the proper free space at the bottom of a weld.<br/>
b. Use small diameter electrodes in a narrow welding groove.<br/>
c. Use sufficient welding current to obtain proper penetration. Do not weld too rapidly.
</p></dd><br/>
<dt><b><a name="cracks">5.6 &nbsp;&nbsp;&nbsp;Cracks</a></b></dt>
<dd><p>
Cracks can occur in both the base metal and the weld metal as a result of welding.<br/><br/>
<center><img src="images/mem/Unit4/Lesson5/6a.jpg"><img src="images/mem/Unit4/Lesson5/6b.jpg"><br>
<b>Figure 6: Cracks developed during welding</b></center>
<b>Causes</b><br/>
a. Joint too rigid.<br/>
b. Improper welding procedure.<br/>
c. Improper preparation of joints<br/><br/>
<b>Cures</b><br/>
a. Do not use too small a weld between heavy plates. Increase the size of welds.<br/>
b. Do not make welds in stringer beads. Make weld full size in short section 8 to 10 in. long.<br/>
c. Welding sequence should be such as to leave ends free to move as long as possible.<br/>
d. Prepare joints with a uniform and proper free space. In other cases a shrink or press fit may be required.
</p></dd><br/>
<dt><b><a name="porosity">5.7 &nbsp;&nbsp;&nbsp;Porosity</a></b></dt>
<dd><p>
Porous welds may arise as a result of coating breakdown due to excessive current, excessive moisture pickup by the electrode and impurities absorbed from the base metal. Using wet electrodes is bad practice.<br/><br/>
<center><img src="images/mem/Unit4/Lesson5/7a.jpg"><img src="images/mem/Unit4/Lesson5/7b.jpg"><br>
<b>Figure 7: Porosity welding defect</b></center>
<b>Causes</b><br/>
a. Improper properties of electrodes.<br/>
b. Not sufficient pudding time to allow entrapped gas to escape.<br/>
c. Poor base metal.<br/><br/>
<b>Cures</b><br/>
a. Puddling keeps weld metal molten longer and often insures sounder welds.<br/>
b. A weld made of a series of a strong beads is apt to contain minute pinholes. Weaving will often eliminate this trouble.<br/>
c. Do not use excessive welding currents.
</p></dd><br/>
<dt><b><a name="distortions">5.8 &nbsp;&nbsp;&nbsp;Distortion</a></b></dt>
<dd><p>
Residual stresses in weldments produce distortion and may be the cause of premature failure in weldments. Distortion is caused when the heated weld region contracts non-uniformly, causing shrinkage in one part of the weld to exert eccentric forces on the weld cross section.<br/><br>
<center><img src="images/mem/Unit4/Lesson5/8a.jpg"><img src="images/mem/Unit4/Lesson5/8b.jpg"><br>
<b>Figure 8: Distortion</b></center>
<b>Causes</b><br/>
a. Non uniform heating of parts during welding cause them to distort before welding is finished. Final welding of parts in distorted position prevents the maintenance of proper dimensions.<br/>
b. Improper welding sequence<br/><br/>
<b>Cures</b><br/>
a. Properly clamp or tack parts to resist shrinkage.<br/>
b. Distribute welding to prevent excessive local heating. Preheating desirable in some heavy structures.<br/>
c. Study structure and develop a definite sequence of welding<br/>
d. Hammering of weld metal is a compressive action that will help balance out the tensile pull of a contracting weld.
</p></dd><br />
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit4lesson4.php" title="Resistance Welding">Lecture 4</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit4lesson6.php" title="Safety Practices in Welding Process">Lecture 6</a></td></tr></table>
</div>
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