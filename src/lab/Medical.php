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
	<li><a href="MedicalSimulation.php?Medical/Tooth.mp4">Artificial Tooth Formation</a></li>
	<li><a href="MedicalSimulation.php?Medical/Elbow.mp4">Elbow Joint</a></li>
	<li><a href="MedicalSimulation.php?Medical/Hip.mp4">Hip Joint</a></li>
	</ul>
	</li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Medical Implants</h2><br/>
High strength metal composites are widely used in artificial body implants; these body implants have very high strength, light in weight and chemically non reactant or stable nature (non toxicity).
Generally these artificial implants are manufactured by powder metallurgy (bottom up grain refinement process) or some another kind of high quality metal synthesis process.
bottom up grain refinement process has its own limitations like : size limitations and very high production cost.
Some of the scientists are now looking possibilities in top down grain refinement approach (severe plastic deformation process), for manufacturing high strength and light weighted body implants. Though SPD also has size limitations but a SPD process called Equal Channel Angular Pressing (ECAP) can be successfully scaled up for producing Ultra fine grained high strength material at a bulk stage. 
In the present module we try to demonstrate the applicability of top down grain refinement approach (ECAP) in manufacturing these high strength artificial body implants.<br/><br/><center><img src="images/Medical/Tooth.png"><br/><img src="images/Medical/Elbow.png"><br/><img src="images/Medical/Hip.png"><br/>Figure: Tooth, Elbow and Hip</center>
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