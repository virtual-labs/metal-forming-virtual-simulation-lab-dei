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
	<li><a href="Orbital.php">Orbital Forming</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/CrW5icA7EB4">ORBITAL FORMING</a></li>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/_3c7HIgol20">ORBITAL FORMING WITH EQUIVALENT STRAIN</a></li>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/OuqVurbIM68">ORBITAL FORMING-2</a></li>
	<li><a href="OrbitalSimulation.php?https://www.youtube.com/embed/pEq_8Q9Ziv8">RIVET FORMING USING ORBITAL FORMING</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Orbital.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - ORBITAL FORMING</center><br>
<form method="post" action="MCQ_Orbital.php">
  <p>Q1. Orbital forming is a:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Cold forming process" /><b>Cold forming process</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Hot forming process" /><b>Hot forming process</b>&nbsp;&nbsp;
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Any one of these" /><b>Any one of these</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q2. The maximum angle through which the peen deviate in the simulation is:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="1" /><b>1</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="2" /><b>2</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="4" /><b>4</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="6" /><b>6</b></p><br /><br />
  <p>Q3. The material of the tube in the simulation video of orbital forming process is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Brass" /><b>Brass</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Aluminium" /><b>Aluminium</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Steel" /><b>Steel</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="All of these" /><b>All of these</b></p><br><br>
  <p>Q4. The initial temperature of the tube  in the simulation of orbital forming is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="100<sup>o</sup>" /><b>100<sup>o</sup></b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="250<sup>o</sup>" /><b>250<sup>o</sup></b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="350<sup>o</sup>" /><b>350<sup>o</sup></b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="600<sup>o</sup>" /><b>600<sup>o</sup></b></p><br><br>
  <p>Q5. The lower die is moved upward by which of the following press in simulation:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Hydraulic press" /><b>Hydraulic press</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Mechanical press" /><b>Mechanical press</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Knuckle press" /><b>Knuckle press</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Hammer press" /><b>Hammer press</b></p><br /><br />
  <p>Q6. Which of the following material can be formed with the help of orbital forming process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Brass" /><b>Brass</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Aluminium" /><b>Aluminium</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Steel" /><b>Steel</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="All of these" /><b>All of these</b></p><br /><br />
  <p>Q7. Which of the following are the advantages of the orbital forming process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Smaller press" /><b>Smaller press</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Smaller stresses in the dies" /><b>Smaller stresses in the dies</b><br />
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Longer die life" /><b>Longer die life</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="Reduction of noise and vibration" /><b>Reduction of noise and vibration</b><br />
	(e)&nbsp;&nbsp;<input type="radio" name="q7" value="All of the above" /><b>All of the above</b></p><br /><br />
  <p>Q8. Which can be made by orbital forming process from the following events  :</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Crimping" /><b>Crimping</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Sealing" /><b>Sealing</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Riveting" /><b>Riveting</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="All of these" /><b>All of these</b></p><br><br>
	<p>Q9. Orbital forming is also known as:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Rotary" /><b>Rotary</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="Swing" /><b>Swing</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Rocking-die forging" /><b>Rocking-die forging</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="All of these" /><b>All of these</b></p><br><br>
  <p>Q10. Which of the following products are not made by orbital forming process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Fasteners" /><b>Fasteners</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Bevel gear" /><b>Bevel gear</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Wheels" /><b>Wheels</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="Tube" /><b>Tube</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Orbital.php";</script>';
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