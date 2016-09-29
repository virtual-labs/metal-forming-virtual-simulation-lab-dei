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
<tr><td width="65%"><b>Lesson 11 SMART MATERIALS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Unit1Lesson11.pdf" target="_blank" title="Download Lesson 11">Lesson 11 Download</a></td></tr>
<tr><td><dt><a href="#smart">11.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Smart Materials</a></dt></td></tr>
<tr><td><dt><a href="#materials">11.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Piezoelectric Materials</a></dt></td></tr>
<tr><td><dt><a href="#rheostatic">11.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electro-Rheostatic and Magneto-Rheostatic</a></dt></td></tr>
<tr><td><dt><a href="#shape">11.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shape Memory Alloys</a></dt></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.4.1&nbsp;&nbsp;&nbsp;Substitute for Steel</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.4.2&nbsp;&nbsp;&nbsp;Smart Concrete</td></tr>
</table><br /></div>
<div>
<dt><b><a name="smart">11.1 &nbsp;&nbsp;&nbsp;Smart Materials</a></b></dt>
<dd><p>
Smart material can be defined as material that can significantly change their mechanical properties (such as shape, stiffness, and viscosity), or their thermal, optical, or electromagnetic properties, in a predictable or controllable manner in response to their environment. 
Such materials have the ability to change shape or size simply by adding a little bit of heat, or to change from a liquid to solid almost instantly.
</p></dd><br />
<dt><b><a name="materials">11.2 &nbsp;&nbsp;&nbsp;Piezoelectric Materials</a></b></dt>
<dd><p>
When a piezoelectric material is deformed, it gives off a small but measurable electrical material it experiences a significant increase in size (up to a 4% change in volume). Piezoelectric materials are most widely used as sensors in different environments. They are often used to measure fluid compositions, fluid density, or the force of an impact. An example of a piezoelectric material in everyday life is the airbag sensor in your car. The material senses the force of an impact on the car and sends and electric charge deploying the airbag.
</p></dd><br />
<dt><b><a name="rheostatic">11.3 &nbsp;&nbsp;&nbsp;Electro-Rheostatic and Magneto-Rheostatic</a></b></dt>
<dd><p>
Electro-rheostatic (ER) and magneto-rheostatic (MR) materials are fluids, which can experience a dramatic change in their viscosity. These fluids can change from a thick fluid (similar to motor oil) to nearly a solid substance within the span of a millisecond when exposed to a magnetic or electric field; the effect can be completely reversed just as quickly when the field is removed. MR fluids experience a viscosity change when exposed to a magnetic field, while ER fluids experience similar changes in an electric field. 
The most common form of MR fluid consists of tiny iron particles suspended in oil, while ER fluids can be as simple as milk chocolate or cornstarch and oil. MR fluids are being developed for use in car shocks, damping washing machine vibration, prosthetic limbs, exercise equipment, and surface polishing of machine parts. ER fluids have mainly been developed for use in clutches and valves, as well as engine mounts designed to reduce noise and vibration in vehicles.
</p></dd><br />
<dt><b><a name="shape">11.4 &nbsp;&nbsp;&nbsp;Shape Memory Alloys (SMA)</a></b></dt>
<dd><p>
Shape memory alloys (SMA's) are metals, which exhibit two very unique properties, pseudo-elasticity, and the shape memory effect. The term shape memory refers to the ability of certain alloys (Ni – Ti, Cu – Al – Zn etc.) to undergo large strains, while recovering their initial configuration at the end of the deformation process spontaneously or by heating without any residual deformation.<br /><br />
<b>11.4.1  Substitute for Steel:</b><br />
Fatigue behavior of CuZnAl-SMA’s is comparable with steel. If larger diameter rods can be manufactured. It has a potential for use in civil engineering applications.<br /><br />
<b>11.4.2  Smart Concrete:</b><br />
A mere addition of 0.5% specially treated carbon fibers enables the increase of electrical conductivity of concrete. Putting a load on this concrete reduces the effectiveness of the contact between each fiber and the surrounding matrix and thus slightly reduces its conductivity. On removing the load the concrete regains its original conductivity. Because of this peculiar property the product is called “Smart Concrete”. The concrete could serve both as a structural material as well as a sensor. 
The smart concrete could function as a traffic-sensing recorder when used as road pavements. It has got higher potential and could be exploited to make concrete reflective to radio waves and thus suitable for use in electromagnetic shielding. The smart concrete can be used to lay smart highways to guide self steering cars which at present follow tracks of buried magnets. The strain sensitive concrete might even be used to detect earthquakes.
</p></dd><br />
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit1lesson10.php" title="Ceramics">Lecture 10</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit1lesson12.php" title="Wood Working">Lecture 12</a></td></tr></table>
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