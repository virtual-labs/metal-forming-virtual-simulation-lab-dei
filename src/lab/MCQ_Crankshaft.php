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
	<li><a href="Crankshaft.php">Crankshaft</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/9_lxtqYvJLI">Single cylinder crankshaft</a></li>
	<li class="dir"><a href="#">Multi cylinder crankshaft step-1</a>
	<ul>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/gsH3Vsp4rmU">Multi cylinder crankshaft</a></li>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/aT8T3Qp2ovg">Multi cylinder crankshaft with strain</a></li>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/4fqKvhJhRtQ">Multi cylinder crankshaft with Curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Multi cylinder crankshaft step-2</a>
	<ul>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/YalIr3UkVyU">Multi cylinder crankshaft</a></li>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/01T0yZrEjMw">Multi cylinder crankshaft with strain</a></li>
	<li><a href="CrankSimulation.php?https://www.youtube.com/embed/cnCVPeW4KsU">Multi cylinder crankshaft with Curve</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_Crankshaft.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - CRANKSHAFT FORMING</center><br>
<form method="post" action="MCQ_Crankshaft.php">
  <p>Q1. What is the function of crankshaft:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Converting translating motion into rotating motion" />
   <b>Converting translating motion into rotating motion</b><br/>
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Converting translating motion into circular motion" />
   <b>Converting translating motion into circular motion</b><br/> 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Both" />
   <b>Both</b><br/>
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="None of the above" />
   <b>None of the above</b></p><br /><br />
  <p>Q2. Crankshaft is manufactured by which of the following process:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Forging" /><b>Forging</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Casting" /><b>Casting</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Machining" /><b>Machining</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="All of these" /><b>All of these</b></p><br /><br />
  <p>Q3. Which of the following heat treatment process in used in making a crankshaft:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Quenching" />
	<b>Quenching</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Induction Hardening" />
	<b>Induction hardening</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Nitriding" />
	<b>Nitriding</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="All of these" /><b>All of these</b></p><br><br>
  <p>Q4. Which of the following material is used for making crankshaft:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Cast Steel" /><b>Cast Steel</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Alloy Steel" /><b>Alloy Steel</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Tungsten Steel" /><b>Tungsten Steel</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="All of these" /><b>All of these</b></p><br><br>
  <p>Q5. Which of the following is not a part of crankshaft:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Crankpin" /><b>Crankpin</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Counter-weight" /><b>Counter-weight</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Cam" /><b>Cam</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Web" /><b>Web</b></p><br /><br />
  <p>Q6. Crankshafts can also be ______ out of a billet, often using a bar of high quality vacuum remelted steel:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Drill" /><b>Drill</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Machining" /><b>Machining</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Metalworking" /><b>Metalworking</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q7. Which material is used in the simulation of crankshaft for making crankshaft:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="C-35" /><b>C-35</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Alnico" /><b>Alnico</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Both" /><b>Both</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q8. The temperature of the billet at the starting of impression die forging in the simulation is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="1100<sup>o</sup> C" /><b>1100<sup>o</sup> C</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="400<sup>o</sup> C" /><b>400<sup>o</sup> C</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="30<sup>o</sup> C" /><b>30<sup>o</sup> C</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="None of these" /><b>None of these</b></p><br><br>
	<p>Q9. The configuration and number of pistons in relation to each other and the crank leads to straight, V or ______:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Flat-six engine" /><b>Flat-six engine</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="V8 engine" /><b>V8 engine</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Flat engine" /><b>Flat engine</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q10. For some engines it is necessary to provide counterweights for the reciprocating mass of each piston and connecting rod to improve ______:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="V engine" /><b>V engine</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Engine balance" /><b>Engine balance</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Dead centre" /><b>Dead centre</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="Internal combustion engine" /><b>Internal combustion engine</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Crankshaft.php";</script>';
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