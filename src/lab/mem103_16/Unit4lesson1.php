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
<tr><td width="65%"><b>Lesson 1 Welding</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/UNIT4/Unit4Lesson1.PDF" target="_blank" title="Download Lesson 1">Lesson 1 Download</a></td></tr>
<tr><td><a href="#introduction">1.0&nbsp;&nbsp;&nbsp;Introduction</a></td></tr>
<tr><td><a href="#principles">1.1&nbsp;&nbsp;&nbsp;Principles of Welding</a></td></tr>
<tr><td><a href="#weldability">1.2&nbsp;&nbsp;&nbsp;Weldability</a></td></tr>
<tr><td><a href="#types">1.3&nbsp;&nbsp;&nbsp;Types and Classification of Welding Process</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.1&nbsp;&nbsp;&nbsp;Autogeneous Welding</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.2&nbsp;&nbsp;&nbsp;Heterogeneous Welding</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.3&nbsp;&nbsp;&nbsp;Pressure Welding</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.4&nbsp;&nbsp;&nbsp;Solidstate Welding</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.5&nbsp;&nbsp;&nbsp;Fusion Welding</td></tr>
<tr><td><a href="#features">1.4&nbsp;&nbsp;&nbsp;Features of the completed weld</a></td></tr>
<tr><td><a href="#joints">1.5&nbsp;&nbsp;&nbsp;Joints</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.1&nbsp;&nbsp;&nbsp;Butt Joint</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.2&nbsp;&nbsp;&nbsp;Corner Joint</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.3&nbsp;&nbsp;&nbsp;Edge Joint</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.4&nbsp;&nbsp;&nbsp;Edge Joint</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.5&nbsp;&nbsp;&nbsp;Tee Joint</td></tr>
<tr><td><a href="#welds">1.6&nbsp;&nbsp;&nbsp;Types of Welds and Welded Joints</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.6.1&nbsp;&nbsp;&nbsp;Butt Welds</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.6.2&nbsp;&nbsp;&nbsp;Fillet Welds</td></tr>
<tr><td><a href="#positions">1.7&nbsp;&nbsp;&nbsp;Welding Positions</a></td></tr>
<tr><td><a href="#techniques">1.8&nbsp;&nbsp;&nbsp;Welding Techniques (Valid for Gas Welding Only)</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.8.1&nbsp;&nbsp;&nbsp;Leftward Welding (Forehand Welding)</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.8.2&nbsp;&nbsp;&nbsp;Rightward Welding (Backhand Welding)</td></tr>
<tr><td><a href="#fluxes">1.9&nbsp;&nbsp;&nbsp;Fluxes</a></td></tr>
<tr><td><a href="#filler">1.10&nbsp;&nbsp;&nbsp;Filler Metals</a></td></tr>
</table><br/></div>
<div>
<b>Objectives</b><br/>
After studying this unit, you should be able to understand:<br/>
i. introduction to welding,<br/>
ii. different types of welding processes and their classification,<br/>
iii. welding tools and equipment, and<br/>
iv. welding defects and their remedies.<br/><br/>
<dt><b><a name="introduction">1.0 &nbsp;&nbsp;&nbsp;Introduction</a></b></dt>
<dd><p>
Welding is one of the most convenient and rapid methods available for joining metals. In general welding can be defined in its broadest sense as the formation of a metallic bond by heating metals to their melting temperature. More and more products are being fabricated using welding due to its advantages, i.e. ease, economy, strength and freedom in design. Applications of welding processes range from fabrication of simple steel brackets to nuclear reactors. The number one enemy to welding is oxidation, and consequently, many welding processes are carried over in a controlled environment or shielded by an inert atmosphere.<br/>
<center><img src="images/mem/Unit4/Lesson1/1.jpg"><br/><b>Figure 1: Typical component that can be manufactured by joining</b><br/><br/>
<img src="images/mem/Unit4/Lesson1/2.jpg"><br/><b>Figure 2: Examples of joints that can be made by different joining processes</b></center>
</p></dd>
<dt><b><a name="principles">1.1 &nbsp;&nbsp;&nbsp;Principles of Welding</a></b></dt>
<dd><p>
Consider two ice cubes outside the refrigerator, the outer surfaces of the cubes under the heat of the day will begin to melt. Now place the two wet cubes one on top of the other back in the refrigerator and within a short time you will observe that the two cubes are joined (welded) together to form one block of ice. The addition of heat has melted portion of the two cubes to be joined and later they both cool down to form one cube, the melted section becoming an integral part of the bond.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/3.jpg"><br/><b>Figure 3: Welding of two ice cubes</b></center><br/>
<b>Welding</b> is defined as "a joining process that produces coalescence of materials by heating them to the welding temperature, with or without the application of pressure or by the application of pressure alone, and with or without the use of filler metal".<br/>
(Coalescence means fusion or growing together of the grain structure of the materials being welded.)<br/><br/>
<b>Weld</b> is defined as "a localized coalescence of metals or nonmetals produced either by heating the materials to the required welding temperatures, with or without the application of pressure, or by the application of pressure with or without the use of filler materials".<br/><br/>
Before we start discussing the welding process, few of the terminologies used in the process of welding are explained.<br/><br/>
<b>Base metal</b>: The workpieces to be joined are known as base metals.<br/><br/>
<b>Weld bead</b>: It is the material, which is deposited by the process of welding. This appears as a separate material from the base metal in the form of a bead. This also referred to as bead.<br/><br/>
<b>Puddle</b>: It is the portion of the base metals at the joint, which is melted by the heat of welding.<br/><br/>
<b>Weld pass</b>: It is the movement of welding torch from one end of the joint to the other end, which results in bead.<br/><br/>
<b>Tack weld</b>: A temporary weld done at the ends of the workpieces, during welding to hold the workpieces together.<br/><br/>
<b>1.1.1 Advantages of welding process</b>
[1]. It is faster and economical in comparison to other joining process i.e. riveting, fastening etc. As it does not require overlapping materials, it eliminates excess weight caused by other fastening means.<br/>
[2]. Similar and dissimilar metals can be joined more easily and strongly.<br/>
[3]. Joint obtained by welding is a permanent one and strong one.<br/>
[4]. Equipment is not very costly.<br/>
[5]. Process is portable and can be taken to site easily.<br/>
[6]. Process can be automatic and mechanized.<br/>
[7]. It is a leak proof process.<br/><br/>
<b>1.1.2 Disadvantages of welding process</b>:<br/>
[1]. The U-V (Ultra Violet) rays emitted during the arc welding process are extremely harmful for human eyes.<br/>
[2]. The fumes and gases of welding process are harmful to the humans.<br/>
[3]. Thermal stresses induced and distortion of the jobs are unavoidable.<br/>
[4]. For a good weld, the operator must be skilled one.<br/>
[5]. Designs must account for the heating produced by welding.<br/><br/>
<b>1.1.3 Applications of welding process</b><br/>
Due to its number of advantages the welding process is widely used in every phase of metal industry. Some of the prominent applications are:<br/>
[1]. Building and bridge construction<br/>
[2]. Pipelines<br/>
[3]. Aircraft manufacturing<br/>
[4]. Ship fabrication<br/>
[5]. Automobiles<br/>
[6]. Oil industry’s rigs, pipe lines etc.<br/>
[7]. Military war equipment.<br/>
[8]. Many other branches of industry.
</p></dd><br/>
<dt><b><a name="weldability">1.2 &nbsp;&nbsp;&nbsp;Weldability</a></b></dt>
<dd><p>
It is defined as “The capacity of metal to be welded under fabricating restrictions imposed, into a specific designed structure and to perform satisfactorily in the intended service”. We can say in short that weldability is the ability of a metal to weld satisfactorily.
</p></dd><br/>
<dt><b><a name="types">1.3 &nbsp;&nbsp;&nbsp;Types and classification of welding process</a></b></dt>
<dd><p>
Classification of welding process is done on the basis of the equipment used and the method of heat application.<br/><br/>
<b>1.3.1 Autogeneous welding</b>: Consists of those processes in which similar metals are joined with the help of filler rod of same metal.<br/>
i.e. M.S. to M.S. and C.I. to C.I.<br/><br/>
<b>1.3.2 Heterogeneous welding</b>: Consists of those processes in which dissimilar metals are joined, .i.e. Cu with Al<br/><br/>
<b>1.3.3 Pressure welding</b>: Involves heating of the base metals, which are to be joined up to their plastic state, and joining them by applying pressure. No filler material is used in this type of welding. Forge Welding and Flash welding are the examples of it.<br/><br/>
<b>1.3.4 Non-pressure welding</b>: All fusion welding processes are non-pressure welding process as no pressure is applied during joining of the workpieces by welding.<br/><br/>
<b>1.3.5 Solid state welding</b>: The main characteristic of solid state welding is that no liquid phase is present in the process. Solid state welding joins parts by applying heat and pressure. In this two clean surfaces are brought together under the influence of heat and pressure to initiate bonding between them. Relative motion (rubbing) between two surfaces generates heat through friction and breaks up oxide film allowing the pure metal to interact. The temperature is usually below the melting point of the materials joined. Forge, resistance, ultrasonic, diffusion, inertia and explosive welding are examples of solid state welding.<br/><br/>
<b>1.3.6 Fusion welding</b>: Fusion welding involves heating of the base metals that are to be joined to the temperatures above their melting point. It involves the use of additional filler material. Work pieces are joined without the application of pressure. Types of fusion process are arc welding, metal arc, carbon arc, inert gas arc, atomic hydrogen arc, submerged arc welding.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/4.jpg"><br/><b>Figure 4: Generalized classification of welding process</b></center>
</p></dd>
<dt><b><a name="features">1.4 &nbsp;&nbsp;&nbsp;Features of completed weld</a></b></dt>
<dd><p>
It is important that one should become familiar with weld and the terms used to describe a weld.<br/><br/>
<b>1.4.1 Filler penetration or fusion zone</b>: It is the region of the base metal that is actually melted. The depth of fusion is the distance that fusion extends into the base metal.<br/><br/>
<b>1.4.2 Leg of a fillet weld</b>: The leg is the portion of the weld from the root of the joint to the toe of the weld. There are two legs in a fillet weld.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/5.jpg"><br/><b>Figure 5: Features of weld</b></center><br/>
<b>1.4.3 Root of the weld</b>: This is the point at which the bottom of the weld intersects the base metal surface, as shown in the cross section of weld.<br/><br/>
<b>1.4.4 Throat of a fillet weld</b>: The throat is the distance from the root to a point on the face of the weld along a line perpendicular to the face of the weld.<br/><br/>
<b>1.4.5 Face of the weld</b>: This is exposed surface of a weld, made by an arc or gas welding process on the side from which the welding was made.<br/><br/>
<b>1.4.6 Toe of the weld</b>: This is the junction between the face of the weld and the base metal.<br/><br/>
<b>1.4.7 Reinforcement of the weld</b>: This is the weld metal on the face of a groove weld in excess of the metal necessary for the specified weld size.<br/><br/>
<b>1.4.8 Heat Affected Zone (HAZ)</b>: Heat affected zone (HAZ) is the portion of the base metal which has not been melted but has been rapidly heated and cooled by the passage of the welding arc. The metal between the HAZ is weld metal, a mixture of deposited metal and some of the parent metal which has been melted. In HAZ structural or mechanical properties of the metal have been altered by the welding heat.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/6.jpg"><br/><b>Figure 6: Schematic view of heat affected zone</b></center><br/>
<b>1.4.9 Size of the weld</b>: The size of welds is specified as follows:<br/>
For butt welds – throat thickness<br/>
For fillet welds – Leg length or throat thickness
</p></dd><br/>
<dt><b><a name="joints">1.5 &nbsp;&nbsp;&nbsp;Joints</a></b></dt>
<dd><p>
Joint is a junction of parts and defines the location of two or more members to be joined. The configuration of the workpieces that are to be connected determines the type of joint. Typical joints are:<br/><br/>
<b>1.5.1 Lap Joint</b>: A joint between two overlapping members i.e. is made by lapping one piece of metal over another. This is one of the strongest types of joints available. Overlap the metals minimum three times the thickness of the thinnest member being joined. Lap joints are commonly used spot welding applications.<br/><br/>
<b>1.5.2 Butt Joint</b>: A joint between two members lying approximately in the same plane. This joint is frequently used in plate, sheet metal, and pipe work.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/7.jpg"><br/><b>Figure 7: Types of joints</b></center><br/>
<b>1.5.3 Corner Joint</b>: A joint between two members located approximately at right angles to each other in the form of an angle. In cross section, the corner joint forms an L-shape.<br/><br/>
<b>1.5.4 Edge Joint</b>: A joint between the edges of two or more parallel members. An edge joint should only be used for joining metals that are not subjected to heavy loads. It is more frequently used in sheet metal work.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/8.jpg"><br/><b>Figure 8: Types of joints</b></center><br/>
<b>1.5.5 Tee joint</b>: A joint between two members located approximately at right angles to each other in the form of a T. In cross section, the tee joint has the shape of the letter T.
</p></dd><br/>
<dt><b><a name="welds">1.6 &nbsp;&nbsp;&nbsp;Types of welds and welded joints</a></b></dt>
<dd><p>
The terms weld and joints are often confused in welding process. There are two major classes of weld, i.e. fillet and butt.<br/><br/>
<b>1.6.1 Butt welds</b>: A butt weld is made between two pieces of metal usually in the same plane, the weld metal maintaining continuity between the sections.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/9a.jpg"><img src="images/mem/Unit4/Lesson1/9b.jpg"><br/><b>Figure 9: Types of weld</b></center><br/>
<b>1.6.2 Fillet welds</b>: Fillet welds are roughly triangular in cross section and between two surfaces not in the same plane and the weld metal is substantially placed alongside the work pieces being joined.<br/><br/>
In addition there are lap welds, corner welds and edge welds, which are to some extent special variations of the fillet and butt welds.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/10.jpg"><br/><b>Figure 10: Types of weld</b></center><br/>
<b>1.6.3 Edge preparations for welding</b><br/>
To obtain sound welds, it is desirable that weld should completely penetrate the metal thickness. The heat will not be able to melt the joint edges to their entirethickness if thick plates are to be welded. Complete penetration becomes more important in case of butt joints. Hence, to obtain complete penetration and sound welds, edge preparation is essential. Figure shows different edge preparations for butt joints.<br/><br/>
Edges with square faces as shown in Figure(a) can be used only up to a particular thickness. Above that, proper penetration depth of the welds cannot be achieved and sound welds will not be obtained. To over come this problem, the edges cut to make single-V groove, as shown in Figure (b), or single-U groove, as shown in Figure (d). The maximum thickness for which weld penetration is possible with square faces is called root. Thus, V or U grooves are made leaving 
a thickness equal to root as a square butt joint. By making these grooves, the depth of penetration of welds is more and hence we can obtain sound welds. If the thickness of the material is too large, either double-V (Figure (c)) or double-U (Figure (e)) groove should be used.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/10_11.jpg"><br/><b>Figure 11: Edge preparations for butt joints</b></center>
</p></dd>
<dt><b><a name="positions">1.7 &nbsp;&nbsp;&nbsp;Welding Positions</a></b></dt>
<dd><p>
Welding is done in one of the four positions: (1) flat, (2) horizontal, (3) vertical, or (4) overhead.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/11.jpg"><br/><b>Figure 12: Positions of welding (1) flat, (2) horizontal, (3) vertical, and (4) overhead</b></center>
</p></dd><br/>
<dt><b><a name="techniques">1.8 &nbsp;&nbsp;&nbsp;Welding techniques (Valid for gas welding only)</a></b></dt>
<dd><p>
<b>1.8.1 Leftward welding technique (Forehand welding)</b><br/>
As the name implies, the weld is started at the right hand side and progresses towards the left. This position permits uniform preheating of the plate edges immediately ahead of the molten puddle. By moving the torch and the rod in opposite semicircular paths, the heat can be carefully balanced to melt the end of the rod and the side walls of the plate into a uniformly distributed molten puddle. The rod is dipped into the leading edge of the puddle so that enough filler metal is melted to produce an even weld joint. The heat which is reflected backwards from the rod keeps the metal molten and the metal is distributed evenly to both edges being welded by the motion of the tip.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/12.jpg"><br/><b>Figure 13: Schematic view of leftward welding technique</b></center><br/>
The filler rod precedes the torch and is held at an angle of 30° - 40° to the work surface. The torch is held at an angle of 60° - 70° to the work surface and is given a slight side-to-side movement to ensure side fusion as the filler rod is fed into the molten pool. The flame is pointed in the direction of welding and directed between the rod and the molten puddle. This method is used on low carbon steel sheet and plate in thicknesses up to 6.5 mm and also on cast iron and certain non-ferrous metals.<br/><br/>
<b>1.8.2 Rightward welding technique (Backhand welding)</b><br/>
The weld is started at the left hand side of the joint and progresses towards the right. In this method, the torch precedes the welding rod. The torch is held at approximately at an angle of 40° - 50° to the work surface and travels in a straight line, with the flame directed at the molten puddle. The filler rod, which is held at an angle of 30° - 40° to the work surface, follows the torch and is fed into the molten pool with a circular action. The advantages of rightward welding over the leftward technique are higher speed, less distortion and more economical use of gas and filler rod. By this technique there is greater ease of obtaining fusion at the weld root. This method is used on welding of steel plate over 5 mm thickness.<br/><br/>
<center><img src="images/mem/Unit4/Lesson1/13.jpg"><br/><b>Figure 14: Schematic view of rightward welding technique</b></center>
</p></dd>
<dt><b><a name="fluxes">1.9 &nbsp;&nbsp;&nbsp;Fluxes</a></b></dt>
<dd><p>
Flux is a cleaning agent material used to obstruct or prevent the formation of oxides and other undesirable substances in molten metal and on metal surfaces. Flux allows the filler metal and the base metal to be fused. Different types of fluxes are used with different types of metals; therefore, one should choose a flux formulated for a specific base metal. Select a flux based on the expected welding temperature. The ideal flux has the right fluidity at the welding temperature and thus blankets the molten metal from oxidation. Fluxes usually come in the form of a paste, powder, or liquid. Powders can be sprinkled on the base metal, or the filler rod can be heated and dipped into the powder. Liquid and paste fluxes can be applied to the filler rod and to the base metal with a brush. For shielded metal arc welding, the flux is on the electrode.<br/><br/>
<b>Characteristics of a good flux</b>:<br/>
[1]. It is fluid and active at the melting point of the filler metal.<br/>
[2]. It remains stable and does not change to a vapor (ball up or blow away) rapidly within the temperature range of the welding.<br/>
[3]. It dissolves all oxides and removes them from the joint surfaces.<br/>
[4]. It does not cause a glare that makes it difficult to see the progress of welding or brazing.<br/>
[5]. It is easy to remove after the joint is welded.<br/>
[6]. It is available in an easily applied form.<br/><br/>
<b>Functions performed by flux</b>:<br/>
[1]. Stabilizes the arc.<br/>
[2]. Generates shielding gases.<br/>
[3]. Controls the electrode melt rate.<br/>
[4]. Prevent oxide, nitride formation.<br/>
[5]. Adds alloying elements to the weld.
</p></dd><br/>
<dt><b><a name="filler">1.10 &nbsp;&nbsp;&nbsp;Filler Metals</a></b></dt>
<dd><p>
While welding two pieces of metal together, space is left between the joints. The material used to fill this space during the welding process is known as the filler metal, or material. Two types of filler metals commonly used in welding are welding rods and welding electrodes. The term welding rod refers to a form of filler metal that does not conduct an electric current during the welding process. The only purpose of a welding rod is to supply filler metal to the joint. This type of filler metal is often used for gas welding.
</p></dd>
<table width=1024><tr><td style="text-align:right; font-weight:bold;"><a href="Unit4lesson2.php" title="Gas Welding or Oxyfuel Gas Welding (OFW)">Lecture 2</a></td></tr></table>
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