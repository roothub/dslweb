<div id = "formFile">
	<form enctype ="multipart/form-data"  action = "uploadOption.php" method = "post">
		<label class="cform">
			<input id ="my_c" type = "file" name ="fileUpload"> 
			<input type="hidden" name="MAX_FILE_SIZE" value="25000000000" />
				
		</label>
		<label class="submit">
		<input type = "submit"  value = "Segregate" name = "Submit" >
				
		</label>
		<label class ="submit">
		
		<input type = "submit" value = "Sanitize" name ="Submit">  
		</label>		
	</form>
</div>