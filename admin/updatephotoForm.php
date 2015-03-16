<?php
	
	include 'header.php';

	include 'config.inc.php';
	$objDB = mysql_select_db("gioladaDB");
	$strSQL = "SELECT * FROM promotion WHERE FilesID = '".$_GET["FilesID"]."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);

	if(!(empty($_POST))) {

	}
?>
	<div class="container">
		<form name="form1" method="post" action="updatephotoProcess.php?FilesID=<?php echo $_GET["FilesID"];?>" enctype="multipart/form-data">
			<legend>Edit Picture</legend>
			<img src="img_promotion/<?php echo $objResult["FilesName"];?>" width="800px" height="250px" ><br><br>
			New Picture : <input type="file" name="filUpload"><br>
			<input type="hidden" name="hdnOldFile" value="<?php echo $objResult["FilesName"];?>">
			<button type="submit" class="btn btn-success" name="btnSubmit">Success</button> 
		</form>
	</div><!-- .container -->