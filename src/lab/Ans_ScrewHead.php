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
	<li><a href="ScrewHead.php">Screw Head</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Bolt</a>
	<ul>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/mevadV1fNNs">Bolt Setup</a></li>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/wKbzdBrJrCM">Bolt with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Hexagonal Bolt</a>
	<ul>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/PQjVl-DhL4U">Hexagonal Bolt</a></li>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/_FwsTSSAJPw">Hexagonal bolt with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Screw Head</a>
	<ul>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/oMsXkfz1rMY">Screw Head</a></li>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/sP__Q7tiol4">Screw head with strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_ScrewHead.php">Self Check Quiz</a></li>
EOQ;
	$answers = $_SESSION['answer'];
	$Curr_answers = array('Major diameter','Brittle material','A head on one end and nut fitted to the other','Any one of These','Both the ends threaded',
	'Ductile material','Head one end to other end fit into a tapped hole in the other part to be joined','Provide bearing area','3 types','Provided with hexagonal depression in head');
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px;padding-right:35px;">
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