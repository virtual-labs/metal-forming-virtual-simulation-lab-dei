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
	<li class="dir"><a href="Rolling_Process.php">Rolling Process</a>
	<ul>
	<li><a href="Ring_Rolling.php">Ring Rolling</a></li>
	<li><a href="ThreadRolling.php">Thread Rolling</a></li>
	<li><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a></li>
	</ul>
	</li>
	<li><a href="Rolling.php">Simulation Bench</a></li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Flat Plate Rolling</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/t6VKzjRu6Gw">Flat Plate</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/FaG4fXe1UrQ">Close-up View</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Angle Rolling</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/v0wYMR2vQGI">Angle Rolling</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/cYAQY360hnY">Angle Rolling with Graph</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/Hpwo8x_Hi10">Angle Bar Rolling</a></li>	
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/jc8VUbC2rfM">Circular Bar Rolling</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">I-Section</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/WV-PlH7Kkcg">I-Section with 4-Roller</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/HVFRCMP7EJA">I-Section with 2-Roller</a></li>	
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/fJexvf_16Gw">I-Section with graph</a></li>
	</ul>
	</li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/4vL0vnRppVo">Seamless pipe using Rolling</a></li>
	</ul> 
	</li>
	<li><a href="MCQ_Rolling.php">Self Check Quiz</a></li>	
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - ROLLING PROCESS</center><br>
<form method="post" action="MCQ_Rolling.php">
  <p>Q1. Alligatoring is the defect arises in the process:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Extrusion" /><b>Extrusion</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Rolling" /><b>Rolling</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Drawing" /><b>Drawing</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="Punching" /><b>Punching</b></p><br /><br />
  <p>Q2. Which of the following is the smallest rolled product:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Ingot" /><b>Ingot</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Bloom" /><b>Bloom</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Billet" /><b>Billet</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="Slab" /><b>Slab</b></p><br /><br />
  <p>Q3. The velocity of ram used in simulation of rolling process is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="0.5 mm/sec, 1 mm/sec, 1.5 mm/sec" />
    <b>0.5 mm/sec, 1 mm/sec, 1.5 mm/sec</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="1 mm/sec, 1.5 mm/sec, 2 mm/sec" />
    <b>1 mm/sec, 1.5 mm/sec, 2 mm/sec</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="1 mm/sec, 2 mm/sec, 3 mm/sec" />
    <b>1 mm/sec, 2 mm/sec, 3 mm/sec</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="1 mm/sec, 5 mm/sec, 10 mm/sec" />
	<b>1 mm/sec, 5 mm/sec, 10 mm/sec</b></p><br><br>
  <p>Q4. The material which is not used in simulation for rolling operation is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Aluminium" /><b>Aluminium</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Copper" /><b>Copper</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Steel" /><b>Steel</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="Zinc" /><b>Zinc</b></p><br><br>
  <p>Q5. The direction of rotation of upper and lower rollers in roller operation is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Same direction" /><b>Same direction</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Opposite direction" /><b>Opposite direction</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Both direction" /><b>Both direction</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="No direction" /><b>No direction</b></p><br /><br />
  <p>Q6. In order to get uniform thickness of plate by rolling process, one provides:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Chamber on rolls" /><b>Chamber on rolls</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Hardening of the rolls" /><b>Hardening of the rolls</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Offset on the rolls" /><b>Offset on the rolls</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="Anti-friction bearing" /><b>Anti-friction bearing</b></p><br /><br />
  <p>Q7. The property of a material by which it can be rolled into sheets is called:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Elasticity" /><b>Elasticity</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Plasticity" /><b>Plasticity</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Ductility" /><b>Ductility</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="Malleability" /><b>Malleability</b></p><br /><br />
  <p>Q8. Hot rolling of mild steel is carried out:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="At Re-crystallisation Temperature" />
	<b>At Re-crystallisation Temperature</b><br>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Between 100<sup>o</sup>C and 150<sup>o</sup>C" />
	<b>Between 100<sup>o</sup>C and 150<sup>o</sup>C</b><br>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Above Re-crystallisation Temperature" />
	<b>Above Re-crystallisation Remperature</b><br>
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="Below Re-crystallisation Temperature" />
	<b>Below Re-crystallisation Temperature</b></p><br><br>
	<p>Q9. The number of steps involved in making a rod from a 100 mm × 100 mm billet are:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="1" /><b>1</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="4" /><b>4</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="6" /><b>6</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="10" /><b>10</b></p><br><br>
  <p>Q10. In metals subjected to cold working, strain hardening effect is due to the mechanism of:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Slip" /><b>Slip</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Twinning" /><b>Twinning</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Dislocation" /><b>Dislocation</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="Fracture" /><b>Fracture</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Rolling.php";</script>';
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