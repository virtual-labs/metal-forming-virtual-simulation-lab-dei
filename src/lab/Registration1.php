<!DOCTYPE HTML public "-w3c//dtd//xhtml1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml1">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
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
	var sname=/[^a-zA-Z]/; 
	var semail=/^[0-9a-zA-Z_\.-]+\@[0-9a-zA-Z_\.-]+\.[0-9a-zA-Z_\.-]+$/;
	var ucountry = document.form1.country;
	
	if(document.form1.fname.value=="")
	   {
		alert("Please enter your first name");
		document.form1.fname.focus();
		return false;
	    }
	else if(document.form1.fname.value.length<'3')
	    {
		alert("Minimum name length must be 3");
		document.form1.fname.value="";
		document.form1.fname.focus();
		return false;
	    }
	else if(sname.test(document.form1.fname.value))
	    {
		alert("Please enter valid name");
		document.form1.fname.value="";
		document.form1.fname.focus();
		return false;
	    }		
    else if(document.form1.email.value=="")
	   {
		alert("Please enter your email ID");
		document.form1.email.focus();
		return false;
	   }
	else if(!semail.test(document.form1.email.value))
	   {
		alert("Please enter correct email ID");
		document.form1.email.value="";
		document.form1.email.focus();
		return false;
	   }	   
	else if(document.form1.password.value=="")
	    {
		alert("Please enter your password");
		document.form1.password.focus();
		return false;
	    }
	else if(document.form1.password.value.length<'4')
	    {
		alert("Minimun password length must be 4");
		document.form1.password.value="";
		document.form1.password.focus();
		return false;
	    }
   else if(document.form1.confpassword.value=="")
	    {
		alert("Please enter your password again");
		document.form1.confpassword.focus();
		return false;
	   }
    else if((document.form1.password.value)!=(document.form1.confpassword.value))
       {
	    alert("Please enter correct password");
	    document.form1.confpassword.value="";
		document.form1.confpassword.focus();
		return false;
       }
	else if(document.form1.country.value=="")
		 {
		alert("Please select country");
		document.form1.country.focus();
		return false;
	     }
	if(document.form1.country.value=="otherCountry"){		 
	if(document.form1.CountryTextbox.value=="")
		 {
		alert("Please enter your country name");
		document.form1.CountryTextbox.focus();
		return false;
	     }	 
	}
}

function showProfession(name){
    if(name=='otherProfession')document.getElementById('ProfessionTextbox').style.display="block";
    else document.getElementById('ProfessionTextbox').style.display="none";
}

function showCountry(name){	
	if(name=='otherCountry')document.getElementById('CountryTextbox').style.display="block";
    else document.getElementById('CountryTextbox').style.display="none";
 }

function hidefield() {
 document.getElementById('ProfessionTextbox').style.display='none';
 document.getElementById('CountryTextbox').style.display='none';
}
-->
</script>
</head>
<body bgcolor="#FFFFFF" onload="hidefield()">
<div id="header_main"></div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
include("mainmenu.php");
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
<div style="background:#FFFFFF; position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding:20px;">
<b style="font-size:21px; color:#999999;">Metal Forming Virtual Simulation Lab - Registration</b><br/><br/>
<center><table border=0>
<th style="background:#3399EE; font-size:16px; color:#FFFFFF;" width="45%">Sign in</th>
<th style="background:#3399EE; font-size:16px; color:#FFFFFF;" width="55%">Create an account</th>
<tr><td  valign="top" style="font-size:13px;">
If you use any of the following services, you already have your own OpenID. Please choose one and associate it with our website. 
You will be taken to the respective providers website and our website will never see your password or other personal information.
We use the name and email address that provider gives us to set up your account. 
We hate spam as much as you do and will never ever share your email with a third party service.</td>
<td><center><table border=0>
<form id="form1" name="form1" method="Post" action="Signin.php" onsubmit="return validation();">

<tr><td style="font-size:15px;">First Name<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" name="fname" size="25" /></td></tr>

<tr><td  style="font-size:15px;">Last Name</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" name="lname" size="25" /></td></tr>

<tr><td  style="font-size:15px;">Email ID<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" name="email" size="25" /></td></tr>

<tr><td  style="font-size:15px;">Password<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="password" name="password" size="25" /></td></tr>

<tr><td  style="font-size:15px;">Confirm Password<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="password" name="confpassword" size="25" /></td></tr>

<tr><td  style="font-size:15px;">Profession</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><select id="profession" name="profession" onchange="showProfession(this.options[this.selectedIndex].value)">
<option value="">--Select--</option>
<option value="Student">Student</option>
<option value="Reserch scholar">Reserch scholar</option>
<option value="Academic">Academic</option>
<option value="Industry">Industry</option>
<option value="otherProfession">Other</option>
</select><input type="text" id="ProfessionTextbox" name="ProfessionTextbox"  size="25" /></td></tr>

<tr><td  style="font-size:15px;">College/University</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" id="college" name="college" size="25" /></td></tr>

<tr><td  style="font-size:15px;">State/City</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" id="state" name="state" size="25" /></td></tr>

<tr><td  style="font-size:15px;">Country<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><select id="country" name="country" onchange="showCountry(this.options[this.selectedIndex].value)">
<option value="">--Select--</option>
<option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote d'Ivoire">Cote d'Ivoire</option>
<option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="France, Metropolitan">France, Metropolitan</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Netherlands Antilles">Netherlands Antilles</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Islands">Northern Mariana Islands</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn">Pitcairn</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">Russian Federation</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">Sao Tome and Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="St. Helena">St. Helena</option>
<option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syrian Arab Republic">Syrian Arab Republic</option>
<option value="Taiwan, Province of China">Taiwan, Province of China</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Viet Nam">Viet Nam</option>
<option value="Virgin Islands (British)">Virgin Islands (British)</option>
<option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
<option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Yugoslavia">Yugoslavia</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
<option value="otherCountry">Other Country</option></select><br/>
<input type="text" id="CountryTextbox" name="CountryTextbox"  size="25" /></td></tr>

<tr><td><p>&nbsp;</p></td></tr>
<tr><td></td><td></td><td>

<input type="submit" name="Registration" value="Register" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" name="Clear" value="Clear" onclick="this.form.reset();" /></td></tr>
</form></table></center></td></tr></table></center>
</div></div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>