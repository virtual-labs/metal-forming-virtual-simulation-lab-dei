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
	<li><a href="Hydroforming.php">Hydroforming</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Tube Hydroforming</a>
	<ul>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/x6h5COZX6C4">Hydroforming</a></li>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/FAIeOnEjy90">Hydroforming with curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Tube Hydroforming - Single T</a>
	<ul>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/GQcHbNuxmM0">Hydroforming - Single T</a></li>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/2dz8EETtUKI">Single T with curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Tube Hydroforming - Double T</a> 
	<ul>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/vbrxMjIptPE">Double T - Same side</a></li>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/lI16lxUSPbM">Double T - Opposite side</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Sheet Hydroforming</a>
	<ul>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/KhsR4vs0dvc">Sheet Hydroforming</a></li>
	<li><a href="HydroSimulation.php?https://www.youtube.com/embed/u_RIFP7SIcY">Sheet Hydroforming with Strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_Hydroforming.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - HYDROFORMING</center><br>
<form method="post" action="MCQ_Hydroforming.php">
  <p>Q1. What is the most important parameter in hydro forming ?</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Pressure" /><b>Pressure</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Surface tension" /><b>Surface tension</b>&nbsp;&nbsp;
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Viscosity" /><b>Viscosity</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="None of these" />
   <b>None of these</b></p><br /><br />
  <p>Q2. Hydroforming  is primarily used for manufacturing:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Different shape tubes" /><b>Different shape tubes</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Embossed sheets" /><b>Embossed sheets</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Both (a) and (b)" /><b>Both (a) and (b)</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q3. Which of the following can be manufactured using hydroforming:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Gear" /><b>Gear</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Ring" /><b>Ring</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Exhaust pipes" /><b>Exhaust pipes</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="All of these" /><b>All of these</b></p><br><br>
  <p>Q4. The static part during hydroforming process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Piston/Ram" /><b>Piston/Ram</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Die" /><b>Die</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Both (a) and (b)" /><b>Both (a) and (b)</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q5. The movable part during hydroforming process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Piston/Ram" /><b>Piston/Ram</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Die" /><b>Die</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Both (a) and (b)" /><b>Both (a) and (b)</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q6. Which is a type of Hydroforming process ?</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Tube hydroforming" /><b>Tube hydroforming</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Sheet hydroforming" /><b>Sheet hydroforming</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Both (a) and (b)" /><b>Both (a) and (b)</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="None of These" /><b>None of these</b></p><br /><br />
  <p>Q7. Which is an example of sheet hydroforming ?</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Punching" /><b>Punching</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Deep drawing" /><b>Deep drawing</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Stamping" /><b>Stamping</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="None of These" /><b>None of These</b></p><br /><br />
  <p>Q8. Which type of structure is formed using hydroforming process ?</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Unibody" /><b>Unibody</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Dualbody" /><b>Dualbody</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Multibody" /><b>Multibody</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="None of these" /><b>None of these</b></p><br><br>
	<p>Q9. The advantages of hydroforming process are:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Low cost technology" /><b>Low cost technology</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="Less material loss" /><b>Less material loss</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Both (a) and (b)" /><b>Both (a) and (b)</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q10. The disadvantage of hydroforming process are:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Low cost technology" /><b>Low cost technology</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Less material loss" /><b>Less material loss</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Both (a) and (b)" /><b>Both (a) and (b)</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="None of these" /><b>None of these</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Hydroforming.php";</script>';
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