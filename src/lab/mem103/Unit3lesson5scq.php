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
<table Border="0" width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3lesson5.php" title="Lesson 5 Casting Process: Casting Defects">Lesson 5 Casting Process: Casting Defects</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 5 Self-Check Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson5/Unit3Lesson5scq.pdf" target="_blank" title="Download Self-Check Questions">Self-Check Questions Download</a><br/><br/>
<center><table border="0" width="100%"><tr>
<td valign="top" width="25px">1</td>
<td valign="top">An aluminum casting is found to be full of pin holes, the probable cause is:<br/> 
(a)	 the sand is too wet<br/>		
(b)	 the air is allowed in too fast<br/>
(c)	 the sand is too dry<br/>			
(d)	 there is too much sand in the casting</td>
<td valign="top" width="25px">2</td>
<td valign="top">Casting defect caused by the molten metal is:<br/>
(a)	 blow holes<br/>
(b)	 swell<br/>
(c)	 scab<br/>
(d)	 All of above</td></tr>
<tr>
<td valign="top">3</td>
<td valign="top">Which of the following is casting defect:<br/> 
(a)	 Coining<br/>
(b)	 Hot tear<br/>
(c)	 Blanking<br/>
(d)	 Hot spinning</td>
<td valign="top">4</td>
<td valign="top">Defects resulting from hard ramming:<br/> 
(a)	 hot tear<br/>
(b)	 swells<br/>
(c)	 drops<br/>
(d)	 cuts and washes</td>
</tr>
<tr>
<td valign="top">5</td>
<td valign="top">The main furnace used for casting is the:<br/>
(a)	 cupola<br/>
(b)	 electric arc<br/>
(c)	 bessemer converter<br/>  
(d)	 puddling furnace</td>
<td valign="top">6</td>
<td valign="top">Blow holes refers to:<br/> 
(a)	process of heat treatment<br/>
(b)	casting defect<br/>
(c)	process of joining<br/>
(d)	machining defect</td>
</tr>
<tr>
<td valign="top">7</td>
<td valign="top">Casting defect resulting from lack of fluidity:<br/>
(a)	 blow holes<br/>
(b)	 inclusions<br/>
(c)	 shrinkage<br/>
(d)	 cold shut</td>
<td valign="top" width="25px">8</td>
<td valign="top">Which of the following is not a casting defect:<br/>
(a)	 mismatch<br/>		
(b)	 hot tear<br/>
(c)	 blowholes<br/>		
(d)	 scab</td></tr>
<tr><td valign="top" width="25px">9</td>
<td valign="top"  colspan="4">A drop in a casting occurs because:<br/>
(a)	 there is no support at the bottom of the mould.<br/>
(b)	 the casting is very slippery.<br/>
(c)	 The sand in the mould collapses due to  the weight of the poured metal.<br/>
(d)	 the mould cavity surface chips off due to the high velocity of the metal during pouring.
</td></tr>
</tr></table></center><br/><br/>
<b>Possible answers to self check questions</b><br/><br/>
<table border=0 width="250px"><tr>
<td>1.</td><td>a</td><td>2.</td><td>a</td></tr>
<tr>
<td>3.</td><td>b</td><td>4.</td><td>a</td></tr>
<tr>
<td>5.</td><td>a</td><td>6.</td><td>b</td></tr>
<tr>
<td>7.</td><td>d</td><td>8.</td><td>a</td></tr>
<td>9.</td><td>a</td></tr></table>
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>