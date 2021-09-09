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
<tr><td width="65%"><b>Lesson 3 Smithy (Hand Forging)</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit2/Unit2Lesson3.pdf" target="_blank" title="Download Lesson 3">Lesson 3 Download</a></td></tr>
<tr><td><a href="#equipments">3.1 &nbsp;&nbsp;&nbsp;Equipments of a Smithy Shop</a></td></tr>
<tr><td><a href="#types">3.2&nbsp;&nbsp;&nbsp;Types of Iron Working Tools</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.2.1&nbsp;&nbsp;&nbsp;Striking Tools</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.2.2&nbsp;&nbsp;&nbsp;Holding Tools</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.2.3&nbsp;&nbsp;&nbsp;Blacksmith's Vice</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.2.4&nbsp;&nbsp;&nbsp;Cutting Tools</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.2.5&nbsp;&nbsp;&nbsp;Punching and Drifting Tools</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.2.6&nbsp;&nbsp;&nbsp;Forming and Finishing Tools</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.2.7&nbsp;&nbsp;&nbsp;Measuring Tools</td></tr>
<tr><td><a href="#operations">3.3&nbsp;&nbsp;&nbsp;Smithy Operations</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.1&nbsp;&nbsp;&nbsp;Upsetting</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.2&nbsp;&nbsp;&nbsp;Drawing Down</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.3&nbsp;&nbsp;&nbsp;Setting Down</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.4&nbsp;&nbsp;&nbsp;Cutting Out</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.5&nbsp;&nbsp;&nbsp;Swaging</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.6&nbsp;&nbsp;&nbsp;Bending</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.7&nbsp;&nbsp;&nbsp;Forge Welding</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.8&nbsp;&nbsp;&nbsp;Punching and Drifting</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.9&nbsp;&nbsp;&nbsp;Riveting</td></tr>
<tr><td><a href="#jigs">3.4&nbsp;&nbsp;&nbsp;Bending Jigs</a></td></tr>
<tr><td><a href="#care">3.5&nbsp;&nbsp;&nbsp;Use and care of Smithy Tools</a></td></tr>
<tr><td><a href="#safety">3.6&nbsp;&nbsp;&nbsp;Safety Precautions</a></td></tr>
</table><br/></div>
<div>
<b>SMITHY (HAND FORGING)</b><br/><br/>
<b>Introduction</b><br/>
Forging is also referred as smithy when the shaping of small jobs is carried out at small scale by manual hammering and heating the workpiece in an open fire or hearth.<br/><br/>
<dt><b><a name="equipments">3.1&nbsp;&nbsp;&nbsp;Equipments of a Smithy Shop</a></b></dt>
<dd><p>
The equipments for a smithy shop are relatively simple as the production of good quality work depends on the skill of the worker.<br/>
The following equipments are used in a smithy shop:<br/>
1. Hearth or fire<br/>
2. Blower<br/>
3. Blacksmith's Anvil<br/>
4. Bick Iron<br/>
5. Blacksmith's Swage block<br/>
6. One steam or pressure hammer<br/>
7. Trough of water<br/><br/>
<b>Hearth or fire</b><br/>
The metal to be worked is heated in a hearth in which the coke fire is lit by means of air admitted through the tuyere (nozzle) under a slight pressure by means of a blower. A trough of water, is kept along side and forms part of the hearth. The purpose of water tank is for cooling the tools.<br/><br/>
<center><table width="800"><tr><td><img src="images/mem/Unit2/Lesson4/1.jpg"></td><td><img src="images/mem/Unit2/Lesson4/2.jpg"><img src="images/mem/Unit2/Lesson4/3.jpg"></td></tr></table><br>
<b>Figure 1: Hearth or fire and accessories (shovel and vent wire)</b></center>
<b>Blacksmith's anvils</b><br/>
Purpose of blacksmith's anvil is to provide a working surface for supporting the metal when it is being forged, shaped and punched for holes. Blacksmith's anvil has a flat face with a horn on one end and two holes in the flat face opposite the horn. The round hole is called a pritchet hole and permits slugs of metal to drop
through it when holes are punched. Pritchet hole is used for bending rods of small diameter, and as a die for hot punching operation. The square hole or hardie hole is designed to hold hardies and bottom fullers and swages and is used for holding square shanks of various fittings. The cone shaped horn is used
to form curved shapes from bars and rods. The flat or top face is used to support the metal being worked on. Blacksmith's anvils are made of cast steel or graded cast iron. They have two mounting flanges which may be used to secure the anvil on a wooden or a concrete base. When in position the beak or horn of the anvil should on the workmen's left.<br/><br/>
<center><img src="images/mem/Unit2/Lesson4/4.jpg"><br/><b>Figure 2: Anvil</b></center>
<b>Bick Iron</b><br/>
A bick iron is a type of small anvil specifically used for working on small jobs in just the same way as anvil. It is made of tool steel and has a tapered shank which is fitted into the hardie hole of the anvil during its use.<br/><br/>
<center><table width="600"><tr><td><img src="images/mem/Unit2/Lesson4/5.jpg"></td><td><img src="images/mem/Unit2/Lesson4/6.jpg"></td></tr>
<tr><td><b>Figure 3: Bick iron</b></td><td><b>Figure 4: Swage block</b></td></tr></table></center>
<b>Swage block</b><br/>
The blacksmith's swage block is large rectangular block of cast iron used in a smithy shop. The purpose of the swage block is to facilitate the shaping sizing and smoothing of round, square and hexagon sections from the rough bar of metal. The swage block has several holes in it of various sizes and forms and grooves around it of several sizes of vee and half round form. Swage blocks are also available for special jobs.
</p></dd><br/>
<dt><b><a name="types">3.2&nbsp;&nbsp;&nbsp;Types of iron working tools</a></b></dt>
<dd><p>
Tools used in a smithy shop can be classified into different groups according to functions which they perform.<br/>
1. Striking tools<br/>
2. Holding tools<br/>
3. Cutting tools<br/>
4. Punching and drilling tools<br/>
5. Forming and finishing tools<br/>
6. Measuring and testing tools<br/>
7. Resting and supporting tools (Anvil and swage block, already discussed)<br/><br/>
<b>3.2.1 Striking tools</b><br/>
Striking tools are used in smithy shop to hammer the work directly or indirectly through other tools while forging. The striking tools are:<br/>
1. Double faced sledge hammer<br/>
2. Straight peen sledge hammer<br/>
3. Cross peen sledge hammer<br/>
4. Ball peen hammer<br/>
5. Smith's hammer.<br/><br/>
Double faced sledge hammer, straight peen sledge hammer, cross peen and ball peen sledge hammers are used for light work by the smith himself. For heavy work sledge hammers are used by the assistant of the smith. The striking face of the hammer is kept slightly convex for maximum efficiency of striking impact. The handle length is usually 35 to 40 cm.<br/><br/>
<center><table width="900"><tr><td><img src="images/mem/Unit2/Lesson4/7.jpg"></td><td><img src="images/mem/Unit2/Lesson4/8.jpg"></td><td><img src="images/mem/Unit2/Lesson4/9.jpg"></td><td><img src="images/mem/Unit2/Lesson4/10.jpg"></td></tr>
<tr><td><b>Double faced sledge hammer</b></td><td><b>Straight peen sledge hammer</b></td><td><b>Cross peen sledge hammer</b></td><td><b>Ball peen hammer</b></td></tr></table>
<img src="images/mem/Unit2/Lesson4/11.jpg"><br/><b>Smith's hammer</b><br/><b>Figure 5: Striking tools</b></center>
<b>3.2.2 Holding tools</b><br/>
Holding tools are used to grip the workpiece (hot / cold) firmly, while forging, bending, shaping or during other operations. The following types of tongs are commonly used for holding and turning the job during forging. The length of the tongs may vary from 45 to 65 cm. with length of jaws varying from 7.5 to 14 cm.<br/><br/>
<center><img src="images/mem/Unit2/Lesson4/12.jpg" width="650"><br/><b>Figure 6: Holding tools</b></center><br/>
Flat tongs hold with the entire length of their jaws.<br/>
Hollow bit tongs hold both square and round bars.<br/>
Square clip tongs hold only the square stock of metal.<br/>
Angle tongs are used for holding angle irons.<br/>
Link tongs are used for holding links during the making of a closed link or chain.<br/>
Pliers or anvil or pick-up tongs are used for holding odd pieces of hot metal.<br/>
Rivet tongs are used for riveting purposes.<br/>
Tong with holding ring is used while forging heavy work or performing prolonged forging operations, the blacksmith slips a ring over the shanks of the tongs. This helps in relieving the pressure exerted by the blacksmith in holding the workpiece.<br/><br/>
<b>3.2.3 Blacksmith's vice</b><br/>
The blacksmith's vice is used for holding workpiece which needs heavy continuous hammering. Vice is fastened to a sturdy work bench.<br/><br/>
<b>3.2.4 Cutting tools</b><br/>
Cutting tools are used for cutting and marking the work in cold and hot conditions. These tools are ground on emery wheels for sharpening the cutting edges. The edges - vary in width from 4 cm to 5 cm and are hardened and tempered. Hot chisel, cold chisel and hardy (smith's anvil cutters) are the tools employed for cutting purposes.<br/><br/>
<b>Anvil Cutters (Hardy)</b><br/>
A smith's anvil cutter has a chisel like point and a square shank. It fits into the square hole in the anvil. Metal to be cut is placed over the point and struck with a hammer until it separates.<br/><br/>
<b>Chisels</b><br/>
The chisels shown in figure-7 are used for cutting metals and for nicking prior to breaking. For cutting the hot metal a 300 chisel is used, while a 600 chisel is used for cold working.<br/><br/>
<center><img src="images/mem/Unit2/Lesson4/13.jpg" width="700"><br/><b>Figure 7: Cutting tools</b></center>
<b>3.2.5 Punching and drifting tools</b><br/>
Punches and drifts are the tools used for making holes in the work piece when it is hot. Punches are made in various sections and sizes such as square, round, oval and other shapes. Drifts are finishing tools used to dress and clean the sides of punched holes and remove burrs of metal.<br/><br/>
<b>3.2.6 Forming and finishing tools</b><br/>
These tools are made of tool steel and are hardened and polished. The following are the types of forming and finishing tools:<br/><br/>
<b>Swages</b><br/>
Swages are consists of two parts known as top and bottom tools. They are used for forming round, square, hexagonal or of any desired shape. It is a form of a die. The top tool is held by the smith and the bottom tool has a stem which is placed in the square hole in the face of the anvil.<br/><br/>
<center><img src="images/mem/Unit2/Lesson4/14.jpg" width="250"><img src="images/mem/Unit2/Lesson4/15.jpg" width="250"><br/>
<table width="500"><tr><td><b>Figure 8: Swages</b></td><td><b>Figure 9: Fullers</b></td></tr></table></center>
<b>Fullers</b><br/>
Similar to swage, fullers also comes in pair known as top and bottom tools respectively. Fullers are used for necking and drawing down a forging to a smaller size. They are also used for making a depression to serve as the starting place for reduction in thickness. Top fullers have handles whereas bottom fullers have a square shank and are used in the same way as swages, i.e. by placing them in the anvil.<br/><br/>
<b>Flatter</b><br/>
A flatter is a hammer line tool with a flat face. It is similar to a set hammer, but has a broader base. It is used for smoothing and finishing flat forgings. It is held by handle upon the work and struck with a sledge. Its use is to finish over broad surfaces which have been brought to size by the sledge and set hammer.<br/><br/>
<center><img src="images/mem/Unit2/Lesson4/16.jpg" width="220"><img src="images/mem/Unit2/Lesson4/17.jpg" width="220"><br/>
<table width="500"><tr><td><b>Figure 10: Flatter</b></td><td><b>Figure 11: Set Hammer</b></td></tr></table></center>
<b>Set Hammer</b><br/>
A set hammer is used for setting down metal in a forging to form a square corner. It has a square face. It is laid upon the workpiece and struck with a sledge hammer in order to finish corners in shouldered work.<br/><br/>
<b>Heading Tool or Bolsters</b><br/>
A heading tool is used to from bolt heads. It has a circular head with a hole in the center. Different heads are available with a different size of hole.<br/><br/>
<b>Snaps and dollies</b><br/>
Snaps and dollies are always in pairs. Snaps, which are also called as cup tools, form top tools while the dollies form bottom tools. The snap is held over the work by the smith and struck by the smith's assistant. Dollies have a square tapered shank which fits into the corresponding hole in the tail of the anvil.<br/><br/>
<b>Drawers or rivet setts</b><br/>
Drawers or rivet setts are used for forcing down the top plate over the rivet shank before riveting.<br/><br/>
<b>3.2.7 Measuring tools</b><br/>
Steel rule, try square, calipers and wing divider form the commonly employed measuring and testing tools in smithy shop.
</p></dd><br/>
<dt><b><a name="operations">3.3&nbsp;&nbsp;&nbsp;Smithy operations</a></b></dt>
<dd><p>
The smithy consists of a combination of the following simple operations.<br/><br/>
<b>3.3.1 Upsetting</b><br/>
Upsetting is forging operation carried out to increase the thickness of a section at any desired portion at the expense of decrease in length section. The portion to be upset is heated locally to a little beyond its plastic state and then it is hammered. When the increase in the thickness is required only at the end of the section 
as shown in the figure (a), the end of the section is heated and is hammered repeatedly upon the anvil till the thickness is increased. Whenever the thickness of the mid portion of the section is to be increased as shown in figure (b), the section heated at the mid portion, is placed vertically on the anvil, number
of blows are delivered using a sledge hammer. The neighboring portions are cooled by quenching them in water to prevent them from bending. Production of bolt heads, rivet heads, hammer heads are examples of upsetting.<br/><br/>
<center><img src="images/mem/Unit2/Lesson4/18.jpg" height="350"><br/><b>Figure 12: Upsetting</b></center>
<b>3.3.2 Drawing down</b><br/>
It is the process of increasing the length of any piece and at the same time reducing either its width or thickness or both. For increasing the length of the square or rectangular section bars, they are placed on the edge of the anvil as shown in figure and is struck by the cross peen hammer. If the thickness is to be reduced on both the sides, the bar is turned by 90<sup>o</sup> and the steps are repeated.<br/><br/>
<center><img src="images/mem/Unit2/Lesson4/19.jpg" width="220"><img src="images/mem/Unit2/Lesson4/20.jpg" width="220"><img src="images/mem/Unit2/Lesson4/21.jpg" width="220"><br/>
<table width="620"><tr><td><b>Figure 13: Drawing down</b></td><td><b>Figure 14: Setting down</b></td><td><b>Figure 15: Swaging</b></td></tr></table></center>
<b>3.3.3 Setting down</b><br/>
Setting down is the local thinning down operation using a set hammer or a flatter by previous application of the fuller.<br/><br/>
<b>3.3.4 Cutting out</b><br/>
This operation consists of workpiece being cut completely in trimming to shape. The long piece is cut into several specified lengths. This operation is performed with the help of chisels and hardy.<br/><br/>
<b>3.3.5 Swaging</b><br/>
Swaging is the operation by which the round forged rods are made smooth and work pieces of uniform cross section are obtained by swages.<br/><br/>
<b>3.3.6 Bending</b><br/>
It is one of the most important and frequently used process in smith work for bending the work to various angles. The bends are made over the edge of the anvil on the beak or horn or round a special block having a stem fitting into a square hole provided for the bottom tools. In all the cases, the metal on the inner
or concave side of the bend is being "upset" while on the outer or convex side of the bend the metal is subjected to a "drawing down" action. By this process sections are bent to form square corners, slow bends, rings, hooks, eyes, links, hooks, bow shaped laminated springs, eye bolts, shackles.<br/>
<center><img src="images/mem/Unit2/Lesson4/22.jpg"><br/><b>Figure 16: Bending</b></center>
<b>3.3.7 Forge Welding</b><br/>
It is the process by which the separately forged pieces or parts are joined together. Workpieces to be joined are heated to white heat, beyond the plastic range but below the fusion point. Further they are joined them into one solid piece by forcing them one into another with hammer blows. The common examples of forge welding are hooks in chains, ends of rings, links.<br/><br/>
<center><img src="images/mem/Unit2/Lesson4/23.jpg"><br/><b>Figure 17: Forge welding</b></center>
<b>3.3.8 Punching and drifting</b><br/>
Punching is a process by which through holes or recesses are made in the workpieces when it is heated to plastic state. These recesses may be parallel or tapered and may be of any shape and size. Drifting is the process of widening and smoothening of the punched hole by passing a tapered drift of the exact size
of the recess. The few examples of the objects on which this process is performed are hammer heads, cold and hot sets, shaping top tools, axes, in which eyes are punched, enlarged and drifted to suitable shape for fixing wooden handles.<br/><br/>
<center><img src="images/mem/Unit2/Lesson4/24.jpg" width="220"><img src="images/mem/Unit2/Lesson4/25.jpg" width="220"><br/>
<table width="500"><tr><td><b>Figure 18: Punching</b></td><td><b>Figure 19: Drifting</b></td></table></center>
<b>3.3.9 Riveting</b><br/>
This process is used to join one or more metal sections together by means of mechanical element known as rivets. The riveted sections are found in steel structures, tanks, bridges, boiler and furnace shells, arms of tongs, shears.
</p></dd><br/>
<dt><b><a name="jigs">3.4&nbsp;&nbsp;&nbsp;Bending jigs</a></b></dt>
<dd><p>
Thin strips of metal can easily be bent by hand, wrap them around a wooden form a required shap. If several strips are to be bent to the same radius, a suitable bending jig is formed from a block of hardwood and shaped metal pegs.<br/><br/>
<center><img src="images/mem/Unit2/Lesson4/26.jpg"><br/><b>Figure 20: Bending jigs</b></center>
</p></dd>
<dt><b><a name="care">3.5&nbsp;&nbsp;&nbsp;Use and care of Smithy Tools</a></b></dt>
<dd><p>
1. The top face of the anvil, as well as the horn, must be kept smooth and clean so as not to damage the workpiece to be forged upon them.<br/>
2. The flatters, fullers, swages and set hammer must be kept properly ground, shaped and clean.<br/>
3. Hammers must be kept in good condition. Handles are repaired and replaced in the same manner as hammer handles.<br/>
4. Shaping of tools is performed by grinding in the same manner as hammer head.<br/>
5. The hardy must be kept sharp and is ground as done for a chisel. To prevent rusting, cover tools and anvil with a thin film of oil after use.
</p></dd><br/>
<dt><b><a name="safety">3.6&nbsp;&nbsp;&nbsp;Safety Precautions</a></b></dt>
<dd><p>
1. Use extreme care when using tools to prevent metal chips from flying around and to prevent hot sparks from causing personal injury or fires.<br/>
2. When hot metal is to be forged, wear goggles to protect the eyes, particularly when shaping and cutting.
</p></dd><br/>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit2lesson2.php" title="Forging Process">Lecture 2</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit2lesson4.php" title="Forging Equipments">Lecture 4</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?> 