<div id = "formFile">
	<form enctype ="multipart/form-data"  action = "uploadPrcs.php" method = "post">
		<label class="cform">
			<input id ="my_c" type = "file" name ="fileUpload"> 
			<input type="hidden" name="MAX_FILE_SIZE" value="25000000000" />
				
		</label>
		<label class="submit">
		<input type = "submit"  value = "upload" name = "submit" >
		</label>		
	</form>
</div>