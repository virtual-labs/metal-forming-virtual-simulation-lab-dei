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
	<li><a href="Quenching.php">Quenching</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>	
	<li><a href="QuenchingSimulation.php?https://www.youtube.com/embed/i3an_ZnDVQg">Quenching</a></li>
	<li><a href="QuenchingSimulation.php?https://www.youtube.com/embed/q334Q9mS2_Q">Quenching with strain</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Quenching.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - QUENCHING</center><br>
<form method="post" action="MCQ_Quenching.php">
  <p>Q1. What does C refers to in AC3 Temperature:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Chauffage" /><b>Chauffage</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Chauffer" /><b>Chauffer</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Critical" /><b>Critical</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="Condensing" /><b>Condensing</b></p><br /><br />
  <p>Q2. Water cooling rate is _______ to critical cooling rate:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Higher" /><b>Higher</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Lower" /><b>Lower</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Equal" /><b>Equal</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q3. TTT diagram refers to:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Trinidad Tobago Temperature" />
    <b>Trinidad Tobago Temperature</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Time Temperature Transformation" />
    <b>Time Temperature Transformation</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Temperature Time Transformation" />
    <b>Temperature Time Transformation</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="Transformation Temperature Time" />
	<b>Transformation Temperature Time</b></p><br><br>
  <p>Q4. Fast cooling results in formation of:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Pearlite" /><b>Pearlite</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Austentite" /><b>Austentite</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Martensite" /><b>Martensite</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q5. Slow cooling is carried out by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Air" /><b>Air</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Oil" /><b>Oil</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Water" /><b>Water</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Impossible" /><b>Impossible</b></p><br /><br />
  <p>Q6. After Forging process ______is done:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Quenching" /><b>Quenching</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Annealing" /><b>Annealing</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Casting" /><b>Casting</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="Nitriding" /><b>Nitriding</b></p><br /><br />
  <p>Q7. Maximum equivalent strains occur ______:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="At Surface" /><b>At Surface</b>&nbsp;&nbsp;
	(b)&nbsp;&nbsp;<input type="radio" name="q7" value="In Core" /><b>In Core</b>&nbsp;&nbsp;
	(c)&nbsp;&nbsp;<input type="radio" name="q7" value="Same Everywhere" /><b>Same Everywhere</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="Does not occur" /><b>Does not occur</b></p><br /><br />
  <p>Q8. Quenching improves:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Strength" /><b>Strength</b>&nbsp;&nbsp;
	(b)&nbsp;&nbsp;<input type="radio" name="q8" value="Machinability" /><b>Machinability</b>&nbsp;&nbsp;
	(c)&nbsp;&nbsp;<input type="radio" name="q8" value="Hardness" /><b>Hardness</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="Toughness" /><b>Toughness</b></p><br><br>
	<p>Q9. What does CCC refers to:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Cubic Centimetre Cube" /><b>Cubic Centimetre Cube</b>&nbsp;&nbsp;
	(b)&nbsp;&nbsp;<input type="radio" name="q9" value="Cooling Continuous Curve" /><b>Cooling Continuous Curve</b>&nbsp;&nbsp;
	(c)&nbsp;&nbsp;<input type="radio" name="q9" value="Curve of continuous cooling" /><b>Curve of continuous cooling</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q10. The maximum temperature in the video is indicated by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Red" /><b>Red</b>&nbsp;&nbsp;
	(b)&nbsp;&nbsp;<input type="radio" name="q10" value="Green" /><b>Green</b>&nbsp;&nbsp;
	(c)&nbsp;&nbsp;<input type="radio" name="q10" value="Blue" /><b>Blue</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="Yellow" /><b>Yellow</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Quenching.php";</script>';
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