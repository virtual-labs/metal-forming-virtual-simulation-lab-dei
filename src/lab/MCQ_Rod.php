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
	<li><a href="Rod.php">Connecting Rod</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Forming of connecting rod step-1</a>
	<ul>
	<li><a href="RodSimulation.php?https://www.youtube.com/embed/74Zm4bNXUNA">Simulation Setup of step-1</a></li>
	<li><a href="RodSimulation.php?https://www.youtube.com/embed/i5hoqMb0MPI">Step-1 with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Forming of connecting rod step-2</a>
	<ul>
	<li><a href="RodSimulation.php?https://www.youtube.com/embed/GccveP1hGSQ">Simulation Setup of step-2</a></li>
	<li><a href="RodSimulation.php?https://www.youtube.com/embed/XMPHS6m-9YA">Step-2 with strain</a></li>	
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_Rod.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - CONNECTING ROD</center><br>
<form method="post" action="MCQ_Rod.php">
  <p>Q1. Piston pin is also known as:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Gudgeon pin" /><b>Gudgeon pin</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Crank pin" /><b>Crank pin</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Connecting pin" /><b>Connecting pin</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="Fastening pin" /><b>Fastening pin</b></p><br /><br />
  <p>Q2. They are cast or forged to form:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="H near the small end" /><b>H near the small end</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="I near the small end" /><b>I near the small end</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="H near the big end" /><b>H near the big end</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q3. Which shape provides greater strength to resist the stresses than a solid rod of the same mass:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="H near the small end and an I near the big end" />
    <b>H near the small end and an I near the big end</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="I near the small end and an H near the big end" />
    <b>I near the small end and an H near the big end</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="All of these" />
    <b>All of these</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="None of these" />
	<b>None of these</b></p><br><br>
  <p>Q4. The small end attaches to:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="The piston pin, gudgeon pin or wrist pin" /><b>The piston pin, gudgeon pin or wrist pin</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Crank pin" /><b>Crank pin</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Connecting pin" /><b>Connecting pin</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="Fastening pin" /><b>Fastening pin</b></p><br><br>
  <p>Q5. The big end connects to the:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Bearing journal on the crank throw" /><b>Bearing journal on the crank throw</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Floating wrist pin" /><b>Floating wrist pin</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Connecting rod bolts" /><b>Connecting rod bolts</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q6. Failure of a connecting rod is called:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Throwing a rod" /><b>Throwing a rod</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Flowing of rod" /><b>Flowing of rod</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Both (a) and (b)" /><b>Both (a) and (b)</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q7. Connecting rods for internal combustion engines need to be:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Light weight" /><b>Light weight</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Heavy weight" /><b>Heavy weight</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Medium weight" /><b>Medium weight</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="None" /><b>None of these</b></p><br /><br />
  <p>Q8. The grain patterns of body/neck of the rods is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="The vertical direction" /><b>The vertical direction</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Horizontal direction" /><b>Horizontal direction</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Inclined at 45<sup>o</sub>" /><b>Inclined at 45<sup>o</sub></b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="None of these" /><b>None of these</b></p><br><br>
	<p>Q9. The grain patterns of the caps are made in:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Horizontal direction" /><b>Horizontal direction</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="The vertical direction" /><b>The vertical direction</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Inclined at 45<sup>o</sub>" /><b>Inclined at 45<sup>o</sub></b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q10. Popular materials used in the construction of connecting rods:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Titanium" /><b>Titanium</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Aluminium" /><b>Aluminium</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Both (a) and (b)" /><b>Both (a) and (b)</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="None" /><b>None of These</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Rod.php";</script>';
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