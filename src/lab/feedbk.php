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
</style>
<script language="javascript">
<!-- 
var isNS = (navigator.appName == "Netscape") ? 1 : 0;
  if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
  function mischandler(){
   return false;
 }
  function mousehandler(e){
 	var myevent = (isNS) ? e : event;
 	var eventbutton = (isNS) ? myevent.which : myevent.button;
    if((eventbutton==2)||(eventbutton==3)) return false;
 }
 document.oncontextmenu = mischandler;
 document.onmousedown = mousehandler;
 document.onmouseup = mousehandler;
 
 function validation()
{
	if(document.feedbackform.name.value=="")
	   {
		alert("Please enter your name");
		document.feedbackform.name.focus();
		return false;
	    }   
	else if(document.feedbackform.year.value=="")
	    {
		alert("Please enter Year of Passing");
		document.feedbackform.year.focus();
		return false;
	    }
	else if(document.feedbackform.year.value.length!='4')
	    {
		alert("Year length must be 4");
		document.feedbackform.year.value="";
		document.feedbackform.year.focus();
		return false;
	    }
	else if(document.feedbackform.company.value=="")
		 {
		alert("Please enter company name");
		document.feedbackform.company.focus();
		return false;
	     }
	else if(document.feedbackform.post.value=="")
		 {
		alert("Please enter your post in company");
		document.feedbackform.post.focus();
		return false;
	     }
}
-->
</script>
</head>
<body bgcolor="#FFFFFF">

<div style="background:#FFFFFF; position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px;">
<center><br/><b style="font-size:1.6em; color:#ff00ff; text-decoration:underline">Feedback Form<br>
Faculty of Engineering, Dayalbagh Educational Institute, Agra</b></center><br><br>
<FORM name="feedbackform" METHOD="post" onSubmit="return validation()" action="acknowledge.php">
<table><tr>
<td>A) Name:<img src="images/arsterix.gif"></td>
<td><input type="text" size="50px" name="name" style="text-transform:uppercase"></td></tr>
<tr>
<td>B) Year of Passing:<img src="images/arsterix.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" size="50px" name="year"></td></tr>
<tr>
<td>C) Company:<img src="images/arsterix.gif"></td>
<td><input type="text" name="company" size="50" style="text-transform:uppercase"></td></tr>
<tr>
<td>D) Post:<img src="images/arsterix.gif"></td>
<td><input type="text" name="post" size="50" style="text-transform:uppercase"></td></tr>
</table><br /><br />
<table>
<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;">A. Teaching / Teacher</td></tr>

<tr><td style="text-align:right;">Grade:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="text-align:center;">Very Good&nbsp;&nbsp;<br>5</td><td style="text-align:center;">Good&nbsp;&nbsp;<br>4</td>
<td style="text-align:center;">Average&nbsp;&nbsp;<br>3</td><td style="text-align:center;">Poor&nbsp;&nbsp;<br>2</td>
<td style="text-align:center;">Very Poor<br>1</td></tr>

<tr><td>1. Overall quality of teachers/teaching in the program was excellent.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio1" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio1" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio1" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio1" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio1" value="1"><p>&nbsp;</p></td></tr>

<tr><td>2. Teachers provide motivation for self learning by the student.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio2" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio2" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio2" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio2" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio2" value="1"><p>&nbsp;</p></td></tr>

<tr><td>3. Teachers regularly take feedback from students and are open to<br>students opinions.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio3" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio3" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio3" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio3" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio3" value="1"><p>&nbsp;</p></td></tr>

<tr><td>4. Teachers distribute the relevant reading material in the class.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio4" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio4" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio4" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio4" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio4" value="1"><p>&nbsp;</p></td></tr>


<tr><td>5. Teachers are well respected by students.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio5" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio5" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio5" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio5" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio5" value="1"><p>&nbsp;</p></td></tr>

<tr><td>6. Teachers are well prepared for the class.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio6" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio6" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio6" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio6" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio6" value="1"><p>&nbsp;</p></td></tr>

<tr><td>7. Teachers are impartial in the class.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio7" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio7" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio7" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio7" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio7" value="1"><p>&nbsp;</p></td></tr>

<tr><td>8. Teachers are less interested in private tuition than teaching in the class.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio8" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio8" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio8" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio8" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio8" value="1"><p>&nbsp;</p></td></tr>

<tr><td>9. Teachers are available and help full for cleaning doubts outside the class.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio9" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio9" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio9" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio9" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio9" value="1"><p>&nbsp;</p></td></tr>

<tr><td>10. Teachers are regular and punctual in conducting the class.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio10" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio10" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio10" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio10" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio10" value="1"><p>&nbsp;</p></td></tr>

<tr><td>11. Teachers substantiate lectures with practical examples.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio11" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio11" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio11" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio11" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio11" value="1"><p>&nbsp;</p></td></tr>

<tr><td>12. Teachers encourage students to ask questions in the class.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio12" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio12" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio12" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio12" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio12" value="1"><p>&nbsp;</p></td></tr>

<tr><td>13. Teachers explain/ clarify doubts in the class.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio13" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio13" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio13" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio13" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio13" value="1"><p>&nbsp;</p></td></tr>

<tr><td>14. Teachers display genuine enthusiasm in teaching.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio14" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio14" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio14" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio14" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio14" value="1"><p>&nbsp;</p></td></tr>

<tr><td>15. Teachers continuously update themselves about the latest in their held.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio15" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio15" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio15" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio15" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio15" value="1"><p>&nbsp;</p></td></tr>

<tr><td>16. Teachers knowledge of the subject is excellent.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio16" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio16" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio16" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio16" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio16" value="1"><p>&nbsp;</p></td></tr>

<tr><td>17. Overall teaching / teachers.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio61" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio61" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio61" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio61" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio61" value="1"><p>&nbsp;</p></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>B. Evaluation</td></tr>

<tr><td style="text-align:right;">Grade:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="text-align:center;">Very Good&nbsp;&nbsp;<br>5</td><td style="text-align:center;">Good&nbsp;&nbsp;<br>4</td>
<td style="text-align:center;">Average&nbsp;&nbsp;<br>3</td><td style="text-align:center;">Poor&nbsp;&nbsp;<br>2</td>
<td style="text-align:center;">Very Poor<br>1</td></tr>

<tr><td>1. Students treat external exams seriously despite their low weightage<br/>in the overall evaluation.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio17" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio17" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio17" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio17" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio17" value="1"><p>&nbsp;</p></td></tr>

<tr><td>2. Students undertake assignments seriously.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio18" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio18" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio18" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio18" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio18" value="1"><p>&nbsp;</p></td></tr>

<tr><td>3. Assignments gives are challenging.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio19" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio19" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio19" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio19" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio19" value="1"><p>&nbsp;</p></td></tr>

<tr><td>4. Number of quizzes and tests are adequate.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio20" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio20" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio20" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio20" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio20" value="1"><p>&nbsp;</p></td></tr>

<tr><td>5. Exams and tests are well planned and scheduled appropriately during<br>the semester.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio21" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio21" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio21" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio21" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio21" value="1"><p>&nbsp;</p></td></tr>

<tr><td>6. Evaluation gives a good indication of a student's learning and achievement.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio22" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio22" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio22" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio22" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio22" value="1"><p>&nbsp;</p></td></tr>

<tr><td>7. Testing is fair and transparent.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio23" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio23" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio23" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio23" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio23" value="1"><p>&nbsp;</p></td></tr>

<tr><td>8. All teachers uniformly implement the evaluation system.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio24" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio24" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio24" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio24" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio24" value="1"><p>&nbsp;</p></td></tr>

<tr><td>9. Evaluation focuses on testing students application of knowledge.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio25" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio25" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio25" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio25" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio25" value="1"><p>&nbsp;</p></td></tr>

<tr><td>10. Criteria for evaluation are scientifically designed to ensure learning.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio62" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio62" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio62" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio62" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio62" value="1"><p>&nbsp;</p></td></tr>

<tr><td>11. Overall evaluation system of DEI.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio63" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio63" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio63" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio63" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio63" value="1"><p>&nbsp;</p></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>C. Curriculum</td></tr>

<tr><td style="text-align:right;">Grade:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="text-align:center;">Very Good&nbsp;&nbsp;<br>5</td><td style="text-align:center;">Good&nbsp;&nbsp;<br>4</td>
<td style="text-align:center;">Average&nbsp;&nbsp;<br>3</td><td style="text-align:center;">Poor&nbsp;&nbsp;<br>2</td>
<td style="text-align:center;">Very Poor<br>1</td></tr>

<tr><td>1. Adequate emphasis is given to developing communication skills.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio26" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio26" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio26" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio26" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio26" value="1"><p>&nbsp;</p></td></tr>

<tr><td>2. Curriculum encourages creativity/ research.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio27" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio27" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio27" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio27" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio27" value="1"><p>&nbsp;</p></td></tr>

<tr><td>3. Question banks are relevant and are useful for courses.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio28" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio28" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio28" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio28" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio28" value="1"><p>&nbsp;</p></td></tr>

<tr><td>4. Fundamental concepts are well covered in the courses.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio29" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio29" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio29" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio29" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio29" value="1"><p>&nbsp;</p></td></tr>

<tr><td>5. Contents of courses are updated at regular intervals.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio30" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio30" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio30" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio30" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio30" value="1"><p>&nbsp;</p></td></tr>

<tr><td>6. Weightage given to courses in the overall system is appropriate.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio31" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio31" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio31" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio31" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio31" value="1"><p>&nbsp;</p></td></tr>

<tr><td>7. Subjects covered in the curriculum are relevant to the area of<br>specialization.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio32" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio32" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio32" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio32" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio32" value="1"><p>&nbsp;</p></td></tr>

<tr><td>8. Overall curriculum.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio64" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio64" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio64" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio64" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio64" value="1"><p>&nbsp;</p></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>D. Resources</td></tr>

<tr><td style="text-align:right;">Grade:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="text-align:center;">Very Good&nbsp;&nbsp;<br>5</td><td style="text-align:center;">Good&nbsp;&nbsp;<br>4</td>
<td style="text-align:center;">Average&nbsp;&nbsp;<br>3</td><td style="text-align:center;">Poor&nbsp;&nbsp;<br>2</td>
<td style="text-align:center;">Very Poor<br>1</td></tr>

<tr><td>1. DEI has good computer facilities for students.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio33" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio33" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio33" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio33" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio33" value="1"><p>&nbsp;</p></td></tr>

<tr><td>2. DEI has well equipped labs to meet course requirements.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio34" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio34" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio34" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio34" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio34" value="1"><p>&nbsp;</p></td></tr>

<tr><td>3. DEI has facilities for photocopying/printing etc.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio35" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio35" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio35" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio35" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio35" value="1"><p>&nbsp;</p></td></tr>

<tr><td>4. DEI has adequate resources for teaching aids.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio36" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio36" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio36" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio36" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio36" value="1"><p>&nbsp;</p></td></tr>

<tr><td>5. Overall resources.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio65" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio65" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio65" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio65" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio65" value="1"><p>&nbsp;</p></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>E. Library</td></tr>

<tr><td style="text-align:right;">Grade:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="text-align:center;">Very Good&nbsp;&nbsp;<br>5</td><td style="text-align:center;">Good&nbsp;&nbsp;<br>4</td>
<td style="text-align:center;">Average&nbsp;&nbsp;<br>3</td><td style="text-align:center;">Poor&nbsp;&nbsp;<br>2</td>
<td style="text-align:center;">Very Poor<br>1</td></tr>

<tr><td>1. Photostat facility is adequate in the library.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio37" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio37" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio37" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio37" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio37" value="1"><p>&nbsp;</p></td></tr>

<tr><td>2. Timing of the library are suited to students.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio38" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio38" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio38" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio38" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio38" value="1"><p>&nbsp;</p></td></tr>

<tr><td>3. Library journals are available to students if needed.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio39" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio39" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio39" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio39" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio39" value="1"><p>&nbsp;</p></td></tr>

<tr><td>4. Students get the desired books whenever needed.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio40" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio40" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio40" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio40" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio40" value="1"><p>&nbsp;</p></td></tr>

<tr><td>5. Library has adequate books of the subjects taught.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio41" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio41" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio41" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio41" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio41" value="1"><p>&nbsp;</p></td></tr>

<tr><td>6. Overall library.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio66" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio66" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio66" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio66" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio66" value="1"><p>&nbsp;</p></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>F. Infrastructure</td></tr>

<tr><td style="text-align:right;">Grade:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="text-align:center;">Very Good&nbsp;&nbsp;<br>5</td><td style="text-align:center;">Good&nbsp;&nbsp;<br>4</td>
<td style="text-align:center;">Average&nbsp;&nbsp;<br>3</td><td style="text-align:center;">Poor&nbsp;&nbsp;<br>2</td>
<td style="text-align:center;">Very Poor<br>1</td></tr>

<tr><td>1. Campus has well laid out gardens/greenery.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio42" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio42" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio42" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio42" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio42" value="1"><p>&nbsp;</p></td></tr>

<tr><td>2. Sports facilities are adequate in the campus.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio43" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio43" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio43" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio43" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio43" value="1"><p>&nbsp;</p></td></tr>

<tr><td>3. Canteen facility exists in the campus.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio67" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio67" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio67" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio67" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio67" value="1"><p>&nbsp;</p></td></tr>

<tr><td>4. Toilets are well maintained.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio44" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio44" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio44" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio44" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio44" value="1"><p>&nbsp;</p></td></tr>

<tr><td>5. Reading room facilities is available to students.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio45" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio45" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio45" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio45" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio45" value="1"><p>&nbsp;</p></td></tr>

<tr><td>6. Classrooms are well designed.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio46" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio46" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio46" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio46" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio46" value="1"><p>&nbsp;</p></td></tr>

<tr><td>7. Overall infrastructure.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio68" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio68" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio68" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio68" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio68" value="1"><p>&nbsp;</p></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>G. Other Areas</td></tr>

<tr><td style="text-align:right;">Grade:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="text-align:center;">Very Good&nbsp;&nbsp;<br>5</td><td style="text-align:center;">Good&nbsp;&nbsp;<br>4</td>
<td style="text-align:center;">Average&nbsp;&nbsp;<br>3</td><td style="text-align:center;">Poor&nbsp;&nbsp;<br>2</td>
<td style="text-align:center;">Very Poor<br>1</td></tr>

<tr><td>1. Students have good record of success in national competitions<br>(UPSC/CAT/GATE/BANK/NET) etc.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio47" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio47" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio47" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio47" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio47" value="1"><p>&nbsp;</p></td></tr>

<tr><td>2. Students get admission for higher studies in other universities easily.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio48" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio48" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio48" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio48" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio48" value="1"><p>&nbsp;</p></td></tr>

<tr><td>3. After completion of studies students get placement in appropriate fields.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio69" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio69" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio69" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio69" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio69" value="1"><p>&nbsp;</p></td></tr>

<tr><td>4. DEI makes adequate efforts for placements.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio49" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio49" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio49" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio49" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio49" value="1"><p>&nbsp;</p></td></tr>

<tr><td>5. Selection criteria ensure good quality intake in DEI.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio50" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio50" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio50" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio50" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio50" value="1"><p>&nbsp;</p></td></tr>

<tr><td>6. DEI is rated high as compared to other universities.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio51" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio51" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio51" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio51" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio51" value="1"><p>&nbsp;</p></td></tr>

<tr><td>7. Overall area.</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio70" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio70" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio70" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio70" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio70" value="1"><p>&nbsp;</p></td></tr>

<tr><td colspan="2" style="font-size:1.6em; color:#ff00ff; text-decoration:underline;"><br><br>H. Values and Innovations</td></tr>

<tr><td style="text-align:right;">Grade:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="text-align:center;">Very Good&nbsp;&nbsp;<br>5</td><td style="text-align:center;">Good&nbsp;&nbsp;<br>4</td>
<td style="text-align:center;">Average&nbsp;&nbsp;<br>3</td><td style="text-align:center;">Poor&nbsp;&nbsp;<br>2</td>
<td style="text-align:center;">Very Poor<br>1</td></tr>

<tr><td>1. Humility</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio52" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio52" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio52" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio52" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio52" value="1"><p>&nbsp;</p></td></tr>

<tr><td>2. Dignity of labour</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio53" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio53" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio53" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio53" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio53" value="1"><p>&nbsp;</p></td></tr>

<tr><td>3. Sincerity</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio54" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio54" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio54" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio54" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio54" value="1"><p>&nbsp;</p></td></tr>

<tr><td>4. Honesty</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio55" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio55" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio55" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio55" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio55" value="1"><p>&nbsp;</p></td></tr>

<tr><td>5. Cooperation</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio56" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio56" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio56" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio56" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio56" value="1"><p>&nbsp;</p></td></tr>

<tr><td>6. Selfless Service</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio57" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio57" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio57" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio57" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio57" value="1"><p>&nbsp;</p></td></tr>

<tr><td>7. Self-reliance</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio58" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio58" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio58" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio58" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio58" value="1"><p>&nbsp;</p></td></tr>

<tr><td>8. Integrity</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio59" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio59" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio59" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio59" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio59" value="1"><p>&nbsp;</p></td></tr>

<tr><td>9. Hard work</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio60" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio60" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio60" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio60" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio60" value="1"><p>&nbsp;</p></td></tr>

<tr><td>10. Overall values and innovations</td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio71" value="5"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio71" value="4"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio71" value="3"></td>
<td style="text-align:center;">&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio71" value="2"></td>
<td style="text-align:center;"><br>&nbsp;&nbsp;<input type="radio" name="formradio71" value="1"><p>&nbsp;</p></td></tr>
</table>

<center><input type="submit" name="send" value="Submit">
<input type="button" name="reset_form" value="Reset Form" onclick="this.form.reset();"></center>
</FORM>
<br/></div></div>
<div id="footer">
&copy; Faculty of Engineering - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>