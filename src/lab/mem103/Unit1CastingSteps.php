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
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
<b>Detailed Steps in Casting</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Unit1CastingSteps.pdf" target="_blank" title="Download Detailed Steps in Casting">Detailed Steps in Casting Download</a><br/><br/>
1.Place pattern on molding board.<br/>
2. Place drag parting surface down on molding board.<br/>
3. Riddle sand over pattern until covered.<br/>
4. Press sand around pattern with fingers.<br/>
5. Completely fill drag with sand.<br/>
6. Use a ram to pack sand.<br/>
7. Remove excess sand with strike rod.<br/>
8. Make vent holes for gases to escape.<br/>
9. Place bottom board on drag.<br/>
10. Turn over drag and remove molding board.<br/>
11. Smooth molding sand.<br/>
12. Add fine coat of parting sand.<br/>
13. Place the cope on the drag.<br/>
14. Add sprue pin ~ 1" to side of pattern.<br/>
15. Fill, ram, & vent cope as done.<br/>
16. Withdraw sprue pin.<br/>
17. Create a funnel opening.<br/>
18. Separate cope from drag.<br/>
19. Moisten drag mold edges with swab.<br/>
20. Use draw spike to loosen pattern.<br/>
21. Remove the pattern.<br/>
22. Cut gate from sprue to pattern cavity.<br/>
23. Cut riser in cope to channel hot metal.<br/>
24. Spray, swab, or dust the mold surfaces with coating material.<br/>
25. Re-assemble cope and drag to prepare for pouring.<br/>
26. Weight cope to prevent seepage at parting line.<br/>
27. Pour the metal.<br/>
28. Allow to cool.<br/>
29. Separate and clean casting.<br/>
30. Reclaim the sand & clean the flask.<br/><br/>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>