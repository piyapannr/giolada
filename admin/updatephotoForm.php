<?php
	
	include 'header.php';

	include 'config.inc.php';
	$objDB = mysql_select_db("gioladaDB");
	$strSQL = "SELECT * FROM promotion WHERE FilesID = '".$_GET["FilesID"]."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);

	if(!(empty($_POST))) {
		$target_dir = "img_promotion/";
		$old_file = $_POST['hdnOldFile'];

		unlink("img_promotion/".$old_file);

    	$target_file = substr(microtime(), 11) . '_' . substr(microtime(), 2, 8);

		if(trim($_FILES["fileToUpload"]["tmp_name"]) != "")
		{
			$images = $_FILES["fileToUpload"]["tmp_name"];
			//$new_images = "Thumbnails_".$_FILES["fileToUpload"]["name"];
			$ImageName = $_FILES["fileToUpload"]["name"];
			$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.', '', $ImageExt);
            $new_images = $target_file.'.'.$ImageExt;
			copy($_FILES["fileToUpload"]["tmp_name"],"img_promotion/".$new_images);


			$width=100; //*** Fix Width & Heigh (Autu caculate) ***//
			$size=GetimageSize($images);
			$height=round($width*$size[1]/$size[0]);
			$images_orig = ImageCreateFromJPEG($images);
			$photoX = ImagesX($images_orig);
			$photoY = ImagesY($images_orig);
			$images_fin = ImageCreateTrueColor($width, $height);
			ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
			//ImageJPEG($images_fin,"img_promotion/".$new_images);
			ImageDestroy($images_orig);
			ImageDestroy($images_fin);

			//*** Update New File ***//
			$strSQL = "UPDATE promotion ";
			$strSQL .=" SET FilesName = '".$new_images."' WHERE FilesID = '".$_GET["FilesID"]."' ";
			$objQuery = mysql_query($strSQL);	
		}

		echo "Copy/Upload Complete<br>";
		echo '<a href="viewphoto.php">View files</a>';
	}
?>
	<div class="container">
		<form name="form1" method="post" action="" enctype="multipart/form-data">
			<legend>Edit Picture</legend>
			<img src="img_promotion/<?php echo $objResult["FilesName"];?>" width="800px" height="250px" ><br><br>
			New Picture : <input type="file" name="fileToUpload"><br>
			<input type="hidden" name="hdnOldFile" value="<?php echo $objResult["FilesName"];?>">
			<button type="submit" class="btn btn-success" name="btnSubmit">Success</button> 
		</form>
	</div><!-- .container -->