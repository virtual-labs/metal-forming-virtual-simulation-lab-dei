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
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
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
<table border="0" width="100%">
<tr><td width="65%"><b>Lesson 3 Operating conditions on Lathe</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/UNIT5/Unit5Lesson3.pdf" target="_blank" title="Download Lesson 3">Lesson 3 Download</a></td></tr>
<tr><td><a href="#conditions">3.0&nbsp;&nbsp;&nbsp;Operating Conditions</a></td></tr>
<tr><td><a href="#speed">3.1&nbsp;&nbsp;&nbsp;Cutting Speed</a></td></tr>
<tr><td><a href="#feed">3.2&nbsp;&nbsp;&nbsp;Feed</a></td></tr>
<tr><td><a href="#depth">3.3&nbsp;&nbsp;&nbsp;Depth of Cut</a></td></tr>
<tr><td><a href="#mrr">3.4&nbsp;&nbsp;&nbsp;Material Removal Rate (MRR)</a></td></tr>
<tr><td><a href="#time">3.5&nbsp;&nbsp;&nbsp;Machining Time</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="conditions">3.0 &nbsp;&nbsp;&nbsp;Operating Conditions</a></b></dt>
<dd><p>
Here the term operating conditions or cutting conditions refers to speed, feed and depth of cut motions required for metal cutting. As we discussed earlier, the definition of these operating conditions is different for different machine tools. For example, in a lathe, the term speed refers to the speed of job and in case of drilling machine it refers to the speed of the tool. Hence, here we first explain how the speed, feed and depth of cut motions are provided in a lathe. Refer Figure 2 for the three motions.<br/><br/>
Selection of cutting conditions is made with respect to the type of machining operation. Cutting conditions should be decided in the order depth of cut - feed - cutting speed.<br/><br/>
</p></dd>
<dt><b><a name="speed">3.1 &nbsp;&nbsp;&nbsp;Cutting Speed</a></b></dt>
<dd><p>
In a lathe, for turning operation, cutting speed is the peripheral speed of the workpiece past the cutting tool. For a workpiece, say a circular bar of diameter D rotating at N revolutions per minute (rpm), the peripheral speed is given by<br/>
<center><img src="images/mem/Unit5/Lesson3/f1.jpg"></center>
where the diameter of the job (D) is in mm and to get speed in m/min conversion factor of 1000 mm/m is used. The material moves pass the stationary cutting tool with this peripheral speed, as shown in Figure 1. Hence, the cutting speed is:<br/><br/>
<center><img src="images/mem/Unit5/Lesson3/f2.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1)<br/><img src="images/mem/Unit5/Lesson3/1.jpg"><br/>
<b>Figure 1: Cutting speed and peripheral speed of work piece in turning operation</b></center>
</p></dd>
<dt><b><a name="feed">3.2 &nbsp;&nbsp;&nbsp;Feed</a></b></dt>
<dd><p>
In lathe operations, the term 'feed' implies the distance the tool advances for each revolution of the work. Feed in turning is generally expressed in mm per turning revolution (mm-tr<sup>-1</sup>). For example, if the feed is specified as 2 mm/revolution, it implies that the tool moves a distance of 2 mm for every revolution of the job. The direction of feed is shown in Figure 2.<br/><br/>
<center><img src="images/mem/Unit5/Lesson3/2.jpg"><br/><b>Figure 2: Three motions in turning and direction of feed & depth of cut during turning operation</b></center>
</p></dd>
<dt><b><a name="depth">3.3 &nbsp;&nbsp;&nbsp;Depth of cut</a></b></dt>
<dd><p>
The depth of cut is the perpendicular distance measured from the machined surface to the uncut (or previous cut) surface of the workpiece. For turning operations, the depth of cut is expressed as:<br/>
<center><img src="images/mem/Unit5/Lesson3/f3.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2)</center>
where<br/>
D<sub>1</sub> = original diameter of the workpiece in mm<br/>
D<sub>2</sub> = final diameter of the workpiece in mm<br/><br/>
In a turning operation if the depth of cut is 1 mm, then the diameter will be reduced by 2 mm. The values of speed, feed, depth of cut depends upon the type of workpiece material, tool material, type of surface finish required etc. In order to produce the desired dimension, the metal to be cut may be removed in two possible ways. Initially large amount of metal is removed to come closer to the desired final dimension without bothering about accuracy of dimension and surface finish. Only care to be taken is that the dimension is not reduced below the value. This type of metal cutting is called rough cutting or roughing operation. In roughing operations, depth of cut is made as large as possible (max depths are in the range of 6~10 mm) with respect to available machine tool, cutting tool strength, and other factors. Often, a series of roughing passes is required. Roughing operations must leave a thin layer of material (~0.5 mm on a side) required for the subsequent finishing operation.<br/><br/>
<center><img src="images/mem/Unit5/Lesson3/3.jpg"><br/><b>Figure 3: Example of selection of roughing passes in a turning operation</b></center><br/>
A finishing cut or finishing operation obtains the final dimension to the desired accuracy and surface finish. In finishing cut, very small amount of material is removed. Normally, only one finishing cut is made while there can be more than one roughing cuts depending upon the amount of material to be removed and permissible depth of cut. Roughing operation requires stronger tools for faster material removal, while for finishing cut new or freshly sharpened tool is used. In roughing, large feed and large depth of cut are used and in finishing, small depth of cut and low feeds are used.<br/><br/>
<center><img src="images/mem/Unit5/Lesson3/4.jpg"><br/><b>Figure 4: Finishing pass in a turning operation</b></center><br/>
</p></dd>
<dt><b><a name="mrr">3.4 &nbsp;&nbsp;&nbsp;Material Removal Rate (MRR)</a></b></dt>
<dd><p>
The material removal rate is the volume of material removed per unit time. Volume of material removed is a function of speed, feed and depth of cut. Higher are the values of these, more the material removal rate.<br/>
If D represents the original diameter of the workpiece in mm, d represents the depth of cut in mm, f represents the feed in mm/rev, then material removed per revolution is the volume of chip whose length is &pi;D and whose cross section area is d x f. That is,<br/>
<center>volume of material removed/revolution =  &pi;D x d x f&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(3)</center>
Since job is making N revolutions per minute, the MRR in mm3/min is given by<br/>
<center>MRR = &pi;D x d x f x N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(4)</center>
In terms of the cutting speed v in m/min, see Equation (1),<br/>
<center>MRR = 1000 x v x d x f&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(5)</center><br/>
You can check the dimensional accuracy of these equations by substituting the units. For the Equation (4), (mm)(mm)(mm/rev)(rev/min) => mm<sup>3</sup>/min<br/>
and for Equation (5),  (mm/m)(m/min)(mm)(mm) => mm<sup>3</sup>/min.<br/><br/>
</p></dd>
<dt><b><a name="time">3.5 &nbsp;&nbsp;&nbsp;Machining Time</a></b></dt>
<dd><p>
The time required to machine a component is called machining time. Machining time depends on size of the workpiece, amount of material to be removed and the operating conditions employed such as speed, feed and depth of cut.<br/>
Consider the speed of the job as N rpm, length of the job as L<sub>j</sub> mm and f as feed in mm/rev. The product of feed and speed f x N is the feed rate in mm/min. It gives the distance the tool moves (f x N) in mm in one minute. Hence, for a distance L<sub>j</sub>, the time required for one complete cut, t in minutes is given by
<center><img src="images/mem/Unit5/Lesson3/f4.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(6)</center>
Note that the above equation of time doesn't include setup time and the time required for tool approach and retraction.
</p></dd><br/>
<b>Example</b>: A 150 mm long 12 mm diameter stainless steel rod is to be reduced in diameter to 10 mm by turning on a lathe in one pass. The spindle rotates at 500 rpm, and the tool is traveling at an axial speed of 200 mm/min. Calculate the cutting speed, material removal rate and the time required for machining the steel rod.<br/>
<b>Solution</b>:<br/>
<center>Given data: L<sub>j</sub> = 150 mm, D<sub>1</sub> = 12 mm, D<sub>2</sub> = 10 mm, N = 500 rpm</center>
Using Equation (1)<br/>
<center>v = p x 12 x 500 / 1000<br/>
= 18.85 m/min.<br/>
depth of cut = d = (12 - 10)/2 = 1 mm</center>
feed rate = 200 mm/min,<br/>
we get the feed f in mm/rev by dividing feed rate by spindle rpm.<br/>
That is<br/>
<center>f = 200/500 = 0.4 mm/rev</center>
From Equation (4),<br/>
<center>MRR = 3.142 x 12 x 0.4 x 1x 500 = 7538.4 mm<sup>3</sup>/min</center>
From Equation (6),<br/>
<center>t = 150/(0.4 x 500) = 0.75 min.</center>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit5lesson2.php" title="Metal Cutting & Cutting Tool for Lathe">Lecture 2</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit5lesson4.php" title="Operations on Lathe">Lecture 4</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>