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
	<li class="dir"><a href="Ring_Rolling.php">Ring Rolling</a>
	<ul>
	<li><a href="Rolling_Process.php">Rolling Process</a></li>
	<li><a href="ThreadRolling.php">Thread Rolling</a></li>
	<li><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">FLAT RING</a>
	<ul>
	<li><a href="RingRoll.php?https://www.youtube.com/embed/sApzuJQNMGE">Flat ring setup</a></li>
	<li><a href="RingRoll.php?https://www.youtube.com/embed/qann4xxi71Y">Flat ring with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">CURVED RING</a>
	<ul>	
	<li><a href="RingRoll.php?https://www.youtube.com/embed/d5DZ3Id27h0">Curved ring setup</a></li>
	<li><a href="RingRoll.php?https://www.youtube.com/embed/WVUnAjPmGQM">Curved ring with strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_RingRolling.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - RING ROLLING</center><br>
<form method="post" action="MCQ_RingRolling.php">
  <p>Q1. The ring rolling is widely used in forming:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Pipes" /><b>Pipes</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Piston rings" /><b>Piston rings</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Seamless rings" /><b>Seamless rings</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q2. The ring rolling process is always advantageous:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Yes" /><b>Yes</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="No" /><b>No</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Can't say" /><b>Can't say</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q3. The main aim of ring rolling is to:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Increase diameter" />
    <b>Increase diameter</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Increase width" />
    <b>Increase width</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Reduce cross-section" />
    <b>Reduce cross-section</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="Change ring shape" />
	<b>Change ring shape</b></p><br><br>
  <p>Q4. The king roll in the video is represented by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Red color" /><b>Red color</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Blue color" /><b>Blue color</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Pink color" /><b>Pink color</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="Yellow color" /><b>Yellow color</b></p><br><br>
  <p>Q5. What is the kinematic of mandrel:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Rotate" /><b>Rotate</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Rotate and Translate" /><b>Rotate and Translate</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Translate" /><b>Translate</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Either translate or rotate" /><b>Either translate or rotate</b></p><br /><br />
  <p>Q6. Which is the main roll:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Mandrel" /><b>Mandrel</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Conical roll" /><b>Conical roll</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="king roll" /><b>king roll</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="all the rolls" /><b>all the rolls</b></p><br /><br />
  <p>Q7. Which is the pressure roll:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Mandrel" /><b>Mandrel</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Conical rolls" /><b>Conical rolls</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="king roll" /><b>king roll</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="No roll" /><b>No roll</b></p><br /><br />
  <p>Q8. Conical rolls are used to:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Deform the ring from sides" />
	<b>Deform the ring from sides</b><br>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="To make the width of the ring constant" />
	<b>To make the width of the ring constant</b><br>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="To roll the ring" />
	<b>To roll the ring</b><br>
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="None of these" />
	<b>None of these</b></p><br><br>
	<p>Q9. Ring rolling process is of ..... types:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="1" /><b>1</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="2" /><b>2</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="3" /><b>3</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="4" /><b>4</b></p><br><br>
  <p>Q10. Cold rolling is done mainly for:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Changing grain structure" /><b>Changing grain structure</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Increase the diameter of the ring" /><b>Increase the diameter of the ring</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Strain hardening" /><b>Strain hardening</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="Reduce thickness" /><b>Reduce thickness</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_RingRolling.php";</script>';
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