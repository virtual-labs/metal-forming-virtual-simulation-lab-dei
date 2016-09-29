<?php session_start();
ini_set("display_errors","Off");
if($_SESSION['auth']!="rahulMEM103_2016swarupsharma")
{
header("location:mem103.php");
}
else
{
?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manufacturing Processes-I</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/mem.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;">
<div id="header"><br/>
<b>MEM-103 Manufacturing Processes-I</b></div>
<div>
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table border="0" width="100%">
<tr><td width="65%"><b>Lesson 2 Forging Process</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit2/Unit2lesson2.pdf" target="_blank" title="Download Lesson 2">Lesson 2 Download</a></td></tr>
<tr><td><a href="#introduction">2.0 &nbsp;&nbsp;&nbsp;Introduction</a></td></tr>
<tr><td><a href="#applications">2.1 &nbsp;&nbsp;&nbsp;Applications of Forging</a></td></tr>
<tr><td><a href="#metals">2.2 &nbsp;&nbsp;&nbsp;Metals and their forging temperatures</a></td></tr>
<tr><td><a href="#measurement">2.3 &nbsp;&nbsp;&nbsp;Measurement of forging temperatures</a></td></tr>
<tr><td><a href="#classification">2.4&nbsp;&nbsp;&nbsp;Classification of Forging</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.1&nbsp;&nbsp;&nbsp;Open Die Forging</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.2&nbsp;&nbsp;&nbsp;Closed Die Forging</td></tr>
<tr><td><a href="#operations">2.5&nbsp;&nbsp;&nbsp;Forging Operations</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.5.1&nbsp;&nbsp;&nbsp;Upsetting</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.5.2&nbsp;&nbsp;&nbsp;Cogging(Drawing Out)</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.5.3&nbsp;&nbsp;&nbsp;Edging</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.5.4&nbsp;&nbsp;&nbsp;Fullering</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.5.5&nbsp;&nbsp;&nbsp;Blocking</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.5.6&nbsp;&nbsp;&nbsp;Finishing</td></tr>
<tr><td><a href="#force">2.6&nbsp;&nbsp;&nbsp;Types of forging process on the basis of method of application of force</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.6.1&nbsp;&nbsp;&nbsp;Hand Forging</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.6.2&nbsp;&nbsp;&nbsp;Drop Forging</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.6.3&nbsp;&nbsp;&nbsp;Press Forging</td></tr>
<tr><td><a href="#miscellaneous">2.7&nbsp;&nbsp;&nbsp;Miscellaneous forging processes</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.7.1&nbsp;&nbsp;&nbsp;Coining</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.7.2&nbsp;&nbsp;&nbsp;Rotary Swaging</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.7.3&nbsp;&nbsp;&nbsp;Orbital Forging</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.7.4&nbsp;&nbsp;&nbsp;Flashless Forging (Precision Forging)</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.7.5&nbsp;&nbsp;&nbsp;Isothermal Die Forging</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.7.6&nbsp;&nbsp;&nbsp;Roll Forging</td></tr>
<tr><td><a href="#dies">2.8&nbsp;&nbsp;&nbsp;Dies used for Forging</a></td></tr>
<tr><td><a href="#lubricants">2.9&nbsp;&nbsp;&nbsp;Lubricants used in Forging</a></td></tr>
<tr><td><a href="#defects">2.10&nbsp;&nbsp;&nbsp;Defects in Forging</a></td></tr>
<tr><td><a href="#example">Example</a></td></tr>
<tr><td><a href="#questions">Terminal Questions</a></td></tr>
<tr><td><a href="#comparison">Comparison of different forging materials</a></td></tr>
</table><br/></div>
<div>
<b>FORGING PROCESS</b><br/><br/>
<dt><b><a name="introduction">2.0&nbsp;&nbsp;&nbsp;Introduction</a></b></dt>
<dd><p>
The importance of metals in modern technology is due, in large part, to the ease with which they may be formed, into useful shapes such as tubes, rods, and sheets.<br/>
Useful shapes may be generated in two basic ways:<br/>
1. By plastic deformation processes in which the volume and mass of metal are conserved and the metal is displaced from one location to another.<br/>
2. By metal removal or machining processes in which material is removed in order to give it the required shape.<br/><br/>
Forging is the working of metal into a useful shape by hammering or pressing. Various useful shapes are obtained by compressive forces that are applied on workpiece through various dies and tools. The compressive forces for forging are derived either from the impact of a hammer (hand or power operated) or from the pressure exerted by a large mechanical press. Metals in forging are deformed 
plastically at room temperature (cold forging) as well as at higher temperature (hot forging). The ability to cold forge the metal depends on the ductility and malleability of the metal whereas the ability to hot forge the metal depends on its ‘range of plasticity' at higher temperature. The forged components are called forgings.<br/><br/>
Cold forging may generally cause anisotropy, a state in which properties of the metal are different in different directions and this effect of cold forging is taken care of by annealing the cold forged component.<br/><br/>
The forgeability of a metal is defined as the capability of the metal to undergo deformation without cracking. A commonly accepted test for forgeability is to upset a solid cylindrical specimen and observe any cracking on the barrelled surface, the greater the deformation prior to cracking, the greater the forgeability of metal.<br/><br/>
In forging metal may be:<br/>
1. drawn out to increase its length and decrease it cross-section.<br/>
2. upset to decrease the length and increase the cross-section.<br/>
3. squeezed in closed impression dies to produce the desired shape by compelling the metal flow in to multi-directions.
</p></dd><br/>
<dt><b><a name="applications">2.1&nbsp;&nbsp;&nbsp;Applications of Forging</a></b></dt>
<dd><p>
The following common types of jobs are produced by forging:<br/>
(i) Box-end wrenches, always made from forgings, are subjected to very high stresses due to hammering; excellent for providing highest torque to tighten the bolts. Casting can not survive.<br/>
(ii) Riveting of shells for boilers, tanks and furnaces.<br/>
(iii) Machinery parts and steel furniture.<br/>
(iv) Bolts, headed pins, nuts, nails, keys, eye bolts, hooks, bolts, shakles, hinges, aldrops, hangers and racks, hooks, links and other lifting tackles for cranes and hoists.<br/>
(v) Arms, weapons and cutting tools.<br/>
(vi) Agricultural implements and tools.<br/>
(vii) Cams, crank shafts connecting rods, axles and levers, etc. for vehicles, locomotives and aircrafts.<br/>
(viii) Helical and laminated springs.<br/>
(ix) Landing gear cylinders, beams for aircraft wings, turbine disks, gears, wheels.<br/><br/>
Forging operations produces discrete parts while rolling operations, produce continuous plates, sheets, strip, or various structural cross-sections. Figure 1 shows typical products made from forging operations.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/1.jpg"><img src="images/mem/Unit2/Lesson3/2.jpg"><br>
<img src="images/mem/Unit2/Lesson3/3.jpg" width="350"><img src="images/mem/Unit2/Lesson3/4.jpg" width="300"><br>
<b>Figure 1: Typical products made by forging, rods, hubs, valve seats, fasteners,<br>crank shaft and connecting rod.</b></center><br>
The first question that comes to us is why is it necessary to forge a part to shape when it is simpler and cheaper to cast or machine the metal direct to the form required? It is true that casting or machining process may be cheaper when compared to forging operations for certain products. If the function of a component calls for high strength and resistance to shock or vibration, the properties must be uniform, easily predicted, and measurable within close limits. 
To achieve this it is usually necessary for steel to be subjected to some form of hot working or forging into more complex shapes. Forging refines the grain structure and improves physical properties of the metal. In forging controlled development of grain flow lines which closely follow the outline of component is obtained (Figures 2, 3, 4 & 5). The continuous grain flow lines increase overall toughness of the forged part and decrease its susceptibility to fatigue and corrosion failures. Internal flaws of the metal are largely eliminated.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/5.jpg"><img src="images/mem/Unit2/Lesson3/6.jpg"><br>
<table width="650" style="text-align:center";><tr><td><b>Figure 2: Forging process resulting into the re-crystallization and grain refinement in metals</b></td><td><b>Figure 3: Cross-section of a forged component showing flow lines.</b></td><tr></table><br>
<img src="images/mem/Unit2/Lesson3/7.jpg"><br>
<table width="650" style="text-align:center";><tr><td><b>(a) Casting</b></td><td><b>(b) Machined</b></td><td><b>(c) Forged</b></td><tr></table><br>
<img src="images/mem/Unit2/Lesson3/8.jpg"><br>
<table width="650" style="text-align:center";><tr><td><b>(a) Casting</b></td><td><b>(b) Machined</b></td><td><b>(c) Forged</b></td><tr></table><br>
<b>Figure 4: Showing the direction of “grain flow lines” in a part made by three different processes<br>(a) casting (b) machined from rolled plate (c) Forging</b><br><br>
<img src="images/mem/Unit2/Lesson3/9.jpg" width="700"><br>
<table width="700" style="text-align:center";><tr><td><b>74% waste in machining</b></td><td><b>Chips obtained after machining</b></td><td><b>Cold forged on 6% waste</b></td><tr></table><br>
<b>Figure 5: Comparison of manufacturing of a spark plug body by machining from hexagonal bar stock with<br>manufacture by cold forming. Material is saved, machining time and cost are reduced,<br>and the product is stronger,due to cold work, and tougher</b></center><br>
<b>Advantages of forging</b><br/>
(i) Physical properties (such as strength, ductility and toughness) are much better in a forging than in the base metal, which has, crystals randomly oriented. Grains are refined and improved, (Figures 2, 3 & 4).<br/>
(ii) Forging produces beneficial grain-flow pattern in the direction of the shape of the forged component, resulting in tough fibrous structure conforming to the outline of the part, (Figures 2, 3 & 4).<br/>
(iii) Forging yields parts that have high strength to weight ratio, they can be used reliably for highly stressed and critical applications.<br/>
(iv) Forging produces products with higher structural integrity, which are consistent from piece to piece, without any porosity, voids, inclusions and other defects as in case of casting, (Figures 2, 3 & 4).<br/>
(v) Reduced testing requirements.<br/><br/>
<b>Disadvantages of forging</b><br/>
(i) Hot metal oxidizes rapidly and the scale thus formed gives poor surface finish,<br/>
(ii) Close dimensional tolerances on forgings may not be maintained.<br/>
(iii) Metal has to be worked within a particular range of temperature: if worked below, it will crack or get distorted and if worked above the required temperature range, it may burn. Hence, too much care is needed while maintaining the optimum temperature for forging.
</p></dd><br/>
<dt><b><a name="metals">2.2&nbsp;&nbsp;&nbsp;Metals and their forging temperatures</a></b></dt>
<dd><p>
The degree to which a metal can be forged depends on its composition and structure. The low and medium carbon steels are readily forged but high carbon and alloy steels are more difficult to forge. The metals and alloys that can be forged include carbon steels, alloy steels, stainless steels, wrought iron, copper base alloys, nickel and nickel-copper alloys, aluminum alloys and magnesium alloys. Cast iron is not forgeable because it has a crystalline structure and when heated and beaten, it breaks into pieces. Every metal has its own forging temperature range at which it goes in plastic state (see Table-1).<br/><br/>
<center><b>Table 1: Forging temperatures of ferrous and non-ferrous metals</b><br/>
<table width="400">
<tr><td>Material to be forged</td><td>Temperature range(<sup>o</sup>C)</td></tr>
<tr><td>Mild steel</td><td>815-1250</td></tr>
<tr><td>Medium carbon steel</td><td>760-1250</td></tr>
<tr><td>High carbon steel</td><td>760-1130</td></tr>
<tr><td>Stainless steel</td><td>940-1180</td></tr>
<tr><td>Copper alloys</td><td>550-900</td></tr>
<tr><td>Aluminum and forging alloys</td><td>370-480</td></tr>
<tr><td>Magnesium alloys</td><td>315</td></tr>
<tr><td>Wrought iron</td><td>860-1340</td></tr>
</table></center>
</p></dd><br/>
<dt><b><a name="measurement">2.3&nbsp;&nbsp;&nbsp;Measurement of Forging Temperatures</a></b></dt>
<dd><p>
Thermocouples are used for measuring temperatures usually from 200 to 1300°C. Then there are optical pyrometers which are used for measuring temperatures in higher range, 700 to 2000<sup>o</sup>C Radiation pyrometers are also available for measuring still higher temperatures.<br/>
The assessment of temperature of hot metals by seeing its colour is an approximate method of temperature measurement. In case of steels, the following information may be useful (Table-2).<br/><br/>
<center><b>Table 1: Forging temperatures of ferrous and non-ferrous metals</b><br/>
<table style="text-align:center" width="400">
<tr><td>Colour of the hot metal</td><td>Temperature of the hot metal(<sup>o</sup>C)</td></tr>
<tr><td>Red</td><td>600-700</td></tr>
<tr><td>Cherry red</td><td>800-900</td></tr>
<tr><td>Orange</td><td>900-1000</td></tr>
<tr><td>White</td><td>1300-1500</td></tr>
</table></center>
</p></dd>
<dt><b><a name="classification">2.4&nbsp;&nbsp;&nbsp;Classification of Forging</a></b></dt>
<dd><p>
Forging can be classified into two categories<br/>
1. Open die forging, and<br/>
2. Closed die forging<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/10.jpg"><br>
<table width="650" style="text-align:center";><tr><td><b>6 (a): Open die forging</b></td><td><b>6 (b): Closed die forging</b></td><tr></table></center>
<b>2.4.1 Open Die Forging</b><br/>
It is the simplest forging process which is quite flexible but not suitable for large scale production. The operation is carried out between two flat dies or dies of very simple shape, figures 6a & 7. The process of open die forging is carried out in large hydraulic presses or power hammer. Since in open die forging the workpiece is usually larger than the tool, at any point of time, deformation is confined to a small portion of the workpiece. 
Numerous squeezes or blows are applied to different portions of the workpiece to bring it to the final desired shape. The operator obtains the desired shape of forging gradually and step by step, by manipulating the work material between blows. The resulting size and shape of the forging are dependent on the skill of the operator.<br/><br/>
<b>Applications:</b> The process is mostly used for forging large objects of simple shape or when number of parts to be made is small. Open die forging is often used to make preforms (of workpiece) for use in close die forging and large and bulky forgings. Examples of parts made in open die forging include ship propeller shaft, rings, pressure vessels, gun tubes, ring forgings. The process can produce forgings up to 200 tons of weight.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/11.jpg"><br>
<b>Figure 7: Open die forging (workpiece is held manually and manipulated manually to obtain desired shape).</b></center><br/>
The open die forging can be explained in the simplest way by the following two open die operations explained in next sections:<br/>
(a) Cogging or drawing out<br/>
(b) Upsetting<br/><br/>
<b>Advantages of open die forging</b><br/>
(i) Simple process<br/>
(ii) Dies are inexpensive<br/>
(iii) Useful for small quantities<br/>
(iv) Wide range of job sizes can be handled<br/><br/>
<b>Limitations of open die forging</b><br/>
(i) Limited to simple shapes<br/>
(ii) Close dimensional tolerances not possible<br/>
(iii) Machining to final shape required if necessary<br/>
(iv) Low production rate (v) High degree of skill required<br/><br/>
<i>Forging Force</i><br/>
In open die forging operation, the forging force F, to be applied on a solid cylindrical component can be determined from the relation.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/F1.jpg"></center>
Where<br/>
&sigma;<sub>f</sub> is the flow stress of the material, µ is the coefficient of friction, and d and h are the diameter and height of the work piece, respectively.<br/><br/>
<b>Example</b>: Using open-die forging operation, a solid cylindrical piece of 304 stainless steel having 100 mm diameter x 72 mm height is reduced in the height to 60 mm at room temperature. Assuming the coefficient of friction as 0.22 and the flow stress for this material at the required true strain as 1000 MPa, calculate the forging force at the end of stroke.<br/>
<b>Solution:</b><br/>
Initial diameter = 100 mm<br/>
Initial height = 72 mm<br/>
Final height = 60 mm<br/>
If final diameter is d, (100)<sup>2</sup> x 72 = d<sup>2</sup> x 60, i.e. d =110 mm<br/>
<center><img src="images/mem/Unit2/Lesson3/F2.jpg"></center>
<b>2.4.2 Closed Die Forging (Impression Die Forging)</b><br/>
In closed die forging the workpiece is deformed under high pressure between two die halves, which have the impressions of the desired final shape. The heated metal (billet) is positioned in the lower die cavity and on it one or more blows are struck by the upper die. This hammering makes the metal (billet) to flow and fill the die cavity completely. Excess metal is squeezed out around the periphery of the cavity to form flash. On completion of forging, the flash is trimmed off with the help of a trimming die.
The work material is given final desired shape in stages as it is deformed in several successive die sets. Thus, a high precision forged with close dimensional tolerances is produced. Closed die forging is shown in Figures 8, 9 &10. The shape of the die cavities cause the metal to flow in desired direction, thereby imparting desired fibre structure to the component. This process is also known as impression die forging.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/12.jpg"><br><b>Figure 8: Closed die forging</b><br/><br/>
<img src="images/mem/Unit2/Lesson3/13.jpg"><br><b>Figure 9: Impression die closed die forging</b><br/><br/>
<img src="images/mem/Unit2/Lesson3/14.jpg"><br><b>Figure 10: Sample closed die forging (upsetting for producing head of a bolt).</b><br/><br/>
<img src="images/mem/Unit2/Lesson3/15.jpg"><br><b>Figure 11: Closed die forging terminology</b></center>
<b>Advantages of closed die forging</b><br/>
(i) Good utilization of workpiece material<br/>
(ii) Better properties than open die forged parts<br/>
(iii) Good dimensional accuracy<br/>
(iv) Higher poduction rates<br/>
(v) Good reproducibility<br/><br/>
<b>Limitations of closed die forging</b><br/>
(i) High cost of dies for small quantities<br/>
(ii) Die design more complex<br/>
(iii) Machining of forged part is often required
</p></dd><br/>
<dt><b><a name="operations">2.5&nbsp;&nbsp;&nbsp;Forging Operations</a></b></dt>
<dd><p>
Most forgings are obtained in multiple steps with series of dies, where one or more blows of the hammer are used for each step in the sequence. The reason for multi steps is to distribute the metal roughly in accordance with the requirements of the later steps and smooth out the forging force requirement. These processes prepare the workpieces for further forging processes. Few of the forging operations are: Upsetting, Cogging, Edging, Fullering, Blocking and Finishing.<br/><br/>
<b>2.5.1 Upsetting</b><br/>
The simplest example of open die forging is the upsetting operation shown in Figure-12. In upsetting, a solid workpiece is placed between two flat dies and reduced in height (but increasing in size in lateral direction) by the application of compressive force. The die surfaces may be flat or having simple cavities to produce relatively simple forgings.<br/><br/>
<b>Equipment</b>: Hydraulic, mechanical presses, screw presses; hammers, upsetting machines.<br/>
<b>Applications</b>: Finished forgings, including nuts, bolts; flanged shafts, preforms for finished forgings.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/16.jpg"><br/>
<b>Figure 12: Upsetting operation and barreling effect during upsetting</b></center><br/>
As the metal flows laterally between the advancing die surfaces, there is less deformation at the die interface because of the friction forces than at the mid-height plane resulting into the barreling of the sides of upset workpiece. Metal flows most easily towards the nearest free surface because that represents the lowest frictional path. Proper lubrication can help reduce the barreling effect. [Figures 12 & 13] (explained in next section).<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/17.jpg"><br/>
<b>Figure 13: Upsetting operation with friction at die-billet interface</b><br/><br/>
<img src="images/mem/Unit2/Lesson3/18.jpg"><br/>
<b>Figure 14: Upsetting operation with out friction at die-billet interface, no barreling</b><br/><br/>
<img src="images/mem/Unit2/Lesson3/19.jpg"><img src="images/mem/Unit2/Lesson3/20.jpg"><img src="images/mem/Unit2/Lesson3/21.jpg"><br/>
<table width="700"><tr><td>Initial billet<br/>(before deformation)</td><td>Billet after deformation<br/>without friction</td><td>Billet after deformation<br/>with friction</td></tr></table>
<b>Figure 15: Pattern of grain during upsetting without friction and with friction</b><br/><br/>
<img src="images/mem/Unit2/Lesson3/22.jpg"><br/>
<b>Figure 16: Upsetting used for obtaining head of the bolt</b><br/><br/>
<img src="images/mem/Unit2/Lesson3/23.jpg"><br/>
<b>Figure 17: Steps in the forming of head of a bolt by cold heading (upsetting), and thread rolling.</b></center><br/>
<b>Evolution of bulge in hot upsetting</b><br/>
Successful upsetting mainly depends on two process limitations:<br/>
1. Upset strain, <span style="text-decoration:overline">&epsilon;</span> : that affects the forming limit or forgeability of the workpiece material,<br/>
<img src="images/mem/Unit2/Lesson3/F3.jpg"><br/>
2. Upset Ratio (R<sub>u</sub>): that affects the buckling of the workpiece<br/>
<img src="images/mem/Unit2/Lesson3/F4.jpg"><br/>
Where, h<sub>0</sub> is the original (before upset) height, h<sub>1</sub> is the final height (after upset) and d<sub>0</sub> is the original diameter of the billet.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/24.jpg"><br/>
<b>Figure 18: Upsetting of cylindrical workpiece (a) Frictionless. (b) Friction.</b></center><br/>
<b>Note:</b> <i>In metal forming, the flow of metal is caused by the pressure transmitted from the dies to the deforming workpiece. Therefore, the frictional conditions at the die/workpiece interface greatly influence metal flow. Figure-18 above illustrates this phenomenon as it applies to the upsetting of a cylindrical workpiece. The figure 18 (a) shows, under frictionless conditions, the workpiece deforms uniformly and the resulting normal stress, &sigma;<sub>n</sub>, is constant across the diameter. 
However, figure 18 (b) shows that under actual conditions, where some level of frictional stress, &tau;, is present, the deformation of the workpiece is not uniform (i.e. barreling). As a result, the normal stress, &sigma;<sub>n</sub>, increases from the outer diameter to the center of the workpiece and the total upsetting force is greater than for the frictionless conditions.</i><br/><br/>
<b>To prevent buckling the following rules must be followed in designing parts to be upset forged.</b><br/>
1. The length of the billet to be upset forged should not exceed three items the billet diameter.<br/>
2. Length of billet exceeding three times billet diameter may be upset successfully provided the diameter of cavity does not exceed 1 ½ times the billet diameter.<br/>
3. In an upset requiring stock length exceeding three times billet diameter and where diameter of cavity is not exceeding 1 ½ the billet diameter the length of unsupported metal beyond the face of the die must not exceed the diameter of the bar.<br/><br/>
<b>2.5.2 Cogging (drawing out)</b><br/>
Cogging is an open die forging operation in which the thickness of a bar (or workpiece) is reduced by successive hammer blows at specific intervals (as shown in Figures-19, 20, 21, 22 & 23). Typical examples of cogging operation are shown in figures 21, 22, & 23. Since the contact area per stroke is small, thickness of workpieces are reduced in stages.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/25.jpg"><img src="images/mem/Unit2/Lesson3/26.jpg"><br/>
<table width="800"><tr><td width="380"><b>Figure 19: Cogging operation on a rectangular billet conducted with the help of open die forging. The thickness of the bar is being reduced by hammering step by step along the length of bar.</b></td>
<td><b>Figure 20: In cogging operations in an open die forging, the portion of billet where contact occurs between the billet and upper die under compression is shown shaded. W0 – Original width of blank, Wf – Width after forging, T0 – Original thickness of billet, Tf – Final thickness after forging.</b></td></tr></table><br/>
<img src="images/mem/Unit2/Lesson3/27.jpg"><br/>
<table width="700"><tr><td>Initial billet</td><td>Billet after hammering</td><td>Completed drawn block</td></tr></table>
<b>Figure 21: Various stages in drawing down a rectangular billet.</b><br/><br/>
<img src="images/mem/Unit2/Lesson3/28.jpg" width="350"><img src="images/mem/Unit2/Lesson3/29.jpg" width="400"><br/>
<table width="750"><tr><td><b>Figure 22: Multi-diameter shaft is obtained by cogging operation.</b></td>
<td><b>Figure 23: Forging of a seamless (joint less) ring using cogging.</b></td></tr></table></center><br/>
<b>2.5.3&nbsp;&nbsp;&nbsp;Edging</b><br/>
Edging is the process of gathering material into a region using a concave shaped open die. The process is called edging because it is usually carried out on the ends of the workpiece (Figure-24).<br/>
<center><img src="images/mem/Unit2/Lesson3/30.jpg" width="300"><img src="images/mem/Unit2/Lesson3/31.jpg" width="300"><br/>
<table width="400"><tr><td><b>Figure 24: Edging</b></td><td><b>Figure 25: Fullering</b></td></tr></table></center><br/>
<b>2.5.4&nbsp;&nbsp;&nbsp;Fullering</b><br/>
Fullering is the process of reducing the cross-sectional area of a portion of the stock using a convex shaped die. The metal flow is outward and away from the centre of the fuller (Figure-25).<br/><br/>
<b>2.5.5&nbsp;&nbsp;&nbsp;Blocking</b> stage makes the metal to approximately final shape, with generous corner and fillet radii (Figure-26).<br/><br/>
<b>2.5.6&nbsp;&nbsp;&nbsp;Finisher</b> die imparts final shape and size, after which the flash is trimmed from the part (Figure-26).<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/32.jpg"><img src="images/mem/Unit2/Lesson3/33.jpg"><img src="images/mem/Unit2/Lesson3/34.jpg"><br/>
<table width="700"><tr><td>Edging&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Fullering&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Blocking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Finisher&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Final product<br>with flash<br>is trimmed off</td></tr></table>
<b>Figure 26: Steps followed in forging of Connecting Rod</b></center>
</p></dd><br/>
<dt><b><a name="force">2.6&nbsp;&nbsp;&nbsp;Types of forging process on the basis of method of application of force</a></b></dt>
<dd><p>
The different types of forging operations are:<br/>
(i) Hand forging,<br/>
(ii) Drop forging,<br/>
(iii) Press forging, and<br/><br/>
<b>2.6.1 Hand forging</b><br/>
The hand forging process consists of forming the desired shape of a heated metal by applying repeated blows of a hand held hammer. A flat die or an anvil is used. The desired shape of the metal piece is maintained by the smith during the forging process as the desired length and cross-section are adjusted manually by positioning and turning the part on the flat surface of the anvil. While hammering, tongs holds the red hot metal and a well-rounded chisel shaped edge, called fuller, and is used to draw out the metal. Fuller is held on the metal by a helper while the smith strikes the metal with a hammer. The quality of the forging is wholly dependent on the skill of the smith.<br/>
Applications: Only simple shapes can be hand forged. Horseshoes are hand forged and fitted to the hooves of the horse. Figure-27 illustrates a hand forging operation.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/35.jpg"><br><b>Figure 27: Hand forging operation</b></center><br/>
The tools used by a blacksmith include: anvil, swage block, hammers, tongs, swages fullers, and flatters. The shop where hand forging is carried out is called a smithy shop.<br/>
Hand forging is explained in detail in separate lesson-4 (Smithy).<br/><br/>
<b>2.6.2 Drop forging</b><br/>
Drop forging is a mechanized form of the black smith’s hammer. In drop forge a massive weight is raised and made to fall freely. Dies are made in sets or halves; one half of the die is attached to ram and the other to a stationary anvil. The drop hammer uses compressed air or steam to lift the ram and lets it fall by gravity. The ram is lifted by a steel rod connecting it to a piston. In drop forging, from bar to final shape of the forged product is achieved in a number of steps by repeated blows of the dies contain impressions. 
Figure-28 & 29 illustrates a drop forging operation using a hydraulic hammer. During drop forging, a greater amount of energy is absorbed by the machine and foundation and the process is therefore not considered economical. Drop forging is very noisy and the shock of impact is difficult to isolate. In drop forging operations, the machine and foundation absorb much of the impact of the drop hammer.<br/>
<b>Equipment:</b> Gravity drop hammers<br/>
<b>Application:</b> Drop hammers are the choice for work pieces made of steel, aluminum alloys and brasses and bronzes.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/36.jpg"><img src="images/mem/Unit2/Lesson3/37.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/Unit2/Lesson3/38.jpg"><img src="images/mem/Unit2/Lesson3/39.jpg">
<br><table width="850"><tr><td><b>Figure 28: (a) Drop forging setup & (b) in drop forging series of blows are applied in order to obtain final shape.</b></td>
<td><b>Figure 29: (a) In Press forging uniform deformation (b) Drop forging non-uniform deformation</b></td></tr></table></center><br/>
<b>2.6.3 Press Forging</b><br/>
Press forging is done in presses rather than with hammers. In press forging a slow squeezing action is used to transfer a great amount of compressive force to the workpiece. Unlike an open-die forging where multiple blows are required to transfer the required energy to the material being forged, press forging process is more accurate as ram stick to the die impression more rigidly and transfers the force uniformly & gradually to the bulk of the material giving time for the metal to flow as it is pressed. This results in uniform material properties. The construction of the press is similar to the one given in Figure-28. Press forging is considerably a quieter operation than drop forging. Also greater portion of the total energy is transmitted to the metal than in a drop hammer.<br/>
<b>Application:</b> It is the choice for work pieces made of aluminum, magnesium, beryllium alloys, bronzes and brass.
</p></dd><br/>
<dt><b><a name="miscellaneous">2.7&nbsp;&nbsp;&nbsp;Miscellaneous forging processes</a></b></dt>
<dd><p>
<b>2.7.1 Coining</b><br/>
It is a closed die forging process used mainly for minting coins and making of jewelry. In order to produce fine details on the work material the pressures required are as large as five or six times the strength of the material. Lubricants are not employed in this process because they can get entrapped in the die cavities and, being incompressible, prevent the full reproduction of fine details of the die.<br/>
<b>Equipment:</b> Presses and hammers.<br/>
<b>Applications:</b> Metallic coins; decorative items, such as patterned tableware, medallions and metal buttons; sizing of automobile and aircraft engine components.<br/>
<center><img src="images/mem/Unit2/Lesson3/40.jpg"><br><b>Figure 30: Coining process</b></center>
<b>2.7.2 Rotary Swaging</b><br/>
Rotary swaging is the application of forging process for shaping round bars, tubes in which the diameter of a rod or a tube is reduced. In rotary swaging process workpiece is held stationary and the dies rotate rapidly in a housing, the dies strike the workpiece at a rate as high as 10 - 20 strokes per second. The process is shown in figure 31. When compared to other methods of forging, production rate is high in rotary forging. The maximum diameter of work piece that can be swaged is limited to about 150 mm; work pieces as small as 0.5 mm diameter have been swaged. Swaging is a noisy operation.<br/>
<b>Equipment:</b> Rotory forging presses.<br/>
<b>Applications:</b> Screwdriver blades, box spanners and soldering iron tips are typical examples of swaged products. Figure 32-36 shows products made by swaging.<br/>
<center><img src="images/mem/Unit2/Lesson3/41.jpg"><img src="images/mem/Unit2/Lesson3/42.jpg"><br><img src="images/mem/Unit2/Lesson3/43.jpg"><img src="images/mem/Unit2/Lesson3/44.jpg"><br>
<b>Figure 31: Rotary swaging process, Tube being reduced in a rotary swaging machine, Basic components and motions of a rotary swaging machine. When the cage is rotated, hammers come in contact with rollers. The moment when it comes in contact with the rollers, it gives blows on the workpiece through dies. The dies reciprocate with a high frequency, thereby deforming the workpiece to conform to the shape of the dies used.</b></center><br/>
<center><img src="images/mem/Unit2/Lesson3/45.jpg" width="350">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/Unit2/Lesson3/46.jpg" width="350"><br>
<table width="700"><tr><td><b>Figure 32: Solid parts made by swaging</b></td><td><b>Figure 33: Hollow parts made by swaging</b></td></tr></table><br>
<img src="images/mem/Unit2/Lesson3/47.jpg" width="600"><br/><b>Figure 34: A variety of swaged parts, some with internal details</b></center><br/>
In tube swaging, the tube thickness and / or internal diameter of tube can be controlled with the use of internal mandrels. Also internally shaped tubes can be swaged by using shaped mandrels. Figure 35 shows the process.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/48.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/Unit2/Lesson3/49.jpg"><br>
<table width="800"><tr><td width="400"><b>Figure 35 (a): Swaging of tubes without a mandrel</b></td>
<td><b>Figure 35 (b): Swaging with a mandrel (Wall thickness is more in the die gap. The final wall thickness of the tube depends on the mandrel diameter</b></td></tr></table><br>
<img src="images/mem/Unit2/Lesson3/50.jpg"><br/><b>Figure 35 (c): Examples of cross-sections of tubes produced by swaging on shaped mandrels</b><br/><br/>
<img src="images/mem/Unit2/Lesson3/51.jpg" width="950"><br/><b>Figure 36: Steps followed in hot-swaging a tube to form the end (neck) of a pressurized gas cylinder</b></center><br/>
<b>2.7.3 Orbital forging</b><br/>
A typical rotary forging process (sometimes called orbital forging) makes use of two dies to deform only a small portion of the workpiece at a time, and the process continues till whole of the workpiece is deformed, one portion after the other. The axis of upper die is tilted to a small angle with respect to the lower die, figure 37. The inclined upper die rotates around the workpiece in such a way that only a small area of the die is in contact with workpiece at any time. The lower die, however, is kept in horizontal position and rotates at the same speed as the upper die.<br/>
<b>Equipment:</b> Orbital forging presses.<br/>
<b>Application:</b> Bevel gears, claw clutch parts, wheel disks with hubs, bearing rings, rings of various contours, bearing-end covers.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/52.jpg"><br/><b>Figure 37: Orbital forging</b></center>
<b>2.7.4 Flashless forging (Precision forging)</b><br/>
In flashless forging, also known as precision or true closed-die forging, the metal is deformed in a cavity that provides total confinement, figure 38 (b). Accurate workpiece sizing is required since complete filling of the cavity must be ensured with no excess material. Accurate workpiece positioning is also necessary, along with good die design and control of lubrication. The major advantage of this approach is the elimination of the scrap generated during flash formation, an amount that is often between 20 and 45% of the starting material and minimum machining of the forged part is needed.<br/>
<b>Equipment:</b> Higher capacity presses are used.<br/>
<b>Applications:</b> Aluminium and magnesium alloys are particularly suitable for precision forging. Precision forged products are gears, connecting rods, housings, turbine blade.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/53.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/Unit2/Lesson3/54.jpg"><br/>
<table width="750"><tr><td>(a) Flash can be observed in conventional closed die forging</td><td>(b) At the end of forging, there is no flash in precision forging</td></tr></table>
<b>Figure 38: Precision forging: comparison of closed die forging to precision forging of cylindrical billet.</b></center><br/>
<b>2.7.5 Isothermal Die Forging</b><br/>
Isothermal die forging is also known as hot-die forging. In this process, dies are heated to the same temperature as that of the hot workpiece. When the workpiece is maintained hot (during forging), its low strength and high ductility are effectively maintained to help the forging operation. Forging forces are also low. The dies used are made of nickel or molybdenum alloys. The process is expensive and slow.<br/>
<b>Equipment:</b> Hydraulic presses<br/>
<b>Application:</b> Complex parts from titanium and super alloys and with good dimensional accuracy are forged by this process.<br/><br/>
<b>2.7.6 Roll Forging</b><br/>
This process is used to reduce the thickness of round or flat bar with the corresponding increase in length. When the rolls are in open position, the heated bar stock is placed between the rolls. With the rotation of rolls through half a revolution, the bar is progressively squeezed and shaped. The bar is then inserted between the next set of smaller grooves and the process is repeated till the desired shape and size are achieved.<br/>
<b>Equipment:</b> rolling mill that has two semi – cylindrical rolls that are slightly eccentric to the axis of rotation. Each roll has a series of shaped grooves on it.<br/>
<b>Application:</b> Leaf springs, axles, and levers.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/55.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/Unit2/Lesson3/56.jpg"><br/>
<b>Figure 39: Roll Forging and product formed by roll forging</b></center>
</p></dd><br/>
<dt><b><a name="dies">2.8&nbsp;&nbsp;&nbsp;Dies used for forging</a></b></dt>
<dd><p>
Since most forging operations are carried on elevated temperatures, dies should have<br/>
(a) high strength and toughness at high temperatures,<br/>
(b) hardenability and ability to harden uniformly,<br/>
(c) resistance to mechanical and thermal shocks and<br/>
(d) wear resistance.<br/>
The selection of die material is governed by size of forging and its shape complexity, number of forgings and forging temperature. Common die materials are tool and die steels containing chromium, nickel, molybdenum and vanadium.
</p></dd><br/>
<dt><b><a name="lubricants">2.9&nbsp;&nbsp;&nbsp;Lubricants used in forging</a></b></dt>
<dd><p>
A proper lubricant is necessary for making good forgings. The lubricant is useful in preventing sticking of the workpiece material with the die, and also acts as a thermal insulator to help reduce die wear. A wide variety of lubricants are used such as graphite and molybdenum disulphide used for hot forging dies. Lubricants affect and reduce forces required for forging. They also impart a thermal barrier between the hot workpiece and relatively cool die.
</p></dd><br/>
<dt><b><a name="defects">2.10&nbsp;&nbsp;&nbsp;Defects in forgings</a></b></dt>
<dd><p>
Defects in a forging may be due to following reasons:<br/>
(i) defective metal with a lot of inclusions of impurities or oxides,<br/>
(ii) faulty design of die,<br/>
(iii) improper upkeep of die (oxides may get deposited in pockets in the die),<br/>
(iv) development of internal stresses affecting the structure and strength of forging,<br/>
(v) oxides or scales not properly removed from the hot blank before forging and<br/>
(vi) oversize blank fed to the dies for forging.<br/><br/>
<b>Common forging defects are:</b><br/>
(i) <b>Defective structure</b> of forged piece due to defective base metal.<br/><br/>
(ii) <b>Incomplete forging</b> (not up to correct dimensions) due to either less metal used for forging a part or the die may be defective.<br/><br/>
(iii) <b>Cracks</b> at the corners of the forgings due to improper forging process.<br/><br/>
<b>Surface cracking</b> of forgings occurs due to excessive working of the workpiece surface at too low temperature or as a result of hot shortness.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/57.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/Unit2/Lesson3/58.jpg">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mem/Unit2/Lesson3/59.jpg"><br/>
<table width="750"><tr><td><b>(a) Surface cracking</b></td><td><b>(b) Cracking at the flash</b></td><td><b>(c) Internal cracking</b></td></tr></table>
<b>Figure: 40</b></center><br/>
<b>Cracking at the flash</b> of closed die forging is another defect since crack may penetrate into the forging when flash is trimmed off. Either increase the flash thickness or relocate the flash to less critical region of the forging.<br/>
<b>Internal cracking</b> the centre of the forging may be due to the development of secondary tensile stresses during forging. This can be reduced by proper die design.<br/>
<b>Cracks in ribs</b> may occur due to the use of oversize billet for.<br/>
<center><img src="images/mem/Unit2/Lesson3/59_60.jpg"><br/><b>Figure 41: Cracks in ribs</b></center><br/>
(iv) <b>Mismatched forgings</b> due to faults in two halves of the die in working. Mismatch is caused by mis-alignment between the top and bottom dies.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/60.jpg" width="300"><img src="images/mem/Unit2/Lesson3/61.jpg" width="350"><img src="images/mem/Unit2/Lesson3/62.jpg"><br/>
<table width="900"><tr><td width="300"><b>(a) Mismatched forgings</b></td><td width="300"><b>(b) Cold shut or fold</b></td><td><b>(c) Web buckles & laps are formed</b></td></tr></table>
<b>Figure: 42</b></center><br/>
(v) <b>Cold shut or fold</b> is a discontinuity produced when two surfaces of the metal fold against each other without welding completely. The defect is caused due to sharp corners in the die cavity, excessive chilling or high friction.<br/><br/>
(vi) <b>Laps</b> formed by web buckling are another defect in forgings. Thicker web should be used to avoid this defect.<br/><br/>
(vii) <b>Scale and oxidation</b> of the surface of forging.<br/><br/>
(viii) <b>Oversize forging</b> due to oversize dies.
</p></dd><br/>
<dt><b><a name="example">Examples</a></b></dt>
<dd><p>
<b>Example 1:</b> Explain the procedure of making the head of rivet by forging operation.<br/>
<b>Solution:</b> Step by step procedure to be followed in making the head of a rivet by forging operation is explained below:<br/><br/>
(i) Keep the blank in the die as shown in figure 43(a) and position the kick out pin depending on the length of rivet required. Punch should have the negative shape of the rivet head as shown.<br/><br/>
(ii) Apply force through the punch. At the end of the stroke, head is formed as shown in figure 43(b).<br/><br/>
(iii) Now, remove the rivet by pushing the kickout pin.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/63.jpg"><img src="images/mem/Unit2/Lesson3/64.jpg"><br/><b>Figure 43: Rivet head formation</b></center><br/>
<b>Example 2:</b> Bolt is to be manufactured from a workpiece shown in figure-44 by forging operation. Explain the different stages involved in manufacturing.<br/>
<b>Solution:</b> The stepwise procedure for making bolt is explained below:<br/>
<center><img src="images/mem/Unit2/Lesson3/65.jpg"><br/><b>Figure 44: Different stages in forging a bolt head</b></center><br/>
First, gather the material at one end of the rod as shown in Figure 44 (a).<br/><br/>
Produce round head as shown in Figure 44 (b).<br/><br/>
Produce hexagonal head as shown in Figure 44 (c).
</p></dd><br/>
<dt><b><a name="questions">Terminal Questions</a></b></dt>
<dd><p>
1. Do you think it is possible to forge all materials? Justify your answer.<br/>
2. List out any 5 components manufactured by forging other than given in the book.<br/>
3. Explain with an example, where do you use (a) hand forging (b) drop forging and (c) press forging.<br/>
4. Figure 45 shows a forging operation. Mention whether it is an open die forging or closed die forging. Justify your answer.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/66.jpg"><br/><b>Figure 45: Figure for question 4</b></center><br/>
5. In a forged component such as spanner, it is observed that the lettering on it is raised rather than being sunk. Why they are made that way? Explain.<br/>
6. With the help of neat sketches, explain how a hexagonal nut can be manufactured from a cylindrical rod.<br/>
7. How do you compare forged component with cast components?<br/>
8. Mention any 3 differences between drop forging and press forging.<br/>
9. Using Rotary swaging process, do you think it is possible to manufacture prismatic shape components? Justify your answer.<br/>
10. Product shown in figure 46 is to be manufactured. Explain the different sequence involved in manufacturing the product.<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/67.jpg" height="300"><br/><b>Figure 46: Figure for question 10</b></center><br/>
11. Explain the sequence of operations involved in manufacturing the component shown in figure 47 (b) from the raw material shown in figure 47 (a).<br/><br/>
<center><img src="images/mem/Unit2/Lesson3/68.jpg"><br/><b>Figure 47: Figure for question 11</b></center><br/>
12. You are supplied with a stock of MS rod having a dimension shown in figure 48 (a). It is required to obtain the product round headed bolt and square headed nut as shown in Figure 48 (b). List the process sequence involved.<br/>
<center><img src="images/mem/Unit2/Lesson3/69.jpg" width="500"><br/><b>Figure 48: Figure for question 12</b></center>
</p></dd>
<dt><b><a name="comparison">Table 3: Comparison of different forging materials</a></b></dt>
<dd><p>
<center><table border="1" cellspacing="0" width="800">
<tr><th>Metal</th><th>Characteristic</th><th>Application</th></tr>
<tr><td>Aluminum</td><td>Readily forged<br>Combines low density with good strength-to-weight ratio</td><td>Primarily for structural and engine applications in the aircraft.</td></tr>
<tr><td>Magnesium</td><td>Refractory Metals: molybdenum, tantalum, and tungsten and their alloys</td><td>Usually employed at service temperatures lower than 500<sup>o</sup>F.</td></tr>
<tr><td>Copper, Brass, Bronze</td><td>Good electrical and thermal conductivity</td><td>Important for applications requiring corrosion resistance.</td></tr>
<tr><td>Copper, Brass, Bronze</td><td>Low material cost Good mechanical properties</td><td>Comprise the greatest volume of forgings produced for service applications up to 900<sup>o</sup>F.</td></tr>
<tr><td>Microalloy/ HSLA Steels</td><td>Low material cost Equivalent mechanical properties to many carbon and low-alloy steels</td><td>Various automotive and truck applications including crankshafts, connecting rods, yokes, pistons, suspension and steering components, spindles, hubs, and trunio</td></tr>
<tr><td>Stainless Steel</td><td>Corrosion-resistant</td><td>Used in pressure vessels, steam turbines, and many other applications in the chemical, food processing, petroleum, and hospital services industries.</td></tr>
<tr><td>Nickel-Base Superalloy</td><td>Creep-rupture strength Oxidation resistance</td><td>Structural shapes, turbine components, and fittings and valves.</td></tr>
<tr><td>Titanium</td><td>High strength Low density Excellent corrosion resistance</td><td>Aircraft-engine components and structurals, ship components, and valves and fittings in transportation and chemical industries.</td></tr>
<tr><td>Refractory Metals: molybdenum, tantalum, and tungsten and their alloys</td><td>Enhanced resistance to creep in high-thermal environments</td><td>High-temperature applications involving advanced chemical, electrical, and nuclear propulsion systems and flight vehicles.</td></tr>
</table></center>
</p></dd>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit2lesson1.php" title="Metal Forming Processes">Lecture 1</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit2lesson3.php" title="Smithy (Hand Forging)">Lecture 3</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute (www.dei.ac.in)</div>
</body>
</html>
<?php
}
 	//Opening file to get counter value
	$fp = fopen ("../counter.txt", "r");
	$count_number = fread ($fp, filesize ("../counter.txt"));
	fclose($fp);
	$counter = (int)($count_number) + 1;
    $count_number = (string)($counter);
	$fp = fopen ("../counter.txt", "w");
	fwrite ($fp, $count_number);
	fclose($fp);
?>