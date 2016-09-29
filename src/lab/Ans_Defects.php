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
	<li class="dir"><a href="Defects.php">Forging Defects</a>
	<ul>
	<li><a href="PreformDefects.php">Preformed Defects</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">LAPS AND FOLDS</a>
	<ul>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/xWOiSTigMyE">BUCKLING DEFECT - INITIAL KINEMATICS</a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/T0zHkzg8P6E">BUCKLING DEFECT - EQUIVALENT STRAIN</a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/-GWXeGt7oIs">SHEARING DEFECT - INITIAL KINEMATICS</a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/H9Rs03_b9kg">SHEARING DEFECT - EQUIVALENT STRAIN</a></li>
	</ul>
	</li>	
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/stdPr3cUgNM">OVERFILLS</a></li>
	<li class="dir"><a href="#">UNDER FILLS</a>
	<ul>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/EW2gy2NaOcM"><abbr title="Due to incorrect billet size">CASE-1</abbr></a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/uiIGG6KMa0k"><abbr title="Due to incomplete material flow at corners">CASE-2</abbr></a></li>
	</ul>
	</li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/hhSrDIcKqM4">MULTIPLE DEFECTS</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Defects.php">Self Check Quiz</a></li>
EOQ;
	$answers = $_SESSION['answer'];
	$Curr_answers = array('Flakes','Shearing defect','Using over-sized billet','Overfills','Scales and Pits',
	'False','True','False','True','False');
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px;">
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