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
	<li><a href="Extrusion.php">Extrusion</a></li>
	<li class="dir"><a href="#">Simulation Bench</a>
	<ul>
	<li><a href="Aluminium.php">Simulation bench for aluminium</a></li>
	<li><a href="Titanium.php">Simulation bench for titanium</a></li>		
	</ul> 
	</li>
	<li><a href="Extrusioncomp.php">Comparative Simulation</a></li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Seamless Pipe</a>
	<ul>	
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/8mIMYowzbYE">Seamless pipe</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/Na10qT1cDMQ">Seamless pipe with forging force</a></li>
	</ul>
	</li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/pO88pA3wZws">Pipe Extrusion</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/VJ_UKF6uMwk">Turbine Blade</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/Je-bS79yw88">Golf Stick</a></li>	
	</ul>
	</li>
	<li class="dir"><a href="#">Special Cases</a>
	<ul>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/ypzq7PwnC1U">CASE-1</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/23WMALXZZ0Y">CASE-2</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/k-FZAMpEyr8">CASE-3</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/wVc6VkvklMA">CASE-4</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/SH3Ipq3tdzM">CASE-5</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/R3ILdfi6O2Q">CASE-6</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/tYCxm7icWXw">CASE-7</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/Dc98pn2ba6c">CASE-8</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/fTekwjAQOOk">CASE-9</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/mE7Wf1GFQII">CASE-10</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/bwbIhWyCCVw">CASE-11</a></li>
	</ul> 
	</li>
	<li><a href="MCQ_Extrusion.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - EXTRUSION PROCESS</center><br>
<form method="post" action="MCQ_Extrusion.php">
  <p>Q1. Which country has maximum contribution in worldwide forging industry:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="USA, Canada" /><b>USA, Canada</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Europe" /><b>Europe</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="China" /><b>China</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="India" /><b>India</b></p><br /><br />
  <p>Q2. The types of extrusion process involved in metal forming are:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="4" /><b>4</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="1" /><b>1</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="3" /><b>3</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="5" /><b>5</b></p><br /><br />
  <p>Q3. Parameter which separate cold forming process from hot forming process is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Re-crystallisation temperature" />
    <b>Re-crystallisation temperature</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Melting point" />
    <b>Melting point</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Physical properties" />
    <b>Physical properties</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="Surface properties" />
	<b>Surface properties</b></p><br><br>
  <p>Q4. How many types of presses are shown in extrusion process module:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="10" /><b>10</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="1" /><b>1</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="3" /><b>3</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="5" /><b>5</b></p><br><br>
  <p>Q5. The force acting on the work piece during extrusion operation is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Compressive Force" /><b>Compressive Force</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Shear Force" /><b>Shear Force</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Tensile Force" /><b>Tensile Force</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Spring Back Force" /><b>Spring Back Force</b></p><br /><br />
  <p>Q6. In simulation bench of extrusion process for aluminium, the velocity of ram used is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="1 mm/sec & 5 mm/sec" /><b>1 mm/sec & 5 mm/sec</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="2 mm/sec & 3 mm/sec" /><b>2 mm/sec & 3 mm/sec</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="5 mm/sec & 7 mm/sec" /><b>5 mm/sec & 7 mm/sec</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="4 mm/sec & 5 mm/sec" /><b>4 mm/sec & 5 mm/sec</b></p><br /><br />
  <p>Q7. The die angles used in the simulation of the extrusion process for aluminium are:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="45<sup>o</sup>, 60<sup>o</sup>, 90<sup>o</sup>" /><b>45<sup>o</sup>, 60<sup>o</sup>, 90<sup>o</sup></b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="10<sup>o</sup>, 45<sup>o</sup>, 60<sup>o</sup>" /><b>10<sup>o</sup>, 45<sup>o</sup>, 60<sup>o</sup></b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="20<sup>o</sup>, 40<sup>o</sup>, 60<sup>o</sup>" /><b>20<sup>o</sup>, 40<sup>o</sup>, 60<sup>o</sup></b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="10<sup>o</sup>, 20<sup>o</sup>, 30<sup>o</sup>" /><b>10<sup>o</sup>, 20<sup>o</sup>, 30<sup>o</sup></b></p><br /><br />
  <p>Q8. Metal extrusion process is generally used for producing:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Uniform solid section" /><b>Uniform solid section</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Uniform hollow section" /><b>Uniform hollow section</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Both" /><b>Both</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="None" /><b>None</b></p><br><br>
	<p>Q9. For successive extrusion, the metal should be:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Ductile" /><b>Ductile</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="Malleable" /><b>Malleable</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Plastic" /><b>Plastic</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="Tough" /><b>Toug</b></p><br><br>
  <p>Q10. The extrusion chamber, die and the ram are generally lubricated by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Grease" /><b>Grease</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Solid lubrican" /><b>Solid lubrican</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Vegetable" /><b>Vegetable</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="Kerosene oil" /><b>Kerosene oil</b></p><br><br>
  <p>Q11. Pipe dimensions are shown in figure, relation for 'l' is:</p>
  <center><img src="images/Extrusion/PipeDimension.png" alt="Pipe Dimension"></center>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q11" value="F1.png" /><b><img src="images/Extrusion/F1.png" alt="Pipe Dimension"></b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q11" value="F2.png" /><b><img src="images/Extrusion/F2.png" alt="Pipe Dimension"></b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q11" value="F3.png" /><b><img src="images/Extrusion/F3.png" alt="Pipe Dimension"></b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q11" value="F4.png" /><b><img src="images/Extrusion/F4.png" alt="Pipe Dimension"></b></p><br><br>
  <p>Q12. If the D1 = 50mm, D2 = 45 mm, length (L) = 100 mm, r1 = 25 mm, r2 = 20 mm, l = ? :</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q12" value="211.2 mm" /><b>211.2 mm</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q12" value="123 mm" /><b>123 mm</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q12" value="232 mm" /><b>232 mm</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q12" value="245 mm" /><b>245 mm</b></p><br><br>
  <p>Q13. If the D1 = 55mm, D2 = 50 mm, length (L) = 150 mm, r1= 30 mm, r2 = 20 mm, l = ? :</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q13" value="157.5 mm" /><b>157.5 mm</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q13" value="134 mm" /><b>134 mm</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q13" value="220 mm" /><b>220 mm</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q13" value="435 mm" /><b>435 mm</b></p><br><br>
  <p>Q14. If the D1 = 55mm, D2 = 50 mm, length (L) = 150 mm, r1 = 30 mm, r2 = ?, l= 300 mm :</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q14" value="14.9 mm" /><b>14.9 mm</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q14" value="21 mm" /><b>21 mm</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q14" value="12 mm" /><b>12 mm</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q14" value="23 mm" /><b>23 mm</b></p><br><br>
  <p>Q15. Solid billet and pipe dimensions are shown in figure, relation for 'l' is:</p>
  <center><img src="images/Extrusion/SBilletPipeD.png" alt="Solid Billet and Pipe Dimension"></center>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q15" value="F5.png" />
	<b><img src="images/Extrusion/F5.png" alt="Solid Billet and Pipe Dimension"></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q15" value="F6.png" />
	<b><img src="images/Extrusion/F7.png" alt="Solid Billet and Pipe Dimension"></b><br>
    (c)&nbsp;&nbsp;<input type="radio" name="q15" value="F7.png" />
	<b><img src="images/Extrusion/F6.png" alt="Solid Billet and Pipe Dimension"></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q15" value="F8.png" />
	<b><img src="images/Extrusion/F8.png" alt="Solid Billet and Pipe Dimetnsion"></b></p><br><br>
  <p>Q16. If the D1= 50 mm, length (L) = 100 mm, d1 = 25 mm, d2 = 20mm, l = ? :</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q16" value="1111 mm" /><b>1111 mm</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q16" value="1000 mm" /><b>1000 mm</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q16" value="900 mm" /><b>900 mm</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q16" value="872 mm" /><b>872 mm</b></p><br><br>
  <p>Q17. If the D1 = 40 mm, length (L) = 100 mm, d1 = 20 mm, d2 = 10 mm, l = ? :</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q17" value="533 mm" /><b>533 mm</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q17" value="545 mm" /><b>545 mm</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q17" value="555 mm" /><b>555 mm</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q17" value="562 mm" /><b>562 mm</b></p><br><br>
  <p>Q18. If the D1 = 30 mm, length (L) = 100 mm, d1 = 20 mm, d2 = ?, l = 600 mm :</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q18" value="11.5 mm" /><b>11.5 mm</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q18" value="7.8 mm" /><b>7.8 mm</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q18" value="10 mm" /><b>10 mm</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q18" value="8 mm" /><b>8 mm</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10'], $_POST['q11'], $_POST['q12'], $_POST['q13'],
		$_POST['q14'], $_POST['q15'], $_POST['q16'], $_POST['q17'], $_POST['q18']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Extrusion.php";</script>';
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