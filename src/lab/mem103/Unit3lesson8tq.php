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
<td width="40%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3lesson8.php" title="Lesson 8 Special Casting Processes (Permanent)">Lesson 8 Special Casting Processes (Permanent)</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 8 Terminal Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson8/Unit3Lesson8tq.pdf" target="_blank" title="Download Terminal Questions">Terminal Questions Download</a><br/><br/>
1. What are the advantages of permanent mould casting?<br/><br/>
2. Why the mould in a permanent mould casting preheated? What are the consequences of carrying out the permanent mould casting process without preheating the mould?<br/><br/>
3. Why does die casting produce the smallest cast parts?<br/><br/> 
4. What differences, if any, would you expect in the properties of castings made by permanent-mould versus sandcasting processes?<br/><br/>
5. What differences, if any, can be expected in the properties of castings made by a permanent mould as compared to those of castings made by expendable moulds? <br/><br/>
6. What advantages, if any, are derived from pre-heating the moulds used in permanent-mould casting prior to metal injection? <br/><br/>
7. Is there any difference between the materials used for making dies for gravity die casting process and pressure die casting process? Why? <br/><br/>
8. Give reasons for the common practice of removing the permanent mould castings from the mould as soon as solidification has completed. <br/><br/>
9. In permanent mould casting processes, explain (i) how is venting provided? (ii) Can cores be used? (iii) Are risers provided? <br/><br/>
10. In centrifugal casting process, should the speed of rotation of mould have any effect on the cast structure? Give reasons for your answer. Compare the structure and properties of the outer and inner surfaces of a centrifugal casting. <br/><br/>
11. Distinguish between semi-centrifugal casting and centrifuging as regards their areas of application. <br/><br/>
12. Give some typical applications of slush casting process. <br/><br/>
13. What is the current trend for the application of continuous casting process?
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>