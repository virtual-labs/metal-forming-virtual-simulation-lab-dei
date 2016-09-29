<?php session_start(); 
ini_set("display_errors","Off");?>
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
	<li class="dir"><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a>
	<ul>
	<li><a href="Rolling_Process.php">Rolling Process</a></li>
	<li><a href="Ring_Rolling.php">Ring Rolling</a></li>
	<li><a href="ThreadRolling.php">Thread Rolling</a></li>
	</ul>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="WedgeSimulation.php?https://www.youtube.com/embed/IiRYd57_BGc" title="Transverse Wedge Rolling">Using Planetary Rolls</a></li>
	<li><a href="WedgeSimulation.php?https://www.youtube.com/embed/d8lFBeBmr2g" title="Transverse Wedge Rolling">Using Three Rolls</a></li>
	</ul>
	</li>
	</li>
	<li><a href="MCQ_WedgeRolling.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - TRANSVERSE WEDGE ROLLING</center><br>
<form method="post" action="MCQ_WedgeROlling.php">
  <p>Q1. What shape of the billet is used in the Transverse wedge Rolling Process:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Square" /><b>Square</b>
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Round" /><b>Round</b> 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Hollow" /><b>Hollow</b>
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="Rectangular" /><b>Rectangular</b></p><br /><br />
  <p>Q2. The following is not the version of Transverse Wedge Rolling:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Using three rolls" /><b>Using three rolls</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Using planetary rolls" /><b>Using planetary rolls</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Using punch and die" /><b>Using punch and die</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="Using concave tooling dies" /><b>Using concave tooling dies</b></p><br /><br />
  <p>Q3. What type of profile is used on rolls in this TWR process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Wedge shaped" /><b>Wedge shaped</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Spherical shaped" /><b>Spherical shaped</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Conical shaped" /><b>Conical shaped</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="Flat shaped" /><b>Flat shaped</b></p><br><br>
  <p>Q4. The type of application of for force occurs during such deformation process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Sudden" /><b>Sudden</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Gradual" /><b>Gradual</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Periodic" /><b>Periodic</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q5. The common type of shape produced on billet surface:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Chamfered surface" /><b>Chamfered surface</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Grooved surface" /><b>Grooved surface</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Fillet surface" /><b>Fillet surface</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Extruded surface" /><b>Extruded surface</b></p><br /><br />
  <p>Q6. In planetary TWR process following is not a limitation:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Specific rolls for particular shaped product" /><b>Specific rolls for particular shaped product</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Fixed amount of feed" /><b>Fixed amount of feed</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Fixed depth of cut" /><b>Fixed depth of cut</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="Discontinuous" /><b>Discontinuous</b></p><br />
 <center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
if(isset($_POST["Send"])){
	$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6']);
	$_SESSION['answer'] = $answers;
	echo '<script language="javascript">window.location = "Ans_WedgeRolling.php";</script>';
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