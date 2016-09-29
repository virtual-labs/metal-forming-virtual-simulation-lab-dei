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
	<li class="dir"><a href="ThreadRolling.php">Thread Rolling</a>
	<ul>
	<li><a href="Rolling_Process.php">Rolling Process</a></li>
	<li><a href="Ring_Rolling.php">Ring Rolling</a></li>
	<li><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a></li>
	</ul>	
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Thread Rolling using flat dies</a>
	<ul>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/k21Or-bdY5k">Thread Rolling - Initial kinematics</a></li>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/0o8KEqF6wyI">Thread Rolling - Equivalent strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Thread Rolling using set of two rolls</a>
	<ul>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/RK0P14eHTw0">Thread Rolling using 2-Rolls</a></li>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/oUDzfD7vVQM">Thread Rolling - Equivalent strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Thread Rolling using set of three rolls</a>
	<ul>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/OGhMF1xRxyA">Thread Rolling using 3-Rolls</a></li>
	<li><a href="ThreadSimulation.php?https://www.youtube.com/embed/CpwyFuRCD6U">Thread Rolling - Equivalent strain</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_ThreadRoll.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - THREAD ROLLING</center><br>
<form method="post" action="MCQ_ThreadRoll.php">
  <p>Q1. For what type of material does these threading techniques can be made possible:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Ductile material" /><b>Ductile material</b>
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Brittle material" /><b>Brittle material</b> 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Harder material" /><b>Harder material</b>
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="Tougher material" /><b>Tougher material</b></p><br /><br />
  <p>Q2. These techniques of threading cannot improve the following properties:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Thread's yield strength" /><b>Thread's yield strength</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Hardness" /><b>Hardness</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Resilience" /><b>Resilience</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="Wear Resistance" /><b>Wear Resistance</b></p><br /><br />
  <p>Q3. The flow of material in thread rolling process takes place in which direction:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Longitudinally" /><b>Longitudinally</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Laterally" /><b>Laterally</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Radially" /><b>Radially</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="Axially" /><b>Axially</b></p><br><br>
  <p>Q4. Through which process thread rolling cannot be done:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="using flat dies" /><b>using flat dies</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="using punch and die" /><b>using punch and die</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="using two rolls with guide" /><b>using two rolls with guide</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="using three rolls" /><b>using three rolls</b></p><br><br>
  <p>Q5. In which type of thread rolling technique, the two dies reciprocates:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="in two rolls with guide system" /><b>in two rolls with guide system</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="in flat dies" /><b>in flat dies</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="in three rolls system" /><b>in three rolls system</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="in planetary dies system" /><b>in planetary dies system</b></p><br /><br />
  <p>Q6. In which type of thread rolling operation, the billet rotates as well as revolves also:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="in two rolls with guide system" /><b>in two rolls with guide system</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="in flat dies system" /><b>in flat dies system</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="in three rolls system" /><b>in three rolls system</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="in planetary dies system" /><b>in planetary dies system</b></p><br /><br />
  <p>Q7. The following is not an advantage of thread rolling process over thread cutting process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="quality of cold rolled products are good" />
	<b>quality of cold rolled products are good</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="chipless operations being cleaner" />
	<b>chipless operations being cleaner</b><br />
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="lesser material wastage" />
	<b>lesser material wastage</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="always cheaper in cost" />
	<b>always cheaper in cost</b></p><br /><br />
  <p>Q8. When considering the blank diameter tolerance, a change in blank diameter will affect the major diameter by an approximate ratio of 5 to 1:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="True" /><b>True</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="False" /><b>False</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Can't say" /><b>Can't say</b></p><br><br>
	<p>Q9. Production rates of thread rolling processes are usually three to five times faster than thread cutting:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="True" /><b>True</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="False" /><b>False</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Can't say" /><b>Can't say</b></p><br><br>
  <p>Q10. A rolled thread can often be easily recognized because the thread has a smaller diameter than the blank rod from which it has been made:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="True" /><b>True</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="False" /><b>False</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Can't say" /><b>Can't say</b>&nbsp;&nbsp;</p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_ThreadRoll.php";</script>';
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