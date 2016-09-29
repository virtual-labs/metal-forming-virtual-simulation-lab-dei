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
	<li><a href="MultiStep.php">Multi Step Forging</a></li>
	<li class="dir"><a href="#">Multi Steps</a>
	<ul>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/AljRIZQAyKY">Multi step forging-1 setup</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/jH5BWbJ04Wg">Multi step forging-2 setup</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/67VBWyaXt3w">Equivalent strain & Forging force-1</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/UjEJ5KxCTP4">Equivalent strain & Forging force-2</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/YtQsAHZtO-4">Front & Top view</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Valve Forging-1</a>
	<ul>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/DeSj5xv59tc">Valve forging-Setup</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/yQ2zNP1_lwc">Valve forging-Cut section</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/7GY4MyGi0Fs">Valve forging-Forging force</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Valve Forging-2</a>
	<ul>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/qn1yIA0CUYc">Valve forging</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/acP7f4KV51U">Valve forging step-1</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/Ihxe1Lso8-k">Valve forging step-2</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/U2JBn4mXZlc">Valve forging step-3</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Hub cap</a>
	<ul>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/ihg4TluSkys">Hub cap step-1</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/GfLPbpNNyEE">Section view step-1</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/5xT9vXJVQN4">Hub cap step-2</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/MDU4J7ADcEs">Section view step-2</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/MJ9FvpD5tpc">Hub Cap step-3</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/XB2oUHfiT1k">Section view step-3</a></li>
	</ul>
	</li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/J2Jg6mytNqo">Heading process</a></li>
	<li><a href="MultiStep_Experiment.php?https://www.youtube.com/embed/9jJzHiOu5ww">Ball peen hammer</a></li>	
	</ul>
	</li>
	<li><a href="MCQ_MultiStep.php">Self Check Quiz</a></li>	
EOQ;
	$answers = $_SESSION['answer'];
	$Curr_answers = array('5','Lathe bed','Improved physical property','Surface lustre',
	'Upset the materials','Swaging','Cast iron','The shrinkage allowance is inadequate','2','Steel');
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