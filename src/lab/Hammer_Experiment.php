<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body id="draggingDisabled" bgcolor="#FFFFFF">
<div id="header_main"></div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
echo <<<EOQ
<li><a href="home.php">Home</a></li>
<li><a href="Hammer_Forging.php">Hammer</a></li>
<li class="dir"><a href="#">Hammer Forging</a>
<ul>
<li><a href="Hammer_Experiment.php?https://www.youtube.com/embed/9Dr4ogcsabU">Quarter section & Force curve</a></li>
<li><a href="Hammer_Experiment.php?https://www.youtube.com/embed/7BQxuml8dZs">Half section & Equivalent strain</a></li>
</ul>
</li>
<li><a href="MCQ_Hammer.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div><center>
<?php	
$value = $_SERVER['QUERY_STRING'];
$plist=array_pop( explode('/', $value) );
print <<<EOQ
<iframe width="1020" height="600" src=$value?rel=0&autoplay=1&loop=1&playlist=$plist frameborder="0" allowfullscreen></iframe> 
EOQ;
if(stristr($value,"9Dr4ogcsabU"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In this video, one could observe the initial billet being deformed by hammer press. The process of upsetting is not done in a single step but in multiple steps using the same hammer press. On the right side, one could view the forging force on the upper die in different steps. 
On the left side, the process of deformation can be seen with a scale describing about the equivalent strains being generated in the billet during hammer forging process. In the final step the billet takes up the shape of the dies.
</td></tr></table>
<?php
}elseif(stristr($value,"7BQxuml8dZs"))
{
?>
<table border="2" color="#ffffff" width="1020" style="background-color: white;">
<tr><td style="font-size: 1.2em; padding:5px; line-height:20px;">
In this video, one could observe the initial billet being deformed by hammer press. The process of upsetting is not done in a single step but in multiple steps using the same hammer press. On the right side, one could view the billet being deformed in several steps with equivalent strain 
generated in each step described by the coloured scale. On the left side, the process of deformation can be seen with a scale describing about the equivalent strains being generated in the billet during hammer forging process. In the final step the billet takes up the shape of the dies.
</td></tr></table>
<?php
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
</center></div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>	
</body>
</html>