<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" media="all" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css">
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css">
<link href="css/pagination.css" media="all" rel="stylesheet" type="text/css">
</head>
<body id="draggingDisabled" bgcolor="#FFFFFF">
<div id="header_main"></div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
include("mainmenu.php");
require_once ('pagination.php');
?>
</ul></div>
<script>
// Google Analytic Code
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57409344-1', 'auto');
  ga('send', 'pageview');
</script>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Glossary</h2>
<?php
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 10;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	include("config.inc.php");
	global $db, $db_host, $db_user, $db_password;
	$conn = mysql_connect($db_host,$db_user,$db_password);
	if (!$conn) {
	die("ERROR: " . mysql_error() . "\n");
	}
	mysql_select_db ($db);
	$sql = @mysql_query("select * FROM `glossary` order by id asc LIMIT $startpoint,$perpage");	
	echo Pages("glossary",$perpage,"glossary.php?").'<br>';	
	while($Row = mysql_fetch_array($sql)) {
	echo '<span class="blue">'.$Row['Caption'].'</span>&nbsp;-&nbsp;'.$Row['Data'].'<br>';	
}
echo Pages("glossary",$perpage,"glossary.php?");
mysql_free_result($sql);
mysql_close();
?>
</div></div> 
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>