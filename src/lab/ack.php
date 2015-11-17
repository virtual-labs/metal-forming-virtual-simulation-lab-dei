<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/pagination.css" media="all" rel="stylesheet" type="text/css">
<style type="text/css">
th{
font-family:Arial;
font-size:1.5em;
color:#FF0055;
}
</style>
</head>
<body>
<div id="header_main">
</div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
include("mainmenu.php");
?>
</ul></div>
<div style="background:#FFFFFF; position: relative; margin:auto; width: 1024px;"><br/>
<center><table border="1" cellpadding="1" align="center" cellspacing="0" style="margin:15px">
<th>Sr.No.</th><th>Name</th><th>Email ID</th><th>Class</th><th>Institute</th><th>Feedback</th><th>Date/TIme</th>
<?php
	include("ackment.php");
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 20;	//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	include("config.inc.php");
	global $db, $db_host, $db_user, $db_password;
	$conn = mysql_connect($db_host,$db_user,$db_password);
	if (!$conn) {
	die("ERROR: " . mysql_error() . "\n");
	}
	mysql_select_db($db);	
	$result=mysql_query("select * from feedback order by `Sr.No.` desc limit $startpoint,$perpage");
	while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo "<td style=\"font-size:1.1em; text-align:center;\">" .$row['Sr.No.'] . "</td>";
	echo "<td style=\"font-size:1.1em;\">" .$row['Name'] . "</td>";
	echo "<td style=\"font-size:1.1em;\">" .$row['Email'] . "</td>";
	echo "<td style=\"font-size:1.1em;\">" .$row['Class'] . "</td>";
	echo "<td style=\"font-size:1.1em;\">" .$row['Institute'] . "</td>";
	echo "<td style=\"font-size:1.1em;\">" .$row['About'] . "</td>";
	echo "<td style=\"font-size:1.1em;\">" .$row['DateTime'] . "</td>";
	echo "</tr>";
}
?>
</table>
<?php
echo "<br/>".Pages("feedback",$perpage,"ack.php?").'<br>';
mysql_free_result($result);
mysql_close();
?>
</center></div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)</div>
</body>
</html>