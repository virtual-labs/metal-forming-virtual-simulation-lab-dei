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
	echo <<<EOQ
	<li><a href="home.php">Home</a></li>
	<li><a href="Hammer_Forging.php">Hammer</a></li>
	<li class="dir"><a href="#">Hammer Forging</a>
	<ul>
	<li><a href="Hammer_Experiment.php?https://www.youtube.com/embed/9Dr4ogcsabU">Quarter section & Force curve</a></li>
	<li><a href="Hammer_Experiment.php?https://www.youtube.com/embed/7BQxuml8dZs">Half section & Equivalent strain</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Hammer.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - HAMMER FORGING</center><br>
<form method="post" action="MCQ_Hammer.php">
  <p>Q1. Which is the correct statement about hot working process:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Rapid and economical process" />
   <b>Rapid and economical process</b><br/>
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Fine surface finish of the product" />
   <b>Fine surface finish of the product</b><br/> 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Less tooling and handling costs" />
   <b>Less tooling and handling costs</b><br/>
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="Long life of the working tools" />
   <b>Long life of the working tools</b></p><br /><br />
  <p>Q2. forging of steel specimen is normally done at a temperature of:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="400<sup>o</sup> C" /><b>400<sup>o</sup> C</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="800<sup>o</sup> C" /><b>800<sup>o</sup> C</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="1100<sup>o</sup> C" /><b>1100<sup>o</sup> C</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="1500<sup>o</sup> C" /><b>1500<sup>o</sup> C</b></p><br /><br />
  <p>Q3. In drop forging, forging is done by dropping:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="The work piece at very velocity" />
	<b>The work piece at very velocity</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="The hammer at high velocity" />
	<b>The hammer at high velocity</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="The die with hammer at high velocity" />
	<b>The die with hammer at high velocity</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="A weight on hammer to produce the requisite impact" />
	<b>A weight on hammer to produce the requisite impact</b></p><br><br>
  <p>Q4. Spot the odd one out:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Swaging" /><b>Swaging</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Cold rolling" /><b>Cold rolling</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Forging" /><b>Forging</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="Hot extrusion" /><b>Hot extrusion</b></p><br><br>
  <p>Q5. Identify the process in which the metal is shaped by means by intermittent blows on it:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Hammering" /><b>Hammering</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Peening" /><b>Peening</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Swaging" /><b>Swaging</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Parkerizing" /><b>Parkerizing</b></p><br /><br />
  <p>Q6. Which one is the wrong about forging:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="are uniform in density as well as in dimensions" />
	<b>are uniform in density as well as in dimensions</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="have high ductility and strength" />
	<b>have high ductility and strength</b><br />
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="offer great resistance to fatigue and impact load" />
	<b>offer great resistance to fatigue and impact load</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="are less reliable" />
	<b>are less reliable</b></p><br /><br />
  <p>Q7. Which is not the application of the forging:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="rail sections" /><b>rail sections</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="chisels" /><b>chisels</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="steel balls of the ball bearing" />
	<b>steel balls of the ball bearing</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="brake pedal of an automobile" />
	<b>brake pedal of an automobile</b></p><br /><br />
  <p>Q8. Fatigue resistance of metals can be improved by setting up compressive stresses in its surface. The task is accomplishing by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Swaging" /><b>Swaging</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Shot peening" /><b>Shot peening</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Normalising" /><b>Normalising</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="Galvanising" /><b>Galvanising</b></p><br><br>
	<p>Q9. In the given simulation video of hammer forging, the material of the billet is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Steel" /><b>Steel</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="Copper" /><b>Copper</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Brass" /><b>Brass</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q10. Which one is the wrong about forging:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="are uniform in density as well as in dimensions" />
	<b>are uniform in density as well as in dimensions</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="have high ductility and strength" />
	<b>have high ductility and strength</b><br />
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="offer great resistance to fatigue and impact load" />
	<b>offer great resistance to fatigue and impact load</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="are less reliable" /><b>are less reliable</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Hammer.php";</script>';
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