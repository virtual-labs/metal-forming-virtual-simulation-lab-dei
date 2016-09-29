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
<td width="35%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3lesson9.php" title="Lesson 9 Types of Moulding Methods and Moulding Machines">Lesson 9 Types of Moulding Methods and Moulding Machines</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 9 Self-Check Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson9/Unit3Lesson9scq.pdf" target="_blank" title="Download Self-Check Questions">Self-Check Questions Download</a><br/><br/>
<b>1. Which one of the following is not a moulding process?</b><br/>
a. Green sand moulding <br/>b. Red sand moulding <br/>c. Plaster moulding <br/>d. Carbon-dioxide moulding<br/><br/> 
<b>2. The main advantage of using Carbon dioxide moulding is that</b><br/>
a. gases can be made to escape more easily<br/> 
b. much hardened mould is obtained<br/>
c. gases formed react with carbon dioxide to form a colloidal solution<br/> 
d. carbon % in the molten metal can be increased<br/><br/> 
<b>3. In squeeze moulding machine the:</b><br/>
a. sand in the mould is rammed by applying uniform pressure with the help of a plate<br/> 
b. compactness of sand is lowest at the surface of the plate while it increases towards the pattern<br/> 
c. metal in the mould is introduced under pressure<br/> 
d. machine table is vibrated so that the mould is squeezed<br/><br/> 
<b>4. The sand is sprayed with great force for the purpose of ramming in which type of machine moulding?</b><br/>
a. Jolting <br/>c. Squeezing <br/>b. Jolt squeezing <br/>d. Sand slinging<br/><br/> 
<b>5. Sand slingers are the moulding machines in which</b><br/>
a. metal in the mould is introduced under pressure<br/> 
b. carbon % in the molten metal can be increased<br/> 
c. the machine table is jolted to obtaine uniform compactness of sand <br/>
d. particles of moulding sand are thrown on the pattern with a certain velocity<br/><br/> 
<b>6. In carbon dioxide moulding, the bindle material used is</b><br/>
a. Sodium silicate <br/>c. Dextrin <br/>b. Sodium carbonate <br/>d. Molasses<br/><br/>
<b>Possible answers to self check questions</b><br/><br/>
<table border=0 width="250px">
<tr><td>1.</td><td>b&nbsp;&nbsp;&nbsp;&nbsp;</td><td>2.</td><td>b</td></tr>
<tr><td>3.</td><td>a</td><td>4.</td><td>d</td></tr>
<tr><td>5.</td><td>d</td><td>6.</td><td>a</td></tr>
</table>
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