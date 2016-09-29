<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body id="draggingDisabled" bgcolor="#FFFFFF">
<div id="header_main"></div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
echo <<<EOQ
	<li><a href="home.php">Home</a></li>
	<li><a href="Cogging.php">Cogging Process</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Cogging</a>
	<ul>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/jUw3foLVLZg">Cogging setup</a></li>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/XTe_02Sxupw">Cogging with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Becking</a>
	<ul>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/D19yhSH2-QY">Becking Setup</a></li>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/x2Bnh8-lb3Y">Becking with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Multi Diameter Shaft</a>
	<ul>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/CVXHdI320VM">Multi Diameter Shaft Setup</a></li>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/7kxN1AZbgkc">Multi Diameter Shaft with Strain</a></li>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/FBpvaDGd-_w">Multi Diameter Shaft with Curve</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_cogging.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Cogging Process</h2><br>
Cogging is a metalworking process used to improve the grains of a piece of metal. It is a hot metal forging technique involving two dies with shaped surfaces. The term "cogging" come from the fact that the metal is meant to be pressed into the shape of the die in the same way two cogs will fit into each other, though the shape of the die is not always rectangular.<br/>
<center><table><tr><td><img src="images/Cogging/cogging1.png" width="325" height="275"></td><td width="5%"></td><td><img src="images/Cogging/cogging2.png" width="350" height="275"></td></tr>
<tr><td>Figure: 1 Cogging Process</td><td width="5%"></td><td>Figure: 2 Movement of billet and the dies <br>during cogging process</td></tr></table></center><br/>
Cogging is often an intermediate stage in the metalworking process. It is used to change the internal structure of ingots. An ingot is formed after raw metals have first been melted, then poured into moulds. The metal is then easier to handle, but will need to undergo further forging and tempering before it can be used. After cogging 
billets are refined pieces of metal which can then be forged or cast into more complex components.<br/><br/>The cogging process begins with heating metal ingots until they are malleable, but not molten. The ingots are placed between two shaped dies. The surface of the dies are moulded so as to encourage the metal to form a certain shape. The hot ingot 
will then be rotated and struck repeatedly between the two dies. Depending on the shape of the dies used, the finished ingot, now called a billet, can take on many different shapes. It can be rounded, square, or even hexagonal.<br/><br/>During the cogging process, the ingot becomes a little longer with each blow. As the ingot lengthens, the metal grain changes and 
becomes longer and more homogenized. The rotation of the ingot between strikes encourages even shaping and lengthening. This effect, coupled with the compression of the centre of the ingot as it is repeatedly struck, further strengthens the metal. In a variation on this process, the metal is sometimes shaped by the pressure of rollers into the shape of the 
die, and then rotated until the final form is achieved. During this hot forging process, the cast, coarse grain structure is broken up and replaced by finer grains. Low-density areas, micro-shrinkage and gas porosity inherent in the cast metal are consolidated through the reduction of the ingot, achieving sound canters and structural integrity. Mechanical 
properties are therefore improved through the elimination of the cast structure, enhanced density, and improved homogeneity.<br/><br/>Cogging metal is a long process that requires many adjustments. The metal will need to be reheated between strikes so that it remains malleable. The ingot may need hundreds of blows along its length before it reaches the desired 
shape and strength. Some forging machines have been developed to make this process easier. The number of strikes and the amount of force used can be programmed in so that the ingot remains uniform.<br/>Let us take an example of forming of round billet into square billet by simple cogging  simulation.<br/><br/>
<center><table><tr><td><img src="images/Cogging/cogging3.png" width="325" height="275"></td><td width="5%"></td><td><img src="images/Cogging/cogging4.png" width="350" height="275"></td></tr>
<tr><td>Figure: 3 Round billet after first pass</td><td width="5%"></td><td>Figure: 4 Rotation of the billet for <br>the second pass</td></tr><tr><td><img src="images/Cogging/cogging5.png" width="325" height="275"></td><td width="5%"></td>
<td><img src="images/Cogging/cogging6.png" width="350" height="275"></td></tr><tr><td>Figure: 5 Round billet formed into <br>square billet by cogging process</td><td width="5%"></td>
<td>Figure: 6 Final Square Billet</td></tr></table></center>
<br/><span class="blue">Hexagonal billet</span> forming by cogging process is similar to that of  square billet formation,but with difference that billet is rotated through 600 instead of 900 after 
each pass. So the number of passes increases with the complexity of shape and the thickness to be reduced.During the cogging process the coarse grain structure is broken up and replaced 
by finer grains. Low-density areas, micro-shrinkage and gas porosity inherent in the cast metal are consolidated through the reduction of the ingot, achieving sound canters and 
structural integrity.<br/><br/>
<center><table><tr><td><img src="images/Cogging/cogging7.png" width="325" height="275"></td><td width="5%"></td><td><img src="images/Cogging/cogging8.png" width="350" height="275"></td></tr>
<tr><td>Figure: 7 Hexagonal billet forming <br>using cogging process</td><td width="5%"></td><td>Figure: 8 Billet motion during the pass<br>during cogging process</td></tr></table></center>
<br/><span class="blue">Becking Opreation:</span> Becking operation or circular cogging operation is type of a cogging operation in which the ring is to be surface hardened. It is type of a hot forming process. 
In the cogging operation the billet is to be hammered continuously by number of blows. At each blow the translation is given to the billet in a direction. After the pass the billet is rotated and moved in opposite direction for the next pass between the two dies. 
In circular cogging/becking there is no need to make number of passes because after each revolution a new pass will be counted. Like the simple cogging process the hammer beats the ring and changes its grain structure at the surface.
<br/><br/><span class="blue">Die Arrangement:</span> In figure 9 you can see the arrangement of the ring and the die to perform the process. The ring is shown by the red color and is hanged up on the roller. The roller is shown by the green color, the ring rests over the roller. Roller rotates the ring at each blow. The hammer is shown by the yellow color. The hammer translates up and down and beats the ring forcefully. The each blow the outer surface of the ring is beaten up by the hammer and internal surface by the roller. The process continues till the desired strain at the surface of the ring is not obtained. The figure 9 shows the arrangement of dies and ring and kinematics of dies.
<br/><br/><center><img src="images/Cogging/Becking.png" width="300" height="375"><br/>Figure-9: Becking Operation</center>
<br/><span class="blue">Results:</span> After the operation the ring get surface hardened. The grain structure of the ring gets changed by hammering of the hammer. The figure 10 shows the change in grain structure of the ring.
<br/><br/><center><img src="images/Cogging/GrainStructure.png" width="500" height="250"><br/>Figure-10: Change in grain structure in the ring and equivalent strain generated after the operation</center>
<br/>A significant amount of equivalent strain in generated at the surface of the ring which is the aim of the operation. This will make the ring hardened from the surface and increases it strength.
</div>
<?php
 	//Opening file to get counter value
	$fp = fopen ("counter.txt", "r");
	$count_number = fread ($fp, filesize ("counter.txt"));
	fclose($fp);
	$counter = (int)($count_number) + 1;
    $count_number = (string)($counter);
	$fp = fopen ("counter.txt", "w");
	fwrite ($fp, $count_number);
	fclose($fp);
?>
</div> 
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>