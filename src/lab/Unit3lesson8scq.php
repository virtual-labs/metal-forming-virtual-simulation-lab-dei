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
<div>
<script type="text/javascript">
//Google Analytics Code
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38541839-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table width="100%"><tr>
<td width="40%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3lesson8.php" title="Lesson 8 Special Casting Processes (Permanent)">Lesson 8 Special Casting Processes (Permanent)</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 8 Self-Check Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson8/Unit3Lesson8scq.pdf" target="_blank" title="Download Self-Check Questions">Self-Check Questions Download</a><br/><br/>
<b>1. The material of mould used in die casting process is generally made of</b><br/> 
a. plaster of paris&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. some metal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. sand mixed with some binder&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. thermosetting resin <br/><br/>
<b>2. In case of hot chamber die casting machine</b><br/>
a. the furnace is an integral part of the machine<br/>
b. the furnace is not an integral part of the machine<br/>
c. the chamber of the machine is actually not heated<br/>
d. aluminium and its alloys can be cast at a very fast rate<br/><br/>
<b>3. In gravity die casting process</b><br/>
a. casting comes out of the die under the gravitational force<br/>
b. die is made to fall under the force of gravity before it is filled<br/>
c. die cavity is filled with molten metal flowing under the influence of gravity<br/>
d. die as well as casting are constantly under the influence of gravity<br/><br/>
<b>4. In gravity die casting, the life of mould can generally be increased by coating 1 face of the cavity with some</b><br/>
a. oil or grease &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. thermosetting resin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. refractory material&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. meehanite with large graphite flakes<br/><br/> 
<b>5. A cold chamber machine used for die casting is the one in which</b><br/>
a. chamber is water cooled<br/>
b. a separately located furnace is used to melt the metal<br/>
c. the temperature of chamber is never allowed to rise above 200 °C<br/>
d. the temperature of chamber is always maintained below 100°C<br/><br/>
<b>6. Which one of the following is not a variant of Centrifugal casting process?</b><br/>
a. True centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. False centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Semi-centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. Centrifuging<br/><br/>
<b>7. In which one variant of Centrifugal casting process the axis of rotation of the mould coincides with the axis of the casting?</b><br/>
a. True centrifugal casting. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Semi-centrifugal casting.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Profiled centrifugal casting.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Centrifuging.<br/><br/>
<b>8. In which one variant of Centrifugal casting process the centre of the casting is mostly solid, but central core can be used if central hole is needed?</b><br/>
a. True centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. False centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Semi-centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. Centrifuging<br/><br/>
<b>9. In which one variant of Centrifugal casting process the axis of rotation does not coincide with the axis of the mould but it coincides with the axis of the whole set-up?</b><br/>
a. True centrifugal casting&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. False centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Semi-centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. Centrifuging<br/><br/>
<b>10. Which one variant of Centrifugal casting process uses relatively low rotational speeds and is adaptable to stack moulding?</b><br/>
a. True centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. False centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Semi-centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. Centrifuging <br/><br/>
<b>11. Which of the following casting processes uses a rotating mould?</b><br/>
(a) Shell-mould casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Investment casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Permanent mould casting.<br/><br/>
<b>12. Mechanical properties of the cast parts are superior in</b><br/>
(a) shell-mould casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) investment casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) permanent mould casting.<br/><br/>
<b>13. Which of the following casting processes uses pressure to feed the molten metal?</b><br/>
(a) Shell-mould casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Investment casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Die casting <br/><br/>
<b>14. Zinc alloys are preferentially cast by</b><br/>
(a) Investment casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Die casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Shell-mould casting<br/><br/> 
<b>15. Which of the following materials will give maximum die life?</b><br/>
(a) Brass &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Aluminium &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Cast iron &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Zinc. <br/><br/>
<b>16. Arrange the following materials in order of their increasing die life</b><br/>
(a) brass, cast iron, zinc and aluminium <br/>
(b) brass, cast iron, aluminium and zinc <br/>
(c) cast iron, brass, aluminium and zinc <br/>
(d) cast iron, brass, zinc and aluminium.<br/><br/>
<b>17. Bronze is best cast by</b><br/>
(a) shell-mould casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) plaster mould casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) die casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) centrifugal casting<br/><br/>
<b>18. Permanent mould casting is also known as</b><br/>
(a) corthias casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) pressure die casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) gravity die casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) slush casting.<br/><br/>
<b>19. Which of the following casting processes uses a bottomless mould?</b><br/>
(a) Slush casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Continuous casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Investment casting.<br/><br/>
<b>20. Which of the following pairs is not correctly matched?</b><br/>
(a) Aluminium alloy — Pressure die casting <br/>
(b) Jewellery — Lost wax process <br/>
(c) Large pipes — Centrifugal casting <br/>
(d) Large bells — Loam moulding.<br/><br/>
<b>21. Most commonly used materials cast by using hot-chamber die casting include</b><br/>
(a) Zinc &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Tin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Lead &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) All of the above. <br/>
<b>22. Most commonly used materials cast by using cold-chamber die casting include</b><br/>
(a) Aluminium &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Magnesium &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Copper &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) All of the above.<br/>
<b>23. Dynamic action is involved in</b><br/>
(a) Slush casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Investment casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(c) Centrifugal casting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(d) Die casting.<br/><br/>
<b>Possible answers to self check questions</b><br/><br/>
<table border=0 width="500px">
<tr><td>1.</td><td>b&nbsp;&nbsp;&nbsp;&nbsp;</td><td>2.</td><td>a&nbsp;&nbsp;&nbsp;&nbsp;</td><td>3.</td><td>c&nbsp;&nbsp;&nbsp;&nbsp;</td><td>4.</td><td>c</td></tr>
<tr><td>5.</td><td>b&nbsp;&nbsp;&nbsp;&nbsp;</td><td>6.</td><td>b</td><td>7.</td><td>a</td><td>8.</td><td>c</td></tr>
<tr><td>9.</td><td>d&nbsp;&nbsp;&nbsp;&nbsp;</td><td>10.</td><td>d</td><td>11.</td><td>b</td><td>12.</td><td>b</td></tr>
<tr><td>13.</td><td>d&nbsp;&nbsp;&nbsp;&nbsp;</td><td>14.</td><td>b</td><td>15.</td><td>d</td><td>16.</td><td>c</td></tr>
<tr><td>17.</td><td>b&nbsp;&nbsp;&nbsp;&nbsp;</td><td>18.</td><td>b</td><td>19.</td><td>b</td><td>20.</td><td>d</td></tr>
<tr><td>21.</td><td>d&nbsp;&nbsp;&nbsp;&nbsp;</td><td>22.</td><td>d</td><td>23.</td><td>c</td><td></td><td></td></tr>
</table>
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>