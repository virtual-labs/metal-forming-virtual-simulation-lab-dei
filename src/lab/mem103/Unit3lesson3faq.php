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
<b>Lesson 3 Frequently Asked Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson3/Unit3Lesson3faq.pdf" target="_blank" title="Download Frequently Asked Questions">Frequently Asked Questions Download</a><br/><br/>
<b>1. Give an approximate moulding sand composition?</b><br/>
Silica 70-85%<br/>Clay 10-20%<br/>Water 3-6%<br/>Additives (wood flour, sea coal, cereal, dextrin) 1-6%<br/><br/>
<b>2. What are the different types of sand used in sand casting?</b><br/>
Zircon (ZrSiO<sub>4</sub>) - low thermal expansion<br/>Olivine (Mg<sub>2</sub>SiO<sub>4</sub>) - low thermal expansion<br/>
Iron Silicate (Fe<sub>2</sub>SiO<sub>4</sub>) - low thermal expansion<br/>Chromite (FeCr<sub>2</sub>O<sub>4</sub>) - high heat transfer<br/><br/>
<b>3. Define the following parts of mould.</b><br/><br/>
(i)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pouring cup - the molten metal is poured in here. It has a funnel shape to ease pouring accuracy problems.<br/>
(ii)&nbsp;&nbsp;&nbsp;&nbsp;runner/sprue - a sprue carries metal from the pouring cup to the runners. The runners distribute metal to the part.<br/>
(iii)&nbsp;&nbsp;&nbsp;gate - a transition from the runner to the cavity of the part.<br/>
(iv)&nbsp;&nbsp;&nbsp;&nbsp;riser - a thermal mass where excess metal will remain in a liquid state while the part cools. As the cooling part shrinks, the molten metal in the riser will feed or fill in the shrinkage. Risers can also be used to collect impurities that rise in molten metal.<br/>
(v)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mould cavity - this is the final shape of the part.<br/>
(vi)&nbsp;&nbsp;&nbsp;&nbsp;vent - a narrow escape passage for gases that would otherwise be trapped in the mould.<br/>
(vii)&nbsp;&nbsp;&nbsp;parting line - a line of separation that allows the mould (made in two pieces) to be put together to make a full cavity. Note that this line does not have to be a straight line, and is often staggered to make the mould making easier.<br/>
(viii)&nbsp;&nbsp;cope - the upper part of a casting mould.<br/>
(ix)&nbsp;&nbsp;&nbsp;&nbsp;drag - the lower part of a casting mould.<br/><br/>
<b>4. Enumerate some chief characteristics about cores.</b><br/><br/>
I.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cores allow features that could not be easily formed into a sand core.<br/>
II.&nbsp;&nbsp;&nbsp;&nbsp;Cores are made with techniques similar to those for making sand moulds.<br/>
III.&nbsp;&nbsp;&nbsp;The cores may need structural support in the mould - these metal supports are called chaplets.<br/>
IV.&nbsp;&nbsp;The cores are added when the cavity are made, and they act as part of the mould during casting, but they are rigid enough to allow internal features on parts.<br/>
V.&nbsp;&nbsp;&nbsp;Cores can be made easily in automated settings.<br/><br/>
<b>5. Why cores are required?</b><br/><br/>
Cores are required because many castings may require holes or other internal hollow designs, which must not be filled by the metal. To get these hollow spaces cores are used in moulds. The process of making core is different from the process of making moulds. Thus the void space between the core and mould-cavity surface is what eventually becomes the casting.<br/><br/>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>