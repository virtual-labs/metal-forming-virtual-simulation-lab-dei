<?php 
session_start(); 
ini_set("display_errors","Off");
?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
th{
font-family:Arial;
font-size:1.8em;
color:#FF00FF;
}
</style>
</head>
<body id="draggingDisabled" bgcolor="#FFFFFF">
<div id="header_main">
<img src="images/header_01.jpg"></div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
echo <<<EOQ
	<li><a href="home.php">Home</a></li>
	<li><a href="Crankshaft.php">Crankshaft</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/9_lxtqYvJLI">Single cylinder crankshaft</a></li>
	<li class="dir"><a href="#">Multi cylinder crankshaft step-1</a>
	<ul>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/gsH3Vsp4rmU">Multi cylinder crankshaft</a></li>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/aT8T3Qp2ovg">Multi cylinder crankshaft with strain</a></li>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/4fqKvhJhRtQ">Multi cylinder crankshaft with Curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Multi cylinder crankshaft step-2</a>
	<ul>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/YalIr3UkVyU">Multi cylinder crankshaft</a></li>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/01T0yZrEjMw">Multi cylinder crankshaft with strain</a></li>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/cnCVPeW4KsU">Multi cylinder crankshaft with Curve</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_Crankshaft.php">Self Check Quiz</a></li>
EOQ;
	$answers = $_SESSION['answer'];
	$Curr_answers = array('Converting translating motion into rotating motion',
	'All of these','All of these','All of these','Cam','Machining','C-35',
	'1100<sup>o</sup> C','Flat engine','Engine balance');
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:30px;">
<center><u style="font-size:1.7em; font-weight:bold; color:#ff0000; padding-top:10px;">RESULT SHEET</u><br><br>
<table border=2 cellspacing=5 cellpadding=5>
<tr><th>Question No.</th><th>Your Answers</th><th>Correct Answers</th></tr>
<?php 
	$score=0;
	for($i=0;$i<10;$i++) {
		if($answers[$i]==$Curr_answers[$i]){
		$score++;
		}
	    if($answers[$i] != '')
		{
		$var =$i+1;
?>
<tr>
<td><center> <?php echo($var); ?></center></td>
<td> <?php echo $answers[$i];?></td>
<td> <?php echo $Curr_answers[$i];?></td>
</tr>
<?php } } ?>
</table><br><br>
<u style="font-size:1.3em; color:#0000FF; font-weight:bold;">Your Score</u>
&nbsp;=&nbsp;<b style="font-size:1.4em; color:#FF0000;"><?php echo $score ?></b>&nbsp;&nbsp;&nbsp;
<a href="javascript: window.print()"><abbr title="Print">
<img src="images/Print.jpg"></abbr>&nbsp;<u style="font-size:1.2em; color:#FF0000; font-weight:bold;">Print</u></a>
</center>
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