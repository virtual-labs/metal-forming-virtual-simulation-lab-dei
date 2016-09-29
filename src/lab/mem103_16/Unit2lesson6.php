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
<tr><td width="65%"><b>Lesson 6 Sheet Metal Working</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit2/Unit2lesson6.pdf" target="_blank" title="Download Lesson 6">Lesson 6 Download</a></td></tr>
<tr><td><a href="#introduction">6.1 &nbsp;&nbsp;&nbsp;Introduction</a></td></tr>
<tr><td><a href="#dies">6.2 &nbsp;&nbsp;&nbsp;Punches and Dies</a></td></tr>
<tr><td><a href="#operations">6.3 &nbsp;&nbsp;&nbsp;Sheet Metal Working Operations</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.1&nbsp;&nbsp;&nbsp;Piercing and Punching</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.2&nbsp;&nbsp;&nbsp;Blanking</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.3&nbsp;&nbsp;&nbsp;Notching</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.4&nbsp;&nbsp;&nbsp;Beading</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.5&nbsp;&nbsp;&nbsp;Flanging</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.6&nbsp;&nbsp;&nbsp;Hemming</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.7&nbsp;&nbsp;&nbsp;Seaming</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.8&nbsp;&nbsp;&nbsp;Perforating</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.9&nbsp;&nbsp;&nbsp;Slitting</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.10&nbsp;&nbsp;&nbsp;Lancing</td></tr>
<tr><td><a href="#mechanism">6.4&nbsp;&nbsp;&nbsp;Mechanism of Blanking</a></td></tr>
<tr><td><a href="#drawing">6.5&nbsp;&nbsp;&nbsp;Drawing</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.5.1&nbsp;&nbsp;&nbsp;Drawing of Shearing Force</td></tr>
<tr><td><a href="#coining">6.6&nbsp;&nbsp;&nbsp;Coining</a></td></tr>
<tr><td><a href="#embossing">6.7&nbsp;&nbsp;&nbsp;Embossing</a></td></tr>
<tr><td><a href="#wire">6.8&nbsp;&nbsp;&nbsp;Wire Drawing</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="introduction">6.1 &nbsp;&nbsp;&nbsp;Sheet Metal Working</a></b></dt>
<dd><p>
Products made by sheet-metal forming processes are all around us. They include utensils, file cabinets, appliances, vehicle bodies etc. Compared to casting and forging, sheet-metal parts offer the advantages of lightweight and versatile shapes. Because of low cost and generally good strength and formability characteristics, low-carbon steel is the most commonly used sheet metal.<br/><br/>
Material economy and the resultant reduction in weight and cost, high productivity, use of unskilled labor, and a high degree of possible precision have rendered Sheet metal press-work indispensable for many mass produced goods such as electronic appliances, steel furniture, utensils and vehicle bodies. The entire top of a car is finished to size from a single metal sheet. In sheet metal working, there is no need for further machining as required for castings or forging.<br/><br/>
The importance of sheet metal can be best explained by an example. Component shown in Figure 6.1 can be manufactured by machining process or by sheet metal working. If sheet metal working is used, this reduces the material requirement and the manufacturing time to less than half.
<center><img src="images/mem/Unit2/Lesson6n/1.jpg"><br><b>Figure 6.1  Components manufactured by sheet metal working</b></center>
</p></dd>
<dt><b><a name="dies">6.2 &nbsp;&nbsp;&nbsp;Punches and Dies</a></b></dt>
<dd><p>
Sheet metal operations are usually carried by using punch and die. The mechanism of operation of punch and die is shown in Figure 6.2. Die is having the negative shape of the contour and punch has the positive contour of the shape to be produced. Sheet or plate to be shaped is kept over the die as shown in Figure 6.2(a). Then force is applied through the punch as shown in Figure 6.2(b). Small clearance is kept between punch and die for the thickness of sheet metal.
<center><img src="images/mem/Unit2/Lesson6n/2.jpg" width="400"><br><b>Figure 6.2 Operation of punch and die</b></center>
</p></dd>
<dt><b><a name="operations">6.3 &nbsp;&nbsp;&nbsp;Sheet Metal Working Operations</a></b></dt>
<dd><p>
Different operations can be performed by using a punch and a die on a sheet of metal. Some of these are described here.<br/><br/>
<b>6.3.1  Piercing and Punching</b><br/>
It is the operation of production of a hole in a sheet metal by the punch and die. The material punched out to form the hole constitutes the waste and the sheet with the hole is the required product.<br/>
In the case of punching, a cylindrical hole is produced, whereas in the case of piercing the hole produced may be of any other shape. Piercing operation is shown in Figure 6.3(a).<br/><br/>
<b>6.3.2  Blanking</b><br/>
Blanking is the operation of cutting a piece of required shape from a sheet using a punch and a die. The metal punched out is the required product in blanking and is called blank. Blanking operation is shown in Figure 6.3(b).<br/><br/>
<center><img src="images/mem/Unit2/Lesson6n/3.jpg"><br><b>Figure 6.3 Piercing and blanking operations</b></center>
<b>6.3.3  Notching</b><br/>
It is the operation of removal of metal of the desired shape from the edge of the plate. Notching is shown in Figure 6.4.<br/><br/> 
<center><img src="images/mem/Unit2/Lesson6n/4.jpg"><br><b>Figure 6.4 Notching</b></center>
<b>6.3.4  Beading</b><br/>
Beading is the forming of the rolled edge by bending the edge of sheet metal. This is shown in Figure 6.5. It gives strength and stiffness to the edge and sharp edges that might injure the users of the part are avoided.<br/><br/>
<center><img src="images/mem/Unit2/Lesson6n/5.jpg"><br><b>Figure 6.5 Beading</b></center>
<b>6.3.5  Flanging</b><br/>
Flanging is the process of bending the edges of sheet metals at 90 degrees. Flanging is done to increase the stiffness or to join two sheet metal parts. This is as shown in Figure 6.6.<br/><br/>
<center><img src="images/mem/Unit2/Lesson6n/6.jpg"><br><b>Figure 6.6 Flanging</b></center>
<b>6.3.6  Hemming</b><br/>
Hemming refers to the process of folding over the edge of a piece of sheet metal and pressing it flat. This stiffens the sheet and creates safer, non-jogged edge. This is shown in Figure 6.7.<br/><br/>
<center><img src="images/mem/Unit2/Lesson6n/7.jpg"><br><b>Figure 6.7 Hemming – single and double hemming</b></center>
<b>6.3.7  Seaming</b><br/>
For joining two sheets at the edges, without use of fasteners, welding or other joining processes, seaming operation is used. Seaming is similar to hemming operation and is shown in Figure 6.8. One or both sheets are flanged before seaming. An example of seaming operation is the joining of top cover with the cylindrical body of beverage cans and food containers.<br/><br/>
<center><img src="images/mem/Unit2/Lesson6n/8.jpg"><br><b>Figure 6.8 Seaming</b></center>
<b>6.3.8  Perforating</b><br/>
Perforating is the operation of production of a number of evenly spaced holes in a regular pattern on a sheet metal. It is shown in Figure 6.9.<br/><br/> 
<center><img src="images/mem/Unit2/Lesson6n/9.jpg"><br><b>Figure 6.9 Perforating</b></center>
<b>6.3.9  Slitting</b><br/>
Slitting is the operation of cutting a sheet metal along a straight line along the length. Slitting is shown in Figure 6.10.<br/><br/> 
<center><img src="images/mem/Unit2/Lesson6n/10.jpg"><br><b>Figure 6.10 Slitting</b></center>
<b>6.3.10 Lancing</b><br/>
Lancing is the operation of cutting a sheet of metal through part of its length and bending the cut portion. Lancing is shown in Figure 6.11.<br/><br/> 
<center><img src="images/mem/Unit2/Lesson6n/11.jpg"><br><b>Figure 6.11 Lancing</b></center>
</p></dd>
<dt><b><a name="mechanism">6.4 &nbsp;&nbsp;&nbsp;Mechanism of Blanking</a></b></dt>
<dd><p>
The process of blanking is shown in Figure 6.12. The sheet is placed between the punch and the die. The punch diameter (size) is the size of the blank required and the die is made slightly bigger in size. The sheet is firmly held down and punch is forced into the sheet. The compressive stresses acting in the metal give rise to the strain distribution, as shown in Figure 6.12.<br/>
<center><img src="images/mem/Unit2/Lesson6n/12.jpg"><br><b>Figure 6.12 Mechanism of blanking</b></center><br/>
The dragging down of the punch into the sheet produces tensile stresses at the punch edges. Due to the diagonal pinching of the metal between the approaching faces of punch and die, the metal in between is subjected to compressive stresses, leading to relative shear and fracture of metal. As you see in Figure 6.12, the material is subjected to both compressive and tensile stresses. The different stages of shear of metal plate involved in blanking are shown in Figure 6.13.<br/>
<center><img src="images/mem/Unit2/Lesson6n/13.jpg"><br><b>Figure 6.13 Different stages in blanking</b></center><br/>
In the first stage, the punch presses the sheet and the latter is subjected to elastic deformation, as shown in Figure 6.13(a). With subsequent penetration of the punch, the plastic deformation commences and proceeds. With more and more penetration, the surface tensile stresses in the sheet metal go on increasing and at one stage the ultimate tensile strength of the surface material is exceeded, giving rise to fractures at the punch and die edges, as shown in Figure 6.13(b). In the third stage, the cracks propagate with further increase in punch stroke as shown in Figure 6.13(c), and when the area of cross-section reduces sufficiently, it fractures suddenly causing a tensile cleavage fracture separating the blank from the sheet.
</p></dd><br/>
<dt><b><a name="drawing">6.5 &nbsp;&nbsp;&nbsp;Drawing</a></b></dt>
<dd><p>
The process of shaping a flat or a hollow blank into a three-dimensional hollow component without any appreciable change in sheet thickness is called drawing. If the depth to diameter ratio is more than 0.4, then it is called deep drawing. The drawing process is shown in Figure 6.14. During this process, a punch forces the blank to flow through a die, so that it assumes a cylindrical, box or cup shape. Considerable compressive stresses appear in the flange portion of the blank being drawn, and this causes wrinkling if the blank thickness is small. To prevent wrinkling a blank holder is used which holds the blank firmly until it is completely drawn.<br/>
<center><img src="images/mem/Unit2/Lesson6n/14.jpg"><br><b>Figure 6.14 Drawing operation</b></center><br/>
Pulling the blank into the die cavity induces compressive stress, which tend to cause the flange to wrinkle during drawing. You can demonstrate wrinkling by trying to force a circular piece of paper into a round cavity such as a drinking glass. Wrinkling can be reduced or eliminated if a blank holder is used. The blank holder presses the sheet down under a certain force and prevents wrinkling.<br/><br/>
In a single stage drawing operation, a cup may be obtained of a diameter from 1.8 to 2 times less than that of the initial flat blank. Upon more deformation, the drawing force required increases to such an extent that the metal is ruptured. A further reduction in cup diameter is possible only by subsequent forming operation called redrawing.<br/><br/>
<b>6.5.1  Drawing or Shearing Force</b><br/>
The total force required for drawing is the addition of ideal drawing force plus frictional forces plus bending and restraightening forces acting at the die radius region. 
The drawing force does not remain constant throughout the stroke of the process. At the beginning of the stroke it increases rapidly and reaches a maximum due to strain hardening of the material. Thereafter, it starts decreasing. The drawing force variation is shown in Figure 6.15 for three different types of materials.<br/>
<center><img src="images/mem/Unit2/Lesson6n/15.jpg"><br><b>Figure 6.15 Force variation during deep drawing</b></center><br/>
The forces developed in a drawing or shearing operation depend upon the die clearance i.e. the gap between punch and die, the shear strength of the material to be drawn or cut and the sheet thickness.
</p></dd><br/>
<dt><b><a name="coining">6.6 &nbsp;&nbsp;&nbsp;Coining</a></b></dt>
<dd><p>
The term coining refers to the cold squeezing of metal while all of the surfaces are confined within a set of dies. The process is used for the production of coins, medals etc. The metal is coined in a completely closed die cavity. The pressures required can be as high as 5-6 times the strength of the material in order to produce fine details. Figure 6.16 illustrates the coining process.<br/>
<center><img src="images/mem/Unit2/Lesson6n/16.jpg"><br><b>Figure 6.16 Coining process</b></center><br/>
The operation is performed in dies that confined metal and restrict its flow in a lateral direction. Metals having good malleability are suitable for coining. The metal blank of proper size is placed within the punch and the die and tremendous pressure is applied on the blank from both ends. Under sever compressive load, the metal flows in the cold state and fills up the cavity of the punch and die. The component thus produced gets a sharp impression on its surfaces, corresponding to the engravings on the punch and the die.<br/><br/>
Several coining operations may be required in order to produce fine details on some parts. Lubricants cannot be used in coining, since they can be entrapped in the die cavity and, being incompressible, prevent the full reproduction of die-surface details on the metal.
</p></dd><br/>
<dt><b><a name="embossing">6.7 &nbsp;&nbsp;&nbsp;Embossing</a></b></dt>
<dd><p>
Embossing is the operation of producing raised or depressed impression of figures, letters or designs on sheet metal parts. The major use of embossing process in the production of nameplates, identification tags and aesthetic designs on thin sheet metal or foil.  Embossing process is shown in Figure 6.17.<br/>
<center><img src="images/mem/Unit2/Lesson6n/17.jpg"><br><b>Figure 6.17 Embossing process</b></center><br/>
The punch, or the die, or both of them may have the engravings of the shape to be produced on the workpiece. The work piece material is stretched over a male die and caused to conform to the male die surface by a mating female surface die. The finished product will have depressed detail on one side and a raised detail on the other. Embossing is more of a drawing or stretching operation and does not require the high pressures necessary for coining. Embossing is a cold working process.
</p></dd><br/>
<dt><b><a name="wire">6.8 &nbsp;&nbsp;&nbsp;Wire Drawing</a></b></dt>
<dd><p>
The process of wire drawing is shown in Figure 6.18.<br/>
<center><img src="images/mem/Unit2/Lesson6n/18.jpg"><br><b>Figure 6.18 Wire drawing process</b></center><br/>
Wire drawing involves pulling metal through a die. A tensile force is applied to the metal on the exit side of the die. Most of the plastic flow of the metal is caused by radial compression force, which arises from the reaction of the metal area within the die. Depending on the diameter of the final product obtained, the process may be termed as bar, rod, or wire drawing. For wire drawing, material must have a good ductility. Sometimes, the material is annealed to improve the ductility before it is subjected to wire drawing process. The material, which is subjected to wire drawing process, must be clean and free from scale, dust etc. the presence of which can severely affect the die. The pressures acting at the interface of the die and the metal being very high, the lubrication of the die is a serious problem.<br/><br/>
The important feature of the wire drawing operation is that the material can be drawn down to very small diameters and to exact sizes. But, for obtaining significant changes in the size multiple passes are required. The surface finish obtained in cold drawing is excellent. The drawing speeds of modern wire drawing equipment exceed 1500 m/min.<br/>
Some of the applications of this process are manufacture of fine wires for electrical and transformer industry, filaments and lead in wires for lamps, etc.<br/><br/>
<b>Example 6.1</b> A square duct required for an air-conditioning system is to be made from Aluminum sheet metal. The duct is shown in Figure 6.19 and shaded portions in the figure indicate places where sheet metal work has to done. Identify the different sheet metal operations involved in manufacturing the duct. Illustrate the sequence of these operations<br/>
<center><img src="images/mem/Unit2/Lesson6n/19.jpg"><br><b>Figure 6.19 The duct to be manufactured</b></center>
<b>Solution:</b><br/>
The duct is made from sheet metal by performing the following operations:<br/>
1. Bending or folding to get the square shape,<br/>
2. Seaming at the edges of the sheet after folding to join the two edges,<br/>
3. Hemming at the top edge, and<br/>
4. Flanging at the bottom edge.<br/><br/>
The bottom edge is flanged to facilitate joining of two ducts or fixing the duct to the wall bracket. The stages of manufacturing the duct are illustrated in Figure 6.20.<br/><br/>
The stages of manufacturing the duct are explained below:<br/>
1. First, the raw material (Al sheet) is marked, that is, lines at which sheet is to be bent or folded, to form the square duct, are marked. See Figure 6.20(a).<br/>
2. Next, the sheet is folded over a die and seaming is done to join the two edges of the sheet, as shown in Figure 6.20(b).<br/> 
<center><img src="images/mem/Unit2/Lesson6n/20.jpg"><br><b>Figure 6.20 Different stages in producing ductwork</b></center><br/>
3. Next, hemming is done at the top edge of the square duct formed in previous step. It is shown in Figure 6.20(c).<br/>
4. Finally, the lower edge of the duct is flanged (folded) to produce the final duct. This is shown in Figure 6.20(d).
</p></dd><br />
<table width=1024><tr><td style="font-weight:bold;"><a href="Unit2lesson5.php" title="Rolling Processes">Lecture 5</a></td></tr></table>
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