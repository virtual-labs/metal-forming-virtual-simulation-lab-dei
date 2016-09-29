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
	<li><a href="Stretchforming.php">Stretch Forming</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="StretchSimulation.php?https://www.youtube.com/embed/dWEui2Ss3oI">STRETCH FORMING</a></li>
	<li><a href="StretchSimulation.php?https://www.youtube.com/embed/6SIVo6ALCL8">STRETCH FORMING WITH GRAPH</a></li>
	<li><a href="StretchSimulation.php?https://www.youtube.com/embed/10eA9m6MpeQ">STRETCH FORMING-2</a></li>
	<li><a href="StretchSimulation.php?https://www.youtube.com/embed/6FIoGt5WSBs">STRETCH FORMING-2 WITH GRAPH</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Stretchforming.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - STRETCH FORMING</center><br>
<form method="post" action="MCQ_Stretchforming.php">
  <p>Q1. What is Stretch Forming ?</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Process of forming various metals into special shapes with special equipment & die" />
   <b>Process of forming various metals into special shapes with special equipment & die</b><br>
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Process of pulling work piece through conical dies" />
   <b>Process of pulling work piece through conical dies</b><br>
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Process to reducing the cross-section work piece" />
   <b>Process to reducing the cross-section work piece</b><br>
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="All of the above" />
   <b>All of the above</b></p><br /><br />
  <p>Q2. Application of stretch forming is _______:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Aircraft & aerospace components" />
  <b>Aircraft & aerospace components</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Car manufacturing" /><b>Car manufacturing</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Tool Manufacturing" /><b>Tool Manufacturing</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q3. What shapes can be formed by stretch forming ?</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Angles" /><b>Angles</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Sheet and tubular shapes" /><b>Sheet and tubular shapes</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Beams" /><b>Beams</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="Both (a) and (b)" /><b>Both (a) and (b)</b></p><br><br>
  <p>Q4. What metals can be formed by stretch forming ?</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Aluminium" /><b>Aluminium</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Stainless" /><b>Stainless</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Nickel based steels" /><b>Nickel based steels</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="Titanium" /><b>Titanium</b></p><br><br>
  <p>Q5. Bending is better because ________ :</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Minimumbend radius is generally 2-3 times greater than other forming/bending methods" />
	<b>Minimumbend radius is generally 2-3 times greater than other forming/bending methods</b><br>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Minimumbend radius is generally 4-6 times greater than other forming/bending methods" />
	<b>Minimumbend radius is generally 4-6 times greater than other forming/bending methods</b><br>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Minimumbend radius is generally 1-6 times greater than other forming/bending methods" />
	<b>Minimumbend radius is generally 1-6 times greater than other forming/bending methods</b><br>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Minimumbend radius is generally 6-8 times greater than other forming/bending methods" />
	<b>Minimumbend radius is generally 6-8 times greater than other forming/bending methods</b></p><br /><br />
  <p>Q6. What is the maximum bend radius ?</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Unlimited" /><b>Unlimited</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Depend upon the dies" /><b>Depend upon the dies</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="30 cm" /><b>30 cm</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="60 cm" /><b>60 cm</b></p><br /><br />
  <p>Q7. Surface distortion is ________:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Minimum" /><b>Minimum</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Maximum" /><b>Maximum</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Unlimited" /><b>Unlimited</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="None of These" /><b>None of These</b></p><br /><br />
  <p>Q8. Arms can move only ______:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="180<sup>o</sup>C" /><b>180<sup>o</sup>C</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="90<sup>o</sup>C" /><b>90<sup>o</sup>C</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="270<sup>o</sup>C" /><b>270<sup>o</sup>C</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="360<sup>o</sup>C" /><b>360<sup>o</sup>C</b></p><br><br>
	<p>Q9. Non-symmetric profiles can formed:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Readily without twist" /><b>Readily without twist</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="Readily with twist" /><b>Readily with twist</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Do not formed" /><b>Do not formed</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q10. Stretch forming is performed:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="On a stretch press" /><b>On a stretch press</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Reducer roll press" /><b>Reducer roll press</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Hydraulic press" /><b>Hydraulic press</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="Mechanical press" /><b>Mechanical press</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Stretchforming.php";</script>';
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