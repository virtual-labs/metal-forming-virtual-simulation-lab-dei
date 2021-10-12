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
<td style="text-align:right;"><a href="Unit3Lesson2.php" title="Lesson 2 Casting Process: Pattern Making">Lesson 2 Casting Process: Pattern Making</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 2 Frequently Asked Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson2/Unit3Lesson2faq.pdf" target="_blank" title="Download Frequently Asked Questions">Frequently Asked Questions Download</a><br/><br/>
<b>1. Why the patterns are made split up into two or more parts?</b><br/><br/>
How the pattern is made up depends on how simple or how complex the casting is. A simple casting with one or more flat surfaces can be moulded in one piece, providing that the pattern can be removed without disturbing the compacted sand. More complex patterns may be split up into two or more parts so they can be removed without disturbing the compacted sand, when using two part flasks.<br/><br/>
<b>2. Why patterns are made tapered?</b><br/><br/>
The pattern must be tapered so that the pattern may be easily removed from the sand. This taper is known as the draft, and must be added if the part does not have a natural draft.<br/><br/>
<b>3. What determine the material that should be used for making of patterns?</b><br/><br/>
The number of castings to be made from the mould and the specifications required of the finished casting are two of the criteria that determine which material is selected for the creation of the pattern.<br/><br/>
<b>4. What are the requirements for the material selected for making the pattern?</b><br/><br/>
The material selected for making the pattern should fulfill the following requirements:<br/>
I.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It should be easily shaped, worked, machined and joined.<br/>
II.&nbsp;&nbsp;&nbsp;&nbsp;It should be resistant to wear and corrosion.<br/>
III.&nbsp;&nbsp;&nbsp;It should be resistant to chemical action.<br/>
IV.&nbsp;&nbsp;It should be dimensionally stable and must remain unaffected by variations in temperature and humidity.<br/>
V.&nbsp;&nbsp;&nbsp;It should be easily available and economical.</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>