<?php session_start();
ini_set("display_errors","Off");
if($_SESSION['auth']!="rahulMEM103_2016swarupsharma")
{
header("location:mem103.php");
}
else
{
?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manufacturing Processes-I</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/mem.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;">
<div id="header">
<br/>
<b>MEM-103 Manufacturing Processes-I</b></div>
<div>
<table border="0" width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Lecture Notes, MEM-103 Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div style="text-align:justify">
<b>WORKSHOP PRACTICE</b><br/><br/>
Tutorial 1&nbsp;&nbsp;&nbsp;<a href="tutorial1.php" title="Introduction">Measurement, Measuring Tools & Layout Tools</a><br/>
Tutorial 2&nbsp;&nbsp;&nbsp;<a href="tutorial2.php" title="Using Rule">Using Rule</a><br/>
Tutorial 3&nbsp;&nbsp;&nbsp;<a href="tutorial3.php" title="Using Combination Set">Using Combination Set</a><br/>
Tutorial 4&nbsp;&nbsp;&nbsp;<a href="tutorial4.php" title="Using Vernier Caliper">Using Vernier Caliper</a><br/>
Tutorial 5&nbsp;&nbsp;&nbsp;<a href="tutorial5.php" title="Using Vernier Micrometers">Using Vernier Micrometers</a><br/>
Tutorial 6&nbsp;&nbsp;&nbsp;<a href="tutorial6.php" title="Using Reading a inch system micrometer">Using Reading a inch system micrometer</a><br/>
Tutorial 7&nbsp;&nbsp;&nbsp;<a href="tutorial7.php" title="Using Depth Micrometer">Using Depth Micrometer</a><br/>
Tutorial 8&nbsp;&nbsp;&nbsp;<a href="tutorial8.php" title="Using Vernier Height Gage">Using Vernier Height Gage</a><br/>
Tutorial 9&nbsp;&nbsp;&nbsp;<a href="tutorial9.php" title="Using Cylindrical Square">Using Cylindrical Square</a><br/>
Tutorial 10&nbsp;&nbsp;&nbsp;<a href="tutorial10.php" title="Using Angle Measurement">Using Angle Measurement</a><br/>
Tutorial 11&nbsp;&nbsp;&nbsp;<a href="tutorial11.php" title="Using Laying out work">Using Laying out work</a><br/>
Tutorial 12&nbsp;&nbsp;&nbsp;<a href="tutorial12.php" title="Using Try Square">Using Try Square</a><br/>
Tutorial 13&nbsp;&nbsp;&nbsp;<a href="tutorial13.php" title="Using Calipers">Using Calipers</a><br/>
Tutorial 14&nbsp;&nbsp;&nbsp;<a href="tutorial14.php" title="Using Surface gage">Using Surface gage</a><br/>
Tutorial 15&nbsp;&nbsp;&nbsp;<a href="tutorial15.php" title="Using Scribers">Using Scribers</a><br/>
Tutorial 16&nbsp;&nbsp;&nbsp;<a href="tutorial16.php" title="Using Punches">Using Punches</a><br/>
<br/></div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute (www.dei.ac.in)</div>
</body>
</html>
<?php
}
 	//Opening file to get counter value
	$fp = fopen ("../counter.txt", "r");
	$count_number = fread ($fp, filesize ("../counter.txt"));
	fclose($fp);
	$counter = (int)($count_number) + 1;
    $count_number = (string)($counter);
	$fp = fopen ("../counter.txt", "w");
	fwrite ($fp, $count_number);
	fclose($fp);
?>