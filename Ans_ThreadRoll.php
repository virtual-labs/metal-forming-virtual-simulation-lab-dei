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
	<li class="dir"><a href="ThreadRolling.php">Thread Rolling</a>
	<ul>
	<li><a href="Rolling_Process.php">Rolling Process</a></li>
	<li><a href="Ring_Rolling.php">Ring Rolling</a></li>
	<li><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a></li>
	</ul>	
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Thread Rolling using flat dies</a>
	<ul>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/k21Or-bdY5k">Thread Rolling - Initial kinematics</a></li>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/0o8KEqF6wyI">Thread Rolling - Equivalent strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Thread Rolling using set of two rolls</a>
	<ul>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/RK0P14eHTw0">Thread Rolling using 2-Rolls</a></li>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/oUDzfD7vVQM">Thread Rolling - Equivalent strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Thread Rolling using set of three rolls</a>
	<ul>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/OGhMF1xRxyA">Thread Rolling using 3-Rolls</a></li>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/CpwyFuRCD6U">Thread Rolling - Equivalent strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_ThreadRoll.php">Self Check Quiz</a></li>
EOQ;
	$answers = $_SESSION['answer'];
	$Curr_answers = array('Ductile material','Resilience','Radially','using punch and die','in flat dies',
	'in planetary dies system','always cheaper in cost','False','True','False');
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
</div></div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>	
</body>
</html>