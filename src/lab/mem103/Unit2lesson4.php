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
<tr><td width="65%"><b>Lesson 4 Forging Equipments</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit2/Unit2lesson4.pdf" target="_blank" title="Download Lesson 4">Lesson 4 Download</a></td></tr>
<tr><td><a href="#introduction">4.0&nbsp;&nbsp;&nbsp;Introduction</a></td></tr>
<tr><td><a href="#hammers">4.1&nbsp;&nbsp;&nbsp;Forging Hammers or Power Hammers</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1.1&nbsp;&nbsp;&nbsp;Gravity Drop Hammers</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1.2&nbsp;&nbsp;&nbsp;Power Drop Hammers</td></tr>
<tr><td><a href="#presses">4.2&nbsp;&nbsp;&nbsp;Forging Presses</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.2.1&nbsp;&nbsp;&nbsp;Mechanical Presses</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.2.2&nbsp;&nbsp;&nbsp;Hydraulic Presses</td></tr>
<tr><td><a href="#behavior">4.3&nbsp;&nbsp;&nbsp;Speed and Stroke behavior of Forging Equipments</a></td></tr>
</table><br/></div>
<div>
<b>FORGING EQUIPMENTS</b><br/><br/>
<dt><b><a name="introduction">4.0&nbsp;&nbsp;&nbsp;Introduction</a></b></dt>
<dd><p>
Forging equipments are classified according to their principle of operation. The two categories of forging equipment are:<br/>
<b>(i) Forging hammers:</b> In forging hammers, the forging force is supplied by the falling weight or ram; hence these are energy restricted machines as deformation results from dissipating the kinetic energy of the ram.<br/><br/>
<b>(ii) Forging presses:</b> Mechanical forging presses are stroke restricted equipment as the length of the stroke and available loads at various positions of stroke represent their capability. Hydraulic presses are load restricted machines as their capability for carrying out forming operation is limited by the maximum load capacity of the press.
</p></dd><br/>
<dt><b><a name="hammers">4.1&nbsp;&nbsp;&nbsp;Forging Hammers or Power Hammers</a></b></dt>
<dd><p>
The hammer is the least expensive and most versatile type of equipment for generating load and energy to carry out a forming process. This technology is characterized by multiple impact blows between contoured dies. The hammer is an energy-restricted machine as they get their energy from the potential energy of hammer and on falling of the hammer; 
this energy is converted into kinetic energy. During a working stroke, the deformation proceeds until the total kinetic energy is dissipated by plastic deformation of the material when the die faces contact each other. Therefore, it is necessary to rate the capacities of these machines in terms of energy, i.e., meter-kilograms, or meter-tons. 
The practice of specifying a hammer by its ram weight is not useful for the user. Hammers are primarily used for hot forging, for coining, and to a limited extent. Hammer forging has a reputation as an excellent way to enhance the metallurgical properties of many materials.<br/><br/>
<b>4.1.1 Gravity drop hammers</b><br/>
Gravity drop hammers have a free falling ram. According to the method for raising the upper ram, the gravity hammers may be classified as, simple gravity-drop hammer, the upper ram is positively connected to a board (board-drop hammer), a belt (belt-drop hammer), a chain (chain-drop hammer), 
or a piston (oil-, air-, or steam-lift drop hammer); see Figure-1 (a-c). The ram is lifted to a certain height and then dropped on the stock placed on the anvil. During the downstroke, the ram is accelerated by gravity and builds up the blow energy. 
The upstroke takes place immediately after the blow; the force necessary to ensure quick lift-up of the ram can be three to five times the ram weight.<br/><br/>
In a gravity-drop hammer, the total blow energy is equal to the kinetic energy of the ram and is generated solely through free-fall velocity, or:<br/>
<center><img src="images/mem/Unit2/Lesson5/1.jpg"></center>
where m<sub>1</sub> is the mass of the dropping ram, V<sub>1</sub> is the velocity of the ram at the start of the deformation, G<sub>1</sub> is the weight of the ram, g is the acceleration of gravity, and H is the height of the ram drop.<br/><br/>
<center><img src="images/mem/Unit2/Lesson5/2.jpg"><br>
<table width="650" style="text-align:center;"><tr><td><b>(a) Board drop<br>hammer</b></td><td><b>(b) Belt drop<br>hammer</b></td><td><b>(c) Chain drop<br>hammer</b></td><td><b>(d) Power drop<br>hammer</b></td></tr></table><br>
<b>Figure 1: Forging drop hammers</b></center><br>
<b>4.1.2 Power drop hammers</b><br>
The operation principle of a power-drop hammer is similar to that of an air-drop hammer (Figure 1d). In the down stroke, in addition to gravity, the ram is accelerated by steam, cold air, or hot air pressure. In hydraulic gravity power drop hammers, the ram is lifted with oil pressure against an air cushion. The compressed air slows down
the upstroke of the ram and contributes to its acceleration during the down stroke. Thus, hydraulic power hammer also has a minor power hammer action. In the powerdrop hammer, the acceleration of the ram is enhanced with air pressure applied on the top side of the ram cylinder.<br><br>
In a power-drop hammer, the total blow energy is generated by the free fall of the ram and by the pressure acting on the ram cylinder, or:<br>
<center><img src="images/mem/Unit2/Lesson5/3.jpg"></center>
where, in addition to the symbols given above, p is the air, steam, or oil pressure acting on the ram cylinder in the down stroke and A is the surface area of the ram cylinder.<br><br>
All important feature of any power hammer is that the energy of the blow can be controlled which is not possible in board hammers as mass and height of fall are fixed. Hammers also do not provide the forging accuracy obtained in presses. Moreover, because of the inherent impact character of the hammer, there are associated
problems of vibrations, noise and ground shock. Some of these problems have been minimized by using a counter blow hammer which uses two opposed rams, which simultaneously approach each other horizontally or vertically to forge the part. The part can be rotated between the blows as in open die forging. These are very fast
operating machines and very little energy is lost as vibration and noise, etc.<br><br>
During a working stroke, the total nominal energy, E<sub>T</sub>, of a hammer is not entirely transformed into useful energy available for deformation, E<sub>A</sub>. Some small amount of energy is lost in overcoming friction of the guides, and a significant portion is lost in the form of noise and vibration to the environment. Thus, the blow efficiency,
&eta;=E<sub>A</sub>/E<sub>T</sub>, of hammers is always less than one. The blow efficiency varies from 0.8 to 0.9 for soft blows (small load and large displacement) and from 0.2 to 0.5 for hard blows (high load and small displacement).
</p></dd><br/>
<dt><b><a name="presses">4.2&nbsp;&nbsp;&nbsp;Forging Presses</a></b></dt>
<dd><p>
Forging presses are of either mechanical or hydraulic design. Presses are rated on the basis of force developed at the end of the stroke.<br/><br/>
<b>4.2.1 Mechanical presses</b><br/>
Next to hammers, mechanical presses are most commonly used for closed die forging. All mechanical presses employ flywheel energy, which is transferred to the workpiece by a network of gears, cranks, eccentrics, or levers to translate the rotary motion of the motor into a reciprocating linear motion of the press slide (Figure-2). 
The ability of mechanical presses to deform the workpiece material is determined by the length of the press stroke and the available force at various stroke positions. The ram stroke is shorter than in a hammer or hydraulic press and hence the mechanical
presses are best suited for low-profile forgings. The initial cost of mechanical presses is higher than the hammers.<br/><br/>
<center><img src="images/mem/Unit2/Lesson5/4.jpg"><img src="images/mem/Unit2/Lesson5/5.jpg"><br/>
<b>Figure 2: Types of mechanical presses</b></center><br/>
<b>Eccentric mechanical presses</b> (Figure-2a) utilize an eccentric crank to translate the rotary motion of the motor into a reciprocating linear motion of the press slide. The ram stroke is shorter than in a hammer or hydraulic press and hence the mechanical
presses are best suited for low-profile forgings. Maximum load in these presses is attained when the ram is about 3 mm off the bottom dead centre position.<br/><br/>
<b>Knuckle joint presses and screw presses</b> are also available (Figure-2 b & c). Because of the linkage design, very high forces can be applied in knuckle joint presses. Screw presses derive their energy from a flywheel. The forging load is
transmitted through a vertical screw, and the ram comes to a stop when the flywheel energy is dissipated. If the dies do not close at the end of the cycle, the operation is repeated until the forging is completed.<br/><br/>
<b>4.2.2 Hydraulic presses</b><br/>
The operation of hydraulic presses is relatively simple and is based on the motion of a hydraulic piston guided in a cylinder. Hydraulic presses are essentially loadrestricted
machines; i.e., their capability for carrying out a forming operation is limited mainly by the maximum available load. These presses are available in capacity of 50 to 1800 tones.<br/>
<center><img src="images/mem/Unit2/Lesson5/6.jpg"><br/><b>Figure 3: Hydraulic press</b></center><br/>
<b>The following important features are offered by hydraulic presses:</b><br/>
(i) In direct-driven hydraulic presses, the maximum press load is available at any point during the entire ram stroke.<br/><br/>
(ii) Since the maximum load is available during the entire stroke, relatively large energies are available for deformation. This is why the hydraulic press is ideally suited for forming operations requiring a nearly constant load over a long stroke.<br/><br/>
(iii) Within the capacity of a hydraulic press, the maximum load can be limited to protect the tooling.<br/><br/>
(iv) Within the limits of the machine, the ram speed can be varied continuously at will during an entire stroke cycle.
</p></dd><br/>
<dt><b><a name="behavior">4.3&nbsp;&nbsp;&nbsp;Table-1: Speed and Stroke behavior of Forging Equipments</a></b></dt>
<dd><p><br/>
<center><table width="500" border="1" cellspacing="0">
<tr><th>Forging Machine</th><th>Speed range<br/>(m/s)</th><th>Speed-stroke<br/>behavior</th></tr>
<tr><td>Hydraulic press</td><td>0.06-0.30</td><td><img src="images/mem/Unit2/Lesson5/7.jpg"></td></tr>
<tr><td>Mechanical press</td><td>0.06-1.5</td><td rowspan="5"><img src="images/mem/Unit2/Lesson5/8.jpg"><br/><img src="images/mem/Unit2/Lesson5/9.jpg"></td></tr>
<tr><td>Screw press</td><td>0.6-1.2</td></tr>
<tr><td>Gravity drop hammer</td><td>3.6-4.8</td></tr>
<tr><td>Power drop hammer</td><td>3.0-9.0</td></tr>
<tr><td>Counterblow hammer<br/>(total speed)</td><td>4.5-9.0</td></tr>
</table></center>
</p></dd>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit2lesson3.php" title="Smithy (Hand Forging)">Lecture 3</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit2lesson5.php" title="Rolling Processes">Lecture 5</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>