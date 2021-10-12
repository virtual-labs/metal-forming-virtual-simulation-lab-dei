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
<tr><td width="60%"><b>Lesson 6 TYPES OF PATTERN</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Unit3Lesson6.pdf" target="_blank" title="Download Types of Pattern">Lesson 6 Download</a></td></tr>
<tr><td><a href="#introduction">6.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Introduction</a></td></tr>
<tr><td><a href="#pattern">6.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pattern Allowances</a></td></tr>
<tr><td><a href="#codes">6.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Color Codes for patterns</a></td></tr>
<tr><td><a href="#design">6.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pattern Design Considerations</a></td></tr>
<tr><td><a href="#core">6.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Core</a></td></tr>
<tr><td><a href="#types">6.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Types of Cores</a></td></tr>
<tr><td><a href="#prints">6.7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Core Prints</a></td></tr>
<tr><td><a href="#boxes">6.8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Core Boxes</a></td></tr>
</table><br/></div>
<div>
<b>TYPES OF PATTERN</b><dt><br/>
<b><a name="introduction">6.1&nbsp;&nbsp;&nbsp;Introduction</a></b></dt>
<dd><p>
The types of pattern used for a specific application depends primarily on the number of castings required, the moulding or casting process to be used, the size of the pattern and the casting tolerances that are required.<br/><br/>
<b>The common types of pattern are listed and described below</b>:<br/>
(1) Solid or Single piece Pattern<br/>
(2) Split Pattern<br/>
(3) Match Plate Pattern<br/>
(4) Gated Pattern<br/>
(5) Cope and Drag Pattern<br/>
(6) Loose Piece Pattern<br/>
(7) Skeleton Pattern<br/>
(8) Sweep Pattern<br/>
(9) Left hand and Right hand Pattern<br/>
(10) Shell Pattern<br/>
(11) Segmental Pattern<br/>
(12) Follow Board Pattern<br/><br/>
<b>6.1.1 Solid or Single Piece Pattern</b><br/>
A single or solid piece pattern is made with out joints, loose pieces or partings. It has usually one board surface that serves as a parting surface in the mould. This type of pattern is used for a limited number of castings because most of the moulding operations like providing runners and risers, withdrawal of pattern etc. is done by hand. Soil temper glands of steam engines are made by solid or single piece pattern.<br/><br/>
<center><img src="images/mem/lesson7/1.jpg" /><img src="images/mem/lesson7/2.jpg" /><br/><b>Fig. 6.1 Single, solid pattern</b></center>
<b>6.1.2 Split Pattern</b><br/>
This type of pattern is used when the pattern if made is single piece will give rise to withdrawal difficulties from the mould. Split pattern consists of two pieces; one half of the pattern rests in the drag (lower part of the moulding box) and the other half in the cope (upper part of the moulding box).<br/><br/>
<center><img src="images/mem/lesson7/3.jpg" /><br/><b>Fig. 6.2 Split patterns</b></center><br/>
The split patterns are commonly used for the casting of steam valve bodies, small pulleys, wheels and cylinders etc.<br/><br/>
<b>6.1.3 Match Plate Pattern</b><br/>
It is split pattern in which the cope and drag portions are mounted on opposite side of a plate, called match plate, conforming to the parting line. The pattern, as well as the associated gating and rising system, is usually made separately and then mounted on match plate, but can be cast integrally with the plate. The size of the match plate corresponds to the size of the flask used to make the final mould. Multiple patterns of small parts can be mounted on a single match plate can often be shared by the multiple patterns on the match plate. Interlocking features can be added to the cope and drag sides of the match plate to ensure accurate alignment of the cope and drag mould halves after removal of the pattern.
Match plate pattern are used for moderate to high volume production of small and medium size castings with considerable dimensional accuracy.<br/><br/>
<center><img src="images/mem/lesson7/4.jpg" /><br/><br/><img src="images/mem/lesson7/5.jpg" /><br/><b>Fig. 6.3 Match plate pattern</b></center><br/>
Match plate pattern are used for moderate to high volume production of small and medium size castings with considerable dimensional accuracy.<br/><br/>
<b>6.1.4 Gated Pattern</b><br/>
The gated pattern is used for mass production. For small castings, multi cavity moulds are prepared i.e. single moulds carry a number of cavities. Each pattern may be provided with a gate pattern with it examples are Vice Handle, Nuts and bolts etc.<br/><br/>
<center><img src="images/mem/lesson7/6.jpg" /><br/>(a)<br/><br/><img src="images/mem/lesson7/7.jpg" /><br/>(b)<br/><br/><b>Fig. 6.4 Gated patterns</b></center>
<b>6.1.5 Cope and Drag Pattern</b><br/>
When large cavities are to be manufactured, the moulds are to be very heavy to handle. Separate pieces of pattern are made on a convenient joint line and mounted on boards with slots and holes provided with easier fittings. This arrangement helps the moulder to work on each piece separately. This ensures higher strength and durability.<br/><br/>
<b>6.1.6 Loose Piece Pattern</b><br/>
The loose piece pattern are needed when the casting is such that the pattern cannot be removed as one piece, even though the pattern is split and the parting line is made on more than one plane. In loose piece pattern the main pattern is removed first. Then the separate pieces which may have to be turned or moved before they can be taken out or removed.<br/><br/>
<center><img src="images/mem/lesson7/8.jpg" /><br/><b>Fig. 6.5 Loose piece pattern</b></center>
<b>6.1.7 Skeleton Pattern</b><br/>
For large castings pattern would require a considerable amount of timber for fully solid pattern. In such cases the pattern is made of wooden frame and rib construction so that it will form an exterior or interior outline of casting. This framework is known as skeleton. Skeleton patterns are generally employed for symmetrical castings. Castings, which are generally made by making skeleton pattern, are valve bodies, pipe bends, water pipes and boxes.<br/><br/>
<center><img src="images/mem/lesson7/9.jpg" /><br/><b>Fig. 6.6 Skeleton pattern</b></center>
<b>6.1.8 Sweep Pattern</b><br/>
Uniform moulds and cores are shaped by sweep pattern. The sweep pattern consists of a wooden board having a shape corresponding to the shape of desired casting. It is arranged to rotate about a central axis. The sand is rammed and the board is made to rotate to get the desired shape mould. Sweep pattern is used for manufacturing of circular parts. This method is very economical since no actual pattern is needed and the pattern costs are kept at minimum by eliminating expensive pattern construction.<br/><br/>
<center><img src="images/mem/lesson7/10.jpg" /><br/><b>Fig. 6.7 Sweep pattern</b></center>
<b>6.1.9 Left and Right Hand Pattern</b><br/>
Some patterns are required to be made in pairs and when their form is such that they can not be reversed and they have the centers of hubs etc, opposite and in line, they must be made left and right hand separately.<br/>
A pair of left and right hand patterns is required in legs of paddle type sewing machine, legs for wood turning lathe and legs of garden benches etc.<br/><br/>
<center><img src="images/mem/lesson7/11.jpg" /><br/><b>Fig. 6.8 Left and right pattern</b></center>
<b>6.1.10 Shell Pattern</b><br/>
Shell pattern is generally used for pipe work. This pattern is made of metal and its involves its mounting on a plate with a parting at the centre line and both the parts being pinned to each other. The shell pattern is a hollow construction like a shell. The outside shape is used as a pattern to make the mould while the inside is used as a core box for making cores.<br/><br/>
<center><img src="images/mem/lesson7/12.jpg" /><br/><b>Fig. 6.9 Shell pattern</b></center>
<b>6.1.11 Segmental Pattern</b><br/>
A segmental pattern resembles a sweep pattern in the sense that for getting the required shape, both employ a part of pattern and not the complete pattern. Both segmental and sweep patterns generate circular shapes. When a mould is to be made using this pattern, a vertical spindle is firmly fixed in the centre of lower moulding box. The mould bottom is rammed and swept level. The segmental pattern is fastened to the spindle. Moulding sand is rammed between the out side of the pattern and the flask and on the inside, except at the end of the pattern. After ramming one segment, next segment is rammed and so on until the entire perimeter of the mould is completed.<br/><br/>
<center><img src="images/mem/lesson7/13.jpg" /><br/><b>Fig. 6.10 Segmental pattern</b></center>
<b>6.1.12 Follow Board Pattern</b><br/>
Follow board is a wooden board and is used for supporting a pattern which is thin and which may give way and collapse under pressure when the sand above the pattern is being rammed. In some cases, the purpose of the follow board is not only to serve as a support to the thin pattern, but also forms an irregular parting line in the mould when the outlines of the pattern are irregular.<br/><br/>
<center><img src="images/mem/lesson7/14.jpg" /><br/><b>Fig. 6.11 Follow board pattern</b></center>
</p><br/></dd>
<dt><b><a name="pattern">6.2&nbsp;&nbsp;&nbsp;Pattern Allowances</a></b></dt>
<dd><p>
Pattern is used to produce a casting of desired dimensions; it is not dimensionally identical to the casting. A number of allowances must be made on the pattern to ensure that the finished casting is dimensionally correct, to ensure that the pattern can be effectively removed from the mould. The following allowances are usually provided in a pattern.<br/><br/>
<b>6.2.1 Shrinkage Allowance</b><br/>
The various metals used for casting contract after solidification. It is the correction factor built into the pattern to compensate for the contraction of the metal casting as it solidifies and cools at room temperature. The pattern is intentionally made larger than the final desired casting dimensions to allow for solidification and cooling contraction of casting. The total contraction is volumetric, but usually expressed linearly.<br/><br/>
<center><img src="images/mem/lesson7/15.jpg" /><br/><b>Fig. 6.12 Shrinkage Allowance</b></center><br/>
<b>Table 6.1 Shows typical pattern shrinkage allowances for various casting materials</b><br/><br/>
<center><table style="text-align:center">
<tr><th style="text-align:left" valign="top" width="150">Material being cast</th><th width="200">Shrinkage allowance<br/>(mm/ meter)</th><th>Approximate shrinkage,<br/>%</th></tr>
<tr><td style="text-align:left">Gray cast iron</td><td>10.5</td><td>1.0</td></tr>
<tr><td style="text-align:left">Steel</td><td>20 to 21</td><td>1.6</td></tr>
<tr><td style="text-align:left">Brass</td><td>16</td><td>1.4</td></tr>
<tr><td style="text-align:left">Aluminium</td><td>16</td><td>1.3</td></tr>
<tr><td style="text-align:left">Magnesium</td><td>18</td><td>1.3</td></tr>
<tr><td style="text-align:left">Ductile cast iron</td><td>-</td><td>0.8</td></tr>
</table><br/><b>Table 6.1 Typical pattern shrinkage allowances for various casting material</b></center><br/>
The contraction rule is a special scale that eliminates the need to compute the amount of the shrinkage allowance that must be provided on a given dimension. Each graduation on the shrink rule is proportionately longer than its conventional length. It is important to remember that pattern shrinkage allowances cannot be used to predict
actual casting shrinkage. Other factors, such as casting shape, section thickness and mould rigidity significantly influence the actual change in dimensions as the casting solidifies and cools to room temperature.<br/><br/>
<b>6.2.2 Draft Allowance</b><br/>
Draft is taper allowed on the vertical faces of a pattern to permit its removal from the sand with out tearing the moulding walls. It may be represented in millimeters per meter on a side or degrees. The amount of taper varies with the type of patterns.<br/><br/>
<center><img src="images/mem/lesson7/16.jpg" /><br/><b>Fig. 6.13 Draft Allowance</b></center><br/>
The wooden patterns require more taper than metallic patterns because of greater frictional resistance of the wooden surfaces. The amount of draft also depends on the shape and size of casting, the moulding process used, the method of mould production and the condition of pattern. The draft angle of approximately 1.50 is often added to design dimensions. Interior surfaces usually require more draft than exterior surfaces.<br/><br/>
<b>6.2.3 Machining Allowance</b><br/>
It provides for sufficient excess metal on all cast surfaces that require machining. The required machine allowance depends on following factors:<br/>
(1) The size and shape of casting.<br/>
(2) The metal to be casted.<br/>
(3) Casting surface roughness and surface defect.<br/>
(4) Method of machining to be employed.<br/>
(5) The degree of finish required on the machined portion.<br/><br/>
<center><img src="images/mem/lesson7/17.jpg" height="250" /><br/><b>Fig. 6.14 Machining Allowance</b></center><br/>
Accurate patterns combined with automated moulding can often produce close tolerance casting with a minimum finish allowance that can reduce machining cost.<br/><br/>
<b>Table 6.2 shows suggested machining allowances</b>.<br/><br/>
<center><table width="600" cellspacing="10" style="text-align:center">
<tr><th>Pattern size<br/>(mm)</th><th>Allowance<br/>(mm) Bore</th><th>Allowance<br/>(mm) Surface</th><th>Allowance (mm)<br/>Cope side</th><th>Material</th></tr>
<tr><td>Upto152</td><td>3.2</td><td>2.4</td><td>4.8</td><td>Cast iron</td></tr>
<tr><td>152-305</td><td>3.2</td><td>3.2</td><td>6.4</td><td>Cast iron</td></tr>
<tr><td>305-510</td><td>4.8</td><td>4.0</td><td>6.4</td><td>Cast iron</td></tr>
<tr><td>510-915</td><td>6.4</td><td>4.8</td><td>6.4</td><td>Cast iron</td></tr>
<tr><td>915-1524</td><td>7.9</td><td>4.8</td><td>7.9</td><td>Cast iron</td></tr>
<tr><td>Upto 152</td><td>3.2</td><td>3.2</td><td>6.4</td><td>Cast steel</td></tr>
<tr><td>152-305</td><td>6.4</td><td>4.8</td><td>6.4</td><td>Cast steel</td></tr>
<tr><td>305-510</td><td>6.4</td><td>6.4</td><td>7.9</td><td>Cast steel</td></tr>
<tr><td>510-915</td><td>7.1</td><td>6.4</td><td>9.6</td><td>Cast steel</td></tr>
<tr><td>915-1524</td><td>7.9</td><td>6.4</td><td>12.7</td><td>Cast steel</td></tr>
<tr><td>Upto 7.6</td><td>1.6</td><td>1.6</td><td>1.6</td><td>Non ferrous alloys</td></tr>
<tr><td>76-152</td><td>2.4</td><td>1.6</td><td>2.4</td><td>Non ferrous alloys</td></tr>
<tr><td>152-305</td><td>2.4</td><td>1.6</td><td>3.2</td><td>Non ferrous alloys</td></tr>
<tr><td>305-510</td><td>3.2</td><td>2.4</td><td>3.2</td><td>Non ferrous alloys</td></tr>
<tr><td>510-915</td><td>3.2</td><td>3.2</td><td>4.0</td><td>Non ferrous alloys</td></tr>
<tr><td>915-1524</td><td>4.0</td><td>3.2</td><td>4.8</td><td>Non ferrous alloys</td></tr>
</table><br/><b>Table 6.2 Machining allowances</b></center>
<b>6.2.4 Distortion Allowance</b><br/>
Certain cast shape, such as large flat plates and U shaped castings, sometimes distort when reproduced from straight or perfect patterns. This distortion is caused by the non-uniform contraction stresses during the solidification of irregularly shaped designs. Mechanically pressing or straighting normally corrects minor distortions. To eliminate this defect an opposite distortion is provided in the pattern, so that the effect is neutralized and the correct casting is obtained.<br/><br/>
<center><img src="images/mem/lesson7/18.jpg" /><br/><b>Fig. 6.15 Distortion Allowance</b></center>
<b>6.2.5 Rapping and Shaking Allowances</b><br/>
This allowance is provided in the pattern to compensate for the rapping of mould because the pattern is to be rapped before removing it from mould. As a result of this the size of the mould cavity increases a negative allowance is provided in the pattern to compensate the same. Small and medium size casting, this allowance can be neglected. But in large casting this allowance is considered by making the pattern slightly smaller than the casting.
</p><br/></dd>
<dt><b><a name="codes">6.3&nbsp;&nbsp;&nbsp;Colour Codes for Patterns</a></b></dt>
<dd><p>
Pattern colour coding is provided:<br/>
(1) To identify the type of metal to be casted.<br/>
(2) To show the part to be machined.<br/>
(3) To identify loose pieces, core prints.<br/>
(4) To identify the main part of the pattern from the remaining part.<br/>
(5) To show the part to be left un machined.<br/><br/>
<b>Table 6.3 shows the American colour coding.</b><br/><br/>
<center><table border="0" cellspacing="10">
<tr><th>S.No.</th><th>Colour</th><th>Part</th></tr>
<tr><th>1.</th><td>Red</td><td>Cast surface to be machined</td></tr>
<tr><th>2.</th><td>Black</td><td>Cast surface to be left un machined</td></tr>
<tr><th>3.</th><td>Yellow strip on<br/>black back ground</td><td>Core prints for un machined openings</td></tr>
<tr><th>4.</th><td>Black strip on yellow<br/>background (diagonal)</td><td>Supports, stops offs</td></tr>
<tr><th>5.</th><td>Yellow</td><td>Core prints seat</td></tr>
<tr><th>6.</th><td>Red strips on yellow<br/>background</td><td>Loose pieces</td></tr>
<tr><th>7.</th><td>Clear or no colour</td><td>Parting surfaces</td></tr>
</table><br/><b>Table 6.3 Pattern colours</b></center>
</p></dd>
<dt><b><a name="design">6.4&nbsp;&nbsp;&nbsp;Pattern Design Considerations</a></b></dt>
<dd><p>
A good pattern may produce a sound casting but a bad pattern will always result in poor castings. Following factors should be considered while designing a pattern:<br/>
(1) Pattern should be accurate as regard to its dimensions and possess a very good surface finish.<br/>
(2) Proper allowance should be provided in pattern.<br/>
(3) Sharp corners of pattern should be avoided.<br/>
(4) Core prints provided for the pattern should be of optimum in size.<br/>
(5) Changes made in the shape should be gradual, uniform and smooth.<br/>
(6) Proper material for making the pattern should be selected.<br/>
(7) The wall thickness and section should be kept uniform.<br/>
(8) Pattern made for expected repeat orders should be preserved and stored properly.
</p><br/></dd>
<dt><b><a name="core">6.5&nbsp;&nbsp;&nbsp;Core</a></b></dt>
<dd><p>
Core is defined as that portion of the mould, which forms the hollow interior of the casting or hole through the casting. Core can also be defined as a body of dry sand generally prepared separately in a core box, baked in an oven and used to form a cavity of desired shape.<br/><br/>
<center><img src="images/mem/lesson7/19.jpg" /><br/><b>Fig. 6.16 Core</b></center><br/>
The core should have sufficient strength and hardness in both green and dry states so that it may be able to support its own weight. The main characteristics required for a good core are the following:<br/>
(1) It should not carry any such constituents, which will give rise to excessive gases on coming in contact with the molten metal.<br/>
(2) It must be sufficiently permeable to allow the gases formed to escape easily.<br/>
(3) It should be highly refractory to withstand the high heat of the molten metal.<br/>
(4) It should be hard and strong enough to bear its own weight and the force of molten metal.
</p><br/></dd>
<dt><b><a name="types">6.6&nbsp;&nbsp;&nbsp;Types of Cores</a></b></dt>
<dd><p>
Following are the commonly used cores</b>:<br/>
<b>6.6.1 Horizontal Core</b><br/>
The horizontal cores are used in foundry work frequently. It is usually in a cylindrical form laid in the mould horizontally. Depending upon the shape of the cross section of the hole to be made in the casting, it may have any shape of its cross section. If it has a uniform cross section such that its one half remains in the cope and the remaining half in the drag. Horizontal core is commonly used for making through holes.<br/><br/>
<center><img src="images/mem/lesson7/20.jpg" /><br/><b>Fig. 6.17 Horizontal core</b></center>
<b>6.6.2 Vertical Core</b><br/>
It is similar in shape to that of horizontal core. But placed in the mould with its axis vertical. The upper end of the core is placed in cope and the lower end is placed in the drag.<br/><br/>
<center><img src="images/mem/lesson7/21.jpg" /><br/><b>Fig. 6.18 Vertical core</b></center>
<b>6.6.3 Balanced Core</b><br/>
When the casting has opening only on one side and only one core print is available on the pattern a balanced core is used. It is a horizontal core and used to produce a blind hole along a horizontal axis in the casting. It is supported only one end, the other end remaining free in the cavity of the mould.<br/><br/>
<center><img src="images/mem/lesson7/22.jpg" /><br/><b>Fig. 6.19 Balance core</b></center>
<b>6.6.4 Wire Core</b><br/>
It is used, when a hole is to be obtained in the casting either above or below the parting line. Wire core is also used when it is not possible to place the pattern in the mould such that the recess can be cored directly. One side of the core remains flush with the inner surface of the mould and the core acts as a stop off. Back surface of the core has sufficient taper for easy location.<br/><br/>
<center><img src="images/mem/lesson7/23.jpg" /><br/><b>Fig. 6.20 Wire core</b></center>
<b>6.6.5 Hanging Core</b><br/>
If the core hangs from the cope and does not have any support at the bottom in the drag, it is known as hanging core. A hanging core may be supported on a seat made on the parting surface in the drag.<br/><br/>
<center><img src="images/mem/lesson7/24.jpg" /><br/><b>Fig. 6.21 Hanging core</b></center>
</p><br/></dd>
<dt><b><a name="prints">6.7&nbsp;&nbsp;&nbsp;Core Prints</a></b></dt>
<dd><p>
Core prints are extra projections provided on the pattern. These form seats for cores in the mould. Core seats are provided to support all types of cores such as horizontal, vertical, balanced etc.<br/><br/>
<center><img src="images/mem/lesson7/25.jpg" /><br/><b>Fig. 6.22 Core prints</b></center>
</p><br/></dd>
<dt><b><a name="boxes">6.8&nbsp;&nbsp;&nbsp;Core Boxes</a></b></dt>
<dd><p>
Core boxes are used for producing cores. Following are the main types of core boxes</b>:<br/>
<b>6.8.1 Half core box</b><br/>
Half portion of the core is made in the core box at one time. Number of such half cores made backed and passed together to make full cores.<br/><br/>
<center><img src="images/mem/lesson7/26.jpg" /><br/><b>Fig. 6.23 Half core box</b></center>
<b>6.8.2 Dump Core Box or Slab Core Box</b><br/>
It is employed for making rectangular, square, or trapezoidal cores. Construction wise it is similar to half core box.<br/><br/>
<center><img src="images/mem/lesson7/27.jpg" /><br/><b>Fig. 6.24 Dump core box</b></center>
<b>6.8.3 Left and Right Hand Core Boxes</b><br/>
These types of core boxes generally produce Pipe bends. Each box comprises of half of the pipe bend. The half of the pipe bends are rammed and baked and struck together to made full core.<br/><br/>
<b>6.8.4 Split Core Box</b><br/>
The two portions of split core box can be aligned and temporarily joined together with the help of dowels. A full core cavity is thus established. First the two halves are joined and the sand is rammed. The core box is then spilitted to remove the core.<br/><br/>
<center><img src="images/mem/lesson7/28.jpg" /><br/><b>Fig. 6.25 Split core box</b></center>
<b>6.8.5 Loose Piece Core Box</b><br/>
It is used to prepare two halves of a core which may be neither identical in size nor in shape. It can be achieved by inserting loose pieces in the core box whenever required.<br/><br/>
<center><img src="images/mem/lesson7/29.jpg" /><br/><b>Fig. 6.26 Loose piece core box</b></center>
<b>6.8.6 Strickle Core Box</b><br/>
It is used for producing irregular surfaces. The strickle board removes additional sand. It is made of wood.<br/><br/>
<center><img src="images/mem/lesson7/30.jpg" /><br/><b>Fig. 6.27 Strickle core box</b></center></p></dd>
</div>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit3lesson5.php" title="Casting Process: Casting Defects">Lecture 5</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit3lesson7.php" title="Special Casting Processes (Expendable)">Lecture 7</a></td></tr></table>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>