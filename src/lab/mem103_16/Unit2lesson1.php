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
<tr><td width="65%"><b>Lesson 1 Metal Forming Processes</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit2/Lesson1/Unit2lesson1.pdf" target="_blank" title="Download Lesson 1">Lesson 1 Download</a></td><td><b>Supplementary Material</b></td></tr>
<tr><td><a href="#introduction">1.1&nbsp;&nbsp;&nbsp;Introduction</a></dt><td><a href="Unit2Simulations.php?MEM103/Unit2/Simulations/Upsetting.mp4">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Metal Forming Simulations</a></td></tr>
<tr><td><a href="#independent">&nbsp;&nbsp;&nbsp;1.1.1&nbsp;&nbsp;&nbsp;Independent Process Variables in Metal Forming Processes</a></td><td><a href="Unit2Lesson1scq.php">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Self-check questions</a></td></tr>
<tr><td><a href="#dependent">&nbsp;&nbsp;&nbsp;1.1.2&nbsp;&nbsp;&nbsp;Dependent Process Variables in Metal Forming Processes</a></td><td><a href="Unit2lesson1tq.php">3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terminal questions</a></td></tr>
<tr><td><a href="#hot">1.2&nbsp;&nbsp;&nbsp;Hot Working</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2.1&nbsp;&nbsp;&nbsp;Advantages of Hot-Working</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2.2&nbsp;&nbsp;&nbsp;Disadvantages of Hot-Working</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2.3&nbsp;&nbsp;&nbsp;Temperature Range for Hot-Working</td></tr>
<tr><td><a href="#cold">1.3&nbsp;&nbsp;&nbsp;Cold Working</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.1&nbsp;&nbsp;&nbsp;Advantages of Cold-Working</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.2&nbsp;&nbsp;&nbsp;Disadvantages of Cold-Working</td></tr>
<tr><td><a href="#comparison">1.4&nbsp;&nbsp;&nbsp;Comparison of Hot Working and Cold Working Process</a></td></tr>
<tr><td><a href="#warm">1.5&nbsp;&nbsp;&nbsp;Warm Working</a></td></tr>
<tr><td><a href="#applications">1.6&nbsp;&nbsp;&nbsp;Applications of Formed Products and Major end use Industries</a></td></tr>
</table><br/></div>
<div>
<b>METAL FORMING PROCESSES</b><br/><br/>
<dt><b><a name="introduction">1.1&nbsp;&nbsp;&nbsp;Introduction</a></b></dt>
<dd><p>
In the first lecture, we learned that a component can also be manufactured by the application of external forces. This type of shaping of a component by the application of external forces is known as metal forming processes. Metal forming can be described as a process in which the desired size and shape are obtained through the deformation of metals plastically under the action of externally applied forces. Owing to the larger magnitudes of the forces involved, these processes are also known as bulk deformation processes.<br/><br/>
In this Unit-II of course we shall study the shape production methods by considering the family of deformation processes. These processes have been designed to exploit a remarkable property of some engineering materials known as plasticity, the ability to flow as solids without deterioration of their properties. Since all processing is done in the solid state, there is no need to handle molten material or deal with the complexities of solidification. 
Since the material is simply moved (or rearranged) to produce the shape, as opposed to cutting away unwanted regions, the amount of waste can be substantially reduced. Unfortunately, the forces required are often high. Machinery and tooling can be quite expensive, and large production quantities may be necessary to justify the approach. The overall usefulness of metals is largely due to the ease of fabrication into useful shapes. 
The deformation may be bulk flow in three dimensions, simple shearing, simple or compound bending, or complex combinations of these. The stresses producing these deformations can be tension, compression, shear, or any of the other varieties shown in figure 1. Important metal forming processes like rolling, forging, extrusion and wire drawing processes will be discussed in this unit-II.<br/><br/>
<center><img src="images/mem/Unit2/Lesson2/1.jpg" alt="Classification of States of Stress"><br/><br/><b>Figure 1: Classification of States of Stress</b></center><br/>
<b>Case:</b><br/>To realize the importance of metal forming process, consider the component shown in Figure 2. This component can be manufactured by either machining or casting process. The component can be produced by machining by removing the unwanted material from the raw material of a oversized shape. Large amount of material has to be removed by machining to get the desired shape. That is, the process of machining involves loss of material in the form of chips. In addition, to produce the component by machining, it requires skilled operator to move the tool in a contoured path. The accuracy and production rate of the components produced are a functions of skill of the operator and his consistency.<br/><br/>
<center><img src="images/mem/Unit2/Lesson2/Case1.jpg" alt="Typical component to be produced"><br/><br/><b>Figure 2: Typical component to be produced</b></center><br/>
If the component is produced by casting process, it involves a series of operations i.e., pattern making, mold making, melting the material, pouring the molten metal, ejecting the casting. Lot of molten material is wasted in risers and gating. The casting may further require machining to remove rough surfaces. All these add to the cost.<br/>
The same component can be produced by metal forming process by the application of tensile force as shown in Figure 3. The process is carried out by simply keeping a flat workpiece material over a desired shaped former called die and then applying force such that the flat workpiece takes the shape of the die. Observe that there is no material loss, it does not require a skilled operator as in case of machining operation, or it does not involve a series of operations and does not require further machining operations as in case of casting process. Body of vehicles, utensils we use in our day-to-day life, collapsible tubes are the typical examples of the products produced by metal forming process. Brittle materials cannot be shaped by metal forming processes.<br/><br/>
<center><img src="images/mem/Unit2/Lesson2/Case2.jpg" alt="Producing the desired shape by metal forming"><br/><br/><b>Figure 3: Producing the desired shape by metal forming</b><br/><br/>
<table  style="text-align:center;">
<tr><td><img src="images/mem/Unit2/Lesson2/2.jpg" alt="Triaxial compression"></td><td><img src="images/mem/Unit2/Lesson2/3.jpg" alt="Biaxial compression"></td></tr>
<tr><td style="font-weight: bold;">Triaxial compression</td><td style="font-weight: bold;">Biaxial compression<br/><br/></td></tr>
<tr><td><img src="images/mem/Unit2/Lesson2/4.jpg" alt="Triaxial compression">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><img src="images/mem/Unit2/Lesson2/5.jpg" alt="Biaxial compression"></td></tr>
<tr><td style="font-weight: bold;">Triaxial compression</td><td style="font-weight: bold;">Biaxial compression<br/><br/></td></tr>
<tr><td><img src="images/mem/Unit2/Lesson2/6.jpg" alt="Triaxial compression"></td><td><img src="images/mem/Unit2/Lesson2/7.jpg" alt="Biaxial compression"></td></tr>
<tr><td style="font-weight: bold;">In flange of blank - Biaxial tension and compression<br/>In wall of cup - Simple uniaxial tension<br/><br/></td><td style="font-weight: bold;">Biaxial tension<br/>Biaxial compression</td></tr>
<tr><td colspan="2"><img src="images/mem/Unit2/Lesson2/8.jpg" alt="Triaxial compression"></td></tr>
<tr><td  colspan="2" style="font-weight: bold;">Biaxial compression, tension</td></tr></table>
<br/><b>Figure 4: Common metal forming processes. State of stress experienced by metal is also given.</b></center><br/>
A large variety of metal forming processes have been developed for various specific applications, but in view of the applied forces on the metal work piece during working, these processes can be broadly categorized as follows.<br/><br/>
(a) Direct-compression type processes such as forging and rolling, wherein the force is applied to the surface of the job and the metal flows at right angles to the direction of compression.<br/><br/>
(b) Indirect-compression processes such as wire drawing, tube drawing, extrusion and deep drawing wherein primary applied forces are generally tensile but the indirect compressive forces developed by the reaction of the job with die reach high values, and the metal flows under the action of a combined stress state which includes very high compressive forces in at least one of the principal directions.<br/><br/>
(c) Tension type processes such as stretch forming of sheet metal under the application of tensile forces when the sheet metal is wrapped to the contour of a die.<br/><br/>
(d) Bending processes involve the application of bending moments to the sheet metal or other metal structural such as rod, wire or angle.<br/><br/>
(e) Shearing processes involve the application of shearing forces of adequate magnitude to rupture the metal in the plane of shear.<br/><br/>
The process of forming a metal may take place any time it is subjected to loads (or stresses) that are greater than its 'yield point', or in other words, when the deformation stress moves from the elastic range to the plastic range.
</dd></p><br/>
<dt><b><a name="independent">1.1.1&nbsp;&nbsp;&nbsp;Independent Process Variables in Metal Forming Processes</a></b></dt>
<dd><p>
Forming processes tend to be complex systems consisting of independent variables, dependent variables, and independent dependent interrelations. Independent variables are those aspects of the process over which the engineer has direct control, and they are generally selected or specified when setting up a process. Consider some of the independent variables in a typical forming process:</br></br>
<b>1. <i>Starting material</i></b><br/>
Initial properties and characteristics of the material to be formed are chosen entirely for ease of fabrication by the desire to achieve the required final properties upon completion of the deformation process.<br/><br/>
<b>2. <i>Starting geometry of the workpiece</i></b><br/>
The starting geometry may be decided by previous processing, or it may be selected from a variety of available shapes. Economic considerations often influence this decision. Generally geometry is in the shape of bloom, slab, billet, etc.<br/><br/>
<b>3. <i>Tool or die geometry</i></b><br/>
This is an area of major significance and has many aspects, such as the diameter and profile of a rolling mill roll, the bend radius in a sheet-forming operation, the die angle in wire drawing or extrusion, and the cavity details when forging. Since the tooling will induce and control the metal flow as the material goes from starting shape to finished product, success or failure of a process often depends on tool geometry.<br/><br/>
<b>4. <i>Lubrication</i></b><br/>
It is not uncommon for friction between the tool and the workpiece to account for more than 50% of the power supplied to a deformation process. Lubricants can also act as coolants, thermal barriers, corrosion inhibitors, and parting compounds. Hence, their selection is an important aspect in the success of a forming operation. Specification includes type of lubricant, amount to be applied, and method of application.<br/><br/>
<b>5. <i>Starting temperature</i></b><br/>
Since material properties can vary greatly with temperature, temperature selection and control are often key to the success or failure of a metal forming operation. Specification of starting temperatures may include the temperatures of both the workpiece and the tooling.<br/><br/>
<b>6. <i>Speed of operation</i></b><br/>
Most deformation processing equipment can be operated over a range of speeds. Speed can directly influence the forces required for deformation and also the production rate.<br/><br/>
<b>7. <i>Amount of deformation</i></b><br/>
While some processes control this variable through the design of tooling, others, such as rolling, may permit its adjustment at the discretion of the operator.
</p></dd><br/>
<dt><b><a name="dependent">1.1.2&nbsp;&nbsp;&nbsp;Dependent process variables in metal forming processes</a></b></dt>
<dd><p>
After specification of the independent variables, the process in turn determines the nature and values of dependent variables. Selection of dependent variables is done on the basis of the independent variable selection. Examples of dependent variables include:<br/><br/>
<b>1. <i>Force or power requirements</i></b><br/>
A certain amount of force or power is required to convert a selected material from a starting shape to a final shape. It is important to predict the forces or powers that will be required for any forming operation. Without a reasonable estimate of forces or power, we would be unable to specify the equipment for the process, select appropriate tool or die materials, compare various die designs or deformation methods, and ultimately optimize the process.<br/><br/>
<b>2. <i>Material properties of the product</i></b><br/>
While we can easily specify the properties of the starting material, the combined effects of deformation and the temperatures experienced during forming will certainly change them. The starting properties of the material may be of interest to the manufacturer, but the customer is far more concerned with receiving the desired final shape with the desired final properties. It is important to know, therefore, how the initial properties will be altered by the shape-producing process.<br/><br/>
<b>3. <i>Exit temperature</i></b><br/>
Deformation generates heat within the material. Hot workpieces cool when in contact with colder tooling. Lubricants can break down or decompose when overheated or may react with the workpiece. The properties of an engineering material can be altered by both the mechanical and thermal aspects of a deformation process. Therefore, if we are to control a process and produce quality products, it is important to know and control the temperature of the material throughout the deformation.<br/><br/>
<b>4. <i>Surface finish and precision</i></b><br/>
The surface finish and dimensional precision of the resultant product depend on the specific details of the forming process.<br/><br/>
<b>5. <i>Nature of the material flow</i></b><br/>
In deformation processes, dies and tooling generally exert forces or pressures and control the movement of the external surfaces of the workpiece. While the objective of an operation is the production of a desired shape, the internal flow of material may actually be of equal importance. Product properties can be significantly affected by the details of material flow, and that flow depends on all the details of a process.<br/><br/>
<center><img src="images/mem/Unit2/Lesson2/9.jpg" alt="Schematic representation"><br/><br/><b>Figure 5: Schematic representation of a metal forming system showing independent variables, dependent variables, and the various means of linking the two</b></center><br/>
<b>Metal forming processes are traditionally classified as:</b><br/>
(a) Hot forming or hot-working processes<br/>
(b) Cold forming or cold-working processes<br/>
(c) Warm forming processes<br/><br/>
Metals can be plastically deformed or (worked) at room, warm or higher temperatures. Their behavior and workability depend largely on whether the deformation takes place below or above the recrystallization temperature of the metal. Recrystallization temperature ranges between 0.3T<sub>m</sub> and 0.6T<sub>m</sub>, where T<sub>m</sub> is the absolute melting temperature of the metal.
</p></dd><br/>
<dt><b><a name="hot">1.2&nbsp;&nbsp;&nbsp;Hot Working</a></b></dt>
<dd><p>
Plastic deformation of metal carried out at temperature above the recrystallization temperature, is called hot working. Under the action of heat and force, when the atoms of metal reach a certain higher energy level, the new equiaxed (having equal dimensions in all directions) and strain-free grains start forming. This is called recrystallization. When this happens, the old grain structure deformed by previously carried out mechanical working no longer exist, instead new crystals which are strain-free are formed. 
In hot working, the temperature at which the working is completed is critical since any extra heat left in the material after working will promote grain growth, leading to poor mechanical properties of material. The hot-working is preferred for primary solid-state shaping processes such as forging, rolling, extruding because the power (or forces) required in shaping the hot metals is lower and larger reductions in the size of the metal are easily and economically possible without its cracking. 
Hot-working gives high production rate of products of various sizes and shapes from the original ingot received from steel plants. It also generally does not bring noticeable changes in the properties of metal (i.e. hardness and ductility, etc.).<br/><br/>
<b>1.2.1 Advantages of Hot-working</b><br/>
(i) Large deformations in the metal are easily, more rapidly and economically produced as the metal is hot and in plastic state and thus needs less power in deforming. Hot-working is mainly preferred where heavy reduction in size or heavy deformation is required and work-hardening (for increase in strength) is not the main requirement.<br/><br/>
(ii) Hot-working gives high production volumes of products of desired shapes and sizes (examples: I-beams, channels, plates, rods, etc.) from the cast ingots received from the steel plants.<br/><br/>
(iii) Hot-working improves mechanical properties of the metal by refining the grain structure, minimizing porosity (ingots have porosity being a cast product), and developing directional flow lines of grains in the deformed metal.<br/><br/>
(iv) Hot rolling is an effective way to reduce grain size in metals, for improved strength, ductility and impact resistance.<br/><br/>
(v) Most hot worked products become the raw material for the secondary processes used to produce finished items by cold forming, cutting, drawing, bending, machining or welding.<br/><br/>
<b>1.2.2 Disadvantages of Hot-working</b><br/>
(i) Rapid oxidation or scaling of hot metal occurs.<br/><br/> 
(ii) Loss of carbon from steel surface during hot rolling results in loss of strength. The rolled product may thus give rise to fatigue crack during service.<br/><br/>
(iii) Close dimensional tolerances are not generally achieved in hot worked parts.<br/><br/>
(iv) Hot rolling and other hot-working operations like hot forging involve large tooling costs on plants and their maintenance, although this is compensated by the high production volumes.<br/><br/>
<b>Major hot-working processes are as follows:</b><br/>
Rolling, Forging, Extrusion, Rotary tube piercing, Drawing, Spinning.<br/><br/>
<b>1.2.3 Temperature Range for Hot-working</b><br/>
For ferrous metals (steels)—930 to 1370°C<br/>
For copper, brasses and bronzes—590 to 930°C<br/>  
For aluminium and magnesium alloys—345 to 480°C<br/><br/>
<b>Note:</b>
<i>The cast products (such as steel ingots or continuous steel castings) are converted to wrought products by various deformation processes. The cast steel ingots or continuous steel castings are always first hot worked to reduce them to the products of various shapes and sizes primarily for the refinement of grain structure of the cast product and elimination of porosity in cast ingots. 
Wrought products may be in the form of long-length forms such as sheets, plates, bars, rolled sections as I-beam, channels, angles, tubes, wire and other extruded sections. When a metal is hot worked, say by rolling, it passes through the opposing rollers and is thus reduced in its section thickness. The original large grain structure of the hot metal being rolled is elongated while passing through 
the rollers and later broken up into fragments in the deformation zone, and the fragments of the crystals thus formed become the nuclei for the formation of new smaller crystals and hence a fine uniform grained structure is produced in the hot rolled portion of the metal. The hot rolling thus refines the grain structure. 
The metals that can be hot worked include carbon steels (low, medium and high), alloy steels, stainless steel, copper and its alloys such as brasses, bronzes, aluminium and magnesium alloys and titanium alloys.</i><br/><br/>
<center><img src="images/mem/Unit2/Lesson2/10.jpg" alt="Hot rolling and cold rolling of metals"><br/><b>Figure 6: Hot rolling and cold rolling of metals. Hot rolling refines the grain structure whereas cold rolling distorts it</b></center>
</p></dd><br/>
<dt><b><a name="cold">1.3&nbsp;&nbsp;&nbsp;Cold Working</a></b></dt>
<dd><p>
The plastic deformation of metals below the recrystallization temperature is known as cold working. The cold-working, however, causes more noticeable changes in the mechanical properties by increasing the tensile strength and yield strength of cold worked metal with a corresponding loss in the ductility of metal. From a manufacturing viewpoint, cold working has a number of distinct advantages.<br/><br/>
<b>1.3.1 Advantages of cold working</b><br/>
1. No heating is required<br/>
2. Better surface finish is obtained<br/>
3. Better dimensional control is achieved; therefore no secondary machining is generally needed.<br/>
4. Products possess better reproducibility and interchangeability.<br/>
5. Better strength, fatigue, and wear properties of material.<br/>
6. Directional properties can be imparted.<br/>
7. Contamination problems are almost negligible.<br/><br/>
<b>1.3.2 Disadvantages of cold-working</b><br/>
1. Higher forces are required for deformation.<br/>
2. Heavier and more powerful equipment is required.<br/>
3. Less ductility is available.<br/>
4. Metal surfaces must be clean and scale-free.<br/>
5. Strain hardening occurs (may require intermediate annealing).<br/>
6. Undesirable residual stresses may be produced.
</p></dd><br/>
<dt><b><a name="comparison">1.4&nbsp;&nbsp;&nbsp;Comparison of Hot Working and Cold Working Process:</a></b></dt>
<dd><p>
<br/><center><table Border="1" cellspacing="0">
<tr><th>Features</th><th>Hot working</th><th>Cold working</th></tr>
<tr><td><b>Working temperature</b></td><td>Above recrystallization temperature</td><td>Below recrystallization temperature</td></tr>
<tr><td><b>Deforming possible</b></td><td>Significant without much of strain hardening</td><td>Strain-hardening occurs, making material brittle.</td></tr>
<tr><td><b>Formability</b></td><td>Easy working, low power capacity requirements even for bulk deformations</td><td>Higher energy requirements for forming</td></tr>
<tr><td><b>Mechanical properties and residual stresses</b></td><td>No effect on ultimate tensile strength, yield point, fatigue and hardness. No residual stresses introduced.</td><td>Increase in ultimate tensile strength, and hardness.</td></tr>
<tr><td><b>Refinement of crystal structure</b></td><td>Crystal structure refines</td><td>Recrystallization does not occur</td></tr>
<tr><td><b>Force required for deformation</b></td><td>Less</td><td>High</td></tr>
<tr><td><b>Equipment capacity requirement</b></td><td>Light equipment needed</td><td>Heavy and powerful equipment needed</td></tr>
<tr><td><b>Manual handling</b></td><td>Difficult due to higher temperatures of working</td><td>Easier to handle cold parts</td></tr>
<tr><td><b>Processes included</b></td><td>Hot forging, hot rolling,Hot extrusion, hot shearing, hot drawing</td><td>Easier to handle cold parts.</td></tr>
<tr><td><b>Surface finish</b></td><td>Poor due to oxidation and scaling</td><td>Residual stresses introduced. Good surface finish</td></tr>
<tr><td><b>Ductility</b></td><td>Nearly same</td><td>Reduced</td></tr>
<tr><td><b>Dimensional tolerance</b></td><td>Poor due to expansion during heating and contraction during cooling</td><td>Good</td></tr>
<tr><td><b>Strain hardening</b></td><td>No</td><td>Yes</td></tr>
<tr><td><b>Strength</b></td><td>Nearly same</td><td>Increased</td></tr>
</table><br/><b>Table 1: Comparison of Hot Working and Cold Working Process</b></center>
</p></dd><br/>
<dt><b><a name="warm">1.5&nbsp;&nbsp;&nbsp;Warm Working</a></b></dt>
<dd><p>
Metal deformation carried out at temperatures intermediate to hot and cold forming is called Warm Working. Compared to cold working, warm working offers several advantages. These include:<br/>
1. Lesser loads on tooling and equipment.<br/>
2. Greater metal ductility<br/>
3. Fewer number of annealing operation ( because of less strain hardening )<br/><br/>
<b>Compared to hot working, warm working offers the following advantages:</b><br/>
1. Lesser amount of heat energy requirement.<br/>
2. Better precision of components.<br/>
3. Lesser scaling on parts.<br/>
4. Lesser decarburization of parts.<br/>
5. Better dimensional control.<br/>
6. Better surface finish.<br/>
7. Lesser thermal shock on tooling.<br/>
8. Lesser thermal fatigue to tooling, and so greater life of tooling.
</p></dd><br/>
<dt><b><a name="applications">1.6&nbsp;&nbsp;&nbsp;Applications of formed products and major end use industries:</a></b></dt>
<dd><p>
<br/><center><table Border="1" cellspacing="0">
<tr><td>Aerospace</td></tr>
<tr><td>Aircraft Engines & Engine Parts</td></tr>
<tr><td>Airframes, Aircraft Parts & Auxiliary Equipment</td></tr>
<tr><td>Missiles and Missile Parts</td></tr>
<tr><td>Automotive and Truck</td></tr>
<tr><td>Off-Highway Equipment - Construction, Mining, and Materials Handling</td></tr>
<tr><td>Agricultural</td></tr>
<tr><td>Plumbing Fixtures, Valves and Fittings</td></tr>
<tr><td>Railroad</td></tr>
<tr><td>Mechanical power Transmission Equipment - Including Bearings</td></tr>
<tr><td>Internal Combustion Engines</td></tr>
<tr><td>Metalworking & Special Industry Machinery</td></tr>
<tr><td>Steam Engines and Turbines (except Locomotives)</td></tr>
<tr><td>Motorcycles, Bicycles and Misc. Equipment</td></tr>
<tr><td>Refrigeration and air-conditioning</td></tr>
<tr><td>Pumps and Compressors</td></tr>
<tr><td>Motors and Generators</td></tr>
<tr><td>Other</td></tr>
</table><br/><b>Table 2: Applications of formed products and major end use industries</b></center>
</p></dd>
<table width=1024><tr><td style="text-align:right; font-weight:bold;"><a href="Unit2lesson2.php" title="Forging Process">Lecture 2</a></td></tr></table>
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