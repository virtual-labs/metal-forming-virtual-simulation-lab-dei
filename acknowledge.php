<?php ini_set("display_errors","Off"); 
if (isset($_POST['send']))
{
include("record.php");

//Database Connection
$conn = mysql_connect("localhost","root","");
if (!$conn) {
die("ERROR: " . mysql_error() . "\n");
}
mysql_select_db ("dei");

//Inserting values in the database
$date = date('Y-m-d H-i-s');
$record="insert into record(Name,Year,Company,Post,Time)
values('".$_POST["name"]."','".$_POST["year"]."','".$_POST["company"]."','".$_POST["post"]."','".$date."')";

$teacher="insert into teacher
values('','".$_POST["formradio1"]."','".$_POST["formradio2"]."','".$_POST["formradio3"]."','".$_POST["formradio4"]."','".$_POST["formradio5"]."',
'".$_POST["formradio6"]."','".$_POST["formradio7"]."','".$_POST["formradio8"]."','".$_POST["formradio9"]."','".$_POST["formradio10"]."',
'".$_POST["formradio11"]."','".$_POST["formradio12"]."','".$_POST["formradio13"]."','".$_POST["formradio14"]."','".$_POST["formradio15"]."',
'".$_POST["formradio16"]."','".$_POST["formradio61"]."')";

$evaluation="insert into evaluation
values('','".$_POST["formradio17"]."','".$_POST["formradio18"]."','".$_POST["formradio19"]."','".$_POST["formradio20"]."','".$_POST["formradio21"]."',
'".$_POST["formradio22"]."','".$_POST["formradio23"]."','".$_POST["formradio24"]."','".$_POST["formradio25"]."',
'".$_POST["formradio62"]."','".$_POST["formradio63"]."')";

$curriculum="insert into curriculum
values('','".$_POST["formradio26"]."','".$_POST["formradio27"]."','".$_POST["formradio28"]."','".$_POST["formradio29"]."','".$_POST["formradio30"]."',
'".$_POST["formradio31"]."','".$_POST["formradio32"]."','".$_POST["formradio64"]."')";

$resources="insert into resources
values('','".$_POST["formradio33"]."','".$_POST["formradio34"]."','".$_POST["formradio35"]."','".$_POST["formradio36"]."','".$_POST["formradio65"]."')";

$library="insert into library
values('','".$_POST["formradio37"]."','".$_POST["formradio38"]."','".$_POST["formradio39"]."','".$_POST["formradio40"]."','".$_POST["formradio41"]."',
'".$_POST["formradio66"]."')";

$infrastructure="insert into infrastructure
values('','".$_POST["formradio42"]."','".$_POST["formradio43"]."','".$_POST["formradio67"]."','".$_POST["formradio44"]."','".$_POST["formradio45"]."',
'".$_POST["formradio46"]."','".$_POST["formradio68"]."')";

$other_areas="insert into other_areas
values('','".$_POST["formradio47"]."','".$_POST["formradio48"]."','".$_POST["formradio69"]."','".$_POST["formradio49"]."','".$_POST["formradio50"]."',
'".$_POST["formradio51"]."','".$_POST["formradio70"]."')";

$innovations="insert into innovations
values('','".$_POST["formradio52"]."','".$_POST["formradio53"]."','".$_POST["formradio54"]."','".$_POST["formradio55"]."','".$_POST["formradio56"]."',
'".$_POST["formradio57"]."','".$_POST["formradio58"]."','".$_POST["formradio59"]."','".$_POST["formradio60"]."','".$_POST["formradio71"]."')";

mysql_query($record);
mysql_query($teacher);
mysql_query($evaluation);
mysql_query($curriculum);
mysql_query($resources);
mysql_query($library);
mysql_query($infrastructure);
mysql_query($other_areas);
mysql_query($innovations);
}
?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml1">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<style type="text/css">
td{
font-size: 16px;
line-height: 16px;
}
th{
font-size:1.6em;
color:#ff00ff;
text-decoration:underline;
text-align:center;
}
</style>
</head>
<body bgcolor="#FFFFFF">
<div style="background:#FFFFFF; position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px;"><br/>
<table><th colspan="2" width="1000">Feedback Form<br>Faculty of Engineering, Dayalbagh Educational Institute, Agra</th><tr><td><p>&nbsp;</p></td></tr>
<tr><td style="color:#ff0000; text-align:right; text-decoration:none"><?php echo date('H:i:s d:M:Y');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="100"><a href="javascript: window.print()" title="Print your Feedback"><abbr title="Print">
<img src="images/Print.jpg"></abbr>&nbsp;Print</td></tr></table>
<p>&nbsp;</p><p>&nbsp;</p>
<FORM name="feedbackform" METHOD="">
<table><tr>
<td>A) Name:<img src="images/arsterix.gif"></td>
<td><input type="text" size="50px" name="name" value="<?php echo $_POST['name']?>" style="text-transform:uppercase" readonly></td></tr>
<tr>
<td>B) Year of Passing:<img src="images/arsterix.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" size="50px" name="year" value="<?php echo $_POST['year']?>" readonly></td></tr>
<tr>
<td>C) Company:<img src="images/arsterix.gif"></td>
<td><input type="text" name="company" size="50" value="<?php echo $_POST['company']?>" style="text-transform:uppercase" readonly></td></tr>
<tr>
<td>D) Post:<img src="images/arsterix.gif"></td>
<td><input type="text" name="post" size="50" value="<?php echo $_POST['post']?>" style="text-transform:uppercase" readonly></td></tr>
</table><br /><br />
<table border="0">
<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;">A. Teaching / Teacher</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td>
<td>Grade</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>1. Overall quality of teachers/teaching in the program was excellent.</td>
<td><input type="text" size="1px" name="formradio1" 
value="<?php echo $_POST['formradio1']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>2. Teachers provide motivation for self learning by the student.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio2']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>3. Teachers regularly take feedback from students and are open to students opinions.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio3']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>4. Teachers distribute the relevant reading material in the class.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio4']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>5. Teachers are well respected by students.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio5']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>6. Teachers are well prepared for the class.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio6']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>7. Teachers are impartial in the class.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio7']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>8. Teachers are less interested in private tuition than teaching in the class.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio8']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>9. Teachers are available and help full for cleaning doubts outside the class.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio9']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>10. Teachers are regular and punctual in conducting the class.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio10']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>11. Teachers substantiate lectures with practical examples.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio11']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>12. Teachers encourage students to ask questions in the class.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio12']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>13. Teachers explain/ clarify doubts in the class.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio13']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>14. Teachers display genuine enthusiasm in teaching.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio14']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>15. Teachers continuously update themselves about the latest in their held.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio15']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>16. Teachers knowledge of the subject is excellent.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio16']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>17. Overall teaching / teachers.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio61']?>" readonly></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>B. Evaluation</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td>
<td>Grade</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>1. Students treat external exams seriously despite their low weightage in the overall evaluation.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio17']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>2. Students undertake assignments seriously.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio18']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>3. Assignments gives are challenging.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio19']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>4. Number of quizzes and tests are adequate.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio20']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>5. Exams and tests are well planned and scheduled appropriately during the semester.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio21']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>6. Evaluation gives a good indication of a student's learning and achievement.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio22']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>7. Testing is fair and transparent.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio23']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>8. All teachers uniformly implement the evaluation system.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio24']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>9. Evaluation focuses on testing students application of knowledge.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio25']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>10. Criteria for evaluation are scientifically designed to ensure learning.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio62']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>11. Overall evaluation system of DEI.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio63']?>" readonly></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>C. Curriculum</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td>
<td>Grade</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>1. Adequate emphasis is given to developing communication skills.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio26']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>2. Curriculum encourages creativity/ research.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio27']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>3. Question banks are relevant and are useful for courses.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio28']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>4. Fundamental concepts are well covered in the courses.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio29']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>5. Contents of courses are updated at regular intervals.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio30']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>6. Weightage given to courses in the overall system is appropriate.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio31']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>7. Subjects covered in the curriculum are relevant to the area of specialization.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio32']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>8. Overall curriculum.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio64']?>" readonly></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>D. Resources</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td>
<td>Grade</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>1. DEI has good computer facilities for students.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio33']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>2. DEI has well equipped labs to meet course requirements.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio34']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>3. DEI has facilities for photocopying/printing etc.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio35']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>4. DEI has adequate resources for teaching aids.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio36']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>5. Overall resources.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio65']?>" readonly></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>E. Library</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td>
<td>Grade</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>1. Photostat facility is adequate in the library.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio37']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>2. Timing of the library are suited to students.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio38']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>3. Library journals are available to students if needed.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio39']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>4. Students get the desired books whenever needed.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio40']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>5. Library has adequate books of the subjects taught.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio41']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>6. Overall library.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio66']?>" readonly></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>F. Infrastructure</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td>
<td>Grade</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>1. Campus has well laid out gardens/greenery.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio42']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>2. Sports facilities are adequate in the campus.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio43']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>3. Canteen facility exists in the campus.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio67']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>4. Toilets are well maintained.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio44']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>5. Reading room facilities is available to students.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio45']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>6. Classrooms are well designed.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio46']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>7. Overall infrastructure.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio68']?>" readonly></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>G. Other Areas</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td>
<td>Grade</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>1. Students have good record of success in national competitions (UPSC/CAT/GATE/BANK/NET) etc.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio47']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>2. Students get admission for higher studies in other universities easily.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio48']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>3. After completion of studies students get placement in appropriate fields.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio69']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>4. DEI makes adequate efforts for placements.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio49']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>5. Selection criteria ensure good quality intake in DEI.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio50']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>6. DEI is rated high as compared to other universities.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio51']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>7. Overall area.</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio70']?>" readonly></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>H. Values and Innovations</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td>
<td>Grade</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>1. Humility</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio52']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>2. Dignity of labour</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio53']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>3. Sincerity</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio54']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>4. Honesty</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio55']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>5. Cooperation</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio56']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>6. Selfless Service</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio57']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>7. Self-reliance</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio58']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>8. Integrity</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio59']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>9. Hard work</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio60']?>" readonly></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>10. Overall values and innovations</td>
<td><input type="text" size="1px" name="formradio2" 
value="<?php echo $_POST['formradio71']?>" readonly></td></tr>
</table></FORM></div><br></div>
<div id="footer">
&copy; Faculty of Engineering - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>