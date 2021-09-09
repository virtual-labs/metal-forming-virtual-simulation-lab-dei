<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="refresh" content="10; url=mem103.php">
<title>Manufacturing Processes-I</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/mem.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;" onload="hidefield()">
<div id="header">
<br/>MEM-103 Manufacturing Processes-I<br /><br /></div>
<div style="padding:100px;">
<?php
	include("config.inc.php");
	$date = @date('Y-m-d H:i:s');
	$user=$_POST["fname"]."&nbsp;".$_POST["lname"];
	$pwd=trim($_POST["password"]);

	global $db, $db_host, $db_user, $db_password;
	$conn = mysql_connect($db_host,$db_user,$db_password);
	if (!$conn) {
	die("ERROR: " . mysql_error() . "\n");
	}
	mysql_select_db($db);
if(isset($_POST['Registration']) && $_POST['email']!="")
{
	$dquery=mysql_query("select Email from mem103");
	while($dv=mysql_fetch_array($dquery))
	{
	if($dv["Email"]===$_POST["email"])
	{
	echo '<b style="font-size:22px; color:#ff0022;">You have "already" registered in "MEM-103 Manufacturing Processes-I".</b>';
	$f=0;
	exit;
	}
	else $f=1;
	}
	if($f===1)
	{
	$query="insert into mem103(Fname,Lname,Email,Password,Branch,College,City,State,Date)
	values('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$pwd."',
	'".$_POST["branch"]."','".$_POST["college"]."','".$_POST["city"]."','".$_POST["state"]."','".$date."')";
	mysql_query($query);

//Sending an automatic email
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . "\r\n";
$message="Welcome,&nbsp;".$user.".&nbsp;Your registration is successful in MEM-103 Manufacturing Processes-I.<br>Your Email ID:&nbsp;".$_POST["email"]."<br/>Password:&nbsp;".$pwd;
@mail($_POST["email"],"Registration",$message,$headers);
?>
<b style="font-size:30px; color:#ff00bb;">Welcome,</b>&nbsp;&nbsp;<b style="font-size:20px; color:#3399ff;"><?php echo $user;?></b><br/><br/>
<b style="font-size:22px;">You have registered in "MEM-103 Manufacturing Processes-I".<br/><br/>
Your Email ID is</b>&nbsp;&nbsp;<b style="font-size:18px; color:#3399ff;"><?php echo $_POST["email"];?></b>
<?php
}
}
else echo '<b style="font-size:30px; color:#ff0022;">Please fill the entries given in the "Registration Form"</b>';
?>
<br><br><br><br><br><br><br><br>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>