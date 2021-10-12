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
<td style="text-align:right;"><a href="Unit3Lesson3.php" title="Lesson 3 Casting Process: Moulding">Lesson 3 Casting Process: Moulding</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 3 Self-Check Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson3/Unit3Lesson3scq.pdf" target="_blank" title="Download Self-Check Questions">Self-Check Questions Download</a><br/><br/>
<center><table border="0" width="100%"><tr>
<td valign="top" width="25px">1</td>
<td valign="top">Which of the following is not part of a completed mould for casting:<br/> 
(a)	 riser<br/>		
(b)	 runner<br/>
(c)	 core<br/>			
(d)	 vender</td>
<td valign="top" width="25px">2</td>
<td valign="top">In casting, green sand is used because it is:<br/>
(a)	 wet<br/>
(b)	 green<br/>
(c)	 hard<br/>
(d)	 hot</td></tr>
<tr>
<td valign="top">3</td>
<td valign="top">When moulding a chaplet is used to:<br/> 
(a)	 reproduce holes and internal shapes<br/>
(b)	 withdraw the pattern from the sand<br/>
(c)	 support the core in the moulding box<br/>
(d)	 vent the sand</td>
<td valign="top">4</td>
<td valign="top">The tool used in moulding to scrape off excess and from a mould is termed as:<br/> 
(a)	 gate cutter<br/>
(b)	 rammer<br/>
(c)	 moulding board<br/>
(d)	 strike off bar</td>
</tr>
<tr>
<td valign="top">5</td>
<td valign="top">The sand carries high silica content is:<br/>
(a)	 parting sand<br/>
(b)	 core sand<br/>
(c)	 facing sand<br/>  
(d)	 green sand</td>
<td valign="top">6</td>
<td valign="top">Which of the following forms a seat to support and locate the core in mould:<br/> 
(a)	Core print<br/>
(b)	Chaplet<br/>
(c)	Riser<br/>
(d)	Sprue</td>
</tr>
<tr>
<td valign="top">7</td>
<td valign="top">Fettling is an operation carried out on:<br/>
(a)	 lathe work<br/>
(b)	 moulding work<br/>
(c)	 welding work<br/>
(d)	 precision marking cut</td>
</tr></table></center><br/><br/>
<b>Possible answers to self check questions</b><br/><br/>
<table border=0 width="250px"><tr>
<td>1.</td><td>d</td><td>2.</td><td>a</td></tr>
<tr>
<td>3.</td><td>c</td><td>4.</td><td>d</td></tr>
<tr>
<td>5.</td><td>d</td><td>6.</td><td>a</td></tr>
<tr>
<td>7.</td><td>b</td></tr></table>
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>