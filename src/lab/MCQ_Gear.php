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
	<li><a href="Gear.php">Gear Manufacturing</a></li>	
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Gear</a>
	<ul>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/D6YR5faHQW8">Gear setup</a></li>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/aMaUviFYOLM">Gear with strain</a></li>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/66lKziHcVBU">Gear with curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Bevel Gear</a>
	<ul>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/Nk5TE3EgtRc">Bevel gear step-1</a></li>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/XtJd1N1JKgY">Bevel gear step-2</a></li>
	<li><a href="GearSimulation.php?https://www.youtube.com/embed/krjK2leLfgg">Bevel gear with strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_Gear.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - GEAR MANUFACTURING</center><br>
<form method="post" action="MCQ_Gear.php">
  <p>Q1. A gear is  a machine element which is used for transmitting:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Variable power" /><b>Variable power</b>
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Variable torque" /><b>Variable torque</b> 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Variable speed" /><b>Variable speed</b>
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="None of these" />
   <b>None of these</b></p><br /><br />
  <p>Q2. Large gears are generally formed by:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Extrusion" /><b>Extrusion</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Upsetting" /><b>Upsetting</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Hobbing" /><b>Hobbing</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="All of these" /><b>All of these</b></p><br /><br />
  <p>Q3. Material used for gear extrusion is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Aluminium" /><b>Aluminium</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Steel" /><b>Steel</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Both (a) and (b)" /><b>Both (a) and (b)</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q4. Bevel Gear formation by Forging is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Single Step" /><b>Single Step</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Multi Step" /><b>Multi Step</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Both (a) and (b)" /><b>Both (a) and (b)</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q5. Maximum Force evolved in Step 1 of forged gear in video is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="10.5 tonnes" /><b>10.5 tonnes</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="1.05 tonnes" /><b>1.05 tonnes</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="0.105 tonnes" /><b>0.105 tonnes</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="0.0105 tonnes" /><b>0.0105 tonnes</b></p><br /><br />
  <p>Q6. Maximum Force evolved during extrusion of gear in video is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="1646 tonnes" /><b>1646 tonnes</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="164.6 tonnes" /><b>164.6 tonnes</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="16.46 tonnes" /><b>16.46 tonnes</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="1.646 tonnes" /><b>1.646 tonnes</b></p><br /><br />
  <p>Q7. Punch in Gear Extrusion is shown with:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Yellow" /><b>Yellow</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Green" /><b>Green</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Red" /><b>Red</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="White" /><b>White</b></p><br /><br />
  <p>Q8. The maximum strains generated in the forged gear is at:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Bottom edge of teeth" /><b>Bottom edge of teeth</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Top edge of teeth" /><b>Top edge of teeth</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="In the middle" /><b>In the middle</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="None of these" /><b>None of these</b></p><br><br>
	<p>Q9. The static die  in the bevel gear forging process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Green" /><b>Green</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="Yellow" /><b>Yellow</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Red" /><b>Red</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q10. The movable die  in the bevel gear forging process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Green" /><b>Green</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Yellow" /><b>Yellow</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Red" /><b>Red</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="None of these" /><b>None of these</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Gear.php";</script>';
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