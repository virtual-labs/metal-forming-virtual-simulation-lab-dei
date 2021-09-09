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
<td style="text-align:right;"><a href="Unit3lesson7.php" title="Lesson 7 Special Casting Processes (Expendable)">Lesson 7 Special Casting Processes (Expendable)</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 7 Frequently Asked Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson7/Unit3Lesson7faq.pdf" target="_blank" title="Download Frequently Asked Questions">Frequently Asked Questions Download</a><br/><br/>
<b>Q.1. What are special casting processes? What is the need of such processes?</b><br/>
In Sand casting processes the sand moulds are single use moulds as they are destroyed after the casting has been removed from the moulding box. It becomes, therefore, obvious that the use of a permanent mould would do a considerable saving in time and labour cost of mould making. Also sand casting process does not always produce good and consistent results and it cannot be used in situations when more accurate and precise castings are to be made. In these situations, special casting processes are used for making high precision castings.<br/><br/>
<b>Name some special casting process:</b><br/>
(i) Plaster Mould Casting Process<br/>
(ii) Shell Moulding Casting Process<br/>
(iii) permanent mould casting process<br/>
(iv) Centrifugal Casting Process.<br/>
(v) Continuous Casting Process.<br/>
(vi) Die-casting Process<br/><br/>
<b>Q.2. What are the advantages of special casting processes over the sand casting processes?</b><br/>
(i) Greater dimensional accuracy,<br/>
(ii) Higher production rates,<br/>
(iii) Lower labour costs,<br/>
(iv) Better surface finishing,<br/>
(v) Minimum need for further machining of castings,<br/>
(vi) Ability to produce extremely thin sections etc.<br/><br/>
<b>Q.3. What is the suitability of ceramic mould casting?</b><br/>
Ceramic mould casting uses a ceramic mould and is useful for high temperature materials such as cast steel and cast iron.<br/><br/>
<b>Q.4. Why is investment casting so named?</b><br/>
'Investment' term is used to denote the coating of refractory material on the wax pattern.<br/><br/> 
<b>Q.5. Why is investment casting not suitable for large castings?</b><br/>
Investment casting uses wax pattern which is delicate to handle and can break easily on mishandling. Hence they are made in small sizes and are not suitable for large size castings.<br/><br/>
<b>Q.6. What is the suitability of plaster mould casting?</b><br/>
Plaster mould casting uses a plaster of pans mould and is useful for low melting point metals such as aluminium and magnesium.<br/><br/>
<b>Q.7. Why is aluminium and magnesium alloys not usually cast by centrifugal casting?</b><br/>
Aluminium and magnesium alloys have low density and due to rotating mould being used in the centrifugal casting, these materials have tendency to get segregated, affecting the quality of casting.<br/><br/>
<b>Q.8. How are the individual wax patterns attached on a “tree” in investment casting?</b><br/>
Heat is applied to the wax pattern and/or tree at the contact surface. The surface of the pattern and/or tree melts, at which time the pattern and tree are brought into contact and firmly held in place until the wax solidifies. This is repeated for each pattern until the “tree” is completed.
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>