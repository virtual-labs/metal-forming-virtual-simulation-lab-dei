<?php ini_set("display_errors","Off");

$my_file = 'Feedback/'.$_POST["name"].' '.date('H-i-s d-M-Y').'.doc';
$my_data = fopen($my_file, 'w');
$value="<center><b>Feedback Form<br>Faculty of Engineering, Dayalbagh Educational Institute, Agra</b></center>
<p align=right>".date('H-i-s d-M-Y')."</p><br>
<table style=text-transform:uppercase><tr><td>Name</td><td>".$_POST['name']."</td></tr>
<tr><td>Year of Passing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>".$_POST['year']."</td></tr>
<tr><td>Company</td><td>".$_POST['company']."</td></tr>
<tr><td>Post</td><td>".$_POST['post']."</td></tr>
</table><br><br>
<table border=0><tr><th>A. Teaching / Teachers</th><th rowspan=2>Grade</th></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td></tr>
<tr><td>1. Overall quality of teachers/teaching in the program was excellent.</td><td>".$_POST['formradio1']."</td></tr>
<tr><td>2. Teachers provide motivation for self learning.</td><td>".$_POST['formradio2']."</td></tr>
<tr><td>3. Teachers regularly take feedback from students and are open to students opinions.</td><td>".$_POST['formradio3']."</td></tr>
<tr><td>4. Teachers distribute the relevant reading material in the class.</td><td>".$_POST['formradio4']."</td></tr>
<tr><td>5. Teachers are well respected by students.</td><td>".$_POST['formradio5']."</td></tr>
<tr><td>6. Teachers are well prepared for the class.</td><td>".$_POST['formradio6']."</td></tr>
<tr><td>7. Teachers are impartial in the class.</td><td>".$_POST['formradio7']."</td></tr>
<tr><td>8. Teachers are less interested in private tuition than teaching in the class.</td><td>".$_POST['formradio8']."</td></tr>
<tr><td>9. Teachers are available and help full for cleaning doubts outside the class.</td><td>".$_POST['formradio9']."</td></tr>
<tr><td>10. Teachers are regular and punctual in conducting the class.</td><td>".$_POST['formradio10']."</td></tr>
<tr><td>11. Teachers substantiate lectures with practical examples.</td><td>".$_POST['formradio11']."</td></tr>
<tr><td>12. Teachers encourage students to ask questions in the class.</td><td>".$_POST['formradio12']."</td></tr>
<tr><td>13. Teachers explain/ clarify doubts in the class.</td><td>".$_POST['formradio13']."</td></tr>
<tr><td>14. Teachers display genuine enthusiasm in teaching.</td><td>".$_POST['formradio14']."</td></tr>
<tr><td>15. Teachers continuously update themselves about the latest in their held.</td><td>".$_POST['formradio15']."</td></tr>
<tr><td>16. Teachers knowledge of the subject is excellent.</td><td>".$_POST['formradio16']."</td></tr>
<tr><td>17. Overall teaching / teachers</td><td>".$_POST['formradio61']."</td></tr>
<tr></tr>
<tr><th>B. Evaluation</th><th>Grade</th></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td></tr>
<tr><td>1. Students treat external exams seriously despite their low weightage in the overall evaluation.</td><td>".$_POST['formradio17']."</td></tr>
<tr><td>2. Students undertake assignments seriously.</td><td>".$_POST['formradio18']."</td></tr>
<tr><td>3. Assignments gives are challenging.</td><td>".$_POST['formradio19']."</td></tr>
<tr><td>4. Number of quizzes and tests are adequate.</td><td>".$_POST['formradio20']."</td></tr>
<tr><td>5. Exams and tests are well planned and scheduled appropriately during the semester.</td><td>".$_POST['formradio21']."</td></tr>
<tr><td>6. Evaluation gives a good indication of a student's learning and achievement.</td><td>".$_POST['formradio22']."</td></tr>
<tr><td>7. Testing is fair and transparent.</td><td>".$_POST['formradio23']."</td></tr>
<tr><td>8. All teachers uniformly implement the evaluation system.</td><td>".$_POST['formradio24']."</td></tr>
<tr><td>9. Evaluation focuses on testing students application of knowledge.</td><td>".$_POST['formradio25']."</td></tr>
<tr><td>10. Criteria for evaluation are scientifically designed to ensure learning.</td><td>".$_POST['formradio62']."</td></tr>
<tr><td>11. Overall evaluation system of DEI.</td><td>".$_POST['formradio63']."</td></tr>
<tr></tr>
<tr><th>C. Curriculum</th><th>Grade</th></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td></tr>
<tr><td>1. Adequate emphasis is given to developing communication skills.</td><td>".$_POST['formradio26']."</td></tr>
<tr><td>2. Curriculum encourages creativity/ research.</td><td>".$_POST['formradio27']."</td></tr>
<tr><td>3. Question banks are relevant and are useful for courses.</td><td>".$_POST['formradio28']."</td></tr>
<tr><td>4. Fundamental concepts are well covered in the courses.</td><td>".$_POST['formradio29']."</td></tr>
<tr><td>5. Contents of courses are updated at regular intervals.</td><td>".$_POST['formradio30']."</td></tr>
<tr><td>6. Weightage given to courses in the overall system is appropriate.</td><td>".$_POST['formradio31']."</td></tr>
<tr><td>7. Subjects covered in the curriculum are relevant to the area of specialization.</td><td>".$_POST['formradio32']."</td></tr>
<tr><td>8. Overall curriculum</td><td>".$_POST['formradio64']."</td></tr>
<tr></tr>
<tr><th>D. Resources</th><th>Grade</th></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td></tr>
<tr><td>1. DEI has good computer facilities for students.</td><td>".$_POST['formradio33']."</td></tr>
<tr><td>2. DEI has well equipped labs to meet course requirements.</td><td>".$_POST['formradio34']."</td></tr>
<tr><td>3. DEI has facilities for photocopying/printing etc.</td><td>".$_POST['formradio35']."</td></tr>
<tr><td>4. DEI has adequate resources for teaching/teaching aids.</td><td>".$_POST['formradio36']."</td></tr>
<tr><td>5. Overall resources</td><td>".$_POST['formradio65']."</td></tr>
<tr></tr>
<tr><th>E. Library</th><th>Grade</th></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td></tr>
<tr><td>1. Photostat facility is adequate in the library.</td><td>".$_POST['formradio37']."</td></tr>
<tr><td>2. Timing of the library are suited to students.</td><td>".$_POST['formradio38']."</td></tr>
<tr><td>3. Library journals are available to students if needed.</td><td>".$_POST['formradio39']."</td></tr>
<tr><td>4. Students get the desired books whenever needed.</td><td>".$_POST['formradio40']."</td></tr>
<tr><td>5. Library has adequate books of the subjects taught.</td><td>".$_POST['formradio41']."</td></tr>
<tr><td>6. Overall library</td><td>".$_POST['formradio66']."</td></tr>
<tr></tr>
<tr><th>F. Infrastructure</th><th>Grade</th></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td></tr>
<tr><td>1. Campus has well laid out gardens/greenery.</td><td>".$_POST['formradio42']."</td></tr>
<tr><td>2. Sports facilities are adequate in the campus.</td><td>".$_POST['formradio43']."</td></tr>
<tr><td>3. Canteen facility exists in the campus.</td><td>".$_POST['formradio67']."</td></tr>
<tr><td>4. Toilets are well maintained.</td><td>".$_POST['formradio44']."</td></tr>
<tr><td>5. Reading room facilities is available to students.</td><td>".$_POST['formradio45']."</td></tr>
<tr><td>6. Classrooms are well designed.</td><td>".$_POST['formradio46']."</td></tr>
<tr><td>7. Overall infrastructure</td><td>".$_POST['formradio68']."</td></tr>
<tr></tr>
<tr><th>G. Other Areas</th><th>Grade</th></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td></tr>
<tr><td>1. Students have good record of success in national competitions (UPSC/CAT/GATE/BANK/NET) etc.</td><td>".$_POST['formradio47']."</td></tr>
<tr><td>2. Students get admission for higher studies in other universities easily.</td><td>".$_POST['formradio48']."</td></tr>
<tr><td>3. After completion of studies students get placement in appropriate fields.</td><td>".$_POST['formradio69']."</td></tr>
<tr><td>4. DEI makes adequate efforts for placements.</td><td>".$_POST['formradio49']."</td></tr>
<tr><td>5. Selection criteria ensure good quality intake in DEI.</td><td>".$_POST['formradio50']."</td></tr>
<tr><td>6. DEI is rated high as compared to other universities.</td><td>".$_POST['formradio51']."</td></tr>
<tr><td>7. Overall area </td><td>".$_POST['formradio70']."</td></tr>
<tr></tr>
<tr><th>H. Values and Innovations</th><th rowspan=2>Grade</th></tr>
<tr><td>Very Good=5, Good=4, Average=3, Poor=2, Very Poor=1</td></tr>
<tr><td>1. Humility</td><td>".$_POST['formradio52']."</td></tr>
<tr><td>2. Dignity of labour</td><td>".$_POST['formradio53']."</td></tr>
<tr><td>3. Sincerity</td><td>".$_POST['formradio54']."</td></tr>
<tr><td>4. Honesty</td><td>".$_POST['formradio55']."</td></tr>
<tr><td>5. Cooperation</td><td>".$_POST['formradio56']."</td></tr>
<tr><td>6. Selfless Service</td><td>".$_POST['formradio57']."</td></tr>
<tr><td>7. Self-reliance</td><td>".$_POST['formradio58']."</td></tr>
<tr><td>8. Integrity</td><td>".$_POST['formradio59']."</td></tr>
<tr><td>9. Hard work</td><td>".$_POST['formradio60']."</td></tr>
<tr><td>10. Overall values and innovations</td><td>".$_POST['formradio71']."</td></tr></table>";
fwrite($my_data, $value);
fclose($my_data);
?>