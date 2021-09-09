<?php session_start();
if($_SESSION['auth']!="ajayMEM103kant2019upadhyay")
{
header("location:mem103.php");
}
else
{
?>
<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manufacturing Processes-I</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/mem.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;">
<div id="header"><br/>MEM-103 Manufacturing Processes-I<br /><br /></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table Border="0" width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3lesson4.php" title="Lesson 4 Casting Process: Cupola Furnace">Lesson 4 Casting Process: Cupola Furnace</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 4 References</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson4/Unit3Lesson4References.pdf" target="_blank" title="Download References">References Download</a><br/><br/>
1.	Workshop Practice, Part-1, 2, 3,  W.A.J. Chapman, ELBS<br/>
2.	Manufacturing Processes for Engineering Materials, 5/e ,  Serope Kalpakjian and Steven Schmid, Pearson Education, India<br/>
3.	Materials and Processes in Manufacturing, E. Paul DeGarmo, J T. Black, Ronald A. Kohser, Prentice Hall of India. New Delhi<br/>
4.	Manufacturing Processes And System, Phillip F Ostwald and Jairo Munoz, John Wiley India, New Delhi<br/>
5.	Process & Materials Of Manufacture, Lindberg R A, Prentice Hall of India, New Delhi<br/>
6.	Manufacturing Processes, B H Amstead, Phillip F Ostwald, Myron L Begeman, John Wiley India, New Delhi<br/><br/>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>