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
	<li><a href="upsetting_process.php">Upsetting</a></li>
	<li><a href="upsetting_simulation.php">Simulations</a></li>
	<li class="dir"><a href="#">Simulation Bench</a>
	<ul>
	<li><a href="Hydraulic.php">SIMULATION BENCH FOR HYDRAULIC PRESS</a></li>
	<li><a href="Mechanical.php">SIMULATION BENCH FOR MECHANICAL PRESS</a></li>		
	</ul> 
	</li>
	<li><a href="upsetcomp.php">Comparative Simulations</a></li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">ALLOY WHEEL</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/7XsEMIKKrGY">Alloy wheel</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/iwKH3PeUNmA">Alloy wheel with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">BRASS FORGED PART</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/IKfMmkMPr9I">Brass forged part</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/Lhs9kW-XySU">Brass forged part with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">FORGED PISTON</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/PpoEzA19Q3o">Forged piston-Setup</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/uUURe5wU81s">Forged piston with graph</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/oRnruCNjq8c">Forged piston-Section view</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">MUDGUARD</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/olYwov1mZAs">Mudguard-Setup</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/M1O5SbdZYOE">Mudguard with strain in Upward Direction</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/AKhl2OKXAmU">Mudguard with strain in Downward Direction</a></li>
	</ul>
	</li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/ob2lwdSvbvI">PATTERN MAKING</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Upsetting.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width:1024px; min-height:550px;">
<div class="mech" id="press">
<table border="0" cellpadding="2" cellspacing="20" width="100%">
<tr>
<td width="25%">Case-1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:underline;font-weight:bold;" href="Upset_Experiment.php?https://www.youtube.com/embed/hDMYdzXcAkU">Simulation</a></td>
<td>-</td>
<td>To study the <b style="font-size:18px; color:#0000FF">effect of different materials</b> during upsetting process on equivalent strain and forging force.</td>
</tr>
<tr>
<td>Case-2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:underline;font-weight:bold;" href="Upset_Experiment.php?https://www.youtube.com/embed/XdVRIZU5ojY">Simulation</a></td>
<td>-</td>
<td>To study the <b style="font-size:18px; color:#0000FF">effect of friction</b> during upsetting process.</td>
</tr>
<tr>
<td>Case-3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:underline;font-weight:bold;" href="Upset_Experiment.php?https://www.youtube.com/embed/d765kIUEEwA">Simulation</a></td>
<td>-</td>
<td>To study the <b style="font-size:18px; color:#0000FF">effect of temperature</b> during upsetting process.</td>
</tr>
<tr>
<td>Case-4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:underline;font-weight:bold;" href="Upset_Experiment.php?https://www.youtube.com/embed/6u5gzaBramc">Simulation</a></td>
<td>-</td>
<td>To study the <b style="font-size:18px; color:#0000FF">effect of ram velocity</b> during upsetting process.</td>
</tr>
</table>
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