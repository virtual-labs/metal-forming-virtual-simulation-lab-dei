<?php session_start(); 
ini_set("display_errors","Off");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
b{
font-family:Arial;
font-size:16px;
color:#0000FF;}
p{
font-family:Arial;
font-size:17px;
font-weight:bold;}
</style>
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
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - UPSETTING PROCESS</center><br>
<form method="post" action="MCQ_Upsetting.php">
  <p>Q1.The virtual  simulation lab website shows information about which manufacturing process:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Casting" /><b>Casting</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Welding" /><b>Welding</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Metal Forming" /><b>Metal Forming</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="Machining" /><b>Machining</b></p><br /><br />
  <p>Q2.The  contribution of Indian forging industries in global forging market in  percentage is:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="2" /><b>2</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="5" /><b>5</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="8" /><b>8</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="22" /><b>22</b></p><br /><br />
  <p>Q3.The main purpose of upsetting operation on billet  is to:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Decreasing diameter and increasing height" />
    <b>Decreasing diameter and increasing height</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Increasing diameter and increasing height" />
    <b>Increasing  diameter and increasing height</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Increasing diameter and decreasing height" />
    <b>Increasing diameter and decreasing height</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="None" />
	<b>None of the above</b></p><br><br>
  <p>Q4.The number of  presses shown in upsetting process module are:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="4" /><b>4</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="1" /><b>1</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="3" /><b>3</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="7" /><b>7</b></p><br><br>
  <p>Q5.The L/D ratio used in interactive bench of simulation for upsetting process are:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="1.0,2.0,3.0" /><b>1.0,2.0,3.0</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="1.0,1.5,2.0" /><b>1.0,1.5,2.0</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="5.0,10.0,15.0" /><b>5.0,10.0,15.0</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="10.0,12.0,15.0" /><b>10.0,12.0,15.0</b></p><br /><br />
  <p>Q6.Velocity of upper die in simulation for upsetting operation is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="1 mm/sec & 2 mm/sec" /><b>1 mm/sec & 2 mm/sec</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="2 mm/sec & 5 mm/sec" /><b>2 mm/sec & 5 mm/sec</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="5 mm/sec & 10 mm/sec" /><b>5 mm/sec & 10 mm/sec</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="1 mm/sec & 10 mm/sec" /><b>1 mm/sec & 10 mm/sec</b></p><br /><br />
  <p>Q7.The material which is not used in simulation for upsetting operation is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Titanium" /><b>Titanium</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Aluminium" /><b>Aluminium</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Copper" /><b>Copper</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="Lead" /><b>Lead</b></p><br /><br />
  <p>Q8.In upsetting operation which die moves:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Lower die" /><b>Lower die</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Upper die" /><b>Upper die</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Both" /><b>Both</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="None" /><b>None</b></p><br><br>
	<p>Q9.Which process involves increasing of the cross-sectional area by pressing or hammering in a direction parallel to the original ingot axis:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Peening" /><b>Peening</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="Swaging" /><b>Swaging</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Upsetting" /><b>Upsetting</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="Setting down" /><b>Setting down</b></p><br><br>
  <p>Q10.Upsetting process is a/an:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Open die forging process" /><b>Open die forging  process</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Closed die forging process" /><b>Closed die forging process</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Both" /><b>Both</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="None" /><b>None</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Upsetting.php";</script>';
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
</center></form>
</div></div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>