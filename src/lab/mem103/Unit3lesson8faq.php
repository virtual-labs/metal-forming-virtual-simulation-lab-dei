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
<td width="40%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3lesson8.php" title="Lesson 8 Special Casting Processes (Permanent)">Lesson 8 Special Casting Processes (Permanent)</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 8 Frequently Asked Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson8/Unit3Lesson8faq.pdf" target="_blank" title="Download Frequently Asked Questions">Frequently Asked Questions Download</a><br/><br/>
<b>Q.1. Why are risers not as useful in die casting as they are in sand casting?</b><br/>
There are a number of reasons that risers are not as useful in die casting as they are in sand casting. Recall that in sand casting, a riser is sized and located so that it provides molten metal to the die cavity to compensate for metal shrinkage. In sand casting, the cooling rate is relatively low, so that the cooling rate can be effectively manipulated by placement and size of a riser. 
In die casting, it is essential that the cooling rate be high, or else the economic justification for tooling and equipment cannot be made. Using risers would of course slow the cooling time, and therefore they are economically undesirable. Further, the metals that are used in die casting will therefore be ones that develop internal shrinkage porosity, but do not separate from the mould wall, so that risers are not as necessary.<br/><br/>
<b>Q.2. Enumerate benefits of die casting vs. other manufacturing techniques.</b><br/>
<b>Die casting vs. plastic moulding</b> – Die casting produces stronger parts with closer tolerances that have greater stability and durability. Die cast parts have greater resistance to temperature extremes and superior electrical properties.<br/><br/>
<b>Die casting vs. sand casting</b> – Die casting produces parts with thinner walls, closer dimensional tolerances and smoother surfaces. Production is faster, and labor costs per casting are lower. Finishing costs are also less.<br/><br/>
<b>Die casting vs. permanent mould</b> – Die casting offers the same advantages versus permanent moulding as it does compared with sand casting.<br/><br/>
<b>Die casting vs. forging</b> – Die casting produces more complex shapes with closer tolerances, thinner walls and lower finishing costs. Intricate internal passages are not possible without additional machining operations in a forging.<br/><br/>
<b>Die casting vs. stamping</b> – Die casting produces complex shapes with variations possible in section thickness. One casting may replace several stampings, resulting in reduced assembly time and cost.<br/><br/>
<b>Die casting vs. screw machine products</b> – Die casting produces shapes that are difficult or impossible from bar or tubular stock, while maintaining tolerances without tooling adjustments. Die casting requires fewer operations and reduces waste and scrap.<br/><br/>
<b>Q.3. What is the difference between permanent mould casting process and sand casting process?</b><br/>
The basic difference between sand casting and permanent mould casting is the use of metal (or permanent) mould, that is, the mould is not destroyed as in case of sand casting process and the same mould can be reused after cleaning for producing another casting.<br/><br/>
<b>Q.4. What are the advantages of Permanent mould castings? What are the typical parts that are being manufactured by this process?</b><br/>
Permanent mould castings usually have better mechanical properties than sand castings because solidification is more rapid. Permanent mould casting process ensures product of good quality, uniform mechanical properties and better surface finish. Metal moulds usually are made of high-alloy iron or steel and have a production life of up to 1,20,000 or more castings. Typical products made by this process include kitchenware, automobile pistons.<br/><br/>
<b>Q.5. Formation of flash is a common phenomenon in die casting. What does flash mean?</b><br/>
Flash is the excess metal squeezed out in the space near the parting line or into the clearances around the core due to high pressure used in die casting. It is undesirable and has to be machined off.<br/><br/>
<b>Q.6. For which type of metals, hot-chamber die casting process is suitable?</b><br/>
Hot-chamber die casting is suitable for low melting point metals such as zinc, tin and lead.<br/><br/>
<b>Q.7. For which type of metals, cold-chamber die casting process is suitable?</b><br/>
Cold-chamber die casting is suitable for high temperature metals and alloys such as aluminium, brass and magnesium alloys.<br/><br/>
<b>Q.8. What are the Steps involved in permanent mould casting process?</b><br/>
(i) The mould is preheated to 120<sup>o</sup> - 250<sup>o</sup>C and a refractory wash is sprayed onto those surfaces of that will be in direct contact with the molten metal alloy.<br/>
(ii) Cores, if required, are inserted, and the mould is closed.<br/>
(iii) The molten metal alloy is poured into the mould through the gating system.<br/>
(iv) The casting is allowed to solidify, after solidification, the mould is opened and cores and other loose mould members are withdrawn and the casting is removed from the mould.<br/>
(v) The conventional foundry practice is followed for trimming of gates and risers from the castings.<br/><br/>
<b>Q.9. For what purpose the Continuous Casting Process is used?</b><br/>
Continuous casting process can be used for producing castings of large length with a uniform cross-section. Castings of different cross-section can be produced by changing the mould. The shapes that can be produced by this process include square, rectangular, hexagonal etc.
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>