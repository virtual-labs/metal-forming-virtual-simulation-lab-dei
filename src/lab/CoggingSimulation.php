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
<div><center>
<?php
$value = $_SERVER['QUERY_STRING'];
$plist = basename($_SERVER['REQUEST_URI']);
print <<<EOQ
<iframe width="1020" height="600" src=$value?rel=0&autoplay=1&loop=1&playlist=$plist frameborder="0" allowfullscreen></iframe>
EOQ;
if(stristr($value,"jUw3foLVLZg"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Cogging is a metalworking process used to improve the grains of a piece of metal. It is a hot metal forging technique involving two dies with shaped surfaces. It is used to the deform the structure of ingots.. After cogging billets are refined pieces of metal which can then be forged or cast into more complex components. 
In the given simulation video of cogging, one can see the deformation of round billet into square shape. Initially the billet is heated above 1000<sup>o</sup>C and passed through the upper and lower die. The upper and the lower die presses the billet in vertical direction and deform it laterally. After each blow the billet is moved in forward direction in steps. this ensures uniform deformation of billet. After one  complete pass, the billet is rotated through 90<sup>o</sup> in clockwise direction. With the rotation, the billet is passed through the dies in opposite direction .At the end of second pass, the round billet gets converted into a square one.      
The graph in the simulation video shows the variation of the force applied by the upper and the lower die on the round billet. From the graph one can depict that with the successive passes, the force required for the deformation of billet increases. This is due to grain structure improvement of the billet on deformation at high temperature with successive blows.
The process is repeated till the desired dimension is obtained with proper grain structure and material properties.
</td></tr></table>
<?php
}elseif(stristr($value,"XTe_02Sxupw"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Cogging is an intermediate stage in the metalworking process. It is used to change the internal structure of ingots. In this process the red hot billet is passed through dies and deformed by compressing it in steps. After one pass the billet is again rotated and  again passed through dies for deformation. With successive deformation the grain structure of the billet improves and one can get  the desired shape like square ,hexagonal or round shape.
Now one can depict from the left hand simulation video, cogging process of round billet into square billet. On the left hand side the video shows the variation of temperature of the billet during the cogging process. Initially the temperature of billet is 1250<sup>o</sup>C. But during the multi-pass cogging process  the billet temperature starts reducing  and reaches up to 900<sup>o</sup>C  up to second pass. 
In the right hand simulation video one can depict the variation of equivalent strain in the billet during cogging process. Initially the equivalent strain in the billet is zero .During successive passes of cogging process the strain in various regions of billet increases. Greater strain in the billet indicates severe deformation of material and hence better grain structure. 
In the video one can see the equivalent strain at the centre of billet and  the surface of the billet. Up to second pass the billet equivalent strain reaches to 1.054.  
</td></tr></table>
<?php
}elseif(stristr($value,"D19yhSH2-QY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
It is a special type of cogging process, in which cogging is done for surface hardening of the ring. In this video one can see the becking process setup. There is a ring which has to be surface hardened, the hammer translates up and down and beats up the ring at each stroke, roller rotates the ring to a certain angle at each stroke, this will be made, so that ring is equally beaten up at whole surface and the whole surface get hardened. 
At each stroke, a slight strain is produced at the surface of the ring. After each full revolution of the ring the same points are again beaten up by the hammer which will increase the equivalent strain further. In the image you can see the grain structure of the ring, it gets refined from initial stage to final stage of the ring and this make the ring surface hardened. The image also shows the dies used in the process. The hammer is shown with yellow color and roller is of green.
</td></tr></table>
<?php
}elseif(stristr($value,"x2Bnh8-lb3Y"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
It is a special type of cogging process, in which cogging is done for surface hardening of the ring. There is a ring which has to be surface hardened, the hammer translates up and down and beats up the ring at each stroke, roller rotates the ring to a certain angle at each stroke, this will be made, so that ring is equally beaten up at whole surface and the whole surface get hardened. 
You can also see the equivalent strain generated in the ring. At each stroke, a slight strain is produced at the surface of the ring. After each full revolution of the ring the same points are again beaten up by the hammer which will increase the equivalent strain further. Change in the value of equivalent strain refers to the refinement of the microstructure of the material. 
Higher the equivalent strain more finer is the microstructure. The temperature decreases as the process move to forward step, at each stroke some of the heat by the ring is lost to the roller and hammer. The temperature distribution is uniform at volume level. The value of working temperature decides whether the microstructure would be fine or coarse. Lower temperature  result in fine grain structure.
</td></tr></table>
<?php
}elseif(stristr($value,"CVXHdI320VM"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This simulation shows the formation multi diameter shaft using forging.  The left hand side of the simulation shows the process of formation of multi diameter billet and the right hand side of the video shows the variation of temperature of the billet during the process.
Initially the billet is heated at 1250<sup>o</sup> C and passed through the four piece die set. The upper and the lower die presses the billet in vertical direction whereas the left and right die presses the billet in horizontal direction and deform it laterally. After each blow the billet is moved in forward direction in steps. 
This ensures uniform deformation of billet. After one complete pass, the billet is passed through the dies in opposite direction. At the end of second pass, the round billet gets converted into a shaft of smaller dia. 
In the third pass billet is moved in forward direction in steps covering half of its length with the increased force of the dies. In further passes the force applied by dies on the billet is increased. Finally after six passes the billet is deformed into the multi diameter shaft.
Initially the temperature of billet is 1250<sup>o</sup> C. But during the multi-pass forging process the billet temperature starts reducing and finally reaches up to 450<sup>o</sup> C after the sixth pass.
</td></tr></table>
<?php
}elseif(stristr($value,"7kxN1AZbgkc"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the given simulation video of cogging, one can see the deformation of round billet into the multi diameter shaft. Initially the billet is heated at 1250<sup>o</sup> C and passed through the four piece die set. The upper and the lower die presses the billet in vertical direction whereas the left and right die presses the billet in horizontal direction and deform it laterally. 
After each blow the billet is moved in forward direction in steps. This ensures uniform deformation of billet. After one complete pass, the billet is passed through the dies in opposite direction. At the end of second pass, the round billet gets converted into a shaft of smaller dia.
In the third pass billet is moved in forward direction in steps covering half of its length with the increased force of the dies. In further passes the force applied by dies on the billet is increased. Finally after six passes the billet is deformed into the multi diameter shaft.  
In the upper portion of the right hand simulation video, the set of 4 piece dies is shown with the various stages of shaft during the process of round billet into multi diameter billet. On the lower portion of the video the billet with meshing is shown. As the process continuous the change in the meshing takes place at points where pressure of billet is been applied. 
</td></tr></table>
<?php
}elseif(stristr($value,"FBpvaDGd-_w"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In this simulation video the variation of equivalent strain in the billet using forging process is shown. Initially the equivalent strain in the billet is zero. During successive passes of cogging process the strain in various regions of billet increases. Greater strain in the billet indicates severe deformation of material and hence better grain structure. 
Due to the repetitive pressure on the left part of the billet it results to a better grain structure in compare to the right section of billet. In the right hand simulation video the graph shows the variation of the force applied by the upper die along z-direction with steps on the round billet. From the graph one can depict that with the successive passes, 
the force required for the deformation of billet increases. This is due to grain structure improvement of the billet on deformation at high temperature with successive blows.
</td></tr></table>
<?php
}
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
</center></div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>	
</body>
</html>