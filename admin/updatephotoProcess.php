<?php

		//*** Update Record ***//
		include 'config.inc.php';
		$objDB = mysql_select_db("gioladaDB");

		
	
	if($_FILES["fileToUpload"]["name"] != "")
	{
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"img_promotion/".$_FILES["fileToUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("img_promotion/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//
			$strSQL = "UPDATE promotion ";
			$strSQL .=" SET FilesName = '".$_FILES["fileToUpload"]["name"]."' WHERE FilesID = '".$_GET["FilesID"]."' ";
			$objQuery = mysql_query($strSQL);		

			echo "Copy/Upload Complete<br>";

		}
	}
?>
	<a href="viewphoto.php">View files</a>