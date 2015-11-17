<html><body><h2>
Upload File
</h2>
<form method="post" action="file.php" enctype="multipart/form-data">
File: <input type="file" name="file" id="file"/><br><br>
<input type="submit" name="upload" value="Upload"/>
</form>
<?php
ini_set("display_errors","Off");
if(isset($_POST['upload'])){
   if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
	  }
	else 
		{ 
    move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
	echo $_FILES["file"]["name"] . "&nbsp;uploaded successfull.";		
		}
	}
?>
</body></html>