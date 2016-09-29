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
	<li class="dir"><a href="Defects.php">Forging Defects</a>
	<ul>
	<li><a href="PreformDefects.php">Preformed Defects</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">LAPS AND FOLDS</a>
	<ul>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/xWOiSTigMyE">BUCKLING DEFECT - INITIAL KINEMATICS</a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/T0zHkzg8P6E">BUCKLING DEFECT - EQUIVALENT STRAIN</a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/-GWXeGt7oIs">SHEARING DEFECT - INITIAL KINEMATICS</a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/H9Rs03_b9kg">SHEARING DEFECT - EQUIVALENT STRAIN</a></li>
	</ul>
	</li>	
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/stdPr3cUgNM">OVERFILLS</a></li>
	<li class="dir"><a href="#">UNDER FILLS</a>
	<ul>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/EW2gy2NaOcM"><abbr title="Due to incorrect billet size">CASE-1</abbr></a></li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/uiIGG6KMa0k"><abbr title="Due to incomplete material flow at corners">CASE-2</abbr></a></li>
	</ul>
	</li>
	<li><a href="DefectSimulation.php?https://www.youtube.com/embed/hhSrDIcKqM4">MULTIPLE DEFECTS</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Defects.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - FORGING DEFECTS</center><br>
<form method="post" action="MCQ_Defects.php">
  <p>Q1. Which one is the non-geometrical defect:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Underfill" /><b>Underfill</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Laps and Folds" /><b>Laps and Folds</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Overfills" /><b>Overfills</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="Flakes" /><b>Flakes</b></p><br /><br />
  <p>Q2. The defect caused due to the sharp edges of the die protruding against the billet:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Buckling defect" /><b>Buckling defect</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Shearing defect" /><b>Shearing defect</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Cold Shut" /><b>Cold Shut</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="Underfill" /><b>Underfill</b></p><br /><br />
  <p>Q3. The underfill defect can be avoided by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Using over-sized billet" />
    <b>Using over-sized billet</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Using under-sized billet" />
    <b>Using under-sized billet</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Using billet of the same volume as that of the die cavity" />
    <b>Using billet of the same volume as that of the die cavity</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="All of These" />
	<b>All of These</b></p><br><br>
  <p>Q4. The material comes out of the die cavity in which of the following defect:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Underfills" /><b>Underfills</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Buckling" /><b>Buckling</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Shearing" /><b>Shearing</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="Overfills" /><b>Overfills</b></p><br><br>
  <p>Q5. The defect caused due to the improper cleaning of the billet work surface:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Scales and Pits" /><b>Scales and Pits</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Flakes" /><b>Flakes</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Shearing" /><b>Shearing</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Buckling" /><b>Buckling</b></p><br /><br />
  <p>Q6. The part produce possessing shearing defect has good surface finish:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="True" /><b>True</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="False" /><b>False</b></p><br /><br />
  <p>Q7. The buckling defect can be avoided by considering proper billet design:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="True" /><b>True</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="False" /><b>False</b></p><br /><br />
  <p>Q8. The defect caused due to improper die design is a non-geometrical defect:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="True" /><b>True</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="False" /><b>False</b></p><br><br>
	<p>Q9. The defect in which the flash is observed is the overfilled defect:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="True" /><b>True</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="False" /><b>False</b></p><br><br>
  <p>Q10. . It is recommended to preheat the billet at suitable plastic temperature for avoiding the under filled defect produce due to improper billet size:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="True" /><b>True</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="False" /><b>False</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Defects.php";</script>';
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