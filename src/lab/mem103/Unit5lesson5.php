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
<div>
<script type="text/javascript">
//Google Analytics Code
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38541839-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table border="0" width="100%">
<tr><td width="65%"><b>Lesson 5 Work-Holding devices used on Lathe</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit5/Unit5Lesson5.pdf" target="_blank" title="Download Lesson 5">Lesson 5 Download</a></td></tr>
<tr><td><a href="#introduction">5.0&nbsp;&nbsp;&nbsp;Introduction</a></td></tr>
<tr><td><a href="#chucks">5.1&nbsp;&nbsp;&nbsp;Chucks</a></td></tr>
<tr><td>5.1.1&nbsp;&nbsp;&nbsp;Three Jaw Chuck</td></tr>
<tr><td>5.1.2&nbsp;&nbsp;&nbsp;Four Jaw Chuck (Independent Chuck)</td></tr>
<tr><td><a href="#centres">5.2&nbsp;&nbsp;&nbsp;Centres</a></td></tr>
<tr><td><a href="#faceplates">5.3&nbsp;&nbsp;&nbsp;Faceplates</a></td></tr>
<tr><td><a href="#rests">5.4&nbsp;&nbsp;&nbsp;Rests</a></td></tr>
<tr><td>5.4.1&nbsp;&nbsp;&nbsp;Steady Rest</td></tr>
<tr><td>5.4.2&nbsp;&nbsp;&nbsp;Follower Rest</td></tr>
<tr><td><a href="#mandrels">5.5&nbsp;&nbsp;&nbsp;Mandrels</a></td></tr>
<tr><td><a href="#dogs">5.6&nbsp;&nbsp;&nbsp;Lathe Dogs</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="introduction">5.0 &nbsp;&nbsp;&nbsp;Work-Holding on Lathe</a></b></dt>
<dd><p>
On any machine tool, to carry out the machining process in an efficient manner, both the workpiece and tool must be held rigidly. This is accomplished by using jigs and fixtures. Fixtures hold the workpieces in the correct position with respect to cutter during the operation while jigs hold and guide the tool to the correct position on the workpiece. To machine a workpiece in the lathe it is necessary to secure it in some
manner to the end of the spindle, the only true requirement being that the workpiece is held in such a way as to resist deflection by the cutting forces. Work holding devices in a lathe are used either for holding the workpiece or for supporting the workpiece during machining. Few of the widely used work holding devices are explained below.
</p></dd><br>
<dt><b><a name="chucks">5.1 &nbsp;&nbsp;&nbsp;Chucks</a></b></dt>
<dd><p>
A chuck is a device, which is used for holding and rotating the job of shorter length during machining. A chuck is usually equipped with three or four jaws and accordingly they are classified as three-jaw chucks and four-jaw chucks. These are shown in figure below.
<center><img src="images/mem/Unit5/Lesson5/1.jpg"><br><b>Figure 1: Different types of chucks</b></center><br>
<b>5.1.1 Three-jaw chuck</b>: In a three-jaw chuck all the jaws are made to slide simultaneously by an equal amount within the slots provided on the body by rotating any one of the three pinions with the help of a handle. Figure 1(a) shows a three-jaw chuck. This is also known as a self-centering or a universal chuck. This chuck is suitable for holding round or hexagonal and other similar shaped workpieces. The gripping force of the 3-jaw chuck is less than that of the 4-jaw chuck.<br><br>
<b>5.1.2 Four-jaw chuck</b>: The 4-jaw chuck is a very versatile work holding device, able to hold cylindrical as well as odd-shaped parts for machining. A four-jaw chuck is shown in Figure 1(b). In a four-jaw chuck, the jaws can be moved and adjusted independent of each other. The jaws are individually reversible to best match the shape of the workpiece. Hence, this is also known as independent jaw chuck. 
It can be also used for machining eccentrics by offsetting the workpiece. Its grip is more powerful than that of the 3-jaw chuck and gives better adjustment as you have control over each individual jaw.
</p></dd><br>
<dt><b><a name="centres">5.2 &nbsp;&nbsp;&nbsp;Centres</a></b></dt>
<dd><p>
When the length of job large and if it cannot be conveniently held in a chuck, the workpiece can be held and rotated between the headstock centre (the live centre) and the tail stock centre (the dead centre). Turning between the centres is the classic way of machining the barstock with maximum accuracy. The work can be mounted
and dismounted from the lathe quickly and without loosing setup accuracy. The centre holes on workpiece mate with the points of the lathe centres. Figure 2 shows the job held between the centres.<br><br>
<center><img src="images/mem/Unit5/Lesson5/2.jpg"><br><b>Figure 2: Job being held between centres</b></center>
</p></dd>
<dt><b><a name="faceplates">5.3 &nbsp;&nbsp;&nbsp;Faceplates</a></b></dt>
<dd><p>
Workpieces that cannot be accommodated in a chuck or between centres because they are asymmetrical or have a complex shape can be bolted to the faceplate either directly or indirectly via an angle plate. Bolts, clamps and dogs are used with the faceplate to hold the workpiece. Figure 3 shows a faceplate. The faceplate is directly mounted on the lathe spindle.
<center><img src="images/mem/Unit5/Lesson5/3.jpg"><br><b>Figure 3: A face plate</b></center>
</p></dd>
<dt><b><a name="rests">5.4 &nbsp;&nbsp;&nbsp;Rests</a></b></dt>
<dd><p>
A rest is used for providing additional support to long workpiece when it is machined between centres or held in a chuck. If thin and long workpieces are not supported during machining, then there is a possibility that it may bend due to self-weight or due to the cutting forces exerted by the cutting tool on the workpiece. Two types of rests are in common use; these are the steady (or fixed) and follower (or traveling) rest.
The two types of rests are shown in Figure 4.<br><br>
<b>5.4.1 Steady rest</b>: The steady rest is shown in Figure 4(a). This has three jaws, two on the lower base and one on the upper frame. These jaws can be adjusted radially by rotating individual screws to accommodate workpieces of different diameters. These jaws act as bearing to the workpiece surface. The steady rest is clamped to the bed at the desired position, that is, where support is necessary. Depending on the length and weight of the workpiece more than one steady rest can also be used.<br><br>
<center><img src="images/mem/Unit5/Lesson5/4.jpg"><br>
<table width="400"><tr><td><b>(a) Steady rest</b></td><td style="text-align:right"><b>(b) Follower rest</b></td></tr></table>
<b>Figure 4: Different types of rests</b></center><br>
<b>5.4.2 Follower rest</b>: The follower rest is shown in Figure 4(b). This rest is similar to steady rest but is bolted to the back end of the carriage. Unlike steady rest, which is stationary, the follower rest moves along with the carriage. The follower rest consists of a 'C' like casting having two adjustable jaws to support the workpiece.
</p></dd><br>
<dt><b><a name="mandrels">5.5 &nbsp;&nbsp;&nbsp;Mandrels</a></b></dt>
<dd><p>
A workpiece having a large hole in it like a pipe cannot be held firmly in a chuck, because of its reduced strength. In such cases, mandrels are used to hold the workpieces from inside. A mandrel holding a workpiece is shown in Figure 5. During machining, mandrel is held between centres and the workpiece is then machined similar to machining between centres.<br><br>
<center><img src="images/mem/Unit5/Lesson5/5.jpg"><br><b>Figure 5: A mandrel holding a hollow workpiece</b></center>
</p></dd>
<dt><b><a name="dogs">5.6 &nbsp;&nbsp;&nbsp;Lathe Dogs</a></b></dt>
<dd><p>
Lathe dogs are clamping devices used for holding workpiece or mandrels for turning between centres. Lathe dogs are shown in Figure 6. The part to be held is inserted in the v-shaped hole and then firmly secured in position by means of the screw. These lathe dogs can hold the workpiece of only certain range of diameters. In case of large or small size, chucks or faceplates are or other work holding devices are used.
<center><img src="images/mem/Unit5/Lesson5/6.jpg"><br><img src="images/mem/Unit5/Lesson5/7.jpg"><img src="images/mem/Unit5/Lesson5/8.jpg"><br><b>Figure 6: Lathe dogs</b></center>
</p></dd>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit5lesson4.php" title="Operations on Lathe">Lecture 4</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit5lesson6.php" title="Shaping, Planing & Slotting Operations">Lecture 6</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>