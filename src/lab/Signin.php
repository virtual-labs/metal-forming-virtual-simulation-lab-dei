<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="refresh" content="10; url=Registration.php">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body id="draggingDisabled">
<div id="header_main">
</div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
	include("config.inc.php");
	include("mainmenu.php");
	$date = @date('Y-m-d H:i:s');
	$user=$_POST["fname"]."&nbsp;".$_POST["lname"];
	$pwd=trim($_POST["password"]);

	if($_POST["profession"]=="otherProfession"){
	$profession=$_POST["ProfessionTextbox"];
	}
	else $profession=$_POST["profession"];
	
	if($_POST["country"]=="otherCountry"){
	$country=$_POST["CountryTextbox"];
	}
	else $country=$_POST["country"];
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding:100px;">
<?php
	global $db, $db_host, $db_user, $db_password;
	$conn = mysql_connect($db_host,$db_user,$db_password);
	if (!$conn) {
	die("ERROR: " . mysql_error() . "\n");
	}
	mysql_select_db($db);
if(isset($_POST['Registration']) && $_POST['email']!="")
{
	$dquery=mysql_query("select Email from registration");
	while($dv=mysql_fetch_array($dquery))
	{
	if($dv["Email"]===$_POST["email"])
	{
	echo '<b style="font-size:22px; color:#ff0022;">You have "already" registered in "Metal Forming Virtual Simulation Lab".</b>';
	$f=0;
	exit;
	}
	else $f=1;
	}
	if($f===1)
	{
	$query="insert into registration(Fname,Lname,Email,Password,Profession,College,State,Country,Date) 
	values('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$pwd."',
	'".$profession."','".$_POST["college"]."','".$_POST["state"]."','".$country."','".$date."')";
	mysql_query($query);

//Sending an automatic email
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . "\r\n";
$message="Welcome,&nbsp;".$user.".&nbsp;Your registration is successful in Metal Forming Virtual Simulation Lab.<br>Your Email ID:&nbsp;".$_POST["email"]."<br/>Password:&nbsp;".$pwd;
@mail($_POST["email"],"Registration",$message,$headers);
?>
<b style="font-size:30px; color:#ff00bb;">Welcome,</b>&nbsp;&nbsp;<b style="font-size:20px; color:#3399ff;"><?php echo $user;?></b><br/><br/>
<b style="font-size:22px;">You have registered in "Metal Forming Virtual Simulation Lab".<br/><br/>
Your Email ID is</b>&nbsp;&nbsp;<b style="font-size:18px; color:#3399ff;"><?php echo $_POST["email"];?></b>
<?php
}
}
else echo '<b style="font-size:30px; color:#ff0022;">Please fill the entries given in the "Registration Form"</b>';
?>
</div></div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)</div>
</body>
</html>