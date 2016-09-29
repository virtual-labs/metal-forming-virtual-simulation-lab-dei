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
	<li><a href="Quenching.php">Quenching</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>	
	<li><a href="QuenchingSimulation.php?https://www.youtube.com/embed/i3an_ZnDVQg">Quenching</a></li>
	<li><a href="QuenchingSimulation.php?https://www.youtube.com/embed/q334Q9mS2_Q">Quenching with strain</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Quenching.php">Self Check Quiz</a></li>
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
if(stristr($value,"i3an_ZnDVQg"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
On the left side, the magnified view of a meshed end of the a rod can be seen. The contours for the equivalent strains generated can be described by comparing it with a scale given on extreme left.
On the right side, the red part is the initial rod which has been heated above A C 3 temperature to 900<sup>o</sup> centigrade. In the middle, one could see the quenching water which is at ambient temperature in generalized cases. 
On the extreme right top side, the rod shown has equivalent strains generated over the surface at the end of the quenching process. The blue circular picture shows the cross section of the rod having  no strains initially. 
The extreme right hand, bottom side, shows the equivalent strains generated at the end of the process in the middle cross section of rod.
</td></tr></table>
<?php
}elseif(stristr($value,"q334Q9mS2_Q"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
On the left hand side, quenching process can be visualized and one could see the length of meshed rod being changed when cooled from higher temperature to lower temperature. The top right hand corner shows, 
the temperature change over the surface of rod. The bottom right hand corner shows, equivalent strains generated over the cross section of rod, in middle, during the quenching process.
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