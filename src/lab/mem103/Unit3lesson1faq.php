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
<td width="50%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3lesson1.php" title="Lesson 1 Casting Process">Lesson 1 Casting Process</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 1 Frequently Asked Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson1/Unit3Lesson1faq.pdf" target="_blank" title="Download Frequently Asked Questions">Frequently Asked Questions Download</a><br/><br/>
<b>1. Enumerate the safety points that should be followed during casting process in foundry.</b><br/><br/>
&nbsp;&nbsp;&nbsp;I.	Wear eye protection, gloves, spats (covering top of feet), and thick clothing protecting all exposed skin on arms and legs. NO polyester or synthetic clothing.<br/>
&nbsp;&nbsp;&nbsp;II.	Sand Floor in pouring area shall be clear of all objects not involved in pouring.<br/>
&nbsp;&nbsp;&nbsp;III.	Clamp or weight up moulds that require it.<br/>
&nbsp;&nbsp;&nbsp;IV.	Metal added to heat must be free of moisture and impurities.<br/>
&nbsp;&nbsp;&nbsp;V.	Metal added to heat during melt must be preheated.<br/>
&nbsp;&nbsp;&nbsp;VI.	Skimmers and other melting tools must be preheated before use.<br/>
&nbsp;&nbsp;&nbsp;VII.	Move Slowly while removing crucible from furnace and moving to mould.<br/>
&nbsp;&nbsp;&nbsp;VIII.	USE COMMON SENSE! Do not look into exhaust during operation.<br/>
&nbsp;&nbsp;&nbsp;IX.	Inspect crucibles before use.<br/>
&nbsp;&nbsp;&nbsp;X.	Inspect propane lines.<br/>
&nbsp;&nbsp;&nbsp;XI.	Use outdoors only.<br/>
&nbsp;&nbsp;&nbsp;XII.	No alcohol or drug use.<br/>
&nbsp;&nbsp;&nbsp;XIII.	Wear respiratory protection while melting copper-base alloys (brass, bronze).<br/><br/>

<b>2. With the help of some examples show that Casting process shouldn’t be thought only as an alternate method of manufacturing but casting processes are essential or even inevitable.</b><br/><br/>
&nbsp;&nbsp;&nbsp;I. Example 1, manufacturing the cylinder block of an internal combustion engine by any process other than casting would be very difficult and time consuming, if not impossible. Similarly, the production rate to produce an intricate shape or profile by any other process will be much lower than that of casting process.<br/>
&nbsp;&nbsp;&nbsp;II. Example 2, If it is required to produce a large size component having 5 m diameter and 10 m length. It is impossible to imagine work-holding device on any machine tool to hold this type of big job and machine it.<br/>
&nbsp;&nbsp;&nbsp;III. Example 3, It is required to have a hole of 2 m diameter in a workpiece made of very hard material. It is highly impossible to imagine a drilling machine, which can accommodate a drill having diameter of 2 m. Even if machines are designed for this specific application, the workpiece or tool will undergo plastic deformation under the action of very high cutting forces required to machine. Also, recall that large sized holes cannot be drilled with a single drill tool but are made in successive stages and, hence, it will not be an economical process.<br/>
&nbsp;&nbsp;&nbsp;IV. Example 4, For producing parts with complicated shapes, high operator skills are required. Production rate is low and maintaining consistency of quality is difficult in mass production as it is operator dependent.<br/><br/>

<b>3. What are the Advantages of the casting process?</b><br/><br/>
The most intricate of shapes, both external and internal, may be cast. As a result, many other operations, such as machining, forging, and welding, can be minimized or eliminated.<br/>
&nbsp;&nbsp;&nbsp;I.	Because of their physical properties, some metals can only be cast to shape since they cannot be hot-worked into bars, rods, plates, or other shapes from ingot form as a beginning to other processing.<br/>
&nbsp;&nbsp;&nbsp;II.	Objects may be cast in a single piece which would otherwise require assembly of several pieces if made by other methods.<br/>
&nbsp;&nbsp;&nbsp;III.	Metal casting is a process highly adaptable to the requirements of mass production. Large numbers of a given casting may be produced very rapidly. For example cast engine blocks and transmission cases.<br/>
&nbsp;&nbsp;&nbsp;IV.	Extremely large, heavy metal objects may be cast when they would be difficult or economically impossible to produce otherwise. Example:Large pump housing, valves, and hydroelectric plant parts weighing up to 200 tons illustrate this advantage of the casting process.<br/><br/>

<b>4. What are some engineering properties that are obtained more favorably in cast metals?</b><br/>
&nbsp;&nbsp;&nbsp;I.	cast metals exhibit the same properties regardless of which direction is selected for the test piece relative to the original casting.<br/>
&nbsp;&nbsp;&nbsp;II.	Strength and lightness in certain light metal alloys, which can be produced only as castings.<br/>
&nbsp;&nbsp;&nbsp;III.	Good bearing qualities are obtained in casting metals.<br/><br/>

<b>5.	What are the Casting Process Requirements?</b><br/>
&nbsp;&nbsp;&nbsp;I.	Moulds: two types: expendable and non-expendable?<br/>
&nbsp;&nbsp;&nbsp;II.	Pattern and moulding sand for making an expendable mould?<br/>
&nbsp;&nbsp;&nbsp;III.	Cores for providing internal cavity?<br/>
&nbsp;&nbsp;&nbsp;IV.	Melting and pouring of molten material?<br/>
&nbsp;&nbsp;&nbsp;V.	Cleaning?<br/>
&nbsp;&nbsp;&nbsp;VI.	Heat treatment?<br/>
&nbsp;&nbsp;&nbsp;VII.	Sand reconditioning facilities?<br/>
&nbsp;&nbsp;&nbsp;VIII.	Sand testing equipment?<br/><br/>

<b>6.	Enumerate the chief Characteristics of a casting process.</b><br/>
&nbsp;&nbsp;&nbsp;I.	Most suited for intricate shapes and for parts with internal cavities, such as engine blocks, cylinder heads, pump housing, crankshaft, machine tool beds and frames, etc.<br/>
&nbsp;&nbsp;&nbsp;II.	particularly suitable for small runs<br/>
&nbsp;&nbsp;&nbsp;III.	cost of equipment and facilities low<br/>
&nbsp;&nbsp;&nbsp;IV.	Some metals can be shaped by casting only because of the metallurgical and mechanical properties.<br/><br/>

<b>7. Name the basic steps in making sand castings.</b><br/><br/>
There are six basic steps in making sand castings:<br/> 
&nbsp;&nbsp;&nbsp;I.	Obtaining the casting geometry<br/>
&nbsp;&nbsp;&nbsp;II.	Patternmaking<br/>
&nbsp;&nbsp;&nbsp;III.	Coremaking<br/>
&nbsp;&nbsp;&nbsp;IV.	Moulding<br/>
&nbsp;&nbsp;&nbsp;V.	Melting and pouring<br/>
&nbsp;&nbsp;&nbsp;VI.	Cleaning<br/><br/>

<b>8. What are the basic problems in casting processes?</b><br/>
&nbsp;&nbsp;&nbsp;I.	Fluids must fill in the complete cavity.<br/>
&nbsp;&nbsp;&nbsp;II.	Shrinkage of castings takes place.<br/>
&nbsp;&nbsp;&nbsp;III.	Mechanical property of final casting products are effected.<br/>
&nbsp;&nbsp;&nbsp;IV.	net shape is very difficult to obtain.<br/><br/>
 
<b>9. Enumerate the disadvantages of casting process.</b><br/>
&nbsp;&nbsp;&nbsp;I.	Vary depending on the type of casting method used, but include:<br/>
&nbsp;&nbsp;&nbsp;II.	Poor dimensional accuracy and surface finish<br/>
&nbsp;&nbsp;&nbsp;III.	Limitations on mechanical properties<br/>
&nbsp;&nbsp;&nbsp;IV.	Porosity (may have voids)<br/>
&nbsp;&nbsp;&nbsp;V.	Hazardous process<br/><br/>

<b>10. What are the Process Parameters in casting process?</b><br/>
&nbsp;&nbsp;&nbsp;I.	Pouring Temperature<br/>
&nbsp;&nbsp;&nbsp;II.	Cooling rate<br/>
&nbsp;&nbsp;&nbsp;III.	Fluidity (viscosity)<br/><br/>

<b>11. What is the function of Riser?</b><br/><br/>
The function of the riser is to feed liquid metal into the casting locations where the shrinkage of liquid during cooling is likely to produce voids, known as shrinkage voids or shrinkage cavities. <br/>
The requirements for this function to occur effectively are as follows:<br/>
&nbsp;&nbsp;&nbsp;I.	The riser size is large enough for feeding.<br/>
&nbsp;&nbsp;&nbsp;II.	The riser is the last part in the mould to solidify.<br/>
&nbsp;&nbsp;&nbsp;III.	The riser is placed at a proper location so that the solidified material does not impede the flow of molten metal from it to the desired locations.<br/><br/>

<b>12. What is the function of Gating System?</b><br/><br/>
The function of the gating system is to facilitate filling of the mould cavity at the proper rate without excessive temperature loss, objectionable turbulence, entrapped gases, slag. The recommended time for filling is 0.25 to 0.5 min., 1 to 2 min. being the maximum.
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>