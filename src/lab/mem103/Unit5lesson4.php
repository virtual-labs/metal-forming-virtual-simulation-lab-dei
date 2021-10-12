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
<tr><td width="65%"><b>Lesson 4 Operations on Lathe</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/UNIT5/Unit5Lesson4.pdf" target="_blank" title="Download Lesson 4">Lesson 4 Download</a></td></tr>
<tr><td><a href="#operations">4.1&nbsp;&nbsp;&nbsp;Operations on Lathe</a></td></tr>
<tr><td>4.1.1&nbsp;&nbsp;&nbsp;Turning</td></tr>
<tr><td>4.1.2&nbsp;&nbsp;&nbsp;Facing</td></tr>
<tr><td>4.1.3&nbsp;&nbsp;&nbsp;Knurling</td></tr>
<tr><td>4.1.4&nbsp;&nbsp;&nbsp;Grooving</td></tr>
<tr><td>4.1.5&nbsp;&nbsp;&nbsp;Parting</td></tr>
<tr><td>4.1.6&nbsp;&nbsp;&nbsp;Chamfering</td></tr>
<tr><td>4.1.7&nbsp;&nbsp;&nbsp;Eccentric Turning</td></tr>
<tr><td>4.1.8&nbsp;&nbsp;&nbsp;Taper Turning</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;4.1.8.1&nbsp;&nbsp;&nbsp;Taper Turning using form tool</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;4.1.8.2&nbsp;&nbsp;&nbsp;Taper Turning by swiveling the compound rest</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;4.1.8.3&nbsp;&nbsp;&nbsp;Off-set tail stock</td></tr>
<tr><td>4.1.9&nbsp;&nbsp;&nbsp;Drilling</td></tr>
<tr><td>4.1.10&nbsp;&nbsp;&nbsp;Thread Cutting</td></tr>
<tr><td><a href="#process">4.2&nbsp;&nbsp;&nbsp;Process Sequence</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="operations">4.1 &nbsp;&nbsp;&nbsp;Operations on Lathe</a></b></dt>
<dd><p>
Though lathe is used for producing cylindrical jobs, with special accessories and attachments, it can be used for machining of non-cylindrical jobs. The different operations that can be done on cylindrical job include turning, facing, knurling,
grooving, form turning, parting, chamfering, eccentric turning, taper turning, taper turning and drilling. These operations are described briefly in the following sections.<br><br>
<center><img src="images/mem/Unit5/Lesson4/1.jpg"><br><b>Figure 1: Various operations that can be performed on lathe</b></center>
<b>4.1.1 Turning</b><br>
Turning is a machining process to produce parts round in shape by a single point tool on lathes. The tool is fed either linearly in the direction parallel or perpendicular to the axis of rotation of the workpiece. The primary motion of cutting in turning is the
rotation of the workpiece, and the secondary motion of cutting is the feed motion. The operation in Figure-1 is the turning operation. This operation is used to reduce the diameter of a part to a desired dimension for the desired length of job. The resulting
machined surface is cylindrical. The reduction in diameter of the job depends upon the depth of cut chosen. For example, if the depth of cut is 2 mm it will reduce the job diameter by 4 mm. The tool used for the turning operation is called turning tool.<br><br>
<center><img src="images/mem/Unit5/Lesson4/2.jpg"><img src="images/mem/Unit5/Lesson4/3.jpg"><br><b>Figure 2: Turning operation</b></center>
<b>4.1.2 Facing</b><br>
Facing is the operation of machining the end or face of the job. Facing is used for reducing the length of the workpiece by machining or cutting the end face of workpiece. Facing operation is carried out by using a turning tool. The operation
involves feeding the tool perpendicular to the axis of rotation of the workpiece from outer surface to centre. Note that in case of facing operation, the length of tool travel is equal to half the diameter of the job. The depth of cut is along the axis of the job.
The facing operation is shown in Figure 3. Facing produces a flat surface.<br><br>
<center><img src="images/mem/Unit5/Lesson4/4.jpg"><br><b>Figure 3: Facing operation</b></center>
<b>4.1.3 Knurling</b><br>
This is not a machining operation at all, because it does not involve material removal. Instead, it is a metal forming operation used to produce a regular crosshatched pattern in the work surface. It is done on certain components for effective gripping to
prevent it from slipping while handling it, example is thumbscrews, etc. The knurling process is shown in Figure 3. The knurling tool consists of a set of hardened steel rollers in a holder with the teeth cut on their surface in a definite
pattern. The tool is held rigidly on the tool post and the rollers are pressed against the revolving workpiece to squeeze the metal against the multiple edges. The speed used during knurling should be very low and plenty of lubricant should be used.<br><br>
<center><img src="images/mem/Unit5/Lesson4/5.jpg"><img src="images/mem/Unit5/Lesson4/6.jpg"><br><b>Figure 4: The knurling operation</b></center>
<b>4.1.4 Grooving</b><br>
Grooving or groove cutting is the process of producing a narrow groove on the surface of a cylindrical job. The diameter of the workpiece is reduced slightly from the surface over a narrow width. The process of grooving is shown in Figure 5. The job is
revolved at slow speed and a grooving tool is fed straight into the work by rotating the cross slide screw. Note that this is the depth of cut given to the tool. There is no feed in the grooving operation.
<center><img src="images/mem/Unit5/Lesson4/7.jpg"><br><b>Figure 5: Grooving operations</b></center>
Depending on the shape of the tool, it is possible to have square, round, beveled or any other shape grooves. In grooving operation, the shape of the tool is reproduced on the workpiece; hence, this process is also known as form turning operation.<br><br>
<b>4.1.5 Parting</b><br>
As the name itself indicates, parting is the operation of cutting a workpiece into two.The operation is carried out with a tool called parting tool. The parting operation is shown in Figure 6. For parting operations, the workpiece is rotated at a low speed 
and the parting tool is fed in a direction normal to the axis of rotation of the job. Ample amount of feed should be employed to provide a continuous chip. If slow feed is used, the tool will not cut continuously but will ride on the surface for a revolution or
two, and then bite in suddenly. This phenomenon is known as hogging, and is undesirable. Since, high feed rates are used, to compensate for the heat generated during the operation an abundant supply of coolant should be used.<br><br>
<center><img src="images/mem/Unit5/Lesson4/8.jpg"><br><b>Figure: 6</b></center>
<b>4.1.6 Chamfering</b><br>
Chamfering is the operation of beveling the sharp ends of a workpiece to avoid any injuries to the persons using the finished product. Chamfering is similar to form turning and is done with a chamfering tool
that has its cutting edge at the desired chamfer angle, usually 45<sup>o</sup>. Chamfer is provided for better look, to enable nut to start freely on threaded workpiece, to remove burrs as well as to protect the end of the workpiece from being damaged.<br><br>
<b>4.1.7 Eccentric Turning</b><br>
If the turning operation is carried out at certain distance away from the centre of the workpiece, it is called eccentric turning. Figure 7 shows the turning of a typical component, which is eccentric. For eccentric turning operation, job is held in a four-jaw chuck.<br><br>
<center><img src="images/mem/Unit5/Lesson4/9.jpg"><br><b>Figure 7: Eccentric turning</b></center>
<b>4.1.8 Taper Turning</b><br>
A tapered job is one whose diameter decreases or increases gradually so that it assumes a conical shape. A tapered job is shown in Figure 8. Given major and mino
diameters of the taper and its length, taper angle can be found. From the geometry of the figure 8 the taper angle &alpha; can be found by using the simple geometric relationship:<br>
<center><img src="images/mem/Unit5/Lesson4/f1.jpg"><br><img src="images/mem/Unit5/Lesson4/10.jpg"><br><b>8: A tapered job showing taper angle</b></center><br>
where &alpha; is angle of taper, D<sub>1</sub> is larger diameter in mm; D2 is smaller diameter in mm, and L is length of taper in mm. The conicity K of a taper is defined as:<br>
<center><img src="images/mem/Unit5/Lesson4/f2.jpg"></center>
Accurate external tapers can be machined on a lathe by several methods viz.<br>
1. Using a form tool,<br>
2. Swivelling compound rest,<br>
3. Off-Set Tail Stock, and<br>
4. Simultaneous longitudinal and cross feeds.<br><br>
<b>4.1.8.1 Taper turning using a form tool</b>: The form tool has a straight cutting edge set at the desired taper angle. Form tool is a replica of the taper to be produced i.e. the angle between the straight cutting edge and the rotational axis of the job equals taper angel a or one half the included angle of the taper. The tool is fed against a
rotating job. The shape of the tool is reproduced on the workpiece. This method is limited only for short length tapers. Figure 9 shows taper turning using a form tool.<br><br>
<center><img src="images/mem/Unit5/Lesson4/11.jpg"><br><b>Figure 9: Taper production using form tool</b></center><br>
<b>4.1.8.2 Taper turning by swivelling the compound rest</b>: The compound rest has a circular base graduated in degrees, which can be swivelled at any angle. While turning a taper, the base of compound rest is swivelled through an angle equal to taper angle. The tool is then fed by hand. This method can be used for producing short and steep tapers. Figure 10 shows the taper turning by swivelling the compound rest.<br><br>
<center><img src="images/mem/Unit5/Lesson4/12.jpg"><br><b>Figure 10: Taper production by swiveling the compound rest</b></center><br>
<b>4.1.8.3 Off-Set Tail Stock</b>: In this method the normal rotating part of the lathe still drives the workpiece (mounted between centres), but the centre at the tailstock is offset towards/away from the cutting tool. Then, as the cutting tool passes over, the
part is cut in a conical shape. This method is limited to small tapers over long lengths. The tailstock offset h is defined by:<br>
<center>h = L sina</center>
where, L is the length of workpiece, and &alpa; is the half of the taper angle.<br><br>
<center>or<br>
h = [(D-d)/2]*(L/l)</center><br>
Where, D is major diameter, d is minor diameter, L is total length of job, l is tapered length of job.<br><br>
<center><img src="images/mem/Unit5/Lesson4/13.jpg"><br><b>Figure 10(a) : taper turning by offsetting tailstock</b></center>
<b>4.1.9 Drilling</b><br>
Drilling is the operation of production of holes in a workpiece. Figure 11 shows how drilling operation is performed on a lathe.<br><br>
<center><img src="images/mem/Unit5/Lesson4/14.jpg"><br><b>Figure 11: Drilling operation on a lathe</b></center><br>
While doing the drilling operation on a lathe, the workpiece is held in a chuck or on a faceplate. The drill (the cutting tool) is held in the tailstock and is positioned near the workpiece by moving the tailstock along the guideways. The tool is fed against the
workpiece (the feed motion) by rotating the handle of the tailstock in clockwise direction,. Once the hole is drilled, the tool is withdrawn by rotating the tailstock handle in the anti clockwise direction. It should be noted that in drilling on lathe the job is rotating while the tool remains stationary.<br><br>
<b>4.1.10 Thread Cutting</b><br>
Thread cutting is the operation of producing a helical groove of specific shape on a cylindrical surface. Figure 12 shows the setup of a lathe for thread cutting. Thread cutting operation is done using a single point tool called thread cutting tool. Threads are cut using lathes by advancing the cutting tool at a feed exactly equal to the
thread pitch. For producing threads of pitch p mm, the tool must travel a distance equal to p mm as the workpiece makes one complete rotation. The single-point cutting tool cuts in a helical band, which is actually a thread. In FPS system, threads are specified as threads per inch or TPI. For example, if a workpiece is having four
threads per inch then the pitch of the thread is equal to &frac14; inch. The definite relative rotary and linear motion between the workpiece and tool is achieved by locking or engaging the carriage with the lead screw through a screw and nut mechanism and fixing a gear ratio between the head stock spindle and lead screw. This is done by using change gear mechanism or a gearbox between the spindle and lead screw.<br><br>
<center><img src="images/mem/Unit5/Lesson4/15.jpg"><br><b>Figure 12: Lathe set up for thread cutting operation</b><br><br><img src="images/mem/Unit5/Lesson4/16.jpg"><br><b>Figure 12a: Thread cutting operation</b></center><br>
To cut the threads the tool is brought to the start of the workpiece and a small depth of cut is given to the tool using cross slide. The carriage is engaged with the lead screw, the cut is made on the entire surface and at the end of workpiece, carriage is
disengaged. The tool is pulled out of the job and brought back to starting position. The process is repeated until the full depth threads are obtained. The helix is restarted at the same location each time if multiple passes are required to cut the
entire depth of thread. The tool point must be ground so that it has the same profile as the thread to be cut.
</p></dd><br>
<dt><b><a name="process">4.2 &nbsp;&nbsp;&nbsp;Process Sequence</a></b></dt>
<dd><p>
The process sequence implies the order in which the operations are to be carried out to complete the machining of a job. This is like, to wear the shoes, you have to wear the socks first. This sequence to be adopted depends upon the operations to be performed on the
workpiece. This is illustrated with an example. Imagine that you are asked to produce the component shown in Figure 13 from the stock (raw material) of size 30 mm diameter and 45 mm length.<br><br>
<center><img src="images/mem/Unit5/Lesson4/17.jpg"><br><b>Figure 13: Component to be produced</b></center><br>
To produce this component, one has to do turning to get desired diameter of 20 mm (reduce from 30 mm to 20 mm), do facing to reduce length from 45 mm to 40 mm and do knurling for the 15 mm length.<br>
A possible sequence for the component could be (1) turning, (2) facing, and (3) knurling. It is also possible to produce the component by first facing, then turning and knurling in the last. Another sequence is also possible, but the knurling cannot be done first. It is obvious that
there can exist more than one possible sequence for producing the same component. The general steps when turning external workpart hold in a chuck should follow the next sequence,<br>
1. First rough cuts are applied on all surfaces, starting with the cylindrical surfaces (largest diameters first) and then proceeding with all faces;<br>
2. Special operations such as knurling and grooving (if any) are applied;<br>
3. Diameters are finished first, then the faces.<br>
4. External threads (if any) are cut.<br><br>
<b>Example</b>: Write the process sequence to be used for manufacturing the component shown in Figure 14 from raw material of 175 mm length and 60 mm diameter.<br><br>
<center><img src="images/mem/Unit5/Lesson4/18.jpg"><br><b>Figure 14: Figure for Example</b></center><br>
<b>Solution</b>: To write the process sequence, first list the operations to be performed. The raw material is having size of 175 mm length and 60 mm diameter. The component shown in Figure-14 is having major diameter of 50 mm, step diameter of 40 mm, groove of 20 mm and
threading for a length of 50 mm. The total length of job is 160 mm. Hence, the list of operations to be carried out on the job are turning, facing, thread cutting, grooving and step turning.<br>
A possible sequence for producing the component would be:<br>
1. Turning (reducing completely to 50 mm)<br>
2. Facing (to reduce the length to 160 mm)<br>
3. Step turning (reducing from 50 mm to 40 mm for a length of 110 mm)<br>
4. Grooving and<br>
5. Thread cutting<br>
Here it is assumed that facing is done on only one side of the workpiece.
</p></dd><br />
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit5lesson3.php" title="Operating conditions on Lathe">Lecture 3</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit5lesson5.php" title="Work-Holding devices used on Lathe">Lecture 5</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>