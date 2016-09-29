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
	<li><a href="SheetMetal.php">Sheet Metal</a></li>
	<li class="dir"><a href="#">Bending Operations</a>
	<ul>
	<li class="dir"><a href="#">Bending Operations to reduce springback</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/SJStL4uRDYk">V-Shape Punch</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/xLxuA_actmU">U-Shape Punch</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ZJ_9jxHXuqI">V-Shape Punch & Curve</a></li>
	</ul>
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/8top1LwUJnU">Bending operation to remove springback</a></li>
	<li class="dir"><a href="#">Common Die Bending</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hD0n0zgxZns">V-Bending</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ND_EaxJaHsw">Circular Bending</a></li>
	</ul> 
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/y2b2QzRkmM0">Wipe Die Bending</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/D4eseTSohpA">Air Bending</a></li>
	</ul> 
	</li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Corrugated Sheet</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/0ZyTuDyknsA">Corrugated sheet</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/2cRDg6Ro8oM">Corrugated sheet with forging force</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/UTTKqDZTHBQ">Circular corrugated sheet</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ww1yCCP0yk8">Conical corrugated sheet</a></li>	
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/5qClMR0AWZc">Continuous corrugated sheet</a></li>	
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/MddaXm2bSvs">Discrete corrugated sheet</a></li>	
	</ul>
	</li>
	<li class="dir"><a href="#">Bead Forming</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/MvAU9SrcPn8">Bead forming of rod</a></li>	
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/Y-VsvDi-TKI">Bead forming of rod with strain</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hEU-MCawgb8">Bead forming of rod with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/JcJo4Cqvs2A">Bead forming of sheet</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/6qjFiM5JdTY">Bead forming of sheet with strain</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/r7HNMUxlp5U">Bead forming of sheet with curve</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Deep Drawing</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/AbJJ4akaXIE">Deep drawing-Downward</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/LkzLlvCbAbQ">Deep drawing-Upward</a></li>
	</ul> 
	</li>
	<li class="dir"><a href="#">Roll Forming</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/2mphVzWWVY0">Roll forming</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/B5hcRJHSdI4">Roll forming with curve</a></li>
	</ul> 
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hFtXJzH1new">Roll Bending</a></li>
	<li class="dir"><a href="#">Piercing</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/1-jmYZJvyJs">Piercing process</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/NIX1y2IgDd8">Piercing Setup</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/iR-CQmNtwT8">Piercing with strain</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/D2yQkArgikQ">Piercing with forging force</a></li>
	</ul> 
	</li>
	<li class="dir"><a href="#">Bush</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/wM7dtEBY1zU">Bush Forming</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/PMXnqgVKe0o">Bush Forming with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/c-5vaUJT-Bs">Bush step-1</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/CbhRzpTMcYE">Bush step-1 with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/_7JNBldI4bY">Bush step-2</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/f2FS0MdIPMQ">Bush step-2 with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/NbIa3YBY2pY">Bush step-3</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/bdwUY7twT9Y">Bush step-3 with curve</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/BtJWSXCZ9hA">Final Bush</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Punching</a>
	<ul>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/fjxemYABsuY">Punching Operation</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/ZcTo5SJBkFY">Punching with Contour</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/gRreMPrJ72c">Punching with Graph</a></li>
	</ul>
	</li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/hZPfU78odag">Coining</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/tEulKL2tDrU">Door Handle</a></li>
	<li><a href="SheetMetal_Experiment.php?https://www.youtube.com/embed/1RHUg3eCGa4">Cover Plate</a></li>
	</ul>
	</li>
	<li><a href="MCQ_SheetMetal.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px">
<center style="font-size:1.7em; font-weight:bold; color:#ff0000; text-decoration:underline; padding-top:10px;">
SELF CHECK QUIZ - SHEET METAL WORKING</center><br>
<form method="post" action="MCQ_SheetMetal.php">
  <p>Q1. In blanking operation, the angle of shear is provided on:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q1" type="radio" value="Die" /><b>Die</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q1" type="radio" value="Punch" /><b>Punch</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q1" type="radio" value="Both" /><b>Both</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q1" type="radio" value="Depends on the material of the work piece" /><b>Depends on the material of the work piece</b></p><br /><br />
  <p>Q2. Which of the following operation is not a drawing process:</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q2" type="radio" value="Bulging" /><b>Bulging</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q2" type="radio" value="Spinning" /><b>Spinning</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q2" type="radio" value="Lancing" /><b>Lancing</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q2" type="radio" value="Embossing" /><b>Embossing</b></p><br /><br />
  <p>Q3. The thickness of sheet metal is referred to as its _______:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q3" value="Fraction" /><b>Fraction</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q3" value="Gauge" /><b>Gauge</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q3" value="Decimal" /><b>Decimal</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q3" value="None of these" /><b>None of these</b></p><br><br>
  <p>Q4. Two or more operations are performed at one station of the press in every stroke of the ram in:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q4" value="Simple die" /><b>Simple die</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q4" value="Compound die" /><b>Compound die</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q4" value="Combination die" /><b>Combination die</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q4" value="Progressive die" /><b>Progressive die</b></p><br><br>
  <p>Q5. The size of a press is specified by:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q5" value="Weight of the press" />
	<b>Weight of the press</b></br>
    (b)&nbsp;&nbsp;<input type="radio" name="q5" value="Size of the workpiece it can handle" />
	<b>Size of the workpiece it can handle</b><br>
    (c)&nbsp;&nbsp;<input type="radio" name="q5" value="Maximum load that can be applied to the workpiece" />
	<b>Maximum load that can be applied to the workpiece</b><br>
    (d)&nbsp;&nbsp;<input type="radio" name="q5" value="Power required to operate the machine" />
	<b>Power required to operate the machine</b></p><br /><br />
  <p>Q6. A progressive die performs:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q6" value="Two or more cutting operations at one station of the process" />
	<b>Two or more cutting operations at one station of the process</b><br>
    (b)&nbsp;&nbsp;<input type="radio" name="q6" value="Both cutting and non-cutting operations at one station of the process" />
	<b>Both cutting and non-cutting operations at one station of the process</b><br>
    (c)&nbsp;&nbsp;<input type="radio" name="q6" value="Two or more operations at different stations of the press" />
	<b>Two or more operations at different stations of the press</b><br>
    (d)&nbsp;&nbsp;<input type="radio" name="q6" value="Only one operation at each stroke of the ram" />
	<b>Only one operation at each stroke of the ram</b></p><br /><br />
  <p>Q7. In piercing and blanking operation, the clearance between punch and the die solely depends on:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q7" value="Diameter of the hole required" />
	<b>Diameter of the hole required</b><br>
    (b)&nbsp;&nbsp;<input type="radio" name="q7" value="Thickness of the sheet metal" />
	<b>Thickness of the sheet metal</b><br>
    (c)&nbsp;&nbsp;<input type="radio" name="q7" value="Number of pieces to be made" />
	<b>Number of pieces to be made</b><br>
    (d)&nbsp;&nbsp;<input type="radio" name="q7" value="Capacity of the type of press" />
	<b>Capacity of the type of press</b></p><br /><br />
  <p>Q8. Which line/axis in the metal is neither compressed nor stretched:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q8" value="Central  axis/line" /><b>Central  axis/line</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q8" value="Middle line/axis" /><b>Middle line/axis</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q8" value="Neutral axis/line" /><b>Neutral axis/line</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q8" value="None of these" /><b>None of these</b></p><br><br>
	<p>Q9. The process of cutting a flat sheet to the desired shape is known as:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q9" value="Blanking" /><b>Blanking</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q9" value="Trimming" /><b>Trimming</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q9" value="Stamping" /><b>Stamping</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q9" value="Piercing" /><b>Piercing</b></p><br><br>
  <p>Q10. A sheet metal is being cut along its length in a straight line. Such a operation is called:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q10" value="Parting" /><b>Parting</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q10" value="Lancing" /><b>Lancing</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q10" value="Crimping" /><b>Crimping</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q10" value="Slitting" /><b>Slitting</b></p><br><br>
	<p>Q11. Sheet metal is simply ______ formed into thin and flat pieces:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q11" value="Nonmetal" /><b>Nonmetal</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q11" value="Noble Gas" /><b>Noble Gas</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q11" value="Halogen" /><b>Halogen</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q11" value="Metal" /><b>Metal</b></p><br><br>
	<p>Q12. There are many different metals that can be made into sheet metal, such as ______, brass, copper, steel, tin, nickel and titanium:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q12" value="Uranium" /><b>Uranium</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q12" value="Silver" /><b>Silver</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q12" value="Aluminium" /><b>Aluminium</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q12" value="Gold" /><b>Gold</b></p><br><br>
	<p>Q13. The maximum thickness of sheet above which it is called plate:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q13" value="4 mm" /><b>4 mm</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q13" value="5 mm" /><b>5 mm</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q13" value="6 mm" /><b>6 mm</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q13" value="7 mm" /><b>7 mm</b></p><br><br>
	<p>Q14. In which of the bending operation tip of punch does not touches the bottom of lower die:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q14" value="V - Bending" /><b>V - Bending</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q14" value="Air Bending" /><b>Air Bending</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q14" value="Wiping Die" /><b>Wiping Die</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q14" value="None of these" /><b>None of these</b></p><br><br>
	<p>Q15. Is Springback desirable:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q15" value="Yes" /><b>Yes</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q15" value="No" /><b>No</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q15" value="Can't say" /><b>Can't say</b></p><br /><br />
	<p>Q16. In roll-bending process ___________ of rod occurs:</p>
  <p>
   (a)&nbsp;&nbsp;<input name="q16" type="radio" value="Only rolling" /><b>Only rolling</b>&nbsp;&nbsp;
   (b)&nbsp;&nbsp;<input name="q16" type="radio" value="Only bending" /><b>Only bending</b>&nbsp;&nbsp; 
   (c)&nbsp;&nbsp;<input name="q16" type="radio" value="Rolling as well as bending" /><b>Rolling as well as bending</b>&nbsp;&nbsp;
   (d)&nbsp;&nbsp;<input name="q16" type="radio" value="Stretching" /><b>Stretching</b></p><br /><br />
  <p>Q17. Which types of rod could be put into roll-bending process?</p>
  <p>
  (a)&nbsp;&nbsp;<input name="q17" type="radio" value="Rectangular rod" /><b>Rectangular rod</b>&nbsp;&nbsp;
  (b)&nbsp;&nbsp;<input name="q17" type="radio" value="T-shaped rod" /><b>T-shaped rod</b>&nbsp;&nbsp;
  (c)&nbsp;&nbsp;<input name="q17" type="radio" value="I-shaped rod" /><b>I-shaped rod</b>&nbsp;&nbsp;
  (d)&nbsp;&nbsp;<input name="q17" type="radio" value="Rods of any shape" /><b>Rods of any shape</b></p><br /><br />
  <p>Q18. Identify the type of rotation of rollers A, B and C respectively:</p>
  <center><img src="images/RollBending.jpg" alt="Roll"></center>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q18" value="Anticlockwise, Anticlockwise, Anticlockwise" />
    <b>Anticlockwise, Anticlockwise, Anticlockwise</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q18" value="Anticlockwise, Clockwise, Anticlockwise" />
    <b>Anticlockwise, Clockwise, Anticlockwise</b> <br />
    (c)&nbsp;&nbsp;<input type="radio" name="q18" value="Clockwise, Anticlockwise, Anticlockwise" />
    <b>Clockwise, Anticlockwise, Anticlockwise</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q18" value="Anticlockwise, Clockwise, Clockwise" />
	<b>Anticlockwise, Clockwise, Clockwise</b></p><br><br>
  <p>Q19. The strain developed in the rod is due to:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q19" value="Roller A" /><b>Roller A</b>&nbsp;&nbsp;
    (b)&nbsp;&nbsp;<input type="radio" name="q19" value="Roller B" /><b>Roller B</b>&nbsp;&nbsp;
    (c)&nbsp;&nbsp;<input type="radio" name="q19" value="Roller C" /><b>Roller C</b>&nbsp;&nbsp;
    (d)&nbsp;&nbsp;<input type="radio" name="q19" value="All of the above" /><b>All of the above</b></p><br><br>
  <p>Q20. Feed rollers in the process is used for:</p>
  <p>
    (a)&nbsp;&nbsp;<input type="radio" name="q20" value="Feeding and reducing the thickness of rod" />
	<b>Feeding and reducing the thickness of rod</b><br />
    (b)&nbsp;&nbsp;<input type="radio" name="q20" value="Feeding the rod and bending the rod" />
	<b>Feeding the rod and bending the rod</b><br />
    (c)&nbsp;&nbsp;<input type="radio" name="q20" value="Only feeding the rod" />
	<b>Only feeding the rod</b><br />
    (d)&nbsp;&nbsp;<input type="radio" name="q20" value="Only bending the rod" />
	<b>Only bending the rod</b></p><br />
<center><input name="Send" type="submit" id="Send" value="Submit" />
<input name="Reset" type="reset" id="Reset" value="Reset" />
<?php					
	if(isset($_POST["Send"])){
		$answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'],
		$_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10'], $_POST['q11'], $_POST['q12'], $_POST['q13'],
		$_POST['q14'], $_POST['q15'], $_POST['q16'], $_POST['q17'], $_POST['q18'], $_POST['q19'], $_POST['q20']);
		$_SESSION['answer'] = $answers;
		echo '<script language="javascript">window.location = "Ans_SheetMetal.php";</script>';
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