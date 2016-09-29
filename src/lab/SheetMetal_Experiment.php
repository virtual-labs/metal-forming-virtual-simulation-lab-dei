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
	<li><a href="SheetMetal.php">Sheet Metal</a></li>
	<li class="dir"><a href="#">Bending Operations</a>
	<ul>
	<li class="dir"><a href="#">Bending Operations to reduce springback</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/SJStL4uRDYk">V-Shape Punch</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/xLxuA_actmU">U-Shape Punch</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ZJ_9jxHXuqI">V-Shape Punch & Curve</a></li>
	</ul>
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/8top1LwUJnU">Bending operation to remove springback</a></li>
	<li class="dir"><a href="#">Common Die Bending</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hD0n0zgxZns">V-Bending</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ND_EaxJaHsw">Circular Bending</a></li>
	</ul> 
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/y2b2QzRkmM0">Wipe Die Bending</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/D4eseTSohpA">Air Bending</a></li>
	</ul> 
	</li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Corrugated Sheet</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/0ZyTuDyknsA">Corrugated sheet</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/2cRDg6Ro8oM">Corrugated sheet with forging force</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/UTTKqDZTHBQ">Circular corrugated sheet</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ww1yCCP0yk8">Conical corrugated sheet</a></li>	
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/5qClMR0AWZc">Continuous corrugated sheet</a></li>	
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/MddaXm2bSvs">Discrete corrugated sheet</a></li>	
	</ul>
	</li>
	<li class="dir"><a href="#">Bead Forming</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/MvAU9SrcPn8">Bead forming of rod</a></li>	
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/Y-VsvDi-TKI">Bead forming of rod with strain</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hEU-MCawgb8">Bead forming of rod with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/JcJo4Cqvs2A">Bead forming of sheet</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/6qjFiM5JdTY">Bead forming of sheet with strain</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/r7HNMUxlp5U">Bead forming of sheet with curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Deep Drawing</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/AbJJ4akaXIE">Deep drawing-Downward</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/LkzLlvCbAbQ">Deep drawing-Upward</a></li>
	</ul> 
	</li>
	<li class="dir"><a href="#">Roll Forming</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/2mphVzWWVY0">Roll forming</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/B5hcRJHSdI4">Roll forming with curve</a></li>
	</ul> 
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hFtXJzH1new">Roll Bending</a></li>
	<li class="dir"><a href="#">Piercing</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/1-jmYZJvyJs">Piercing process</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/NIX1y2IgDd8">Piercing Setup</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/iR-CQmNtwT8">Piercing with strain</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/D2yQkArgikQ">Piercing with forging force</a></li>
	</ul> 
	</li>
	<li class="dir"><a href="#">Bush</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/wM7dtEBY1zU">Bush Forming</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/PMXnqgVKe0o">Bush Forming with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/c-5vaUJT-Bs">Bush step-1</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/CbhRzpTMcYE">Bush step-1 with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/_7JNBldI4bY">Bush step-2</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/f2FS0MdIPMQ">Bush step-2 with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/NbIa3YBY2pY">Bush step-3</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/bdwUY7twT9Y">Bush step-3 with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/BtJWSXCZ9hA">Final Bush</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Punching</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/fjxemYABsuY">Punching Operation</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ZcTo5SJBkFY">Punching with Contour</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/gRreMPrJ72c">Punching with Graph</a></li>
	</ul>
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hZPfU78odag">Coining</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/tEulKL2tDrU">Door Handle</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/1RHUg3eCGa4">Cover Plate</a></li>
	</ul>
	</li>
	<li><a href="MCQ_SheetMetal.php">Self Check Quiz</a></li>
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
if(stristr($value,"SJStL4uRDYk"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This sheet metal bending simulation depicts, a method to reduce Spring back is shown. The punch used here is of v shape &  the die of rectangular shape.  The bend produced in the sheet is of the same angle as that of the punch. The bottom of the sheet does not  touch the lower portion of the bottom die.
The sheet taken here is of 1mm in thickness. Punch velocity in downward direction is 3 mm/s. The variation of the punch force required is shown in the graph on the right side. The maximum punch force is 0.08 tonne. The colored strip on the left side shows the different values of equivalent strain produced.
</td></tr></table>
<?php
}elseif(stristr($value,"xLxuA_actmU"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This sheet metal bending simulation depicts, a method to reduce Spring back is shown. The front cross section of the punch is rectangular in shape. The bend produced after this type of bending process forms a u shape that’s why also called U – bending.
The sheet taken here is of 1mm in thickness. Punch velocity in downward direction is 3 mm/s. The variation of the punch force required is shown in the graph on the right side. The maximum punch force is 0.4 tonnes. The colored strip on the left side shows the different values of equivalent strain produced.
</td></tr></table>
<?php
}elseif(stristr($value,"8top1LwUJnU"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This sheet metal bending simulation depicts, a method to reduce spring back is shown. The punch used here is not a simple v punch, but at the tip of the punch one can see a bigger end. This type of punch is used to put extra pressure on the sheet to reduce spring back .  
The sheet taken here is of 1mm in diameter. Punch velocity in downward direction is 3 mm/s. Evolution Of Bending Force With Punch Height is shown in the graph on the right side. The maximum punch force is 1.5 tonne. The colored strip on the left side shows the different values of equivalent strain. The generation of strain can be seen at the bending portion.
</td></tr></table>
<?php
}elseif(stristr($value,"ZJ_9jxHXuqI"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This sheet metal bending simulation depicts, a method to reduce spring back is shown. The punch used here is  a simple v punch, but  the die used here is rectangular type. In This type of bending the bend angle of sheet is kept bigger than the angle of punch, the depth of die decides the angle.
The sheet taken here is of 1mm in diameter. Punch velocity in downward direction is 3 mm/s. The variation of the punch force required is shown in the graph on the right side. The maximum punch force is 0.06 tonne. The colored strip on the left side shows the different values of equivalent strain. The generation of strain can be seen at the bending portion.
</td></tr></table>
<?php
}elseif(stristr($value,"hD0n0zgxZns"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This sheet metal bending simulation depicts, a simple v bending operation is shown. The punch used here is a simple v punch & the die used here is also of v type. In This type of bending the bend angle of sheet is same as that of the die angle.
The sheet taken here is of 1mm in diameter. Punch velocity in downward direction is 3 mm/s. The variation of the punch force required is shown in the graph on the right side. The maximum punch force is 0.06 tonne. The colored strip on the left side shows the different values of equivalent strain. The generation of strain can be seen at the bending portion.
</td></tr></table>
<?php
}elseif(stristr($value,"y2b2QzRkmM0"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This sheet metal bending simulation depicts, a common method of bending is shown. This method of bending is called Wipe die bending or also called edge bending. Wipe bending requires the sheet to be held by a pressure pad upon the wipe die. The punch then presses against the edge of the sheet that extends beyond the die and pad. The sheet will bend according to the radius of the edge of the wipe die.
The sheet taken here is of 1mm in thickness. Punch velocity in downward direction is 3 mm/s. The variation of the punch force required is shown in the graph on the right side. The maximum punch force is 0.10 tonne. The colored strip on the left side shows the different values of equivalent strain. The generation of strain can be seen at the bending portion.
</td></tr></table>
<?php
}elseif(stristr($value,"D4eseTSohpA"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This sheet metal bending simulation depicts, a simple v bending operation is shown. Here in this type of bending operation the punch does not force the sheet to the bottom of the die cavity, leaving some space underneath, it is called "air bending". The die used here is of rectangular type. A V- groove die can also be used where it must have a sharper angle than the angle being formed in the sheet.
The sheet taken here is of 1mm in diameter. Punch velocity in downward direction is 3 mm/s. The variation of the punch force required is shown in the graph on the right side. The maximum punch force is 0.12 tonne. The coloured strip on the left side shows the different values of equivalent strain. The generation of strain can be seen at the bending portion.
</td></tr></table>
<?php
}elseif(stristr($value,"ND_EaxJaHsw"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This sheet metal bending simulation depicts, a common bending operation is shown. Here in this type of bending operation the punch and die both are circular in shape. The sheet here completely touches the lower die when pressed by the punch.
The sheet taken here is 1mm in thickness. Punch velocity in downward direction is 3 mm/s. The variation of the punch force required is shown in the graph on the right side. The maximum punch force is 0.38 tonne. The colored strip on the left side shows the different values of equivalent strain generated. The generation of strain can be seen in the bend portion.
</td></tr></table>
<?php
}elseif(stristr($value,"Y-VsvDi-TKI"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Bead forming is used to make a round corner of a sheet or a rod. In this video one can see the setup of beading process for forming a bead at the rod end. The upper die moves downward which bends the rod end and forms it to bead shape. On right hand side, equivalent strain generated in the rod is shown. 
The maximum strain generated is 2.9. Change in the value of equivalent strain refers to the refinement of the microstructure of the material. Higher the equivalent strain more finer is the microstructure.
</td></tr></table>
<?php
}elseif(stristr($value,"MvAU9SrcPn8"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Bead forming is a type of bending process. The process is use to make a round corner of a sheet or a rod. In this video the setup and simulation of forming bead at the rod end is shown. The upper die in yellow  color moves 
downward which bends the rodend which is shown in red color and forms it to the bead shape. The image shows the initial and final form of the rod and dies used in the process.
</td></tr></table>
<?php
}elseif(stristr($value,"hEU-MCawgb8"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Bead forming is used to make a round corner of a sheet or a rod. In this video one can see the setup of beading process for forming a bead at the rod end. The upper die moves downward which bends the rod end and forms it to bead shape. 
On right hand side, forging force required is shown. The maximum force is 0.25 tones. Lower the value of forging force, more easily a metal forming process can be done, and there is a requirement of machinery of lower size.
</td></tr></table>
<?php
}elseif(stristr($value,"JcJo4Cqvs2A"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Bead forming is a type of bending process. The process is use to make a round corner of a sheet or a rod. In this video the setup and simulation of forming bead at the end of metallic strip is shown. 
The upper die in yellow color moves downward which bends the strip end which is shown in red color and forms it to the bead shape. The image shows the initial and final form of the strip and dies used in the process.
</td></tr></table>
<?php
}elseif(stristr($value,"6qjFiM5JdTY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Bead forming is used to make a round corner of a sheet or a rod. In this video one can see the setup of beading process for forming a bead at the rod end. The upper die moves downward which bends the rod end and forms it to bead shape. 
On right hand side, equivalent strain generated in the rod is shown. The maximum strain generated is 6.9. Change in the value of equivalent strain refers to the refinement of the microstructure of the material. Higher the equivalent strain more finer is the microstructure.
</td></tr></table>
<?php
}elseif(stristr($value,"r7HNMUxlp5U"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Bead forming is used to make a round corner of a sheet or a rod. In this video one can see the setup of beading process for forming a bead at the strip end. The upper die moves downward which bends the strip end and forms it to bead shape. On right hand side, forging force required is shown. 
The maximum force is 0.25 tones. Lower the value of forging force, more easily a metal forming process can be done, and there is a requirement of machinery of lower size.
</td></tr></table>
<?php
}elseif(stristr($value,"hZPfU78odag"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Coining is the process in the which metal is plastically deformed in a closed set of dies. In the process shown above, we have an upper die on which there is  an impression of a medal. The lower die contains a cavity for placing billet (coin or medal). This does not allows the flow of billet when pressed by the upper die.
The process starts by placing billet inside the lower die followed by the plastic deformation of medal due to heavy impact of the upper die. This simulation uses an alloy of aluminium as billet and the velocity of upper die is 10 mm/sec at µ = 0.2 friction.
</td></tr></table>
<?php
}elseif(stristr($value,"fjxemYABsuY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In a given simulation of punching operation, cold forming process is used. In this simulation videothe billet is shown as the rectangular shape. Consider the various perimeters of forming simulation. The material of the billet is plane carbon steel and the temperature of the billet is 20<sup>o</sup>C. 
In the simulation video the billet is in finite elements to have better analysis of the force. Themechanical press is used forpunching. In the left handside of the simulation video we can see the processing of punching operation.
Similarly In the right hand top side of the video we can see the upper die, lower die and final billet after punching operation. The right hand bottom side of the videowe can depict the variation of strain in the billet during the punching operation.
</td></tr></table>
<?php
}elseif(stristr($value,"ZcTo5SJBkFY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The left hand side of the video one can depict the variation of strain in the billet during the punching  operation. Initially the strain in the billet is zero while during the operation the strain rises due to deformation. It rises up to 55.5878 greater strain indicates more deformation, more grain refinement and 
hence better mechanical properties. Similarly in the right hand top side of the video we can see the strain in the billet during the punching operation with mesh. In the right hand bottom side of the video one can see the graph. The graph plot between punch and pilot height.
</td></tr></table>
<?php
}elseif(stristr($value,"gRreMPrJ72c"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left hand side of the simulation video we can see the processing of punching operation in which the upper die is moving in the downward direction. Similarly in right hand top side,
we can see the initial billet and final billet. Similarly in the right hand bottom side of the video, we can depict the variation in the billet with mesh  during the punching  operation.
</td></tr></table>
<?php
}elseif(stristr($value,"tEulKL2tDrU"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The above video shows the forming of a door handle. The thickness of the sheet used here is 4 mm. The material of the sheet is Al 2014. In the forming of door handle we require 5 different parts viz punch, sheet, lower die and two pressure pads. The lower die is stationary. Punch moves in the downward direction 
to press the sheet in the desired form which is kept over the lower die. Two pressure pads are used apply an appropriate pressure on the sheet on the both ends. The maximum force required to deform the sheet is 2.13 tonnes. The maximum stress induced in the sheet is 54.63 Mega Pascal (MPa).
</td></tr></table>
<?php
}elseif(stristr($value,"0ZyTuDyknsA"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Corrugated sheet is formed by forming operation. In a given simulation of corrugated sheet forming, cold forming process is used. Consider the various perimeters of forming simulation. The material(sheet) of the billet is plane carbon steel and the temperature of the billet is 20<sup>o</sup>C. 
In the simulation video the billet is in finite elements to have better analysis of the force. The hydraulic press is used for deformation. In the left hand side of the processing of corrugated sheet. Similarly in the right hand top side of the video one can see the upper die, 
billet (plain sheet), lower die and final corrugated sheet. The left hand bottom side of the video one can depict the variation of strain in the billet during the forming operation. Initially the strain in the billet is zero while during the operation the strain rises due to deformation. 
It rises up to 1.806 greater strain indicates more deformation, more grain refinement and hence better mechanical properties.
</td></tr></table>
<?php
}elseif(stristr($value,"2cRDg6Ro8oM"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The left hand bottom side of the video one can depict the variation of strain in the billet during the forming operation. Initially the strain in the billet is zero while during the operation the strain rises due to deformation. It rises up to 1.806 greater strain indicates more deformation, more grain 
refinement and hence better mechanical properties. Similarly In the right hand bottom side of the video we  can see the variation of strain with mesh during the operation. And in the right hand bottom side of the video we can see the variation by the graph . graph plot between the upper dei and pilot height.
</td></tr></table>
<?php
}elseif(stristr($value,"UTTKqDZTHBQ"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Corrugated sheet is formed by forming operation. Forming operation may be defined as an upsetting process, normally formed at the end of a square sheet. Forming process can be carried out cold, and hot.
In a given simulation of corrugated sheet forming, cold forming process is used. In this simulation video not half section of billet (square sheet)   is shown as the billet is square shape. The corrugatedsheet forming is normally done in two step but for ease of the simulation, bolt is made in a single step. 
Consider the various perimeters of forming simulation. The material (sheet) of the billet is plane carbon steel and the temperature of the billet  is 20<sup>o</sup>C. In the simulation video the billet is in the finite element to have better analysis of the force. The hydraulic press is used for deformation.
On the left hand top side of the simulation video one can see the arrangement of the upper die or punch, the billet and lower die. In The left hand bottom side of the video one can depict the variation of strain in the billet during the forming operation. 
Initially the strain in the billet is zero while during the operation the strain rises due to deformation. It rises up to 1.806 greater strain indicates more deformation, more grain refinement and hence better mechanical properties.
Similarly in the right hand top side of the video we can see the upper die, billet (plain sheet), lower die and final corrugated sheet. In the right hand bottom side of the video one can depict the variation of temperature in the billet (sheet) during the operation. At the end of the operation the temperature rises up to 20<sup>o</sup>C.
</td></tr></table>
<?php
}elseif(stristr($value,"ww1yCCP0yk8"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Corrugated sheet is formed by forming operation. Forming operation may be defined as an upsetting process, normally formed at the end of a square sheet. Forming process can be carried out cold, and hot.
In a given simulation of corrugated sheet forming, cold forming process is used. In this simulation video not half section of billet (square sheet)   is shown as the billet is square shape. The corrugatedsheet forming is normally done in two step but for ease of the simulation, bolt is made in a single step. 
Consider the various perimeters of forming simulation. The material (sheet) of the billet is plane carbon steel and the temperature of the billet  is 20<sup>o</sup>C. In the simulation video the billet is in the finite element to have better analysis of the force. The hydraulic press is used for deformation.
On the left hand top side of the simulation video one can see the arrangement of the upper die or punch, the billet and lower die. In The left hand bottom side of the video one can depict the variation of strain in the billet during the forming operation. 
Initially the strain in the billet is zero while during the operation the strain rises due to deformation. It rises up to 1.806 greater strain indicates more deformation, more grain refinement and hence better mechanical properties.
Similarly in the right hand top side of the video we can see the upper die, billet (plain sheet), lower die and final corrugated sheet. In the right hand bottom side of the video one can depict the variation of temperature in the billet (sheet) during the operation. At the end of the operation the temperature rises up to 20<sup>o</sup>C.
</td></tr></table>
<?php
}elseif(stristr($value,"5qClMR0AWZc"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In this simulation video forming of corrugated sheets is shown in a continuous manner. In this process it requires a pair of grooved rollers. The sheet material is an aluminium alloy. The rollers are kept in such a way that the crest of one roller faces the trough of the other roller. 
Thus this arrangement helps to deform a plain sheet into a corrugated one in a continuous fashion. This arrangement is used when large sheets are to be made for a commercial purpose. The groove design taken here is round in shape. This design can be changed according to the shape of corrugated sheet.
</td></tr></table>
<?php
}elseif(stristr($value,"MddaXm2bSvs"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In this simulation video forming of corrugated sheets is shown. The process consists of three parts. The upper die, lower die and the sheet. The thickness of the sheet is 2 mm and material used is c15 steel. The lower die is stationary. Upper die moves in the downward direction to deform the sheet. 
The angle of teeth of the upper die is 45<sup>o</sup>.This type of die arrangement is used when the deformation of the sheet is to be controlled from sideways. The upper die moves in the downward direction with a velocity of 5 mm/sec. In the last one can see the final product formed i.e. the corrugated sheet.
</td></tr></table>
<?php
}elseif(stristr($value,"AbJJ4akaXIE"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In this video,  one could observe the basic drawing operation taking place on the left hand side. The  initial circular plate is taken as cold. It is kept in between the two stationary central dies with the movable side dies both on the upper and the lower side. 
As the movable die moves keeping the central part stationary the cupping of plate takes place. The equivalent strain generated in the circular plate can be determined through the scale on the extreme left. The forging force  evolution during drawing process can be seen on the graph shown on the right hand side.
</td></tr></table>
<?php
}elseif(stristr($value,"LkzLlvCbAbQ"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In this video,  one could observe the basic drawing operation taking place on the left hand side. The  initial circular plate is taken as cold. It is kept in between the two stationary central dies with movable side dies both on the upper and the lower side. 
As the movable dies move keeping central part stationary cupping of the plate takes place. On the right hand side, one could observe the equivalent strain generated in the circular plate which can be determined through the scale on left.
</td></tr></table>
<?php
}elseif(stristr($value,"1-jmYZJvyJs"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The video shows the Piercing operation on a circular sheet. In the video, the setup is shown on the left side. In the setup the upper die is shown in yellow, the lower die in green, the sheet in red and the punch in blue. On the right top end, the punching procedure is described with punch and sheet shown. 
On the right bottom end, one could see the contours changing describing the equivalent strain generated at the centre being high and at the periphery being low.
</td></tr></table>
<?php
}elseif(stristr($value,"NIX1y2IgDd8"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Piercing is formed by blanking operation. Piercing operation may be defined as an shearing process. In a given simulation ofpiercing, cold process is used. The piercing process is normally done in the two steps but for ease of the simulation, piercing process is made in a single step.
Consider the various parameters of this simulation. The material of the billet is aluminium. The temperature of the billet is 20<sup>o</sup>C. In the simulation video the billet is divided into small finite element to have better analysis of the force. The hydraulic press is used for deformation.
In the left hand side we can see the processing of the piercing operation. Similarly In the right hand top side of the simulation video we can see the  image of punch, billet and lower die. In the right hand bottom side of the video one can depict the variation in the billet during the piercing  operation.
</td></tr></table>
<?php
}elseif(stristr($value,"iR-CQmNtwT8"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the right hand top side of the simulation video we can see the initial billet and final billet. In the right hand bottom side of the video one can depict the variation in the billet during the piercing operation. Similarly in the left hand side we can see the processing during the piercing operation.
</td></tr></table>
<?php
}elseif(stristr($value,"D2yQkArgikQ"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left  hand side of the video one can depict the variation of strain in the billet during the piercing operation. Similarly In the right hand top side of the video one can depict the variation of strain with mesh in the billet during the piercing operation.
In the right hand bottom side of the video one can depict the variation of the temperature in the billet during the operation by the graph.
</td></tr></table>
<?php
}elseif(stristr($value,"1RHUg3eCGa4"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
This video shows the manufacturing of  cover plate by forging. The initial arrangement of dies shows the sheet metal in red. The upper die is shown in red with 4 side dies shown by dark blue, green, light blue and pink. The upper die as it moves down deforms 
followed by two opposite side dies moving inside and deforming the sheet. In the second step the other two dies move and bends the sheet. The final cover plate and assembly is shown at the end. The primary objective of the cover is to cover the object.
</td></tr></table>
<?php
}elseif(stristr($value,"2mphVzWWVY0"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Roll forming is a process in which the sheet is deformed in the required shape by passing the plain sheet through the progressive dies (i.e. rollers) in which the angle changes simultaneously to the desired form. 
The picture on the bottom left shows three set of dies, the first pair is the flat die at 180<sup>o</sup> angle. The second pair is inclined at 157.5<sup>o</sup> and the third to 135<sup>o</sup>.
On the bottom right shows the sheet under deformation which shows the three deformed regions under the three pair of dies. On the top is shown the simulation of roll forming.
</td></tr></table>
<?php
}elseif(stristr($value,"hFtXJzH1new"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Roll bending is the process in which the metallic bar of any cross-section area undergoes both plastic and elastic deformation. In the process shown above, we have three rollers namely upper, middle and lower.
The process starts by inserting the bar initially between the upper and lower rollers. The rollers are then rotated moving the bar along with them such that the middle roller is forced against the bar. 
When either end of the bar is reached, the force applied to the middle roller is incrementally increased. For better approximation of desired radius of a circular arc, a number of passes are required. 
This could be done by reversing the rotation of the rollers. This simulation uses a T-shaped rod of aluminium alloy involving µ = 0.2 friction.
</td></tr></table>
<?php
}elseif(stristr($value,"B5hcRJHSdI4"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Roll forming is a process in which the sheet is deformed in the required shape by passing the plain sheet through the progressive dies (i.e. rollers) in which the angle changes simultaneously to the desired form. On the top shows the simulation of roll forming.
In this roll forming simulation the equivalent strain generated in the sheet is shown on the bottom left. The three different zones of strains can be clearly visualized as the sheet passes through the three pair of rollers.
On the bottom right the graph for the force experienced by the rollers can be seen. The graph is plotted between the time and the force in tonnes. The maximum force required is 0.33 tonnes.
</td></tr></table>
<?php
}elseif(stristr($value,"wM7dtEBY1zU"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
The above video shows the forming for a bush. This type of bush is formed in 3 steps. The thickness of the sheet strip used here is 2mm. The material of the sheet used is a copper alloy.
In the first step it shows three parts viz a punch, sheet strip and lower die. The upper punch moves in the downward direction to deform the sheet. The sheet is deformed as according to the lower die which is stationary.
In the second step the punch of the first step remains stationary at the end position. The two side punches move in towards the centre with equal speed. These two side punches deform the sheet according to the shape of the main punch.
In the third step the side punches also remains stationary in there last position and a new upper punch moves in the downward direction. This punch finally shapes the bush in a complete round shape and the process is completed.
</td></tr></table>
<?php
}elseif(stristr($value,"PMXnqgVKe0o"))
{
?>
<TEXTAREA NAME="comments" COLS=120 ROWS=8>
Bushing is formed by FORMING process, which may be defined as an upsetting process, which is normally performed at the end of the cylindrical round rod or wire in order to produce larger cross–section. In the given simulation of bush  forming is cold processing is used. The bush forming is normally done in the three steps.
Step 1: 
In the Left hand top side of the video we can see the arrangement of the die, billet or punch. And left hand bottom side we can see the variation in the billet during the operation by the graph. Similarly in the right hand top side the punch moving along the upward direction then after billet is converted  in the punch shape. And in the right hand bottom side we can see variation of the  strain in the billet during the operation. Initially the strain in the billet is zero while during the operation the strain rises due to deformation up to 1.0. Greater strain indicates more deformation, more grain refinement and hence better mechanical properties.
Step 2: 
In the Right hand top side we can see the punch moving in the upward direction. When the punch moves then the billet also changes and after it comes in the punch shape. In the Right hand bottom side we can see the variation of the strain in the billet during the operation. Initially the strain in the billet is 0.218833 while during the operation the strain rises due to deformation up to 2.18833. Greater strain indicates more deformation, more grain refinement and hence better mechanical properties. On the Left hand top side of the video we can see the arrangement of the die, billet or punch. And the left hand bottom side we can see the variation in the billet during the operation by the graph.
Step 3:
In the Right hand top side we can see the punch moving in the upward direction. When the punch moves then the billet have changed and after it comes in the punch shape. On the Right hand bottom side we can see the variation of strain in the billet during the operation. Initially  the strain in the billet is 0.144286 while during the operation the strain rises due to deformation up to 6.57492. On the Left hand top side of the video we can see the arrangement of the die, billet or punch. And left hand bottom side we can see the variation in the billet during the operation by the graph.
</TEXTAREA>
<?php
}elseif(stristr($value,"c-5vaUJT-Bs"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the Left hand top side of the video we can see the processing of the step-1. In the right hand top side of  the video we can see the initial billet and final billet.In the right hand bottom side we can see variation in the billet during the operation.
</td></tr></table>
<?php
}elseif(stristr($value,"CbhRzpTMcYE"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left hand side of the video we can see the variation of the  strain in the billet during the operation. Initially the strain in the billet is zero while during the operation the strain rises due to deformationup to 1.0. 
Greater strain indicates more deformation, more grain refinement and hence better mechanical properties. Similarly in the right hand top side of the video we can see the variation of the strain with mesh in the billet during the operation. 
In right hand bottom side we can see the variation in the billet during the operation by the graph.
</td></tr></table>
<?php
}elseif(stristr($value,"_7JNBldI4bY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left hand side we can see the processing of step-2. Similarly in the right hand top side of the video we can see the initial billet and final billet. In the Right hand bottom side we can see the variation in the billet during the operation.
</td></tr></table>
<?php
}elseif(stristr($value,"f2FS0MdIPMQ"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left  hand side of the video  we can see the variation of the strain in the billet during the operation Initially the strain in the billet is 0.218833 while during the operation the strain rises due to deformation up to 2.18833. 
Greater strain indicates more deformation, more grain refinement and hence better mechanical properties. Similarly And the right hand bottom side we can see the variation of the strain with mesh  in the billet.
In the right hand bottom side of the video we can see the variation in the billet by the graph and graph plot between the pilot height and punch.
</td></tr></table>
<?php
}elseif(stristr($value,"NbIa3YBY2pY"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left hand side we can see the processing of step-3. In the right hand top side of the video we can see the initial billet and final billet. In the Right hand bottom side we can see the variation in the billet during the operation.
</td></tr></table>
<?php
}elseif(stristr($value,"bdwUY7twT9Y"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the left hand side we can see the variation of strain in the billet during the operation Initially the strain in the billet is 0.144286 while during the operation the strain rises due to deformation up to 6.57492.
Similarly in the right hand top side we can see the variation of the strain with mesh in the billet during the operation. And right hand bottom side we can see the variation in the billet during the operation by the graph.
</td></tr></table>
<?php
}elseif(stristr($value,"BtJWSXCZ9hA"))
{
?>
<TEXTAREA NAME="comments" COLS=120 ROWS=7>
Bushing is formed by FORMING process. Which may be defined as an upsetting process, which is normally performed at the end of the cylindrical round rod. Forming processing can be carried out cold or hot. In the given simulation of bush forming is cold processing is used. The bush forming is normally done in the three steps.
In the first step 
In the Left hand side of the video we can see the processing of step-1. And right hand top side we can see the initial billet and final billet. Similarly in the right hand bottom side the variation in the billet during the operation.
Now in the second step 
In the left hand side of the video we can see the processing of step-2. In the Right hand top side we can see the initial billet and final billet. In the right hand bottom side we can see the variation in the billet during the operation. 
Now in the third step 
In the left hand side of the video we can see the processing of step-3. Similarly in the right hand top side we can see the initial billet and final billet. On the Right hand bottom side we can see the variation in the billet during the operation.
</TEXTAREA>
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