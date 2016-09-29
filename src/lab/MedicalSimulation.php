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
	<li><a href="Medical.php">Medical Implants</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>	
	<li><a href="MedicalSimulation.php?https://www.youtube.com/embed/x36hK94C3b0">Artificial Tooth Formation</a></li>
	<li><a href="MedicalSimulation.php?https://www.youtube.com/embed/x__WodgCah4">Elbow Joint</a></li>
	<li><a href="MedicalSimulation.php?https://www.youtube.com/embed/75e4c_IkRo8">Hip Joint</a></li>
	</ul>
	</li>
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
if(stristr($value,"x36hK94C3b0"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
High strength metal composites are widely used in artificial body implants; these body implants have very high strength, very less weight and chemically non reactant or stable nature (nontoxicity). Generally these artificial implants are manufactured by powder metallurgy (bottom up grain refinement process) or some another kind of high quality metal synthesis process.
In the present simulation we try to demonstrate the applicability of top down grain refinement approach (severe plastic deformation process) in manufacturing these high strength artificial body implants. SPD has many techniques, among these techniques Equal Channel Angular pressing (ECAP) is one of the most successful technique because it is only known process which can be implemented at commercial level. 
Here in the present work we try to make an artificial tooth by using ECAP processed specimen. Proposed steps for manufacturing artificial tooth are shown here. First a titanium alloy billet (10 mm diameter and 100 mm length) is processed through a ECAP die having intersection angle 1200 and outer arc angle 200 at room temperature. 
Now after that a small portion (9.5 mm in width and 20 mm in length) is cut from the ECAPed specimen. Now after that placed the cut specimen into tooth shaped dies and forged it into a desirable shape. After that crown portion is manufactured by using another die. Final forged artificial tooth with flash is shown here. All process steps involved in artificial tooth manufacturing is shown here.
</td></tr></table>
<?php
}elseif(stristr($value,"x__WodgCah4"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the present simulation we try to demonstrate the applicability of top down grain refinement approach (severe plastic deformation process) in manufacturing these high strength artificial body implants. SPD has many techniques, among these techniques Equal Channel Angular pressing (ECAP) is one of the most successful technique because it is only known process which can be implemented at commercial level. 
Here in the present work we try to make an artificial elbow joint by using ECAP processed specimen. First a titanium alloy billet (25 mm diameter and 200 mm length) is processed through a ECAP die having intersection angle 1200 and outer arc angle 200 at room temperature. Now after that processed specimen is cut into the two parts (part (1), part (2)). Now transformed part 1 into part (3) and part (2) in part (3) by using forging operations (binding, die forging). 
Now take part (4) and convert it into part (6) using forging operation, Similarly take part (3) and convert it into part (5) using the same forging operation. Now here we can see the final elbow joint assembly and the exploded view as well. All process steps involved in artificial elbow joint manufacturing is shown here.
</td></tr></table>
<?php
}elseif(stristr($value,"75e4c_IkRo8"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In the present simulation we try to demonstrate the applicability of top down grain refinement approach (severe plastic deformation process) in manufacturing these high strength artificial body implants. SPD has many techniques, among these techniques Equal Channel Angular pressing (ECAP) is one of the most successful technique because it is only known process which can be implemented at commercial level. 
Here in the present work we try to make an artificial Hip joint by using ECAP processed specimen. First a titanium alloy billet (25 mm diameter and 200 mm length) is processed through a ECAP die having intersection angle 1200 and outer arc angle 200 at room temperature. Now after that processed specimen is placed in between the specially built hip bone shaped dies 
These dies are hydraulic power operated and transformed the ECAPed specimen into desirable artificial hip bone shape. Now here we can see the artificial hip joint with flash. All process steps involved in artificial hip joint manufacturing is shown here.
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