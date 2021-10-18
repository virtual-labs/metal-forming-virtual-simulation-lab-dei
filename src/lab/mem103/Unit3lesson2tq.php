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
<td style="text-align:right;"><a href="Unit3lesson2.php" title="Lesson 2 Casting Process: Pattern Making">Lesson 2 Casting Process: Pattern Making</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 2 Terminal Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson2/Unit3Lesson2tq.pdf" target="_blank" title="Download Terminal Questions">Terminal Questions Download</a><br/><br/>
1.	What is pattern? How are they classified?<br/>
2.	What are the distinguishing features between a casting and a pattern?<br/>
3.	What factors should be considered while selection of material for the pattern?<br/>
4.	What are the different types of patterns? Enumerate some chief characteristics about patterns.<br/>
5.	Compare match plate pattern with gated pattern.<br/>
6.	What are loose piece patterns? Explain.<br/>
7.	Why wood is widely used in pattern making? Explain with its advantages and limitations.<br/>
8.	Write the various patterns allowances.<br/> 
9.	What are the factors you will take into account when providing: Shrinkage allowance, (b) machining allowance, (c) taper allowance, (d) distortion allowance and (e) rapping allowance on a pattern?<br/>
10.	When do you use a (a) solid pattern (b) split pattern (c) match plate pattern? Give reason(s) and an example in each case.
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>