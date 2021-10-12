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
<body style="background:#FFFFFF; margin:auto; width: 1024px; text-align:justify;">
<div id="header"><br/>MEM-103 Manufacturing Processes-I<br /><br /></div>
<div>
<table width="100%"><tr>
<td width="50%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit1lesson2.php" title="Properties of Materials">Lesson 3 Properties of Materials</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
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
<b>Lesson 3 Frequently Asked Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Lesson2/Unit1Lesson2faq.pdf" target="_blank" title="Download Frequently Asked Questions">Frequently Asked Questions Download</a><br/><br/>
<b>Q.1. Is a material with a large elongation value considered stiff?</b><br/>
Ans. Elongation (e) is a measure of material ductility whereas modulus of elasticity (E) is a measure of material stiffness. The two parameters are independent of each other. It is possible for a material to have a very small e but a very large E.<br/><br/>
<b>Q.2. What are the three types of static stresses to which materials are subjected?</b><br/>
Ans. Tensile, compressive, and shear stresses occur in materials subjected to loading.<br/><br/>
<b>Q.3. What is the difference between engineering stress and true stress in a tensile test?</b><br/>
Ans. Engineering stress is obtained by dividing the load (force) on the test specimen by the original area, while true stress is obtained by dividing the load by the instantaneous area which decreases as the specimen stretches.<br/><br/>
<b>Q.4. What is work hardening / strain hardening?</b><br/>
Ans. Strain hardening is the increase in strength that occurs in metals when they are strained, normally during cold working.<br/><br/>
<b>Q.5. Why heat treatment is done on metals?</b><br/>
Ans. To obtain certain desired properties metals are heat treated. For example:<br/>
(i) Annealing is done to soften the metal.<br/>
(ii) Hardening is done on metal so that it can resist wear, abrasion and indentation.<br/>
(iii) Tempering is done to remove brittleness of a material.<br/>
(iv) Normalizing removes the residual stresses caused on account of cold forming by refining its structure.<br/><br/>
<b>Q.6. What is annealing?</b><br/>
Ans. Annealing is a process in which the metal is heated slowly to a required temperature where it is held for a certain time period and then cooled slowly.<br/>
The metal acquires desired properties due to subsequent structural changes on account of annealing.<br/><br/>
<b>Q.7. What is the main purpose of annealing steels?</b><br/>
Ans. The purpose of annealing is to (a) soften the steel for easier machining; (b) release internal stresses of metal on account of cold working or unequal contraction in casting.<br/><br/>
<b>Q.8. What is normalizing of carbon steels?</b><br/>
Ans. Cooling the steel in air after it is slowly heated to annealing temperature is known as normalizing.<br/><br/>
<b>Q.9. Explain the process of hardening of a carbon steel.</b><br/>
Ans. When carbon steel is cooled slowly from its lower critical temperature of 700°C, it will transform from austenite to partite. If it is cooled suddenly so that the transformation takes place at around 300°C, it will become martensite. This sudden cooling is done by quenching the steel in water. The amount austenite transformed into martensite decides the hardness of the steel. This process is called hardening of steel.<br/><br/>
<b>Q.10. What is tempering?</b><br/>
Ans. The hardened steels are brittle on account of martensite and tools made of these are prone to cracking and chipping. Hence in order to improve the toughness the steel is heated to a temperature below critical one so that partial transformation of martensite is done to partite and subsequently it is cooled. This process used for improving toughness of steel is termed as tempering.<br/><br/>
<b>Q.11. Draw the comparative stress-strain diagrams depicting: (i) Brittle and High yield strength, Ductile and Low yield strength (ii) (a)High strength, low ductility, low toughness (b) High strength, high ductility, high toughness, (c) Low strength, high ductility, low toughness.</b><br/>
Ans. The figure 1.1 indicates comparison between brittle and ductile materials, with various levels of strength, ductility and toughness.<br/><br/>
<center><img src="images/mem/Unit2/lesson1/28.jpg" alt="Stress-strain Diagrams of Various Metals" width="500" height="180"><br/><b>Fig. 1.1: Stress-strain Diagrams of Various Metals</b></center>
<br/>
<b>Q.12. Consider the stress strain diagrams shown in figure 1.2 for two materials, A and B, conclude which material is:<br/>
(a) stronger<br/>
(b) tougher<br/>
(c) ductile</b><br/>
<center><img src="images/mem/Unit2/lesson1/29.jpg" alt="Stress-strain Diagrams"><br/><b>Fig. 1.2</b></center><br/>
Ans. Tensile strength is defined as the highest stress that a material can withstand before failure occurs, therefore, material A is stronger, as it withstands a higher stress before failure than material B, as shown in figure 1.3.<br/><br/>
<center><img src="images/mem/Unit2/lesson1/30.jpg" alt="Comparison of ultimate strength of materials A & B" width="450" height="170"><br/><b>Fig. 1.3: Comparison of ultimate strength of materials A & B</b></center><br/>
Toughness is defined as the total area under the stress-strain curve. It indicates the amount of energy absorbed before failure. Therefore, A is tougher, as the area under curve A is greater than that of B. This indicates that A absorbs more energy than B before failure, as shown in figure 1.4.<br/><br/>
<center><img src="images/mem/Unit2/lesson1/31.jpg" alt="Comparison of ultimate strength of materials A & B"><br/><b>Fig. 1.4</b></center><br/>
Ductility is measured by the amount of elongation that can be applied to the material before the failure occurs. Strain is directly proportional to elongation. Therefore material A is ductile, as the strain under curve A is greater than B. This indicates that A has more elongation than B before failure, as shown figure 1.5.<br/>
<center><img src="images/mem/Unit2/lesson1/32.jpg" alt="Comparison of strength of materials A & B"><br/><b>Fig. 1.5: Comparison of strain in materials A & B</b></center><br/>
<b>Q.13. What are the five basic stresses which metals may be required to withstand during industrial application?</b><br/>
Ans. There are five basic stresses which metals may be required to withstand. These are tension, compression, shear, bending, and torsion. The tensile strength of a material is its resistance to a force, which tends to pull it apart. The compression-strength of a material is its resistance to a crushing force, which is the opposite of tensile strength. When a piece of metal is cut, the material is subjected to shear as it comes in contact with the cutting edge. Shear is the tendency on the part of parallel members to slide in opposite directions. Bending can be described as the deflection or curving of a member due to forces acting upon it. The bending strength of material is the resistance it offers to deflecting forces. Torsion is a twisting force. Such action would occur in a member fixed at one end and twisted at the other. The torsional strength of material is its resistance to twisting or pure shear it can withstand before fracture.<br/><br/>
<b>Q.14. What is the difference between malleability and ductility of a metal?</b><br/>
Ans. Malleability and ductility, both give a measure of plastic deformation the material can undergo. Malleability is the ability of a material to be flattened under compression into sheets without rupture, whereas ductility is the property of a material that enables it to be drawn into a wire / tube, bent or twisted without rupture.<br/><br/>
<b>Q.15. Give reason why brittleness is not a desirable property in structural metals?</b><br/>
Ans. Because structural metals are often subjected to shock loads, hence brittleness is not a very desirable property.<br/><br/>
<b>Q.16. Why brittleness should not be considered as the lack of strength? Give reason(s)?</b><br/>
Ans. Brittleness should not be considered as the lack of strength. Strength is a stress at a particular deformation condition. Brittleness means only a small amount of plastic deformation before fracture.<br/><br/>
<b>Q.17. What do you understand by deformation energy?</b><br/>
Ans. It is the energy required to deform a material by a specified amount. It is the area under the stress-strain diagram up to a specified strain, as shown in figure 1.6.<br/><br/>
<center><img src="images/mem/Unit2/lesson1/33.jpg" alt="Deformation energy"><br/><b>Fig. 1.6: Deformation energy</b></center><br/>
<b>Q.18. What information one can obtain from the stress-strain curve?</b><br/>
Ans. The stress-strain diagrams are important reservoirs of information that can be used, with caution, in more complicated situations where measurement is difficult. Almost all of the mechanical properties of a material can be obtained from stress-strain diagrams. Information one can obtain from the stress-strain curve for loading case are given below:<br/><br/>
<b>(a) Axial tension/compression stress-strain diagram:</b><br/>
(i) Young’s modulus in tension and compression<br/>
(ii) Proportional-limit of stress and strain in tension and compression<br/>
(iii) Yield stress and strain in tension and compression<br/>
(iv) Ultimate stress and strain in tension and compression<br/>
(v) Failure stress and strain in tension and compression<br/>
(vi) Resilience<br/>
(vii) Toughness<br/>
(viii) Elongation<br/>
(ix) Ductility and brittleness<br/>
(x) Reduction/bulge in area due to tension/compression<br/><br/>
<b>(b) Shear stress-strain diagram:</b><br/>
(i) Modulus of rigidity (Shear modulus)<br/>
(ii) Proportional-limit of shear stress and strain<br/>
(iii) Yield shear stress and strain<br/>
(iv) Ultimate shear stress and strain<br/><br/>
<b>Q.19. Why Aluminium is used in aerospace applications?</b><br/>
Ans. As Aluminum has low density/low weight per unit volume, it is used in aerospace applications for fuel economy.<br/><br/>
<b>Q.20. What is the benefit of metals and metal alloys having high fracture toughness?</b><br/>
Ans. Metal and metal alloys having high fracture toughness can withstand impact loads and are durable.<br/><br/>
<b>Q.21. What do you understand by manufacturing properties of materials?</b><br/>
Ans. Manufacturing properties of materials determine whether they can be cast, formed, machined, welded and heat treated with relative ease. The method(s) used to process materials to the desired shapes can adversely affect the product’s final properties and service life.<br/><br/>
<b>Q.22. Why measurement of ductility is necessary?</b><br/>
Ans. In general, measurements of ductility are of interest in three ways:<br/>
(i) To indicate the extent to which a metal can be deformed without fracture in metalworking operations such as rolling and extrusion.<br/>
(ii) To indicate to the designer, in a general way, the ability of the metal to flow plastically before fracture. A high ductility indicates that the material is “forgiving” and likely to deform locally without fracture.<br/>
(iii) To serve as an indicator of changes in impurity level or processing conditions. Ductility measurements may be specified to assess material quality even though no direct relationship exists between the ductility measurement and performance in service.
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>