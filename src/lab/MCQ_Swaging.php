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
	<li><a href="Swaging.php">Swaging</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="SwagingSimulation.php?https://www.youtube.com/embed/ocIGt5FCL7U">SWAGING</a></li>
	<li><a href="SwagingSimulation.php?https://www.youtube.com/embed/8jjSTsh17fw">SWAGING WITH EQUIVALENT STRAIN</a></li>
	<li><a href="SwagingSimulation.php?https://www.youtube.com/embed/cdd6oOoN4tY">SWAGING WITH GRAPH</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Swaging.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - SWAGGING</center><br>
<form method="post" action="MCQ_Swaging.php">
  <p>Q1. The part which is essential in Swagging process:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Mandrel" /><b>Mandrel</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Tool" /><b>Tool</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Jig" /><b>Jig</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="Fixture" /><b>Fixture</b></p><br /><br />
  <p>Q2. Through swaging technique we can:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="reduce the length of the workpiece" />
  <b>reduce the length of the workpiece</b><br />
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="increase the outer diameter of the workpiece" />
  <b>increase the outer diameter of the workpiece</b><br />
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="reduce the outer diameter of the workpiece" />
  <b>reduce the outer diameter of the workpiece</b><br />
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="increase the thickness of workpiece" /><b>increase the thickness of workpiece</b></p><br /><br />
  <p>Q3. Through Swaging process we can alter:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="external feature of the workpiece" />
    <b>external feature of the workpiece</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="internal feature of the workpiece" />
    <b>internal feature of the workpiece</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="length of the workpiece" />
    <b>length of the workpiece</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="width of the workpiece" />
	<b>width of the workpiece</b></p><br><br>
  <p>Q4. Which is not a part of swagging technique:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Tube" /><b>Tube</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Linear" /><b>Linear</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Rotary" /><b>Rotary</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="None of These" /><b>None of These</b></p><br><br>
  <p>Q5. The various parts which can be produced by swaging technique:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Billets" /><b>Billets</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Pipes" /><b>Pipes</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Suture needles" /><b>Suture needles</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Tyre" /><b>Tyre</b></p><br /><br />
  <p>Q6. Which is not a swaging machine:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Tagging machine" /><b>Tagging machine</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Cogging machine" /><b>Cogging machine</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Butt swaging machine" /><b>Butt swaging machine</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="All of these" /><b>All of these</b></p><br /><br />
  <p>Q7. Swaging technique involves removal of material:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="True" /><b>True</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="False" /><b>False</b></p><br /><br />
  <p>Q8. The stresses involved in making of swaged part are generally compressive in:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="True" /><b>True</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="False" /><b>False</b></p><br><br>
	<p>Q9. The swaging process is generally carried out with the help of the two dies/punches:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="True" /><b>True</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="False" /><b>False</b></p><br><br>
  <p>Q10. "Rotary forging" is also called "Radial Forging":</p>
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
		echo '<script language="javascript">window.location = "Ans_Swaging.php";</script>';
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