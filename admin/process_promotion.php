<?php
	include 'config.inc.php';
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"img_promotion/".$_FILES["fileToUpload"]["name"])){
		echo "Copy/Upload Complete<br>";
		$objDB = mysql_select_db("gioladaDB");
		$strSQL = "INSERT INTO promotion ";
		$strSQL .="(FilesName) VALUES ('".$_FILES["fileToUpload"]["name"]."')";
		$objQuery = mysql_query($strSQL);
	}
?>
<a href="viewphoto.php">View files</a>