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
	<li><a href="Rod.php">Connecting Rod</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Forming of connecting rod step-1</a>
	<ul>
	<li><a href="RodSimulation.php?https://www.youtube.com/embed/74Zm4bNXUNA">Simulation Setup of step-1</a></li>
	<li><a href="RodSimulation.php?https://www.youtube.com/embed/i5hoqMb0MPI">Step-1 with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Forming of connecting rod step-2</a>
	<ul>
	<li><a href="RodSimulation.php?https://www.youtube.com/embed/GccveP1hGSQ">Simulation Setup of step-2</a></li>
	<li><a href="RodSimulation.php?https://www.youtube.com/embed/XMPHS6m-9YA">Step-2 with strain</a></li>	
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_Rod.php">Self Check Quiz</a></li>
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
if(stristr($value,"74Zm4bNXUNA"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Connecting rod forming process comprises billet compression and deformation by closed impression die forming process. The upper half section of the connecting rod is impressed on the upper die while lower half of the connecting rod is impressed on the lower die. Right hand side of video shows initial, pre formed and final billet and lower half shows the dies. 
The material of the billet is manganese alloy steel and maintaining temperature of billet to 1250<sup>o</sup>C the forming of connecting rod take place. The variation of equivalent strain are shown over here at right hand side of video. Hydraulic press is used to deform the billet. The upper die with hydraulic press compresses the billet with very high force 
in downward direction and deforms it. Due to high deforming force and high billet temperature, material starts deforming plastically and moves into the impressions created in the upper and lower die. At the final height the billet is deformed into semi-finished connecting rod. Final shape is obtained after various heat treatment processes and machining of 
the semi-finished connecting rod. Preform connecting rod is shown at the end.
</td></tr></table>
<?php
}elseif(stristr($value,"i5hoqMb0MPI"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Connecting rod forming process comprises billet compression and deformation by closed impression die forming process. The upper half section of the connecting rod is impressed on the upper die while lower half of the connecting rod is impressed on the lower die. The material of the billet is manganese alloy steel and maintaining temperature of billet 
to 1250<sup>o</sup>C the forming of connecting rod take place. The variation of equivalent strain are shown over here at right hand side of video. Hydraulic press is used to deform the billet. The upper die with hydraulic press compresses the billet with very high force in downward direction and deforms it. Due to high deforming force and high billet temperature, 
material starts deforming plastically and moves into the impressions created in the upper and lower die. At the final height the billet is deformed into semi-finished connecting rod. Final shape is obtained after various heat treatment processes and machining of the semi-finished connecting rod. Preform connecting rod is shown at the end.
</td></tr></table>
<?php
}elseif(stristr($value,"GccveP1hGSQ"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Connecting rod forming process comprises billet compression and deformation by closed impression die forming process. The upper half section of the connecting rod is impressed on the upper die while lower half of the connecting rod is impressed on the lower die. Right hand side of video shows initial, pre formed and final billet and lower half shows the dies. 
Considering various parameters and maintaining temperature of billet to 1250<sup>o</sup>C the forming of connecting rod take place. The material of the billet is manganese alloy steel. Hydraulic press is used to deform the billet. The upper die with hydraulic press compresses the billet with very high force in downward direction and deforms it. 
Due to high deforming force and high billet temperature, material starts deforming plastically and moves into the impressions created in the upper and lower die. At the final height the billet is deformed into semi-finished connecting rod. Final shape is obtained after various heat treatment processes and machining of the semi-finished connecting rod. Final connecting rod is shown at the end.
</td></tr></table>
<?php
}elseif(stristr($value,"XMPHS6m-9YA"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
Connecting rod forming process comprises billet compression and deformation by closed impression die forming process. The upper half section of the connecting rod is impressed on the upper die while lower half of the connecting rod is impressed on the lower die. Considering various parameters and maintaining temperature of billet to 1250<sup>o</sup>C the forming of connecting rod take place. 
The variation of equivalent strain are shown over here at right hand side of video. The material of the billet is manganese alloy steel. Hydraulic press is used to deform the billet. The upper die with hydraulic press compresses the billet with very high force in downward direction and deforms it. Due to high deforming force and high billet temperature, material starts deforming plastically and 
moves into the impressions created in the upper and lower die. At the final height the billet is deformed into semi-finished connecting rod. Final shape is obtained after various heat treatment processes and machining of the semi-finished connecting rod. Final connecting rod is shown at the end.
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