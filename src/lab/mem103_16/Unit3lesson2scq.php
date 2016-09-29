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
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3Lesson2.php" title="Lesson 2 Casting Process: Pattern Making">Lesson 2 Casting Process: Pattern Making</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 2 Self-Check Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson2/Unit3Lesson2scq.pdf" target="_blank" title="Download Self-Check Questions">Self-Check Questions Download</a><br/><br/>
<center><table border="0" width="100%"><tr>
<td valign="top" width="25px">1</td>
<td valign="top">Match plate pattern is used in:<br/> 
(a)	 flat moulding<br/>		
(b)	 machine moulding<br/>
(c)	 injection moulding<br/>			
(d)	 All of above.</td>
<td valign="top" width="25px">2</td>
<td valign="top">Metal patterns are used for:<br/>
(a)	 mass production of castings<br/>
(b)	 small castings<br/>
(c)	 very large castings<br/>
(d)	 precision casting</td></tr>
<tr>
<td valign="top">3</td>
<td valign="top">The pattern allowance with a taper on all vertical surface is known as:<br/> 
(a)	 Mouldwall movement<br/>
(b)	 draft<br/>
(c)	 rapping<br/>
(d)	 distortion.</td>
<td valign="top">4</td>
<td valign="top">In pattern making (casting) internal corners are round off to:<br/> 
(a)	 alleviate a weak spot<br/>
(b)	 prevent formation of cracks<br/>
(c)	 improve general appearance<br/>
(d)	 allow the sand to run smoothly.</td>
</tr>
<tr>
<td valign="top">5</td>
<td valign="top">To allow easy removal, pattern sides in moulding have a taper of 1mm in 100mm. This taper is termed the:<br/>
(a)	 mould taper<br/>
(b)	 pattern set<br/>
(c)	 draft<br/>  
(d)	 board angle</td>
<td valign="top">6</td>
<td valign="top">The two halves of a spilt pattern used for moulding are termed the:<br/> 
(a)	drag and set<br/>
(b)	cope and top<br/>
(c)	cope and drag<br/>
(d)	bottom and drag</td>
</tr>
<tr>
<td valign="top">7</td>
<td valign="top">The most common wood used for pattern is:<br/>
(a)	 mahogany<br/>
(b)	 plywood<br/>
(c)	 devadar<br/>
(d)	 teak</td>
<td valign="top">8</td>
<td valign="top">One of the important advantage of metal patterns over wooden patterns is:<br/>
(a)	 it is very economic<br/>
(b)	 it is useful in machine moulding<br/>
(c)	 it is easy to make.<br/> 
(d)	 All the above</td>
</tr>
<tr>
<td valign="top">9</td>
<td valign="top">A bell may cast by using the:<br/>
(a)	 Segmental pattern<br/>
(b)	 Skeleton pattern<br/>
(c)	 Sweep pattern<br/>
(d)	 none of them.</td>
</tr></table></center><br/><br/>
<b>Possible answers to self check questions</b><br/><br/>
<table border=0 width="250px"><tr>
<td>1</td><td>b</td><td>2</td><td>a</td></tr>
<tr>
<td>3</td><td>b</td><td>4</td><td>b</td></tr>
<tr>
<td>5</td><td>c</td><td>6</td><td>c</td></tr>
<tr>
<td>7</td><td>d</td><td>8</td><td>d</td></tr>
<tr>
<td>9</td><td>c</td>
</tr></table>
</div><br/>
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