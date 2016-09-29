<?php session_start();
ini_set("display_errors","Off"); ?>
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
	<li><a href="Riveting.php">Riveting</a></li>	
	<li class="dir"><a href="#">Simulations</a>
	<ul>	
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/Uhu1Q3brMgw">Riveting process</a></li>
	<li class="dir"><a href="#">Rivet Forming</a>
	<ul>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/XBQ-wkekH5E">Rivet forming</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/Sjjjc7DqNLU">Rivet forming with strain</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/hbkvAXT1Rxg">Rivet forming with forging force</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Split riveting</a>
	<ul>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/Ae7wPrRN5kA">Split Riveting</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/0vBzcI3nWjs">Split Riveting - Initial Kinematics</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/BTVc9hS56T4">Split Riveting Cut-Section</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Flat Riveting</a>
	<ul>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/Irzahz6EMK8">Flat Riveting</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/MgkaAIwkoVw">Flat Riveting with Strain</a></li>
	<li><a href="RivetingSimulation.php?https://www.youtube.com/embed/ITvGk0wfe58">Flat Riveting with Graph</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_Riveting.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - RIVETING</center><br>
<form method="post" action="MCQ_Riveting.php">
  <p>Q1. The type of rivet which is used to join the two plates without the need to make a through all the length of hole in the joining plates:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Solid rivet" /><b>Solid rivet</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Split rivet" /><b>Split rivet</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Round rivet" /><b>Round rivet</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q2. Important feature of the rivet for which it is mostly used:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Simplicity, dependability and low cost" /><b>Simplicity, dependability and low cost</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Strength, workability" /><b>Strength, workability</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Hardness, durability" /><b>Hardness, durability</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q3. The design related cause events does not include:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Problem of strength analysis" />
    <b>Problem of strength analysis</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Improper selection of the type of joint" />
    <b>Improper selection of the type of joint</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Improper material selection" />
    <b>Improper material selection</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="Proper size of rivets" />
	<b>Proper size of rivets</b></p><br><br>
  <p>Q4. The applications for the where strength, rigidity, as well as security against leakage should be considered:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Pipes, Sheets" /><b>Pipes, Sheets</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Boiler drains, pressure vessels, gas tanks" /><b>Boiler drains, pressure vessels, gas tanks</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Doors" /><b>Doors</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="All of these" /><b>All of these</b></p><br><br>
  <p>Q5. A riveted joint may not fail during its service life by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Tearing" /><b>Tearing</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Shearing" /><b>Shearing</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Bending" /><b>Bending</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Crushing" /><b>Crushing</b></p><br /><br />
  <p>Q6. The method of inspection employed to analyse the strains in the part are:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Visual inspection" /><b>Visual inspection</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Ultrasound" /><b>Ultrasound</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="X-ray" /><b>X-ray</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="Microwave" /><b>Microwave</b></p><br /><br />
  <p>Q7. The joining technique which does not require accessories along with it:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Screwed joint" /><b>Screwed joint</b>&nbsp;&nbsp;
	(b)&nbsp;&nbsp;<input type="radio" name="q7" value="Rivet joint" /><b>Rivet joint</b>&nbsp;&nbsp;
	(c)&nbsp;&nbsp;<input type="radio" name="q7" value="Bolted Joint" /><b>Bolted Joint</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q8. This is not a case for type of rivet:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Solid" /><b>Solid</b>&nbsp;&nbsp;
	(b)&nbsp;&nbsp;<input type="radio" name="q8" value="Hollow" /><b>Hollow</b>&nbsp;&nbsp;
	(c)&nbsp;&nbsp;<input type="radio" name="q8" value="Blind" /><b>Blind</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="Tapered" /><b>Tapered</b></p><br><br>
	<p>Q9. The operation is not be performed by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Hands" /><b>Hands</b>&nbsp;&nbsp;
	(b)&nbsp;&nbsp;<input type="radio" name="q9" value="Chemical means" /><b>Chemical means</b>&nbsp;&nbsp;
	(c)&nbsp;&nbsp;<input type="radio" name="q9" value="Mechanical means" /><b>Mechanical means</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="Use of robots" /><b>Use of robots</b></p><br><br>
  <p>Q10. Riveting may not be done by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Using rollers" /><b>Using rollers</b>&nbsp;&nbsp;
	(b)&nbsp;&nbsp;<input type="radio" name="q10" value="Using press" /><b>Using press</b>&nbsp;&nbsp;
	(c)&nbsp;&nbsp;<input type="radio" name="q10" value="Using special tools" /><b>Using special tools</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="Using explosives in the cavity of the rivet" /><b>Using explosives in the cavity of the rivet</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Riveting.php";</script>';
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