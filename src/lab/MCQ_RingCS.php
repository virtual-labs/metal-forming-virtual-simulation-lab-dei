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
	<li><a href="rct.php">Ring Compression Test</a></li>
	<li><a href="RCT_Bench.php">Simulation Bench</a></li>
	<li><a href="MCQ_RingCS.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - RING COMPRESSION TEST</center><br>
<form method="post" action="MCQ_RingCS.php">
  <p>Q1. The ring compression test is used to test:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Friction condition of the of the billet and dies" />
   <b>Friction condition of the of the billet and dies</b><br>
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="The temperature variation in the billet" />
   <b>The temperature variation in the billet</b><br>
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Surface hardness of the billet" />
   <b>Surface hardness of the billet</b><br>
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="None of the above" /><b>None of the above</b></p><br /><br />
  <p>Q2. The material used in the ring compression test is:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Cylindrical plate" /><b>Cylindrical plate</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Hollow cylindrical plate" /><b>Hollow cylindrical plate</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Square plate" /><b>Square plate</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="None of the above" /><b>None of the above</b></p><br /><br />
  <p>Q3. The good lubrication result in:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Uniform increase of the internal and external diameter of the specimen" />
    <b>Uniform increase of the internal and external diameter of the specimen</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Decrease in external diameter and increase in internal diameter" />
    <b>Decrease in external diameter and increase in internal diameter</b><br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Increase in external diameter and reduction in inner diameter" />
    <b>Increase in external diameter and reduction in inner diameter</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="None of the above" />
	<b>None of the above</b></p><br><br>
  <p>Q4. In the virtual simulation video of the ring compression test, the specimen height is reduced to:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="50 percent" /><b>50 percent</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="75 percent" /><b>75 percent</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Both" /><b>Both</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q5. In the simulation bench of the ring compression test, the material not used for the testing is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Copper" /><b>Copper</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Aluminium" /><b>Aluminium</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Steel" /><b>Steel</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="All of these" /><b>All of these</b></p><br /><br />
  <p>Q6. In the simulation bench of the  ring compression test, the ram speed of the die is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="1mm/sec, 5mm/sec" /><b>1mm/sec, 5mm/sec</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="1mm/sec, 2mm/sec" /><b>1mm/sec, 2mm/sec</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="5mm/sec, 10mm/sec" /><b>5mm/sec, 10mm/sec</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="None of the above" /><b>None of the above</b></p><br /><br />
  <p>Q7. Which of the following may not be the friction between the specimen and the dies in the simulation bench of the ring compression test:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="0.05" /><b>0.05</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="0.4" /><b>0.4</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="1.5" /><b>1.5</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="0.45" /><b>0.45</b></p><br /><br />
  <p>Q8. In the ring compression test of the specimen, the specimen is deformed by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Tensile load" />
	<b>Tensile load</b><br>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Compression" />
	<b>Compression</b><br>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Torsion" />
	<b>Torsion</b><br>
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="Bending" />
	<b>Bending</b></p><br><br>
	<p>Q9. In the simulation bench of the ring compression test , the outer an inner diameter of the specimen before testing is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="60mm, 30mm" /><b>60mm, 30mm</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="40mm, 20mm" /><b>40mm, 20mm</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="100mm, 50mm" /><b>100mm, 50mm</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q10. In the simulation bench of the  ring compression test, the initial height of the specimen is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="10mm" /><b>10mm</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="20mm" /><b>20mm</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="30mm" /><b>30mm</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="40mm" /><b>40mm</b></p><br>
	<center><input name="Send" type="submit" id="Send" value="Submit" />
    <input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_RingCS.php";</script>';
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