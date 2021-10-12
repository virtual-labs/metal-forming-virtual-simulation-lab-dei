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
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
<b>Lesson 10 CERAMICS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Unit1Lesson10.pdf" target="_blank" title="Download Lesson 10">Lesson 10 Download</a>
</div>
<div><br />
<center><img src="images/mem/Unit1/Ceramics.jpg" width="550" height="400" alt="Ceramics"><br /><b>Figure 1: Ceramics</b></center><br />
Ceramics are materials that are composed of inorganic substances. Ceramics is a refractory, inorganic, and nonmetallic material. Traditional ceramics include clay products, silicate glass and cement; while advanced ceramics consist of carbides (SiC), pure oxides (Al<sub>2</sub>O<sub>3</sub>), nitrides (Si<sub>3</sub>N<sub>4</sub>), non-silicate glasses and many others.<br />
<center><table width="300" border="0">
  <tr>
    <th scope="col">Ceramic Compound</th>
    <th scope="col">Melting Point <sup>o</sup>C</th>
  </tr>
  <tr>
    <td>Magnesium Oxide</td>
    <td>2798<sup>o</sup></td>
  </tr>
  <tr>
    <td>Aluminum Oxide</td>
    <td>2050<sup>o</sup></td>
  </tr>
  <tr>
    <td>Silicon Dioxide</td>
    <td>1715<sup>o</sup></td>
  </tr>
  <tr>
    <td>Silicon Nitride</td>
    <td>1900<sup>o</sup></td>
  </tr>
  <tr>
    <td>Silicon Carbide</td>
    <td>2500<sup>o</sup></td>
  </tr>
</table><br />
<table width="700" style="border:2px solid black;">
  <tr>
    <td width="160"><b>Product Area</b></td>
    <td><b>Product</b></td>
  </tr>
  <tr>
    <td>Aerospace</td>
    <td>space shuttle tiles, thermal barriers, high  temperature glass windows, fuel cells</td>
  </tr>
  <tr>
    <td>Consumer Uses</td>
    <td>glassware, windows, pottery,magnets, dinnerware,  ceramic tiles, lenses, home electronics, microwave transducers</td>
  </tr>
  <tr>
    <td>Automotive</td>
    <td>catalytic converters, ceramic filters, airbag sensors,  ceramic rotors, valves, spark plugs, pressure sensors, thermistors, vibration  sensors, oxygen sensors, safety glass windshields, piston rings</td>
  </tr>
  <tr>
    <td>Medical Bioceramics)</td>
    <td>orthopedic joint replacement, prosthesis, dental  restoration, bone implants</td>
  </tr>
  <tr>
    <td>Military</td>
    <td>structural components for ground, air and naval  vehicles, missiles, sensors</td>
  </tr>
  <tr>
    <td>Computers</td>
    <td>insulators, resistors, superconductors, capacitors,  ferroelectric components, microelectronic packaging</td>
  </tr>
  <tr>
    <td>Other Industries</td>
    <td>bricks, cement, membranes and filters, lab equipment</td>
  </tr>
  <tr>
    <td>Communications</td>
    <td>fiber optic/<strong>laser</strong> communications, TV and radio components, microphones</td>
  </tr>
</table>
</center><br />
One of the most interesting high-temperature applications of ceramic materials is their use on the space shuttle. Almost the entire exterior of the shuttle is covered with ceramic tiles made from high purity amorphous silica fibers. Those exposed to the highest temperatures have an added layer of high-emittance glass. These tiles can
tolerate temperatures up to 1480<sup>o</sup> C for a limited amount of time. Some of the high temperatures experienced by the shuttle during entry and ascent are shown in Figure 2.<br /><br />
<center><img src="images/mem/Unit1/SpaceShuttle.jpg" alt="Space Shuttle's ascent and descent temperatures"><br /><b>Figure 2: Space Shuttle's ascent and descent temperatures</b></center><br />
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit1lesson9.php" title="Plastics">Lecture 9</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit1lesson11.php" title="Smart Materials">Lecture 11</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>