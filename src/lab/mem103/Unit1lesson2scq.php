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
<td width="35%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit1lesson2.php" title="Properties of Materials">Lesson 3 Properties of Materials</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 3 Self-Check Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Lesson2/Unit1Lesson2scq.pdf" target="_blank" title="Download Self-Check Questions">Self-Check Questions Download</a><br/><br/>
1. Ability of a material to deform and then return to its original size and shape after removing the load:<br/>
(a) Elasticity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Hardness	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Plasticity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Malleability<br/><br/>
2. Ability of a material to resist indentation or abrasion:<br/>
(a) Malleability &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Hardness	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Plasticity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Elasticity<br/><br/>
3. Ability of a material to sustain a high load for its size:<br/>
(a) Strength &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Stiffness	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Creep &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Elasticity<br/><br/>
4. A material that requires a high stress to deform a small amount is......<br/>
(a) Tough &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Strong&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Stiff &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Dense<br/><br/>
5. Ultimate tensile strength is a measure of the ................ a material can take.<br/>
(a) Energy &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Stress	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Elastic Limit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Shear<br/><br/>
6. A material that takes a lot of energy to break has a high level of..........<br/>
(a) Hardness &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Modulus of Elasticity	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Toughness &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Poisson’s ratio<br/><br/>
7. A tough material will exhibit both.......<br/>
(a) Hardness and strength &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Creep and fatigue	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Strength and deformation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Stiffness and elasticity<br/><br/>
8. The ability of a material to absorb energy without permanent deformation.<br/>
(a) Strength &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Resilience	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Toughness &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Stiffness<br/><br/>
9. Percentage elongation is a measure of a material’s............<br/>
(a) Endurance Limit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Ductility	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Factor of safety &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Strength<br/><br/>
10. The rate of Creep is higher when you increase...........<br/>
(a) Plasticity and yield point &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Time and stress&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Fatigue and endurance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Temperature and stress<br/><br/>
11. Permanent deformation in materials over the time is called ________.<br/>
(a) Creep &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Elastic deformation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Plastic deformation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Fatigue<br/><br/>
12. Figure-out the odd point in the following:<br/>
(a) Proportional limit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Elastic limit	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Yield point &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Rupture point<br/><br/>
13. Engineering stress-strain curve and True stress-strain curve are equal up to:<br/>
(a) Yield point &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Elastic limit	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Proportional limit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Ultimate strength point<br/><br/>
14. Shape of true stress-strain curve for a material depends on<br/>
(a) Strain &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Strain rate	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Temperature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) All of the above<br/><br/>
15. Toughness of a material is equal to area under ________ portion of the stress-strain curve.<br/>
(a) Plastic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Elastic	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Both &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) None<br/><br/>
16. Plastic deformation results from the following:<br/>
(a) Twinning &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Slip	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Both &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) None<br/><br/>
17. Fatigue failure occurs when a part is subjected to:<br/>
(a) compressive stress &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) tensile stress	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) fluctuating stress &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) uniform stress<br/><br/>
18. If stress values are measured during a tensile test, which of the following would have the higher value?<br/>
(a) true stress &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) engineering stress.<br/><br/>
19. If strain measurements are made during a tensile test, which of the following would have the higher value?<br/>
(a) true strain&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (b) engineering strain<br/><br/>
20. Which one of the following types of stress strain relationship best describes the behavior of most metals at room temperature:<br/>
(a) elastic and strain hardening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) perfectly elastic	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) elastic and perfectly plastic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) none of the above.<br/><br/>
21. The shear strength of a metal is generally:<br/>
(a) greater than its tensile strength &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) less than its tensile strength.<br/><br/>
22. Hardness tests involve pressing a hard object into the surface of a test piece and measuring the indentation (or its effect) that results:<br/>
(a) true &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) false.<br/><br/>
23. A metal that can be drawn without fracture is termed:<br/>
(a) malleable &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) elastic	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) ductile &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) fusible<br/><br/>
24. This metal is: malleable, ductile, it remains pasty when heated and is fairly soft. It is used for making crane hooks, anchor chains and sheet metal workers stakes. This metal is:<br/>
(a) cast iron &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) mild steel	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) wrought iron &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) high speed steel<br/><br/>
25. A piece of metal is struck with a hammer and easily breaks, we know that this metal is:<br/>
(a) ductile &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) malleable	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) tough &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) brittle<br/><br/>
26. A steel axle on a car which is subject to cyclical loading suddenly fractures after several years of use. Failure can be best attributed to which phenomenon:<br/>
(a) Creep &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Viscoelastic yielding	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Work-hardening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Fatigue n/a<br/><br/>
27. The slope of the stress strain plot in a uniaxial tensile test is the<br/>
(a) Shear modulus &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Young’s modulus	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Elastic modulus &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) b and c<br/><br/>
28. The nominal failure stress of ductile materials is always lower than its tensile strength because:<br/>
(a) They fail in the linear elastic region.	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) They plastically deform.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) They do not neck.	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Such samples usually neck.<br/><br/>
<b>Possible answers to self check questions</b><br/><br/>
<table width="400">
<tr><td>1</td><td>(a)</td><td>2</td><td>(b)</td><td>3</td><td>(a)</td><td>4</td><td>(c)</td></tr>
<tr><td>5</td><td>(b)</td><td>6</td><td>(c)</td><td>7</td><td>(c)</td><td>8</td><td>(b)</td></tr>
<tr><td>9</td><td>(b)</td><td>10</td><td>(d)</td><td>11</td><td>(a)</td><td>12</td><td>(d)</td></tr>
<tr><td>13</td><td>(a)</td><td>14</td><td>(d)</td><td>15</td><td>(c)</td><td>16</td><td>(d)</td></tr>
<tr><td>17</td><td>(c)</td><td>18</td><td>(a)</td><td>19</td><td>(b)</td><td>20</td><td>(a)</td></tr>
<tr><td>21</td><td>(b)</td><td>22</td><td>(a)</td><td>23</td><td>(c)</td><td>24</td><td>(c)</td></tr>
<tr><td>25</td><td>(d)</td><td>26</td><td>(d)</td><td>27</td><td>(b)</td><td>28</td><td>(c)</td></tr>
</table>
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>