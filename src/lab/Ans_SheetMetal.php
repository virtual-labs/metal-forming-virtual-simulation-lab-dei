<?php 
session_start(); 
ini_set("display_errors","Off");
?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
th{
font-family:Arial;
font-size:1.8em;
color:#FF00FF;
}
</style>
</head>
<body id="draggingDisabled" bgcolor="#FFFFFF">
<div id="header_main">
<img src="images/header_01.jpg"></div>
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
	$answers = $_SESSION['answer'];
	$Curr_answers = array('Die','Lancing','Gauge','Compound die','Maximum load that can be applied to the workpiece',
	'Two or more operations at different stations of the press','Thickness of the sheet metal','Neutral axis/line',
	'Blanking','Slitting','Metal','Aluminium','6 mm','Air Bending','No','Only bending','Rods of any shape',
	'Anticlockwise, Clockwise, Anticlockwise','All of the above','Only feeding the rod');
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px; padding-right:40px;">
<center><u style="font-size:1.7em; font-weight:bold; color:#ff0000; padding-top:10px;">RESULT SHEET</u><br><br>
<table border=2 cellspacing=5 cellpadding=5>
<tr><th>Question No.</th><th>Your Answers</th><th>Correct Answers</th></tr>
<?php 
	$score=0;
	for($i=0;$i<20;$i++) {
		if($answers[$i]==$Curr_answers[$i]){
		$score++;
		}
	    if($answers[$i] != '')
		{
		$var =$i+1;
?>
<tr>
<td><center> <?php echo($var); ?></center></td>
<td> <?php echo $answers[$i];?></td>
<td> <?php echo $Curr_answers[$i];?></td>
</tr>
<?php } } ?>
</table><br><br>
<u style="font-size:1.3em; color:#0000FF; font-weight:bold;">Your Score</u>
&nbsp;=&nbsp;<b style="font-size:1.4em; color:#FF0000;"><?php echo $score ?></b>&nbsp;&nbsp;&nbsp;
<a href="javascript: window.print()"><abbr title="Print">
<img src="images/Print.jpg"></abbr>&nbsp;<u style="font-size:1.2em; color:#FF0000; font-weight:bold;">Print</u></a>
</center>
</div>
<?php
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
</div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>	
</body>
</html>