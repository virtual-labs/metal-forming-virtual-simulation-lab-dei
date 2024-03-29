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
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<table border="0" width="100%">
<tr><td width="60%"><b>Lesson 4 CASTING PROCESS: CUPOLA FURNACE</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson4/Unit3Lesson4.pdf" target="_blank" title="Download Casting Process: Cupola furnace">Lesson 4 Download</a></td><td><b>Supplementary Material</b></td></tr>
<tr><td><dt><a href="#objectives">4.0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Objectives</a></dt></td><td><a href="Unit3lesson4tq.php">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terminal questions</a></td></tr>
<tr><td><dt><a href="#furnace">4.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cupola Furnace</a></dt></td><td><a href="Unit3lesson4References.php">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;References</a></td></tr>
<tr><td></td><td><a href="Unit3lesson4Glossary.php">3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Glossary</a></td></tr>
</table><br/></div>
<div>
<b>CASTING PROCESS: CUPOLA FURNACE
</b>
<p>
Before pouring the metal into the mould, the metal to be cast has to be in the molten state. This is done by melting the metal in a furnace. Varieties of furnaces are available for melting the material such as cupola furnace, pit furnace, open-hearth furnace. The selection of a particular type of furnace depends upon the amount and type of material to be melted. For example, cupola furnace is used for melting cast iron, open-hearth furnace is used for melting steel.</p><br/>
<dt><b><a name="objectives">4.0&nbsp;&nbsp;&nbsp;Objectives</a></b></dt>
<dd>
<p>
After going through this lesson, you will be able to understand:<br/>
1. Working of cupola furnace.</p><br/>
</dd>
<dt><b><a name="furnace">4.1&nbsp;&nbsp;&nbsp;Cupola Furnace</a></b></dt>
<dd>
<p>
A cupola furnace is shown Fig. 4.1. Cupola furnace is basically refractory lined vertical vessel of steel, which is employed for the melting of cast iron. In ferrous foundries cupola is considered as a cheap furnace for melting cast iron and it produces constantly high quality molten metal. Its excellent features are its high thermal efficiency, low operating cost, its versatility and ease of operation.<br/><br/>
<center><video width="600" height="340" autoplay loop controls>
<source src="MEM103/Unit3/Simulations/CupolaFurnace.mp4" type="video/mp4">
</video></center><br/>
For igniting the cupola, soft and dry pieces of wood are placed on sand bed. Fire is ignited after placing coke over the wooden pieces. Once fire is ignited, the cupola is 'charged' from the charging door. Charging cupola implies adding alternate layers of metal, coke and flux. The amount of coke (fuel) used depends upon quantity of metal to be melted and the quality of fuel available. This ratio of metal to coke is known as melting ratio and it usually varies from 4:1 to 12:1. Air necessary for combustion enters from the tuyers.<br/><br/>
Once the cupola is fully charged, it is left for about 30 minutes to 1 hour for pre heating the charge. This period is known as soaking period. At the end of soaking period, air blast is turned on, that is, air is blown in. The temperature resulting from combustion becomes fairly high to melt the metal charge. After a certain period of time, molten metal starts collecting at tapping hole. Flux in the form of limestone or sodium carbonate, which is added during charging of cupola helps in the formation of slag to remove impurities and retards oxidation of iron. After enough molten metal has collected, first the slag hole is opened and is collected in a separate container and disposed off. The molten metal collected at the tap hole is collected intermittently in a ladle by opening the tap hole. There from the molten metal is poured into moulds ready for pouring.<br/><br/>
<center><img src="images/mem/lesson5/CupolaFurnace.jpg" width="800" height="800" alt="Cupola furnace"><br/><br/><b>Fig. 4.1 Cupola furnace</b></center></p></dd>
</div>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit3lesson3.php" title="Casting Process: Moulding">Lecture 3</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit3lesson5.php" title="Casting Process: Casting Defects">Lecture 5</a></td></tr></table>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>