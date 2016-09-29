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
	<li><a href="Barshear.php">Bar Shearing</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li><a href="BarshearSimulation.php?https://www.youtube.com/embed/a1RYCKkFBAA">Bar Shearing</a></li>
	<li><a href="BarshearSimulation.php?https://www.youtube.com/embed/6vM_LKZpjbY">Bar Shearing with forging force</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Barshear.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - BAR SHEARING</center><br>
<form method="post" action="MCQ_Barshear.php">
  <p>Q1. How many dies are used in the bar shearing process shown ?</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="2" />&nbsp;&nbsp;<b>2</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="3" />&nbsp;&nbsp;<b>3</b>&nbsp;&nbsp;
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="4" />&nbsp;&nbsp;<b>4</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="5" />&nbsp;&nbsp;<b>5</b></p><br /><br />
  <p>Q2. Which type of press is used in the bar shearing process ?</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Hydraulic Press" />&nbsp;&nbsp;<b>Hydraulic Press</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Hammer Press" />&nbsp;&nbsp;<b>Hammer Press</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Screw Press" />&nbsp;&nbsp;<b>Screw Press</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="Mechanical Press" />&nbsp;&nbsp;<b>Mechanical Press</b></p><br /><br />
  <p>Q3. On which die is the forging force from the press acting ?</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Purple color die" />&nbsp;&nbsp;<b>Purple color die</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Pink color die" />&nbsp;&nbsp;<b>Pink color die</b><br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Green color die" />&nbsp;&nbsp;<b>Green color die</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="Yellow color die" />&nbsp;&nbsp;<b>Yellow color die</b></p><br><br>
  <p>Q4. What is the approximate pressing force required in the above bar shearing process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="6 tonnes" />&nbsp;&nbsp;<b>6 tonnes</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="7 tonnes" />&nbsp;&nbsp;<b>7 tonnes</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="8 tonnes" />&nbsp;&nbsp;<b>8 tonnes</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="9 tonnes" />&nbsp;&nbsp;<b>9 tonnes</b></p><br><br>
  <p>Q5. What is the limiting force for the lower yellow die above which it starts moving:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="5 tonnes" />&nbsp;&nbsp;<b>5 tonnes</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="2 tonnes" />&nbsp;&nbsp;<b>2 tonnes</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="3 tonnes" />&nbsp;&nbsp;<b>3 tonnes</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="4.5 tonnes" />&nbsp;&nbsp;<b>4.5 tonnes</b></p><br /><br />
	<center><input name="Send" type="submit" id="Send" value="Submit" />
	<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Barshear.php";</script>';
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