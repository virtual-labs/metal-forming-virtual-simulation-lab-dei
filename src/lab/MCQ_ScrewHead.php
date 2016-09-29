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
	<li><a href="ScrewHead.php">Screw Head</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Bolt</a>
	<ul>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/mevadV1fNNs">Bolt Setup</a></li>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/wKbzdBrJrCM">Bolt with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Hexagonal Bolt</a>
	<ul>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/PQjVl-DhL4U">Hexagonal Bolt</a></li>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/_FwsTSSAJPw">Hexagonal bolt with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Screw Head</a>
	<ul>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/oMsXkfz1rMY">Screw Head</a></li>
	<li><a href="ScrewHeadSimulation.php?https://www.youtube.com/embed/sP__Q7tiol4">Screw head with strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_ScrewHead.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - SCREW HEAD FORMING</center><br>
<form method="post" action="MCQ_ScrewHead.php">
  <p>Q1. The creast diameter of the screw thread is same as:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Major diameter" /><b>Major diameter</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Minor diameter" /><b>Minor diameter</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Pitch Diameter" /><b>Pitch Diameter</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q2. Maximum pressure stress theory is applicable for:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Ductile material" /><b>Ductile material</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Brittle material" /><b>Brittle material</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Both (a) and (b)" /><b>Both (a) and (b)</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q3. A bolt has:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="A head on one end and nut fitted to the other" />
    <b>A head on one end and nut fitted to the other</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="A head at on one end and other end fit into a tapped hole in the other part to be joined" />
    <b>A head at on one end and other end fit into a tapped hole in the other part to be joined</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Both the end threaded" />
    <b>Both the end threaded</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="None of these" />
	<b>None of these</b></p><br><br>
  <p>Q4. The following type of the nut is used with allen bolt:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Allen nut" /><b>Allen nut</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Hexagonal" /><b>Hexagonal</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Slotted nut" /><b>Slotted nut</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="Any one of These" /><b>Any one of These</b></p><br><br>
  <p>Q5. A stud has:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="A head on one end and a nut fitted to the other" />
	<b>A head on one end and a nut fitted to the other</b><br>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="A head at one end other end fit into a tapped hole in the other part" />
	<b>A head at one end other end fit into a tapped hole in the other part</b><br>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Both the ends threaded" />
	<b>Both the ends threaded</b><br>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Pointed thread" /><b>Pointed thread</b></p><br /><br />
  <p>Q6. Shear stress theory is applicable for:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Ductile material" /><b>Ductile material</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Rittle material" /><b>Rittle material</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Both (a) and (b)" /><b>Both (a) and (b)</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q7. A tap bolt has:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="A head on one end and nut fitted to the other" />
	<b>A head on one end and nut fitted to the other</b><br>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Head one end to other end fit into a tapped hole in the other part to be joined" />
	<b>Head one end to other end fit into a tapped hole in the other part to be joined</b><br>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Both the end threaded" />
	<b>Both the end threaded</b><br>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="Bointed thread" /><b>Bointed thread</b></p><br /><br />
  <p>Q8. The function of washer is to:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Provide cushioning effect" /><b>Provide cushioning effect</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Provide bearing area" /><b>Provide bearing area</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Both (a) and (b)" /><b>Both (a) and (b)</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="None of these" /><b>None of these</b></p><br><br>
	<p>Q9. How many types of screw thread:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="3 types" /><b>3 types</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="6 type" /><b>6 type</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="2 types" /><b>2 types</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="4 types" /><b>4 types</b></p><br><br>
	<p>Q10. An allen bolt is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Self locking bolt" /><b>Self locking bolt</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Same stud bolt" /><b>Same stud bolt</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Provided with hexagonal depression in head" /><b>Provided with hexagonal depression in head</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="None of these" /><b>None of these</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_ScrewHead.php";</script>';
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