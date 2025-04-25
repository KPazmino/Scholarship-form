<!--Chapter 4 exercise-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Submitted!</title>
</head>
<body>
	<?php 

	#Definition of the redisplayForm() function
	function redisplayForm($firstName,$lastName){
		?>
		<h2 style="text-align: center;">ScholarShip Form</h2>
		<form name="scholarship" action="process_scholarship.php" method="post">
			<label>First Name:</label>
			<input type="text" name="fName" id="first" autofocus value="<?php echo $firstName ?>"/>
			<br/>
			<br/>
			<label>Last Name:</label>
			<input type="text" name="lName" id="last" value="<?php echo $lastName ?>"  />
			<br/>
			<br/>
			<p><input type="reset" value="Clear Form">&nbsp;&nbsp;<input type="submit" name="submit" value="Send Form"></p>
			
		</form>
		<?php  
	}


	# Definition of the displayrequired() function

		function displayRequired($fieldName){
			echo "<p style='color:red;' >The field \"$fieldName\" is required!</p>";
		}
	#Definition of the validateInput() funtion
		function validateInput($data,$fieldName){
			global $errorCount;
			if(empty($data)){
				
				#this is when the form field is empty
				displayRequired($fieldName);
				++$errorCount;
				$retval = "";
			} else {
				# clean up the input if it is NOT empty
				$retval = trim($data);
				$retval = stripcslashes($retval);
			}
			return$retval;

		}

		$errorCount = 0;
		$firstName =validateInput($_POST['fName'],"First Name");
		$lastName =validateInput($_POST['lName'],"Last Name");

		if($errorCount > 0 ){

			echo "Please re-enter any missing information below!<br/>";
			redisplayForm($firstName,$lastName);

		} else {
			echo "Thank you for filling out the scholarship form, $firstName $lastName.";
		}
	?>
</body>
</html>