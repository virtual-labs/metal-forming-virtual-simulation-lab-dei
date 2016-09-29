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
	<li><a href="Cogging.php">Cogging Process</a></li>
	<li class="dir"><a href="#">Simulations</a>
	<ul>
	<li class="dir"><a href="#">Cogging</a>
	<ul>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/jUw3foLVLZg">Cogging setup</a></li>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/XTe_02Sxupw">Cogging with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Becking</a>
	<ul>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/D19yhSH2-QY">Becking Setup</a></li>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/x2Bnh8-lb3Y">Becking with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Multi Diameter Shaft</a>
	<ul>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/CVXHdI320VM">Multi Diameter Shaft Setup</a></li>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/7kxN1AZbgkc">Multi Diameter Shaft with Strain</a></li>
	<li><a href="CoggingSimulation.php?https://www.youtube.com/embed/FBpvaDGd-_w">Multi Diameter Shaft with Curve</a></li>
	</ul>
	</li>
	</ul>
	</li>
	<li><a href="MCQ_cogging.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - COGGING PROCESS</center><br>
<form method="post" action="MCQ_Cogging.php">
  <p>Q1. The purpose of cogging operation is:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="To reduce the cross-section of the  billet" />
   <b>To reduce the cross-section of the  billet</b><br/>
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="To increase the length of the billet" />
   <b>To increase the length of the billet</b><br/> 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="To improve the grain structure" />
   <b>To improve the grain structure</b><br/>
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="All of the above" />
   <b>All of the above</b></p><br /><br />
  <p>Q2. Which of the following shaped billet can be produced by the cogging operation:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Round shape" /><b>Round shape</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Rectangular" /><b>Rectangular</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Hexagonal" /><b>Hexagonal</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="All of these" /><b>All of these</b></p><br /><br />
  <p>Q3. What is the advantage of cogging operation:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Internal grain structure is improved" />
	<b>Internal grain structure is improved</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Size of the billet can be reduced" />
	<b>Size of the billet can be reduced</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Different cross-section shape can be achieved" />
	<b>Different cross-section shape can be achieved</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="All of the above" /><b>All of the above</b></p><br><br>
  <p>Q4. In the video shown in the cogging module, the material is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Steel" /><b>Steel</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Aluminium" /><b>Aluminium</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Copper" /><b>Copper</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q5. The cogging is done at which stage of the metal forming process:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Initial stage" /><b>Initial stage</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Intermediate stage" /><b>Intermediate stage</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="At the end" /><b>At the end</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="None of these" /><b>None of these</b></p><br /><br />
  <p>Q6. The press used in the simulation of cogging operation is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Hydraulic press" /><b>Hydraulic press</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Screw press" /><b>Screw press</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Mechanical press" /><b>Mechanical press</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="None of These" /><b>None of these</b></p><br /><br />
  <p>Q7. By cogging operation the ingot is converted into:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Billet" /><b>Billet</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Slab" /><b>Slab</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Bloom" /><b>Bloom</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="Sheet" /><b>Sheet</b></p><br /><br />
  <p>Q8. The temperature of the billet used in the simulation of cogging process is:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="25<sup>o</sup> C" /><b>25<sup>o</sup> C</b>
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="100<sup>o</sup> C" /><b>100<sup>o</sup> C</b>
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="1100<sup>o</sup> C" /><b>1100<sup>o</sup> C</b>
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="None of these" /><b>None of these</b></p><br><br>
	<p>Q9. The number of passes used to convert round billet into square billet in cogging process simulation are:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="2" /><b>2</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="3" /><b>3</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="4" /><b>4</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="8" /><b>8</b></p><br><br>
  <p>Q10. Which of the following material cannot be cogged:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Steel" /><b>Steel</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Aluminium" /><b>Aluminium</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Lead" /><b>Lead</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="None of these" /><b>None of these</b></p><br>
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_Cogging.php";</script>';
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