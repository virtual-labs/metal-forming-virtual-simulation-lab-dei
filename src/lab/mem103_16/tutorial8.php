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
<table border="0" width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="workshop.php" title="Bench Work">Bench Work</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem.php" title="Lecture Notes, MEM-103 Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div style="text-align:justify">
<b>MEASUREMENT, MEASURING TOOLS & LAYOUT TOOLS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Workshop/Tutorial8.pdf" target="_blank" title="Download Tutorial 8">Tutorial 8 Download</a><br/><br/>
<b>Using Vernier Height Gage</b><br/><br/>
The vernier height gage is widely used in taking measurements to an accuracy of 0.001” or 0.02 mm and for layout work i.e. marking a specified height on the workpiece. The three main parts are the foot block (base), the column (beam), and the slide arm. The main scale is on the column. The vernier scale is attached to the slide arm. Like the vernier caliper, main scale of height gages are graduated in divisions of 0.025 inch or 1mm and a vernier scale for reading measurements to 0.001" or 0.02mm. Measurements are taken in the same manner as with other verneir measuring instruments.<br/><br/>
<center><img src="images/mem/Workshop/81.jpg" width="375" height="450"><br/><br/><b>Figure 1: Vernier height gage</b></center><br/>
The vernier height gage is usually used in combination with a surface plate. It is usually designed to permit rapid adjustment and firm clamping, and the base is lapped to slide firmly and accurately on the surface plate.<br/><br/>
<center><img src="images/mem/Workshop/82.jpg" width="450" height="450"><br/><br/><b>Figure 2: Taking measurement with vernier height gage</b></center><br/>
Always be sure that the bottom of the foot block is clean and free from burrs and nicks. The vernier height gage should be carefully placed on the surface plate. Apply a slight force on the base. Test whether the instrument rests solidly or if there is any slight movement. A movement indicates that the instrument is not seating properly.<br/><br/>
Vernier height gage is used with number of attachments. A dial indicator is used for reading dimensions, which are not easily measurable. Tungsten carbide flat scriber, offset scriber, which are secured to slide arm for marking layout lines accurately on workpieces made of hard material or for making linear measurements.<br/><br/>
<center><img src="images/mem/Workshop/83.jpg" width="400" height="450"><br/><br/><b>Figure 3: Using height gage with flat tungsten carbide scriber for marking</b></center><br/>
Offset scriber reaches below the gage base. Depth gage can also be attached to the slide arm for making depth measurements.<br/><br/>
<center><img src="images/mem/Workshop/84.jpg" width="400" height="450"><br/><br/><b>Figure 4: Using height gage with offset scriber for marking</b></center>
<b>Depth gage</b><br/>
It is used for depth measurement purpose such as measuring of depth of grooves, slots, holes. It consists of narrow steel rule with head. The narrow steel rule slides up and down through the head. In some depth gages the head is marked with angles of 30, 45, 60 degrees. It can be used to measure the sloping side of a tapered hole<br/><br/>
<center><img src="images/mem/Workshop/85.jpg" width="450" height="300"><br/><br/><b>Figure 5: Depth Gauge</b></center>
<b>Using depth gage</b><br/>
1. Clean the workpiece by removing burrs and chips and wipe it.<br/>
2. Loosen the clamping nut so a slight pressure may move the rule f.<br/>
3. Set the head firmly on the reference surface.<br/>
4. Slide the rule into the opening until it touches the bottom surface.<br/>
5. Tighten the clamping nut to lock the head and blade.<br/>
6. Slide lightly the head on the reference surface to ensure that the end of the rule is set correctly on the bottom surface.<br/>
7. Take out the depth gage and read the depth directly from the graduated rule.<br/><br/>
<b>Feeler gages</b><br/>
The feeler gage is used to determine space or clearance between two surfaces it is also referred as thickness gage. Although this tool does not give a precise measurement, the measurement is acceptable for dimensions recommended to be obtained by use of the feeler gage.<br/>
The common feeler gage consists of a group of flat steel blades made to a very precise scale. The thickness is written on the gauge blades in thousandths of an inch or tenths of a millimeter. These blades are encased with a single screw in one end to hold the leaves together. A knurled thumbnut allows locking of one or more blades away from the remainder of the pack. Combining blades allows the user to measure almost any size. A small gap between two pieces of metal is measured
by finding the blade or combination of blades that is a close fit for the space. The blade should slide in and out of the space, touching both sides at the same time without wedging or being forced. If the gage and the space are of the same size, the gage will feel tight as it is moved in and out. This is where it gets the name feeler.<br/><br/>
<center><img src="images/mem/Workshop/86.jpg" width="500" height="450"><br/><br/><b>Figure 6: Feeler gage</b></center>
<b>Using feeler gage</b><br/>
1. Before using a feeler gage, the blades should be wiped with a clean oily cloth to remove dirt and any foreign matter from them.<br/>
2. Insert various blades or combinations of blades between two surfaces until a close fit with the space between two surfaces is obtained.<br/>
3. The thickness of the individual blade or the total thickness of all the blades used is the measurement between the surfaces.<br/>
4. Do not apply much force to blades for inserting into openings that are too small for them. Some blades are very thin and can be bent or kinked easily.<br/><br/>
<b>Pitch gage</b><br/>
It is used for measuring the pitch of a particular threaded part. Pitch is the distance at the same point on a thread form between two successive teeth. Pitch gage has a series of thin blades. On the edge of these blades teeth are cut corresponding to standard thread sections. These blades are encased with a single screw in one end to hold the blades together. Each blade has a number of teeth. The teeth match the form and size of a particular pitch. Each blade is marked with size of pitch. Selecting one of the thread gage blades checks pitch.<br/><br/>
<center><img src="images/mem/Workshop/87.jpg" width="550" height="350"><br/><br/><b>Figure 7: Pitch gage</b></center>
<b>Using Pitch gage</b><br/>
1. The teeth of notched blade are paced in the threaded grooves of the part to be measured as shown in figure below.<br/>
2. The blade is sighted to see whether the teeth match the teeth profile of the workpiece.<br/>
3. Different blades are tried until one is matched exactly to workpiece teeth.<br/><br/>
<center><img src="images/mem/Workshop/88.jpg" width="500" height="320"><br/><br/><b>Figure 8: Measuring pitch of threaded workpiece</b></center>
<b>Small hole gages</b><br/>
Small hole gages are used for transfer of measurements. These gages can be used to produce fast and accurate measurements. The end of this gage has a split ball split into two halves with a shaft in it for gaging the hole. Small hole gages usually are purchased as a set of four gages, the range of which are: 0.125-0.500inch, proper size gage to measure your particular job. For measurement they are inserted into a hole, as an adjustment knob is turned, the head expands to the size of the hole. After adjusting the small hole gage to the desired feel in the hole, it is removed and measured with a micrometer to determine the size of the hole. It can also be used for measuring slots, keyway, or other non-circular part features.<br/><br/>
<center><img src="images/mem/Workshop/89.jpg" width="500" height="300"><br/><br/><b>Figure 9: a, b</b></center>
<b>Telescoping gage</b><br/>
A telescoping gage is used somewhat like an inside caliper but it is simpler to use. The telescope gage consists of a handle that has a knurled locking mechanism and two spring-loaded telescoping plungers, one of which slips inside the other. One part of the plunger is fixed to a handle, while the movable part of the plunger is forced outward by a spring. A lockscrew through the handle holds the movable part in any location. Telescoping gages come in variety of sizes that can measure from ½-inch to 6-inches.<br/><br/>
<center><img src="images/mem/Workshop/90.jpg" width="250" height="300"><br/><br/><b>Figure 10: Telescoping gage</b></center>
<b>Using Telescoping gage</b><br/>
1. Choose the proper size gage for the hole to be measured.<br/>
2. To measure an inside diameter, loosen the lockscrew, compress the telescope pin, tighten the lockscrew, and place the gaging head in the hole.<br/>
3. After placing the gage in the hole, hold the gage tilted a little off center, release the lock so that the telescoping rod can expand in the hole and contact the sides of the hole. Carefully align the handle to the vertical position and retighten the lock. Do not over-tighten it may affect the accuracy of the instrument.<br/><br/>
<center><img src="images/mem/Workshop/91.jpg" width="450" height="200"><br/><br/><b>Figure 11: Using telescoping gage for transferring measurement</b></center><br/>
4. Rock the gage over the center of the hole to the position shown in Figure below.<br/><br/>
<center><img src="images/mem/Workshop/92.jpg" width="380" height="280"><br/><br/><b>Figure 12: Rocking of Telescoping gages over center to size and center the them</b></center><br/>
5. Remove the gage from the hole carefully, and Measure across the two parts of the rod with a micrometer or vernier caliper.<br/><br/>
<center><img src="images/mem/Workshop/93.jpg" width="500" height="420"><br/><br/><b>Figure 13: Measuring across the two parts of the rod with a micrometer</b></center>
</div>
<dt style="text-align:right;"><b><a href="#header">Back to Top</a></b></dt>
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