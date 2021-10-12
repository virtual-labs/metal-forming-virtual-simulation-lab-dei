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
<table Border="0" width="100%"><tr>
<td width="35%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit1Lesson1.php" title="Overview of Manufacturing Processes">Lesson 2 Overview of Manufacturing Processes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
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
<b>Lesson 2 Self-Check Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Lesson1/Unit1Lesson1scq.pdf" target="_blank" title="Download Self-Check Questions">Self-Check Questions Download</a><br/><br/>
1. What are the Factors that are to be considered in Selecting Processes?<br/>
2. What is primary shaping? Name some primary shaping manufacturing process?<br/>
3. What is metal forming? Name some metal forming manufacturing process?<br/>
4. What is metal cutting? Name some metal cutting processes?<br/>
5. What is manufacturing process? What are the two types of manufacturing strategies?<br/>
6. What are the main components of which Manufacturing System is composed of?<br/>
7. What are the Competitive priorities in today’s manufacturing environment?<br/>
8. What is lean manufacturing?<br/>
9. What is Agile manufacturing?<br/>
10. What are the reasons for the changing trend of manufacturing from mass production to agile manufacturing?<br/>
11. What is Concurrent Engineering?<br/>
12. Enumerate some basic safety guidelines in Mechanical workshop.<br/><br/>
<b>Possible Answers to Self-check Questions</b><br/><br/>
1.<br/>
a.	Basic shape of product<br/>
b.	Material and its properties before and after processing<br/>
c.	Economics of production<br/>
d.	Precision (tolerances) required<br/>
e.	Surface Finish required<br/><br/>
2. In primary shaping manufacturing process there is no initial shape of product and after the process we get well defined final shape. Few examples of primary shaping manufacturing process are Casting (sand and die), metal powder pressing etc.<br/><br/>
3. In metal forming process material is formed by Plastic Deformation of metal. Some frequently used metal forming process are rolling, extrusion, cold and hot forging, bending, deep drawing, rod and tube drawing.<br/><br/>
4. In metal cutting a new shape is made by removing excess of material. Metal cutting processes are sawing, turning, milling, broaching and drilling.<br/><br/>
5. A manufacturing process is defined as the use of one or more physical mechanisms to transform a material’s shape and/or form. The two types of manufacturing strategies are: Discrete parts manufacturing and Continuous parts manufacturing.<br/><br/>
6. The main components of Manufacturing System are: {people + machinery + auxiliary equipment} and Common material and information flow.<br/><br/>
7. Cost - Low-cost operations are preferred; Quality - High performance design, Consistent quality are essential; Time - Fast delivery time (lead time), On time delivery, Development speed a must; Flexibility – Customization and Volume flexibility are desired.<br/><br/>
8. In lean manufacturing measures are directed toward eliminating waste over a broad sequence of processes while maintaining quality; example of continuous improvement.<br/><br/>
9. Lean or world class manufacturing is being very good at doing the things you can control. Agile manufacturing deals with the things you can NOT control. Agile Manufacturing is a philosophy of maximizing the capability to respond positively to external and internal changes in condition; includes new products, processes, organizations, teaming, etc.<br/><br/>
10. Here are a few of the reasons that the manufacturing paradigm is changing from mass production to agile manufacturing:<br/>
•	Global competition is intensifying.<br/>
•	Mass markets are fragmenting into niche markets.<br/>
•	Cooperation among companies is becoming necessary, including companies who are in direct competition with each other.<br/>
•	Customers expect low volume, high quality, custom products.<br/>
•	Very short product life-cycles, development time, and production lead times are required.<br/>
•	Customers want to be treated as individuals.<br/><br/>
11.	Concurrent engineering refers to the process of considering simultaneously the requirements of assembly and manufacturing with design requirements in order to reduce the unit cost of production, improve quality, and reduce total lead time.<br/><br/>
12.<br/>
1.	Everyone must wear safety glasses in the shop. Even when one is not working on a machine, one must wear safety glasses. A chip from a machine on which someone is working on could fly into your eye.<br/>
2.	Check your clothes and hair before you walk into the shop. In particular: If you have long hair or a long beard, tie it up. If your hair is caught in spinning machinery, it will be pulled out even you will be pulled into the machine.<br/>
3.	No loose clothing.-Ties, scarves, loose sleves, etc. are prohibited.<br/>
4.	No gloves.<br/>
5.	Wear appropriate shoes - No open toed sandals. Wear shoes that give a sure footing. If you are working with heavy objects, steel toes are recommended.
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>