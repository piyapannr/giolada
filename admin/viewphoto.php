<?php
 include 'header.php';
?>

<?php
	include 'config.inc.php';
	$objDB = mysql_select_db("gioladaDB");
	$strSQL = "SELECT * FROM promotion";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<div class="container">
	<div class="col-md-11 col-md-offset-1">
		<table width="90%" border="1">
			<tr>
				<th width="10%"> <div align="center">Files ID </div></th>
				<th width="70%"> <div align="center">Picture</div></th>
				<th width="20%"> <div align="center">Action</div></th>
			</tr>
			<?php
				while($objResult = mysql_fetch_array($objQuery))
				{
			?>
			<tr>
				<td><div align="center"><?php echo $objResult["FilesID"];?></div></td>
				<td><center><img src="img_promotion/<?php echo $objResult["FilesName"];?>" width="700px" height="200px"></center></td>
				<td><center><a href="updatephotoForm.php?FilesID=<?php echo $objResult["FilesID"];?>"><button type="button" class="btn btn-warning">Edit</button></a></button></center></td>
			</tr>
		<?php
			}
		?>
		</table>
	</div>	
</div><!-- .container -->
<?php
mysql_close($objConnect);
?>




<?php
 include 'footer.php';
?>