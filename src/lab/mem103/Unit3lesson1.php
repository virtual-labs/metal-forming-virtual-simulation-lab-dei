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
<style type="text/css">
th{
text-align:left;
}
</style>
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
<a href="home.php" title="Metal Forming Virtual Simulation lab">MFVL Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<table border="0" width="100%">
<tr><td width="50%"><b>Lesson 1 CASTING PROCESS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson1/Unit3Lesson1.pdf" target="_blank" title="Download Casting Process">Lesson 1 Download</a></td><td><b>Supplementary Material</b></td></tr>
<tr><td><dt><a href="#objectives">1.0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Objectives</a></dt></td><td><a href="Unit3Simulations.php?MEM103/Unit3/Simulations/Casting.mp4">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Casting Simulations</a></td></tr>
<tr><td><dt><a href="#casting">1.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Casting Process</a></dt></td><td><a href="Unit3lesson1scq.php">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Self-check questions</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;1.1.1&nbsp;&nbsp;&nbsp;Advantages of Casting Process</td><td><a href="Unit3lesson1faq.php">3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Frequently asked questions</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;1.1.2&nbsp;&nbsp;&nbsp;Applications</td><td><a href="Unit3lesson1tq.php">4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terminal questions</a></td></tr>
<tr><td><dt><a href="#sand">1.2&nbsp;&nbsp;&nbsp;Sand Casting Process</a></dt></td><td></td></tr>
<tr><td><dt><a href="#terminology">1.3&nbsp;&nbsp;&nbsp;Casting Terminology</a></dt></td><td></td></tr>
<tr><td><dt><a href="#gating">1.4&nbsp;&nbsp;&nbsp;Gating System</a></dt></td><td></td></tr>
</table><br/></div>
<div>
<b>CASTING PROCESS</b>
<p>The principle of casting is similar to process of ice making in a house. For making an ice cube, the water (liquid) is poured into a tray of desired shape (mould) and placed in fridge (i.e. cold environment, below 0<sup>o</sup>C). It can be observed that water (any liquid) will take the exact form or shape of the vessel (tray) that contains it. Further, when water (any liquid) is frozen (solidified), it will have the exact form or shape of the vessel (tray) that contains it. 
Therefore, consider the ice cube example and examine what is involved in "casting" of water. The water, a liquid at room temperature, is poured into a vessel (the ice cube tray) and then we solidify (freeze) the water in the freezer and we have made ice cubes. Each cube is the exact shape and size of the compartment that contained it. In this case the water is the material cast, the ice cube tray is the vessel or "mould" and the "fridge" solidifies the water by cooling or freezing it. 
The steps in casting process are: making a mould of a suitable material, melting the metal and heating it to a specific temperature, pouring it into the mould and allowing the metal to solidify and cool. After cooling, casting is removed from the mould.</p><br/>
<dt><b><a name="objectives">1.0&nbsp;&nbsp;&nbsp;Objectives</a></b></dt>
<dd>
<p>
After going through this lesson, you will be able to<br/>
1.	To understand the process of casting along with its application and advantages.<br/> 
2.	To understand the steps involved in casting<br/>
3.	To be able to acquaint with casting terminology.</p><br/>
</dd>
<dt><b><a name="casting">1.1&nbsp;&nbsp;&nbsp;Casting Process</a></b></dt>
<dd>
<p>
It is a manufacturing process in which molten material is poured into a mould (or cavity) and allowed to freeze so as to take the shape of the mould. The term casting is used to denote both the product and the process. The section of the workshop where metal castings are produced is known as foundry or foundry shop.<br/>
Casting process is based on the property of liquids to take up the shape of the vessel into which they are poured. Molten metal when poured into a cavity of desired shape flows into every recess and corner of the cavity and fills the space. When this metal solidifies, it has the shape and size of the cavity and thus, in a single step, simple or complex shapes can be made from any metal that can be melted.<br/><br/>
<b>1.1.1	Advantages of Casting Process</b><br/>
Cast metal products and processes offer advantages unavailable from products made by other manufacturing techniques. The following are reasons that make casting process important in manufacturing industry.<br/>
1.	Cast components are net or near-net shape.<br/> 
2.	Almost all metals and alloys can be cast.<br/>
3.	There are almost no restrictions on part weight or size.<br/> 
4.	Intricate parts can be produced as single cast components.<br/> 
5.	Castings can be manufactured to include complex interior cavities.<br/> 
6.	All the industry's products are fully recyclable.<br/><br/> 
<b>1.1.2	Applications</b><br/> 
Cast parts range in various sizes and variety of shapes (such as the individual teeth on a zipper to an engine block of a heavy duty truck).  Some of the examples of castings are cylinder blocks of airplane engine, piston rings, machine tool beds, water supply and sewer pipes, locomotive wheels, huge propellers etc. Figure 1.1 gives some cast parts.<br/><br/>
<center><img src="images/mem/lesson2/Automobile.jpg" alt="Cast Parts in typical automobile"><br/><b>Fig. 1.1 Cast Parts in typical automobile</b></center></p><br/>
</dd>
<dt><b><a name="sand">1.2&nbsp;&nbsp;&nbsp;Sand Casting Process</a></b></dt>
<dd>
<p>
The most universal method of making castings is by using sand moulds. Sand moulds are made by ramming sand in a metallic or wooden flask. Such a casting process is commonly referred to as <b>sand casting process</b>.<br/><br/>
<center><img src="images/mem/lesson2/Steps.jpg" width="750" height="400" alt="Production steps in a typical sand-casting process"><br/><b>Fig. 1.2 Production steps in a typical sand-casting process</b></center><br/>
The steps required for making metal castings using sand casting process are mentioned below and also depicted in Fig. 2.2:<br/>
Step 1: Pattern making<br/>
Step 2: Core making,<br/>
Step 3: Mould making,<br/>
Step 4: Melting of metal and pouring,<br/>
Step 5: Cooling and solidification, and<br/>
Step 6: Cleaning of castings and inspection.<br/><br/>
<b>Step 1 - Pattern making</b><br/>
The first step in sand casting is pattern making. The pattern is a physical replica of the exterior of the casting with dimensional allocation for shrinkage and finishing used to make the mould. The cavity in the mould is prepared with the help of the pattern and is a replica of the casting required. It is constructed in such a way that it can be used for forming an impression in sand or other material used for making the mould. The pattern can be made from anything as long as it is robust enough to be handled during the mould making process. Patterns are usually made of wood, plastic, metal, or plaster. A pattern has to be made before making a mould.<br/><br/>
<b>Step 2 - Core making</b><br/>
The next step in the process is core making. If the casting is to be hollow, additional patterns called cores are used to create these cavities in the finished product. Cores are pre-determined shaped mass of dry sand, which are placed into the mould before pouring the molten metal to create the interior contours of the casting. They are typically made of a sand mixture - sand combined with water and organic adhesives called binders- which is baked to form the core. This allows the cores to be strong yet collapsible, so they can be easily removed from the finished casting. Since cores are made in moulds, they require a pattern and mould, called a core box.<br/><br/>
<b>Step 3 - Moulding</b><br/>
Moulding is the multi-step process in which moulds are created with the desired cavity in a suitable material, like sand, to pour the molten metal. The mould is made by packing some readily formed aggregate material, such as moulding sand, around the pattern. When the pattern is withdrawn, its imprint provides the mould cavity, which is ultimately filled with metal to become the casting. A mould is required to get the desired shape and size of the metal casting. Sand is a good refractory material for most of the metals and is mostly used for moulding.<br/><br/>
<b>Step 4 - Melting & Pouring</b><br/>
Melting is the preparation of the molten metal for casting, and its conversion from a solid to a liquid state in a furnace. It is then transferred in a ladle to the moulding area of the foundry where it is poured into the moulds. After the metal has solidified, the moulds are vibrated to remove the sand from the casting, a process called shakeout. For melting of the metal during casting different types of furnaces are used. The type and size of the furnace may depend on the size of casting, quantity to be produced, production rate, and metal to be cast.<br/><br/>
<b>Step 5 - Cleaning</b><br/>Cleaning generally refers to the removal of all materials that are not part of the finished casting. Rough cleaning is the removal of the gating systems from the casting. Initial finishing removes any residual mould or core sand that remains on the piece after it is free of the mould. Trimming removes any unnecessary metal. In the last stages of finishing, the surface of the casting is cleaned for improved appearance.</p>
<br/></dd>
<dt><b><a name="terminology">1.3&nbsp;&nbsp;&nbsp;Casting Terminology</a></b></dt>
<dd>
<p>
The Fig. 1.3 presents the cross-section of a typical two-part sand mould and incorporates many features of the casting process. The casting starts with the construction of a pattern, a duplicate of the final casting with allowances. The moulding material is then packed around the pattern, and the pattern is removed to produce a mould cavity. The term casting is used to describe both the process and the product when molten metal is poured and solidified in a mould.<br/><br/>
<b>Flask</b><br/> 
The flask is the box that contains the moulding aggregate.<br/><br/> 
<b>Cope</b><br/>
In a two-part mould, the cope is the top half of the pattern, flask, mould or core.<br/><br/>
<center><img src="images/mem/lesson2/CrossSection.jpg" width="500" height="350" alt="Cross-section of a typical two-part sand mould, presenting various mould components and terminology">&nbsp;&nbsp;&nbsp;
<video width="400" height="220" autoplay loop controls>
<source src="MEM103/Unit3/Simulations/Casting.mp4" type="video/mp4">
</video>
<br/><b>Fig. 1.3 Cross-section of a typical two-part sand mould, presenting various mould components and terminology</b></center><br/>
<b>Drag</b><br/>
The drag is the bottom half of any of the pattern, flask, mould or core. A core is a sand shape that is inserted into the mould to produce internal features on a casting, such as holes or passages for water cooling.<br/><br/>
<b>Core Print</b><br/>
A core print is the region added to the pattern, core, or mould that is used to locate and support the core within the mould. The mould material and the core then combine to form the mould cavity, the void into which the molten metal will be poured and solidified to produce the desired casting.<br/><br/>
<b>Parting Line</b><br/>
The parting line or parting surface is the interface that separates the cope and drag halves of the mould, flask, or pattern, and the halves of a core during some core-making processes.<br/><br/> 
<b>Draft</b><br/>
The draft is the taper on a pattern or casting that permits it to be withdrawn from the mould. The mould or die used to produce casting cores is known as a core box.<br/><br/>
<b>Pouring cup</b><br/>
The molten metal is not directly poured into the mould cavity because it may cause mould erosion. Molten metal is poured into a pouring basin, which acts as a reservoir from which it moves smoothly into the sprue.<br/><br/>
<b>Sprue</b><br/>
Sprue helps in feeding metal to the runner, which in turn reaches the cavity through the gates. The sprue may have either straight or taper shape. In straight or parallel sprue, the metal contracts inwards and is pulled away from the sprue walls, as shown in Fig. 1.4. In a tapered sprue, the liquid metal flows down firmly in contact with walls and this reduces turbulence and eliminates sucking of gas or air from the mould. A tapered sprue is illustrated in Fig. 1.4.<br/><br/>
<center><img src="images/mem/lesson2/Sprue.jpg" width="650" height="250" alt="Straight and tapered sprue"><br/><b>Fig. 1.4 Straight and tapered sprue</b></center><br/>
<b>Sprue base</b><br/>
This is a reservoir for metal at the bottom of the sprue to reduce the momentum of the falling molten metal. The molten metal, as it moves down the sprue gains in velocity, some of which is lost in the sprue base well, and the mould erosion is reduced. This molten metal changes direction in the sprue base and flows into the runner in a more uniform way.<br/><br/>
<b>Riser</b><br/>
The riser is designed to serve as a reservoir of metal which stays liquid longer than the casting and "feeds" liquid to fill any shrinkage cavities which tend to develop in the casting. If the metal does not appear in the riser, it signifies that either the metal is insufficient to fill the mould cavity or there is some abstraction to the metal flow between the sprue and riser.<br/><br/>
<b>Runner</b><br/>
Runner is used to take the molten metal from the sprue base and distribute it to several gate passageways around the cavity.<br/><br/>
<b>Gate</b><br/>
The gate is a channel, which connects runner with the mould cavity and through which molten metal flows to fill the mould cavity. In top gating, the molten material falls directly into the mould cavity through a height as shown in Fig. 1.5 (a).<br/><br/>
<center><img src="images/mem/lesson2/DifferentGates.jpg" width="700" height="250" alt="Different types of gates"><br/><b>Fig. 1.5 Different types of gates</b></center><br/>
In bottom gating, shown in Fig. 1.5 (b), the molten material enters the mould cavity from the bottom and hence there is no problem of scouring and splashing. But, in case of bottom gating system since molten material enters from bottom, if freezing of molten metal takes place then it could choke off metal flow before mould is full. Bottom gating creates an unfavorable temperature gradient and makes it difficult to achieve directional solidification. Bottom gating is used for heavy castings. In parting gate the molten material enters the mould at the parting plane, as shown in Fig. 1.5 (c).</p><br/>
<dt><b><a name="gating">1.4&nbsp;&nbsp;&nbsp;Gating System</a></b></dt>
<dd>
<p>
Gating systems are necessary for the molten metal to flow into the mould cavity. The gating system is the network of channels used to deliver the molten metal from outside the mould into the mould cavity. The way in which the liquid metal enters the mould has a decided influence upon the quality and soundness of the casting, the different components of a gating system should be carefully designed and produced. Different components of a gating system are shown in Fig. 1.6.<br/><br/>
<center><img src="images/mem/lesson2/GatingSystem.jpg" width="600" height="350" alt="Components of gating system"><br/><b>Fig. 1.6 Components of gating system</b></center><br/>
</p></div>
<table width=1024><tr><td style="text-align:right; font-weight:bold;"><a href="Unit3lesson2.php" title="Casting Process: Pattern Making">Lecture 2</a></td></tr></table>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>