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
<tr><td width="65%"><b>Lesson 8 Special Casting Processes (Permanent)</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/UNIT3/Lesson8/Unit3Lesson8.pdf" target="_blank" title="Download Lesson 8">Lesson 8 Download</a></td><td><b>Supplementary Material</b></td></tr>
<tr><td><a href="#permanent">8.1&nbsp;&nbsp;&nbsp;Permanent Mould Casting Processes</a></td><td>1. <a href="Unit3Lesson8faq.php">Frequently Asked Questions</a></td></tr>
<tr><td><a href="#basic">8.2&nbsp;&nbsp;&nbsp;Basic Permanent Mould casting process (also known as gravity die casting)</a></td><td>2. <a href="Unit3Lesson8scq.php">Self-check questions</a></td></tr>
<tr><td><a href="#die">8.3&nbsp;&nbsp;&nbsp;Die-Casting Process</a></td><td>3. <a href="Unit3Lesson8tq.php">Terminal questions</a></td></tr>
<tr><td><a href="#centrifugal">8.4&nbsp;&nbsp;&nbsp;Centrifugal Casting Process</a></td></tr>
<tr><td><a href="#slush">8.5&nbsp;&nbsp;&nbsp;Slush Casting</a></td></tr>
<tr><td><a href="#continuous">8.6&nbsp;&nbsp;&nbsp;Continuous Casting</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="permanent">8.1 Permanent Mould Casting Processes</a></b></dt>
<dd><p>
Economic disadvantage of expendable mould casting is that a new mould is required for every casting. The basic difference between sand casting and permanent mould casting is the use of metal (or permanent) mould, that is, the mould is not destroyed as in case of sand casting process and the same mould can be reused many times after cleaning for producing another casting.<br/><br/>
<b>The processes include</b>:<br/>
1. Basic permanent mould casting (Gravity Die Casting)<br/>
2. Pressure Die casting<br/>
3. Centrifugal casting.
</p></dd><br/>
<dt><a name="basic"><b>8.2 Basic Permanent Mould Casting Process</b> (also known as Gravity Die Casting)</a></dt>
<dd><p>
In permanent mould casting process, permanent moulds are used and the castings are made by pouring molten metal into the mould under the force of gravity. The process is normally used for cast iron and, occasionally, for a nonferrous casting. The permanent moulds are made from highly refractory materials (due to the very high pouring temperatures) or metal (steel or cast iron)
and given a refractory coating. The mould is provided with fins on its outer surface for efficient air-cooling. The inner surface of the mould cavity is sprayed with an oil-carbon-silica mixture before each pouring. Typically, permanent moulds constructed of two parts, similar to cope and drag as in case of sand casting and designed for easy, precise opening and closing. 
Permanent mould castings usually have better mechanical properties than sand castings because solidification is more rapid. Permanent mould casting process ensures product of good quality, uniform mechanical properties and better surface finish. Metal moulds usually are made of high-alloy iron or steel and have a production life of up to 1,20,000 or more castings. Typical products made by this process include
kitchenware, automobile pistons, pump bodies, and certain castings for aircraft and missiles. A typical permanent mould is shown in Figure 1 (a-d).<br/><br/>
<center><img src="images/mem/Unit3/Lesson2/1.jpg" width="650" height="320" /><br/>
<b>(a) permanent two piece mould is preheated and coated with silicon spray</b><br/><br/>
<img src="images/mem/Unit3/Lesson2/2.jpg" width="420" height="250" /><img src="images/mem/Unit3/Lesson2/3.jpg" width="420" height="350" /><br/>
<b>(b) cores (if used) are inserted and mould is closed, (c) molten metal is poured into the mould, where it solidifies</b><br/><br/>
<img src="images/mem/Unit3/Lesson2/4.jpg" width="450" height="250" /><br/>
<b>(d) Movable mould half section is moved back and the casting is obtained<br/><br/>
Figure 1: Steps in typical Permanent Mould Casting</b>
</center><br/>
<b>8.2.1 Steps involved in Permanent Mould Casting Process</b><br/>
1. The mould is preheated to 120-250<sup>o</sup>C and a refractory wash or mould coating is brushed or sprayed onto those surfaces of that will be in direct contact with the molten metal alloy.<br/>
2. Cores, if required, are inserted, and the mould is closed.<br/>
3. The molten metal alloy is poured into the mould through the gating system.<br/>
4. The casting is allowed to solidify, after solidification, the mould is opened and cores and other loose mould members are withdrawn and the casting is removed from the mould.<br/>
5. The conventional foundry practice is followed for trimming of gates and risers from the castings.<br/><br/>
<b>8.2.2 Advantages of Permanent Mould Casting Process</b><br/>
1. More rapid solidification caused by the cold metal mould results in castings finer grain structure, so castings with better strength.<br/>
2. Cast surfaces in permanent mould casting are generally smoother with better surface finish than sand castings and closer dimensional tolerances can be maintained. Eliminating some secondary finishing or polishing operations.<br/>
3. They do not ordinarily contain entrapped gases because no gasses are evolved (as in case of sand castings).<br/>
4. This process can be automated.<br/><br/>
<b>8.2.3 Limitations of Permanent Mould Casting Process</b>:<br/>
1. Generally limited to metals of lower melting point.<br/>
2. Simpler part geometries compared to sand casting because of need to open the mould.<br/>
3. High cost of mould process is best suited to high volume production.
</p></dd><br/>
<dt><b><a name="die">8.3 Die-Casting Process</a></b></dt>
<dd><p>
Die-casting is the process of making castings by using permanent moulds called die. (You should not confuse the term die used here with the die used in forging, extrusion and drawing processes.) This process is used for casting a low melting temperature material, e.g., aluminium and zinc alloys. The die used for diecastings
is very much similar to mould. Designed to hold and accurately close two mould halves and keep them closed while liquid metal is forced into cavity. Die-casting is similar to permanent mould casting except that the metal is injected into the mould under high pressure of 10-210 MPa instead being fed by
gravity. Pressure is maintained during solidification, then mould is opened and part is removed. Use of high pressure to force metal into die cavity is what distinguishes this from other permanent mould processes. This result in a more uniform structure, good surface finish and good dimensional accuracy. For many
parts, post-machining can be totally eliminated, or very light machining may be required to bring dimensions to size. The process, when applied to a plastic casting, is called injection moulding.<br/><br/>
<b>Die casting process can be classified into two types viz</b>.<br/>
1 Hot chamber die-casting process, and<br/>
2 Cold chamber die-casting process<br/><br/>
<b>8.3.1 Hot Chamber Die-Casting Process</b><br/>
The hot chamber die-casting process is shown in Figure 2 . When the piston is in the extreme left position, molten material in the hot chamber around the cylinder fills the cylinder (Figure 2 (a)).<br/>
<center><img src="images/mem/Unit3/Lesson2/5.jpg" width="700" height="300" /><br/>
<b>(a) Cycle in hot-chamber casting - with die closed and plunger withdrawn, <br/>molten metal flows into the cylinder</b><br/><br/>
<img src="images/mem/Unit3/Lesson2/6.jpg" width="700" height="300" /><br/>
<b>(b) Cycle in hot-chamber pressure die casting - piston forces metal in cylinder to flow into die (mould), <br/>maintaining pressure during cooling and solidification</b><br/><br/>
<img src="images/mem/Unit3/Lesson2/7.jpg" width="700" height="300" /><br/>
<b>(c) Cycle in hot chamber pressure die casting - piston is withdrawn back, movable die slides forward, <br/>casted product is ejected out by ejector pins<br/><br/>
Figure 2: Hot chamber Pressure Die-casting process</b>
</center><br/>
As the piston moves forward, the die cavity is filled under pressure (Figure 2 (b)). The metal is solidified quickly and casting is removed from the die. This is very fast process with up to 1000 cycles/hour are possible. The process is suitable for low melting temperature materials, i.e. zinc, tin, lead, and magnesium.<br/><br/>
<b>8.3.2 Cold chamber Die-Casting</b><br/>
The setup for cold chamber die-casting is shown in Figure 3. The process is very much similar to hot chamber die casting method. The molten material is fed into the cold cylinder chamber from where it is forced into the die cavity under pressure. Cold chamber die casting method is generally slower than hot chamber die casting method as pouring of molten metal is separate step.<br/><br/>
<center><img src="images/mem/Unit3/Lesson2/8.jpg" width="700" height="250" /><br/>
<b>(a) Cycle in cold-chamber casting - with die (mould) closed and piston withdrawn, <br/>molten metal is poured into the chamber/ cylinder</b><br/><br/>
<img src="images/mem/Unit3/Lesson2/9.jpg" width="700" height="250" /><br/>
<b>(b) Cycle in cold-chamber casting - piston forces metal to flow into die (mould), <br/>maintaining pressure during cooling and solidification</b><br/><br/>
<img src="images/mem/Unit3/Lesson2/10.jpg" width="700" height="250" /><br/><img src="images/mem/Unit3/Lesson2/11.jpg" width="350" height="105" /><br/>
<b>Figure 3: Cold chamber die-casting process</b>
</center><br/>
<b>Cold chamber die-casting differs from hot chamber die casting process in the following respects</b>:<br/>
1.Melting unit is not an integral part of the cold chamber die casting machine. Molten metal is brought and poured into the die-casting machine with the help of ladles (Figure3 (a)).<br/>
2.Molten metal poured into the chamber of cold chamber die casting machine is at lower temperature as compared to hot chamber die casting machine.<br/>
3.Pressure requirements in case of cold chamber die casting machine is higher than that of hot chamber die casting machine.<br/><br/>
<b>Note</b>: <i>Moulds for Die Casting. Mould usually made of tool steel, mould steel, etc. Tungsten and molybdenum (good refractory qualities) used to die cast steel and cast iron. Ejector pins required to remove part from die when it opens. Lubricants must be sprayed into cavities to prevent sticking.</i><br/><br/>
<b>8.3.3 Advantages of Die Casting Process in general</b><br/>
1. Economical for large production quantities<br/>
2. Good accuracy and surface finish<br/>
3. Thin sections are possible, as the liquid metal is forced into the die with high external pressure.<br/>
4. Rapid cooling provides small grain size and good strength to casting<br/><br/>
<b>8.3.4 Disadvantages of Die Casting Process in general</b><br/>
1. Generally limited to metals with low metal points<br/>
2. Part geometry must allow removal from die
</p></dd><br/>
<dt><b><a name="centrifugal">8.4 Centrifugal Casting Process</a></b></dt>
<dd><p>
A family of casting processes in which the mould is rotated at high speed so centrifugal force distributes molten metal to outer regions of die cavity. When a body rotates about an axis a centrifugal force is created, this centrifugal force is used in getting the shape of the final casting. Typical centrifugal casting equipment is shown in Figure 8. In centrifugal casting, a permanent metal mould
revolves at very high speeds in a horizontal, vertical or inclined position and the molten metal is poured. The poured molten metal is thrown on the walls of the mould cavity by centrifugal force. Centrifugal force is utilized to distribute liquid metal over the inner surfaces (walls) of the mould. The metal solidifies in the form of a hollow cylinder. Centrifugal castings can be made in almost any required
length, thickness and diameter. The cylinder wall thickness is controlled by the amount of liquid metal poured. The centrifugal force of this process keeps the casting hollow, eliminating the need for cores. Using centrifugal casting process it is possible to produce castings of good quality, dimensional accuracy and external surface detail. Typical examples of the products manufactured by
this process include pipes, gun barrels, bushings, flywheel, pressure vessels.<br/><br/>
<b>Note</b>:<br/><i>
1. For producing a hollow part, the axis of rotation is placed at the centre of the desired casting.<br/>
2. The speed of rotation is maintained high so as to produce a centripetal acceleration of the order of 60g to 15g.<br/>
3. The centrifuge action segregates the less dense nonmetallic inclusions near the centre of rotation. It should be noted that the casting of hollow parts needs no core in this process.<br/>
4. Solid parts can also be cast by this process by placing the entire mould cavity on one side of the axis of rotation.</i><br/><br/>
<b>2.4.1 Advantages of Centrifugal Casting Process</b><br/>
1. The castings, produced by this method, are very dense.<br/>
2. By having several mould cavities, more than one casting can be made simultaneously.<br/>
3. Hollow sections can be obtained without using Cores.<br/><br/>
<center><img src="images/mem/Unit3/Lesson2/12.jpg" width="750" height="200" /><br/>
<b>(a) Setup for Horizontal or True Centrifugal casting process</b><br/><br/>
<img src="images/mem/Unit3/Lesson2/13.jpg" width="300" height="120" /><br/>
<b>(b) Casted Pipe obtained from true centrifugal casting process (axi-symmetric and fully hollow)</b><br/><br/>
<img src="images/mem/Unit3/Lesson2/14.jpg" width="650" height="520" /><br/><img src="images/mem/Unit3/Lesson2/15.jpg" width="550" height="400" /><br/><br/>
<b>(c) Inclined Centrifugal Casting Process (i) Metal is being poured into the rotating mould and metal is<br/>
getting slashed along the walls (ii) Metal solidified along the walls providing the hollow casting</b><br/><br/>
<img src="images/mem/Unit3/Lesson2/16.jpg" width="600" height="240" /><br/>
<b>(d) Different shapes that can be obtained from various centrifugal casting process, <br/>(i) semi centrifugal casting process and (ii) Centrifuge Casting Process
<br/><br/>Figure 4: Centrifugal casting process</b>
</center><br/>
Depending on the method of feeding metal in to mould and location of mould with respect to axis of mould rotation, centrifugal casting process can be classified into following categories:<br/>
(i) <b>True Centrifugal Casting</b> (Figure 4 (a)) - The axis of rotation of the mould and that of the casting is same and horizontal. The casting produced is always centrally hollow and is made exclusively under the effect of centrifugal force.<br/>
<b>Items produced by this process are: Cast iron pipes, tubes, bushings, rings</b>.<br/><br/>
(ii) <b>Semi-Centrifugal Casting</b> (Figure 4 (d-(i))) - The component cast is usually large and has rotational symmetry as in case of pulleys, flywheels, discs. Casting is done in a mould rotating about its vertical axis. The castings made by this method need not be centrally hollow.<br/>
<b>Items produced by this process are: pulleys and wheels</b>.<br/><br/>
(iii) <b>Centrifuge casting</b> (Figure 4 (d (ii))) - In this case, the combined axis of rotation of the moulds (or the table carrying moulds) does not coincide with the axis of rotation of individual mould as the moulds are situated at a distance from the central axis of the mould table. In this process, a number of moulds are
placed around a vertical central sprue for feeding metal and are all connected to this central sprue. The table carrying moulds is rotated about the vertical axis of the sprue. The molten metal in the central sprue is fed to all the moulds under the effect of centrifugal force generated due to the rotation of the mould table. The
process of centrifuging or pressure casting is applied to the casting of nonsymmetrical objects such as <b>brackets, bearing caps</b>.
</p></dd><br/>
<dt><b><a name="slush">8.5 Slush Casting</a></b></dt>
<dd><p>
Slush Casting is a special type of permanent mould casting, where the molten metal is not allowed to completely solidify. A slush casting is produced by pouring the liquid material into an open-top permanent mould, after the desired wall thickness is obtained, the mould is inverted therefore, not yet solidified molten
metal is drained out (Figure-5). This is useful for making shell-like ornamental objects from low melting point metals such as zinc, tin or lead alloys, for example, candlesticks, lamps, lamp base, toys, statues, masks. Low-meltingpoint metals such as lead, zinc, and tin are used. The exterior appearance is
important, but the strength and interior geometry of the casting are minor considerations.<br/><br/>
<center><img src="images/mem/Unit3/Lesson2/17.jpg" width="170" height="170" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="images/mem/Unit3/Lesson2/18.jpg" width="170" height="170" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="images/mem/Unit3/Lesson2/19.jpg" width="170" height="170" /><br/><b>Figure 5: Images depicting steps in Slush Casting Process</b></center>
</p></dd><br/>
<dt><b><a name="continuous">8.6 Continuous Casting</a></b></dt>
<dd><p>
Continuous casting process can be used for producing castings of large length with a uniform cross-section. In this process continuous pouring of molten metal into a horizontal or vertical mould (pouring die) opened at both ends, cooling it there rapidly till metal solidifies and removing the solidified product in a
continuous form from the other end of the mould (Figure 6). Cooling jacket are made, sometimes, integral with the furnace. It also incorporates an integrated valve to stop the metal flow into the mould when desired. The molten metal flows into the mould from below the metal surface so that impurities are not included in
it. As it flows down it is cooled rapidly by quick dissipation of heat by the circulating water in the jacket around the metal mould. Withdrawing rolls below the mould help in pulling down the solidified casting at a controlled speed. A saw is fitted to cut the casting into desired lengths. The shapes that can be produced
by this process include square, rectangular, hexagonal etc. The process is used now-a-days to produce blooms, billets, slabs and tubings of very long lengths directly from molten metal in steel plants replacing the traditional casting of ingots in separate moulds and later convert them into blooms or billets. The process of
continuous casting is largely used for casting steel, brass, copper, bronze, aluminium, grey cast iron and alloy cast iron.<br/><br/>
<center><img src="images/mem/Unit3/Lesson2/20.jpg" /><br/><b>Figure 6: Continuous Casting Process</b></center>
</p></dd><br/>
<table Border="1" cellspacing="0"><tr><th colspan="3">Summary of casting process</th></tr>
<tr><th style="text-align:left;">Process</th><th>Advantages</th><th>Limitations</th></tr>
<tr><th style="text-align:left;">Sand</th><td>Almost any metal can be cast; no limit to part size, shape, or weight; low tooling cost.</td>
<td>Some finishing required; relatively bcoarse surface finish; wide tolerances.</td></tr>
<tr><th style="text-align:left;">Shell mould</th><td>Good dimensional accuracy and surface finish; high production rate.</td>
<td>Part size limited; expensive pattern and equipment.</td></tr>
<tr><th style="text-align:left;">Evaporative pattern</th><td>Most metal can be cast, with no limit to size; complex part shapes.</td>
<td>Patterns have low strength and can be costly for low quantities</td></tr>
<tr><th style="text-align:left;">Plaster mould</th><td>Intricate part shapes; good dimensional accuracy and surface finish; low porosity.</td>
<td>Limited to non-ferrous metals; limited part size and volume for production; mould making time relatively long.</td></tr>
<tr><th style="text-align:left;">Ceramic mould</th><td>Intricate part shapes; close tolerance parts; good surface finish.</td><td>Limited part size.</td></tr>
<tr><th style="text-align:left;">Investment</th><td>Intricate part shapes; excellent surface finish; almost any metal can be cast.</td>
<td>Part size limited; expensive pattern, moulds and labour.</td></tr>
<tr><th style="text-align:left;">Permanent mould</th><td>Good surface finish and; dimensional accuracy; low porosity; high production rate.</td>
<td>High mould cost; limited part shape and complexity; not suitable for high melting point metals.</td></tr>
<tr><th style="text-align:left;">Die</th><td>Excellent dimensional accuracy and surface finish; high production rate.</td>
<td>High die cost; limited part size; generally limited to non-ferrous metals; long lead time.</td></tr>
<tr><th style="text-align:left;">Centrifugal</th><td>Large cylindrical or tubular parts with good quality; high production rate.</td>
<td>Expensive equipments; limited part shape.</td></tr></table><br />
</div>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit3lesson7.php" title="Special Casting Processes (Expendable)">Lecture 7</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit3lesson9.php" title="Types of Moulding Methods and Moulding Machines">Lecture 9</a></td></tr></table>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>