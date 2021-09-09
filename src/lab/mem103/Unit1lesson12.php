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
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table border="0" width="100%">
<tr><td width="65%"><b>Lesson 12 WOOD WORKING</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Unit1Lesson12.pdf" target="_blank" title="Download Wood Working">Lesson 12 Download</a></td></tr>
<tr><td><a href="#introduction">12.0&nbsp;&nbsp;&nbsp;Introduction</a></td></tr>
<tr><td><a href="#forms">12.1&nbsp;&nbsp;&nbsp;Forms of Timber</a></td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.1.1&nbsp;&nbsp;&nbsp;Natural Timber</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.1.2&nbsp;&nbsp;&nbsp;Reconstituted Board</td></tr>
<tr><td><a href="#categories">12.2&nbsp;&nbsp;&nbsp;Categories of Timber</a></td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.2.1&nbsp;&nbsp;&nbsp;Softwoods</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.2.2&nbsp;&nbsp;&nbsp;Hardwoods</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.2.2.1&nbsp;&nbsp;&nbsp;Evergreen Hardwoods</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.2.2.2&nbsp;&nbsp;&nbsp;Deciduous Hardwoods</td></tr>
<tr><td><a href="#comparison">12.3&nbsp;&nbsp;&nbsp;Comparison between Softwood and Hardwood</a></td></tr>
<tr><td><a href="#structure">12.4&nbsp;&nbsp;&nbsp;Structure</a></td></tr>
<tr><td><a href="#defects">12.5&nbsp;&nbsp;&nbsp;Defects</a></td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.5.1&nbsp;&nbsp;&nbsp;Shrinkage</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.5.2&nbsp;&nbsp;&nbsp;Cupping</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.5.3&nbsp;&nbsp;&nbsp;Knots</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.5.4&nbsp;&nbsp;&nbsp;Splits</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.5.5&nbsp;&nbsp;&nbsp;Wind or Twisting</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.5.6&nbsp;&nbsp;&nbsp;Bow</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.5.7&nbsp;&nbsp;&nbsp;Spring</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.5.8&nbsp;&nbsp;&nbsp;Shakes</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.5.8.1&nbsp;&nbsp;&nbsp;Heart Shakes</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.5.8.2&nbsp;&nbsp;&nbsp;Star Shakes</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.5.8.3&nbsp;&nbsp;&nbsp;Radial Shakes</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.5.8.4&nbsp;&nbsp;&nbsp;Cup Shakes</td></tr>
<tr><td><a href="#some">12.6&nbsp;&nbsp;&nbsp;Some other defects</a></td></tr>
<tr><td><a href="#preservation">12.7&nbsp;&nbsp;&nbsp;Preservation of Timber</a></td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.7.1&nbsp;&nbsp;&nbsp;Tarring</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.7.2&nbsp;&nbsp;&nbsp;Charring</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.7.3&nbsp;&nbsp;&nbsp;Painting</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.7.4&nbsp;&nbsp;&nbsp;Creosoting</td></tr>
<tr><td><a href="#preservatives">12.8&nbsp;&nbsp;&nbsp;Preservatives</a></td></tr>
<tr><td><a href="#seasoning">12.9&nbsp;&nbsp;&nbsp;Seasoning of Timber</a></td></tr>
<tr><td><a href="#methods">12.10&nbsp;&nbsp;&nbsp;Methods of Seasoning</a></td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.10.1&nbsp;&nbsp;&nbsp;Natural Seasoning</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.10.1.1&nbsp;&nbsp;&nbsp;Air Seasoning</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.10.1.2&nbsp;&nbsp;&nbsp;Water Seasoning</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.10.2&nbsp;&nbsp;&nbsp;Artificial Seasoning</td></tr>
<tr><td><a href="#types">12.11&nbsp;&nbsp;&nbsp;Types of Artificial Seasoning Process</a></td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.11.1&nbsp;&nbsp;&nbsp;Water Seasoning</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.11.2&nbsp;&nbsp;&nbsp;Kiln Seasoning</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.11.3&nbsp;&nbsp;&nbsp;Boiling Seasoning</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.11.4&nbsp;&nbsp;&nbsp;Chemical Seasoning</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.11.5&nbsp;&nbsp;&nbsp;Electrical Seasoning</td></tr>
<tr><td><a href="#painting">12.12&nbsp;&nbsp;&nbsp;Painting and Varnishing</a></td></tr>
<tr><td><a href="#plywood">12.13&nbsp;&nbsp;&nbsp;Plywood</a></td></tr>
<tr><td><a href="#glue">12.14&nbsp;&nbsp;&nbsp;Glue/Adhesives</a></td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.14.1&nbsp;&nbsp;&nbsp;Animal glue</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.14.2&nbsp;&nbsp;&nbsp;Liquid glue</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.14.3&nbsp;&nbsp;&nbsp;Casein glue</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.14.4&nbsp;&nbsp;&nbsp;Vegetable glue</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.14.5&nbsp;&nbsp;&nbsp;Egetable-protein glue</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.14.6&nbsp;&nbsp;&nbsp;Blood albumin glue</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;</td></tr>
<tr><td><b>WOOD WORKING TOOLS</b></td></tr>
<tr><td><a href="#wood">12.15&nbsp;&nbsp;&nbsp;Wood Working Tools</a></td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.15.1&nbsp;&nbsp;&nbsp;Workbench</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.15.2&nbsp;&nbsp;&nbsp;Marking tools</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.15.3&nbsp;&nbsp;&nbsp;Cutting tools</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.15.4&nbsp;&nbsp;&nbsp;Boring tools</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.15.5&nbsp;&nbsp;&nbsp;Planing tools</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.15.6&nbsp;&nbsp;&nbsp;Fixing tools</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.15.7&nbsp;&nbsp;&nbsp;Screws and their uses</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.15.8&nbsp;&nbsp;&nbsp;Types of screw</td></tr>
<tr><td> &nbsp;&nbsp;&nbsp;12.15.9&nbsp;&nbsp;&nbsp;Nails and their uses</td></tr>
</table><br/></div>
<div>
<dt><b><a name="introduction">12.0 &nbsp;&nbsp;&nbsp;Wood Working</a></b></dt>
<dd><p>
Wood is a composite of cellulose. Cellulose fibers are strong in tension and are flexible. Dry wood is primarily composed of cellulose, lignin, hemicelluloses, and minor amounts (5% to 10%) of irrelevant materials. Cellulose, the major component, constitutes approximately 50% of wood substance by weight.<br/>
<b>Wood</b> is the hard, fibrous substance that forms the major part of the trunk and branches of a tree.<br/>
<b>Lumber</b> is wood that has been cut and surfaced for use in construction work.<br/>
<b>Timber</b> is lumber that is 5 inches or more in both thickness and width.
</p></dd><br/>
<dt><b><a name="forms">12.1 &nbsp;&nbsp;&nbsp;Forms of Timber</a></b></dt>
<dd><p>
<b>12.1.1 Natural Timber</b><br/>
The word timber is derived from a Saxon word "timbrian" meaning to build. Timber is derived from deciduous trees (broad leaved trees) or Conifers trees (cone bearing trees). Natural wood is a tough material and in a tree the fibers run the length of the trunk.<br/><br/>
<b>12.1.2 Reconstituted Board</b><br/>
Reconstituted board are made mechanically from wood and various forms of it are plywood, block board, chip board, MDF.
</p></dd><br/>
<dt><b><a name="categories">12.2 &nbsp;&nbsp;&nbsp;Categories of Timber</a></b></dt>
<dd><p>
<b>12.2.1 Softwoods</b>: Softwoods come from cone bearing trees (conifer trees). They are generally evergreen and have easily recognizable needle-like leaves. They are generally softer than hardwoods, hence their name. Soft woods are very strong for direct pull but are weak in resisting shear or thrust. They grow much quicker than hardwoods and are cheaper, softer and easier to work. Their seeds are held in cones. Common examples are:- Pine, Spruce, Cedar, Yew and Redwood.<br/><br/>
<b>12.2.2 Hardwoods</b>: Hard woods are obtained from the plants, which have seeds protected by an enclosing cover or board leaved trees constitute a section e.g. acorns. The older, inner layers of wood are hard and compact and form the heartwood of the tree. The newer, outer layers or sapwood are more open in structure. Hard woods are capable of resisting tension, compression and shear equally well.<br/><br/>
<b>12.2.2.1. Evergreen hardwoods</b>: These are trees that keep their leaves all the year round. They are softer and grow quicker than deciduous trees. Examples:- Mahogany, Teak, African Walnut, Iroko, Afrormosia, Ebony and Balsa.<br/><br/>
<b>12.2.2.1. Deciduous Hardwoods</b>: These are the trees that lose their leaves in winter. Examples:- Oak, Ash, Elm, Beech, Birch, Walnut, Sycamore, Chestnut and Lime.
</p></dd><br/>
<dt><b><a name="comparison">12.3 &nbsp;&nbsp;&nbsp;Comparison between Softwood and Hardwood</a></b></dt>
<dd><p><br/>
<center><table border="1" cellspacing="0" width="600"><tr><td><b>Characteristics</b></td><td><b>Soft Wood</b></td><td><b>Hard Wood</b></td></tr>
<tr><td>Colour</td><td>Light in colour</td><td>Dark in colour</td></tr>
<tr><td>Weight</td><td>Light in weight</td><td>Heavy in weight</td></tr>
<tr><td>Workability</td><td>Easy to be worked</td><td>Difficult to be worked</td></tr>
<tr><td>Types of texture</td><td>It has straight fibres, and fine texture</td><td>It has compact and close fibres</td></tr>
<tr><td>Temperature</td><td>It cannot withstand high temperature</td><td>It can withstand high temperature comparatively</td></tr>
<tr><td>Durability</td><td>Less durable</td><td>More durable</td></tr>
<tr><td>Ability to retain shape</td><td>It gets splitted quickly</td><td>It does not split quickly</td></tr>
<tr><td>Resistance to fire</td><td>It catches fire easily</td><td>It does not catch fire easily</td></tr>
<tr><td>Resistance to tensile stress</td><td>It has a good tensile resistance</td><td>It also has good tensile resistance</td></tr>
</table></center>
</p></dd>
<dt><b><a name="structure">12.4 &nbsp;&nbsp;&nbsp;Structure</a></b></dt>
<dd><p>
The different parts are:<br/>
<center><img src="images/mem/Unit4/Lesson1b/1.jpg" width="400"><br/><b>Figure: 1</b></center>
1. <b>Pith</b>: The innermost part or core of a tree varying in size and shape according to the species is called the pith. This part entirely consists of tissues which are cellular.<br/><br/>
2. <b>Heartwood</b>: Round the pith is a heartwood. This consists of woody fibres arranged in rings. It is dark in colour, strong, compact and durable.<br/><br/>
3. <b>Medullary rays</b>: The thin fibres, which extend from the pith outwards and hold the annular rings together, are called medullary rays.<br/><br/>
4. <b>Sapwood</b>: Sapwood or alburnum consists of' the outer annular rings. The annular rings of the heartwood are sharply defined from the annular rings of sapwood which are immature woody fibre recently deposited. Sap circulates in an upward direction through sapwood.<br/><br/>
5. <b>Cambium layer</b>: The thin layer below the bark, which is not yet converted into sapwood, is known as cambium layer. The cambium layer is protected from injury by the inner bark.<br/><br/>
6. <b>Inner bark and outer bark</b>: The outermost cover of the stem is called the bark, which consists of cells of wood fibre.
</p></dd><br/>
<dt><b><a name="defects">12.5 &nbsp;&nbsp;&nbsp;Defects</a></b></dt>
<dd><p>
<b>12.5.1 Shrinkage</b><br/>
When timber is seasoning and it's moisture content (MC) is reduced below the Fibre Saturated Point (FSP) continued drying will cause dramatic change such as increase in strength but also distortion and shrinkage. Shrinkage is the greatest tangentially over the radial direction with little loss along the length of the board, etc.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/2.jpg" width="400"><br/><b>Figure 2: Shrinkage defect</b></center>
<b>12.5.2 Cupping</b><br/>
Because of this varying shrinkage rates tangential boards tend to cup because of the geometry of the annual rings shown on the end grain. Therefore they will be more shrinkage at these parts than the others ~ cupping is the result.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/3.jpg" width="400"><br/><b>Figure 3: Cupping defect</b></center>
<b>12.5.3 Knots</b><br/>
Knots are the result of the trees attempt to make branches in the early growth of the tree. They are the residue of a small twig, shoot, etc. that died or was broken off by man or an animal in the wood or forest. The more knots the less the quality.<br/>
<center><img src="images/mem/Unit4/Lesson1b/4.jpg" width="300"><br/><b>Figure 4: Knots</b></center>
<b>12.5.4 Splits</b><br/>
A separation of the wood fibres along the grain forming a fissure that extends through the board from one side to the other. It is usual in end grain and is remedied by cutting away the defected area.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/5.jpg" width="300"><br/><b>Figure 5: Splits</b></center>
<b>12.5.5 Wind or twisting</b><br/>
Spiral or corkscrew distortion in a longitudal direction of the board. Due to the board being cut close to the centre of the tree which has spiral grain. The board is of not much use but small cuttings may be obtained from it with careful selection.<br/>
<center><img src="images/mem/Unit4/Lesson1b/6.jpg" width="300"><br/><b>Figure 6: Wind or twisting defect</b></center>
<b>12.5.6 Bow</b><br/>
Bowing is concave/convex distortion along the length of the board. It is a seasoning and or storage defect caused by the failure to support the board with stickers at sufficient intervals.<br/>
<center><img src="images/mem/Unit4/Lesson1b/7.jpg"><br/><b>Figure 7: Bow defect</b></center>
<b>12.5.7 Spring</b><br/>
Spring is concave/convex distortion along the length of the board again but this time the distortion is in the flat plane of the board. Boards with this defect may have been cut from near the heart of the board and is the result of growth stresses being released on conversion.<br/>
<center><img src="images/mem/Unit4/Lesson1b/8.jpg"><br/><b>Figure 8: Spring defects</b></center>
<b>12.5.8 Shakes</b><br/>
Ruptures are defects caused by the crushing of wood fibres at places. The defects due to rupture of tissues are:<br/>
(i) Heart shakes<br/>
(ii) Star shakes<br/>
(iii) Radial shakes<br/>
(iv) Cup shakes<br/>
<center><img src="images/mem/Unit4/Lesson1b/9.jpg" width="600"><br/><img src="images/mem/Unit4/Lesson1b/10.jpg" width="500"><br/>
<b>Figure 9: Different types of shakes</b></center><br/>
<b>12.5.8.1 Heart shakes</b>: Heart shakes are splits radiating from the centre.<br/><br/>
<b>12.5.8.2 Star shakes</b>: Star shakes are radial splits which are wider on the outside of the log and get narrower towards the pith. They are chiefly confined to sap wood.<br/><br/>
<b>12.5.8.3 Radial shakes</b>: Radial shakes arc similar to star shakes. This is due to uneven shrinkage of inner and outer parts of' timber.<br/><br/>
<b>12.5.8.4 Cup shakes</b>: Cup shakes are the splits between annual rings. They are caused sap freezing its ascent in the tree.
</p></dd><br/>
<dt><b><a name="some">12.6 &nbsp;&nbsp;&nbsp;Some other defects</a></b></dt>
<dd><p>
<b>Bow</b>: Warp on the face of a board from end to end.<br/>
<b>Cup</b>: Hollow across the face of a board.<br/>
<b>Crook</b>: Warp along the edge line; also known as crown.<br/>
<b>Knot</b>: A tight knot is usually not a problem; a loose or dead knot, surrounded by a dark ring, may fall out or may have already left a hole.<br/>
<b>Split</b>:Crack going all the way through the piece of wood, commonly at the ends.<br/>
<b>Twist</b>: Multiple bends in a board.<br/>
<b>Check</b>: Crack along the wood's annual growth rings, not passing through the entire thickness of the wood.<br/>
<b>Shake</b>: Separation of grain between the growth rings, often extending along the board's face, and sometimes below its surface.<br/>
<b>Wane</b>: Missing wood or untrimmed bark along the edge or corner of the piece.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/11.jpg" width="600"><br/><img src="images/mem/Unit4/Lesson1b/12.jpg" width="500"><br/>
<img src="images/mem/Unit4/Lesson1b/13.jpg" width="500"><br/><b>Figure 10: Some other defects</b></center>
</p></dd>
<dt><b><a name="preservation">12.7 &nbsp;&nbsp;&nbsp;Preservation of timber</a></b></dt>
<dd><p>
The preservation of timber means the increase in the life of timber by making it immune to attack by fungi and insects. The objective of preservation is to increase the life and durability of timber, and maintenance of its properties. The general methods of preservation of timber are tarring, charring, painting and creosoting.<br/><br/>
<b>12.7.1 Tarring</b> consists in coating timber with coal tar put on hot. This is adopted for work of rough nature such as ends of doors and windows built into walls.<br/><br/>
<b>12.7.2 Charring</b> is applied to the surfaces of timber to be inserted in moist soil with the object of closing the external pores permanently. Timber must be previously well seasoned otherwise the confined moisture will cause decay.<br/><br/>
<b>12.7.3 Painting</b> consists in putting on three or four coats of an oil paint. The paint should be renewed from time to time.<br/><br/>
<b>12.7.4 Creosoting</b> consists in allowing timber to absorb creosote oil pumped under a high pressure of about 10 kg/cm<sup>2</sup> at a temperature of 100C in an air tight vacuum chambers for about 2 hours or as long as the timber will absorb the oil.
</p></dd><br/>
<dt><b><a name="preservatives">12.8 &nbsp;&nbsp;&nbsp;Preservatives</a></b></dt>
<dd><p>
Some chemicals which are easily soluble in water are used as preservatives. The main preservatives used for woodwork are paint, varnish, polish, tar oil, water-soluble chemical salts, organic solvent chemicals etc.The active agent in practically all preservatives is a specific poison for the fungi. Zinc
chloride, which is a colourless salt and which is readily soluble in water, is a good fungicide. A secondary agent in chemical preservatives is the water repellent.<br/>
<b>'ASCU'</b> is a special preservative which renders wood immune from attack by white ants.
</p></dd><br/>
<dt><b><a name="seasoning">12.9 &nbsp;&nbsp;&nbsp;Seasoning of Timber</a></b></dt>
<dd><p>
In order to increase the strength, durability, and toughness, the moisture is reduced. To prevent excessive shrinkage or swelling wood can be seasoned before it is finally put in to service. Seasoning minimizes the effect of subsequent moisture variations by adjusting the water content of wood as
nearly as possible to what would be obtained at the equilibrium level under exposure of average atmospheric conditions. More precisely wood is seasoned in order to make it.<br/>
i. Stable in dimensions<br/>
ii. Stronger and lighter<br/>
iii. Resistant to decay<br/>
iv. To take preservative paint or polish
</p></dd><br/>
<dt><b><a name="methods">12.10 &nbsp;&nbsp;&nbsp;Methods of Seasoning</a></b></dt>
<dd><p>
The following two methods are generally used for seasoning of timber:<br/>
1. Natural Seasoning<br/>
2. Artificial Seasoning<br/><br/>
<b>12.10.1 Natural seasoning</b>: Natural seasoning of wood can be further categorized in to two categories.<br/>
1. Air Seasoning<br/>
2. Water Seasoning<br/><br/>
<b>12.10.1.1 Air seasoning</b>: In air seasoning the wood is stocked suitably in open spaces and subjected to air-drying for a period of time extending up to one full cycle of weather conditions. In this process the balks of timber is rotected from the direct effect of sun and rain.<br/>
<center><img src="images/mem/Unit4/Lesson1b/14.jpg" width="420"><br/><b>Figure 11: Natural seasoning</b></center><br/>
<b>12.10.1.2 Water seasoning</b>: In water seasoning, the balks of wood are immersed in flowing water i.e. River and some artificial means, for 15 to 20 days.<br/><br/>
<b>12.10.2. Artificial seasoning</b>: In order to shorten the duration of the seasoning process, artificial seasoning is adopted. The following are the important reasons for artificial seasoning:<br/>
(1) To reduce the moisture content below that attainable in air drying or natural seasoning<br/>
(2) To remove the moisture more rapidly than can be done in air drying<br/>
(3) To reduce injuries that commonly occur in air drying such as checking honey combing, staining or insect attack<br/>
(4) To harden resin in resinous woods by evaporating the volatile matter<br/>
(5) To make the wood more suitable for gluing and painting.<br/>
<center><img src="images/mem/Unit4/Lesson1b/15.jpg" width="400"><br/><b>Figure 12: Artificial seasoning</b></center>
</p></dd>
<dt><b><a name="types">12.11 &nbsp;&nbsp;&nbsp;Types of Artificial seasoning process</a></b></dt>
<dd><p>
Artificial seasoning is of following types:<br/>
1. Water seasoning<br/>
2. Kiln seasoning<br/>
3. Boiling seasoning<br/>
4. Chemical seasoning<br/>
5. Electric seasoning<br/><br/>
<b>12.11.1 Water seasoning</b>: In water seasoning, the logs are wholly immersed in running water with the larger end of the log pointing upstream for about a month. Partial immersion should be avoided.<br/><br/>
<b>12.11.2 Kiln seasoning</b>:  Kilns are closed chambers in which air temperature, relative humidity and airflow can be controlled to dry timber to specified moisture content. In kiln seasoning, timber is subjected to heat in an oven. The drying of timber involves the passage of moisture from the interior to surface and evaporation of moisture from the surface.<br/><br/>
<b>12.11.3 Boiling seasoning</b>: In boiling process, timber is boiled in water or exposed to the action of steam for about four hours and then very slowly dried. In desiccating process, timber is arranged in a chamber and exposed to a current of hot air.<br/><br/>
<b>12.11.4 Chemical seasoning</b>: In chemical or salt seasoning, timber is soaked in an aqueous solution of a suitable salt known as urea and then removed and afterwards seasoned in the usual way.<br/><br/>
<b>12.11.5 Electrical seasoning</b>: In electrical seasoning, high frequency currents are used for seasoning of timber. Timber gets heated internally as the green timber offers less resistance to the flow of electric current; the moisture flows to the surface and the resistance increases as the wood dries. The electrical seasoning is the most rapid method.
</p></dd><br/>
<dt><b><a name="painting">12.12 &nbsp;&nbsp;&nbsp;Painting and Varnishing</a></b></dt>
<dd><p>
Paints and varnishes are used for following purposes:<br/>
i) For preservation of timber i.e. protection of wood surfaces from the moisture and atmospheric changes.<br/>
ii) For making the surface decorative.<br/>
<b>OIL PAINTS</b><br/>
Oil paint consists of following ingredients:<br/>
<b>Base</b>: It is the finely ground powder, which after mixing with the oil, is applied on surface. It is the body of the paint. It provides strength to the coated film of the paint.<br/>
<b>Vehicle</b>: It acts as carrier of base material and pigments. Because of the vehicle, the paint can stick to the surface on which it is applied. The commonly used vehicles are linseed oil- raw, single or double, boiled, refined etc., nut oil, stand oil.<br/>
<b>Pigments</b>: Pigments are used to impart the colour to the paints. They are available in the fine powder form. A good pigment is one which should not change its colour in course of time and when exposed to whether conditions.<br/>
<b>Solvent or Thiner</b>: It gives fluidity to the paint. Because of the solvent, the paint easily spreads on the surface on which it is applied. Addition of the much thiner to paint is avoided. Turpentine is mostly used as a thiner.<br/>
<b>Drier</b>: Because of the drier, the paint dries quickly. Metal compounds are used as drier. Red lead, Zinc sulphate, Lead oxides are used as drier. They are available in liquid forms or paste forms.
</p></dd><br/>
<dt><b><a name="plywood">12.13 &nbsp;&nbsp;&nbsp;Plywood</a></b></dt>
<dd><p>
Plywood come into general use for the manufacture of doors, panels, furniture, and packing cases. The main difference between solid timber and plywood products is that with the latter, there is no problem of cross-grained weakness. Plywood is made up of three or more layers. The central layer, called core, is usually thicker than the face veneers. The veneers glued at the top and bottom is called
as face ply. The finished sheets are trimmed to size and their surfaces scraped. The thickness of plywood is usually expressed in millimeters. In the manufacture of plywood, logs of suitable timber are softened by steaming then mounted on a machine rather similar to a large lathe, fitted with a long blade, which peels off lengths of veneer from the rotating log.
</p></dd><br/>
<dt><b><a name="glue">12.14 &nbsp;&nbsp;&nbsp;Glue/Adhesives</a></b></dt>
<dd><p>
Glue is a form of adhesive which is widely used in the construction of wood products. The glues most commonly used in wood working may be divided into following classes:<br/>
(a) Animal<br/>
(b) Liquid<br/>
(c) Casein<br/>
(d) Vegetable or starch<br/>
(e) Vegetable protein<br/>
(f) Blood albumin.<br/><br/>
<b>12.14.1 Animal Glue</b><br/>
Animal glues are made from bones, hide, and other waste parts of animals. These glues are often called the true glues because they harden on cooling whereas the synthetic resin cements harden on being heating. The point at which animal glues jellify can be retarded by the addition of suitable chemicals so that they can be purchased in solid, jelly, or in liquid condition.<br/><br/>
<b>12.14.2 Liquid glue</b><br/>
The commonly adopted liquid glues are known as fish glues, although some are made of other raw materials. The chief advantage of liquid glue is that it is available in a prepared form and is ready for immediate use. It remains in working condition as long as it is in the container.<br/><br/>
<b>12.14.3 Casein glue</b><br/>
The casein in sour milk is precipitated as curds, which are washed, dried, ground to powder and mixed with alkaline chemicals. Casein glues set partly by chemical action and partly by dispersion of water they contain. They are space filling to some extent, but joints, which have too thick a layer of glue, due to unevenness of the surfaces. Because of its alkaline nature, casein glue may cause a staining as it reacts with the acids in certain woods.<br/><br/>
<b>12.14.4 Vegetable glue</b><br/>
Starch is the fundamental material used in making of these glues. Starches made from corn, wheat, rice, potatoes and the cassava root are used. Vegetable glues make strong joints, are cheap, can be used cold and do not decay readily. The disadvantages of these glues are that they are viscous, are not water resistant, stain some kinds of wood and set relatively slowly. Vegetable glues are used extensively in plywood industry.<br/><br/>
<b>12.14.5 Vegetable-protein glue</b><br/>
Protein is the basic material used in making of these glues. Peanut meal and soyabean are typical representatives. Glue making properties and preparation and application are similar to those of casein glue. These are cheap and are used extensively in plywood industry.<br/><br/>
<b>12.14.6 Blood albumin glue</b><br/>
The albumin has the property of coagulating and setting firmly when heated to a temperature of about 70<sup>o</sup>C, after which it shows a marked resistance to the effect of water. The greatest draw-back to use of this glue is that they require hot pressing, have a relatively low dry strength and cannot be sold inthe dry mix form. This glue is used in plywood industry.
</p></dd><br/>
<dt><b><a name="wood">12.15 &nbsp;&nbsp;&nbsp;Wood Working Tools</a></b></dt>
<dd><p>
<b>1.15.1 Workbench</b><br/>
The workbench is the most important supporting tool of carpentry shop. Generally, the top of the bench is at a convenient height from the ground level. Generally it should be 850mm high, with the legs braced to prevent spreading. It should have a thick timber top to withstand hammer blows. Often there's a well of lighter timber in the middle, where tools can be placed.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/16.jpg" width="500" height="480"><br/><b>Figure 13: Workbench</b></center>
<b>12.15.2 MARKING TOOLS</b><br/>
<b>Pencils</b>: Pencils are not precise enough for most marking, but a package of cheap mechanical pencils is handy to have around and don't have to be sharpened.<br/><br/>
<b>Ruler</b>: A good metal ruler is handy for measuring and as a straightedge.<br/><br/>
<b>Folding Rule</b>: This is a wooden scale consisting of four pieces each 150 mm long joined together by hinges. The pieces can be folded to a length of 150 mm to be conveniently carried in pockets.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/17.jpg" width="400"><br/><b>Figure 14: Folding Rule</b></center>
<b>Woodworkers try-square</b>: The try square is used to mark perpendicular lines along the work piece with a pencil or scribing tool. The woodworkers try-square is composed of two main parts - the stock and the blade. The blade is made from hardened and tempered steel which makes is resistant to damage.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/18.jpg" width="250"><img src="images/mem/Unit4/Lesson1b/19.jpg"  width="470"><br/>
<b>Figure 15: Woodworkers try-square</b></center><br/>
<b>Sliding Bevel (Adjustable bevel)</b>: The Sliding Bevel is a tool similar to a try-square but it has an adjustable blade to set any inclination. It is used for testing wood or for setting out lines when the lines have to be at some angle other than 100.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/20.jpg"  width="250"><br/><b>Figure 16: Sliding Bevel</b></center><br/>
<b>Marking gauge</b>: The marking gauge is used for marking lines on wood parallel to an already planed edge or face. It consists of a wooden stem on which slides a wooden stock whose position on the stem can be set to the required distance by a screw. The wooden stem is provided with a steel point to scratch the surface of the job/work.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/21.jpg"><br/><b>Figure 17: Marking gauge</b></center>
<b>12.15.3 CUTTING TOOLS</b><br/>
<b>Chisels</b>: Chisels are used to produce desire shape and cavities in woodworking. Wood marker's chisels are made in variety of sizes, blade lengths. Chisels have handles and blades, which are shaped according to the work they have to do.<br/><br/>
Following are the types of chisels commonly used in woodworking:<br/>
<b>Firmer chisel</b>: The blade of firmer chisel is made of cast steel, rectangular in shape, and approximately 125 mm long. It is used for chipping away big pieces of unwanted wood; this chisel is always used with a wooden hammer.<br/><br/>
<b>Mortise chisel</b>: It has a thick blade, which will not spring, or break under the heavy strain needed for cutting the notch or mortise require to receive a tenon. To start a mortise, hold the chisel firmly in the left hand in a nearly vertical position, taking care to cut across the grain of wood with the flat side of the chisel along the end of the mortise. Strike the chisel with a mallet held in right hand. Mortise chisel is used for taking heavy and deep cuts for removing more stock.<br/><br/>
<b>Dovetail Chisel</b>: It has a blade with a beveled back, made by carbon steel. The beveled shape enables reduction of blade thickness on the sides due to which it can enter sharp corners to finish them. Dovetail chisel is generally used in making dovetail joint and sharp V grooves.<br/><br/>
<b>Long chisel</b>: It is used for paring, is operated by hand no mallet is used. It is useful for shaping and preparing surfaces of wood.<br/><br/>
<b>Socket chisel</b>: It has the blade and handle socket forged from one piece of steel. The end of the handle is inserted into the socket. It is usually used for heavy work where a hammer may be used to strike the hard end of the chisel handle.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/22.jpg" width="520"><br/><img src="images/mem/Unit4/Lesson1b/23.jpg"><br/><b>Figure 18: Types of chisel</b></center>
<b>Saws</b><br/>
<b>Handsaw</b> is general term that includes several types, such as the rip, crosscut, and the panel saw. They all look basically the same and their purpose is the cutting of timber from boards, and sometimes making larger joints. The handle of saw is normally made of beech wood or polypropylene and the blade is made from hardened and spring tempered tool steel.<br/><br/>
General types of saws used are :<br/>
<b>Ripsaw</b> is intended to cut along the grain. The front of the teeth are generally at right angles to the blade and pitched at between 85 and 10 degrees to the blade. Lengths are taken along the run of the teeth from one end to the other, and are generally from 60 to 70cm (24 to 28 in).<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/24.jpg" width="400"><br/><b>Figure 19: Ripsaw</b></center>
<b>Crosscut saws</b> differ from ripsaws in that the teeth are bevel-filed at an angle instead of being at 10 deg. Another way in which the crosscut saw teeth differ is that they are pitched so that the front of the tooth makes an angle of 75 to 80 deg. with the line of the teeth. Whatever the pitch, all teeth are pointed at 60 deg. The size of teeth varies from 6 to 12 points, and lengths of saw from 55 to 70cm.<br/><br/>
<b>Tenon saw</b> is used for finer work. These saw are stiffened along the back of the blade. The length of blade can range from 20cm upto 40cm. Teeth of Tenon saws are usually pitched at 75 deg., and small ones are bevel sharpened at about 60 deg. because they have to cut across the grain as well as with it. The teeth are very similar to equilateral triangles. As the tenon saw is used for fine work the blade is very thin.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/25.jpg"><br/><b>Figure 20: (a) Crosscut saw (b) Tenon saw</b></center>
<b>Panel Saw</b> (Handsaw) is used to make straight cuts in large pieces of sheet wood. The saw has a fine toothed crosscut for sawing plywood, thin wood and large joints. The blade is tapered from teeth to back to prevent sticking in kerf. Panel saw is from 45 to 60cm , and with smaller teeth of 10-12 points. Its teeth are pitched and bevelled as in the crosscut saw.<br/><br/>
<b>Compass saw</b> is used for the same type of work as the key-hole saw, but it is stronger. It has interchangeable blades of different sizes, which can be slipped into the handle and fixed by two screws.<br/><br/>
<b>Bow saw</b> is used for cutting open curves. It is extremely useful where a band saw is not available. Bow saws are also used for felling trees and branches of tree of smaller stem dimensions in the forests.<br/><br/>
<b>Padsaw</b> also known as a keyhole saw. Although intended primarily for cutting the straight sides of a keyhole, it can be used for any internal cut, straight or curved. The saw necessarily relies upon the stiffness of the blade to prevent it from buckling, but buckling can easily happen because of the narrowness of the <b>Log saw</b> is intended only for crosscutting logs, etc., and has a metal frame. The blade often has the lightning form of tooth shown and is fast cutting but leaves a ragged finish. This is unimportant for the purpose for which the saw is intended.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/26.jpg" height="170" width="200"><br/><b>Figure 21: Log saw</b></center>
<b>Two-man crosscut</b> is intended for sawing through large logs, and various pattern teeth are used. Each tooth pattern is claimed to have its own particular advantages, however this is often up to personal preference. Holes in the ends of the blade enable the handles to be fitted. Lengths can be from about 120 to 240 cm.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/27.jpg"><br/><b>Figure 22: Two-man crosscut</b></center>
<b>Coping Saw</b>: By turning the handle the tension of the blade can be slackened or increased. The blade can be revolved through any angle convenient for sawing. Normally it cuts on the pull stroke, but there are occasions when it is better to reverse the blade so that it cuts on the push.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/28.jpg" width="350"><br/><b>Figure 23: Coping Saw</b></center>
<b>Back saws</b> get their name from the steel or brass back. The heavy back gives the saw its weight which is useful when sawing wood. The weight of the saw along with the forward sawing motion allows the saw to cut through woods relatively easily. The two main types are the tenon saw and the dovetail saw.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/29.jpg" width="300"><br/><b>Figure 24: Back saws</b></center>
<b>Dovetail</b> saw is used for still finer work such as dovetails. It receives its name from the fact that it is generally used for forming dovetails.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/30.jpg"><br/><b>Figure: 25</b></center>
<b>12.15.4 BORING TOOLS</b><br/>
<b>Bradwal</b>: There are many ways of making holes in the wood, but the simplest way is to bore or drill the hole by means of bradwal. It consists of a bulbous handle with a ferrule and a simple cylindrical blade ( with a pin through it so that it will not pull out) sharpened to a chisel edge.The bradwal may be obtained in various sizes but the tool is not meant for boring holes more than 5 mm in diameter. It is very useful for soft woods.<br/>
<center><img src="images/mem/Unit4/Lesson1b/31.jpg"><br/><b>Figure 26: Bradwal</b></center>
<b>Gimlet</b>: gimlet useful for boring small holes in places where brace and bit are inconvenient. The gimlet has a screw feed which reduces the amount of pressure required.<br/>
<center><img src="images/mem/Unit4/Lesson1b/32.jpg" width="350"><br/><b>Figure 27: Gimlet</b></center>
<b>Brace (Breast Drill and Ratchet Bit)</b>: The breast drill and ratchet bit brace are used in boring and reaming holes and to drive screws, nuts, and bolts. The brace is used for holding any of the bits with a square shank. It has three jaws, which grip the end of the bit. The tool known as bit is held in spring jaws of the brace. The bit can be fixed into the jaws by the hollow nut or sleeve. The centre bit is a useful tool for boring holes in wood upto 5 cm thickness.<br/>
<center><img src="images/mem/Unit4/Lesson1b/33.jpg"><br/><b>Figure 28: Breast Drill and Ratchet Bit</b></center>
<b>Auger Bits</b>: It is a steel bar having a fluted body for half the length from the bottom and a screw point at the end. The auger bits are like a double centre bit for it has two scribers and two cutters. Augers are available to produce holes up to 25 mm diameter. It is made parallel in a helical form so as to clear the core cut from the wood and to form a guide to assist in keeping direction.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/34.jpg" width="400"><br/><b>Figure 29: Auger Bits</b></center>
<b>Countersinks</b>: Countersinks are intended for preparing the hole to receive at screw head. They are not boring tools. Reamers are bits used for increasing the size of holes. The screw driver bits enable to obtain more leverage than with ordinary, screw driver.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/35.jpg" width="500"><br/><b>Figure 30: Countersinks</b></center>
<b>12.15.5 PLANING TOOLS</b><br/>
The most commonly used tool by the carpenter is the jack plane, which is 38 cm long and 8 cm wide. These planes are used for smooth finishing of wooden planks Carpenter's plane is generally made of wooden body or are metal bodied. The jack plane is used for taking off a rough surface. There are two types of jack planes one wooden and other iron. Metal bodied bench planes are adjustable where as wooden bodied planes are fixed one.<br/><br/>
<b>Wooden Jack Plane</b><br/>
It is very commonly used in carpentry, because of its size, utility and versatility. The plane is made of beech wood. The blade is composed of a cutting blade and a cap or back iron which is made of wrought iron or mild steel and faced with cast steel. The blade is set at an angle of 450 to the sole. On cutting blade another blade is fixed known as back iron. It does not cut but provides support to the blade and its cutting edge.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/36.jpg"><br/><b>Figure 31: Wooden Jack Plane</b></center>
<b>Iron Jack Plane</b><br/>
This is the steel equivalent of the wooden plane. It is used for same purpose as the wooden jackplane, but iron jackplane is used for better finish and smoother operations. The body of this jackplane is made grey iron casting. The side and sole are machined and ground to the bright finish. Iron jackplane is available in different sizes.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/37.jpg"><br/><b>Figure 32: Iron Jack Plane</b></center>
<b>Smoothening plane</b><br/>
A shorter version of the steel jack plane. It is lighter and smaller than the jack plane. It is used for general work such as smoothing short pieces of wood i.e. surface of the wood is finished by means of the smoothening plane. This plane is about 23 cm long and its blade is 7 cm wide. Smoothing plane has straight cutting edge.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/38.jpg"><br/><b>Figure 33: Smoothening plane</b></center>
<b>12.15.6 FIXING TOOLS</b><br/>
<b>Screw drivers</b><br/>
In carpentry two sizes of screw drivers are used one about 40 cm long and the other about 23 cm. These lengths include the handle. In addition the tang the shoulder of the blade is let into the ferrule. Besides ordinary screw drivers, we have the spiral screw driver and the ratchet screw driver. (For detailed description please refer chapter handtools-screw drivers).<br/><br/>
<b>Hammers</b><br/>
The favorite type of hammer for carpenter is the claw hammer which is useful for extracting badly driven nails. The joiners use Warrington pattern hammer, whose cross pane or peen is useful for working in corners or as a lever. (For detailed description please refer chapter handtools-hammers).<br/><br/>
<b>Mallets</b><br/>
Mallets are hammers having woodeen heads. The usually adopted mallet is made of beech. The head has a tapered mortise to receive the shaft and as the hole is bigger on the outside there is no danger of the head flying off. The head is usually about 15 cm long by 12 cm by 8 cm. One face should be slightly convex for driving up framing.<br/>
<center><img src="images/mem/Unit4/Lesson1b/39.jpg"><br/><b>Figure 34: Mallets</b></center>
<b>12.15.7 Screws and their uses</b><br/>
Screws can provide a strong, neat fixing to walls, man-made board, timber and even concrete, provided you choose the right fixing for the job. The fixing is very strong and can be taken apart easily. The screw length should be about three times the thickness of the timber it is fixing in place. The thicker the screw, the greater the grip.<br/><br/>
<b>Screw drives</b><br/>
The two basic drive designs are single slot and crosshead, crossheads are normally either 'Philips' or 'Pozidrive', these require specific types of screwdriver although a Philips driver can be used on Pozidrive screws.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/40.jpg"><br/><b>Figure 35: Screw drives</b></center>
<b>Screw head shapes</b><br/>
<b>Countersunk head</b> - Head finishes below the surface; for general timber work. Round head - Head finishes above the surface; for thin sheet material and where the head should be seen.<br/><br/>
<b>Raised head</b> - Combination of countersunk and round head; for fixing hardware, where look is important and with cup washers for fixing thin sheets.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1b/41.jpg"><br/><b>Figure 36: From left to right: Countersunk, Round, and Raised</b></center>
Threading on the shank is designed specifically for wood; wood threads have a tapped screw while sheet-metal screws have mainly a parallel thread.<br/><br/>
<b>12.15.8 Types of screw</b><br/>
<center><img src="images/mem/Unit4/Lesson1b/42.jpg"><br/><b>Figure 37: Types of screw</b></center>
<b>Countersunk</b> - slot head: This can be used for general woodworking for example fitting hinges to doors. Because the screw is countersunk it can be tightened 'flush' to the surface of the material.<br/><br/>
<b>Crosshead</b> - Probably the most popular type of screw because the cross-shaped slot tends to prevent the screwdriver slipping.<br/><br/>
<b>Round head screw</b> - The top is rounded and sits out from the surface. These are used for fixing pieces of material together where countersunk holes are not being used. Round head screws can look quite decorative especially if they are made of brass.<br/><br/>
<b>Raised head</b> - This is a sort of hybrid from the last two. The top is slightly rounded and the base countersunk. It is most commonly used for fitting ironmongery, such as door handles.<br/><br/>
<b>Mirror screw</b> - As the name implies, this is most commonly used for fixing mirrors. It has a countersunk slotted screw, which is fixed first. A dome shaped chrome cover is then fastened into the top of the screw. When used for fixing mirrors or other fragile objects, a small rubber insert is set in the screw hole of the item to prevent the metal of the screw damaging it.<br/><br/>
<b>Coach screws</b> - This screw is used for heavy work, such as fencing or pergolas.<br/><br/>
<b>12.15.9 Nails and their uses</b><br/>
Using nails is an effective way of fixing or joining pieces of softwood together. Hardwoods can be difficult to join with nails as they tend to bend under the impact of the hammer. Below is a range of nails that can be used depending on the type of wood and the nature of the work to be attempted.<br/>
<b>Round wire nail</b> - This is used for general work. It is not attractive in shape and it can split wood when hammered in position.<br/>
<b>Floor brad</b> - This no head and is generally used for fixing glass to glass in wood frames.<br/>
<b>Oval brad</b> - This is a long nail and care must be taken when it is hammered into the wood. It is unlikely to split the wood.<br/>
<b>Panel pin</b> - A very popular way of joining woods although glue is usually included as part of the join.<br/>
<b>Veener pin</b> - Can be used for fixing textile materials to wood for example, fixing upholstery to furniture.<br/>
<center><img src="images/mem/Unit4/Lesson1b/43.jpg"><br/><b>Figure 38: Nails</b></center>
</p></dd>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit1lesson11.php" title="Smart Materials">Lecture 11</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit1lesson13.php" title="Wood Working Operations">Lecture 13</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>