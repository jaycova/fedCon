<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Untitled Document</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
	<?php require 'db_connect.php'; ?>
</head><center><h1> Please Select Your Search Criteria</h1></center>

<body><center>
<div class="frmSearch" id="search_form" name="search_form" method="post" action="../results.php">

	<p>
		
		


		<?php 
		
		$sql = "select State from ZIPCodes GROUP BY State ASC"; 
		
		$result = $conn->query($sql);

		$num_rows = mysqli_num_rows($result);	
	
		if ($result->num_rows > 0) {
		echo '<span class="label" for="city">State: </span>';
		echo '<select name="State" size="1" id="city" form="search_form">';
		echo '<option value="" selected="selected">Please Select</option>';
		
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo '<option value="'.$row["State"].'">'.$row["State"]; 
			echo '</option>';
			

			}
		echo '</select>';
		}
        $state = $_POST["State"];

	$sql = "select  City from ZIPCodes where State = '$state' Group BY City ASC"; 
	$result = $conn->query($sql);
		
	$num_rows = mysqli_num_rows($result);	
	
	
	if ($result->num_rows > 0) {
		echo '<span class="label" for="City">City: </span>';
		echo '<select name="City" size="1" id="City" form="search_form">';
		echo '<option value="" selected="selected">Please Select</option>';
		
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo '<option value="'.$row["City"].'">'.$row["City"]; 
			echo '</option>';
			

		}
	echo '</select>';
	}
		$sql = "select  ZipCode from ZIPCodes where City = 'The Villages' Group BY ZipCode ASC"; 
		$result = $conn->query($sql);
		
	$num_rows = mysqli_num_rows($result);	
	
	
	if ($result->num_rows > 0) {
		echo '<span class="label" for="zipcodes">Zip Codes: </span>';
		echo '<select name="zipcodes" size="1" id="zipcodes" form="search_form">';
		echo '<option value="" selected="selected">Please Select</option>';
		
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo '<option value="'.$row["ZipCode"].'">'.$row["ZipCode"]; 
			echo '</option>';
			

		}
	echo '</select>';
		echo '<br>';
	}	
		
		 
				$sql = "select  code, description from naics"; 
		$result = $conn->query($sql);
		
	$num_rows = mysqli_num_rows($result);	
	
	
	if ($result->num_rows > 0) {
		echo '<span class="label" for="naics">NAICS: </span>';
		echo '<select name="naic" size="1" id="naics" form="search_form">';
		echo '<option value="" selected="selected">Please Select</option>';
		
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo '<option value="'.$row["code"].'">'.$row["code"];
			echo " | ".$row['description'];
			echo '</option>';
			
		}
	echo '</select>';
	}	

	echo '<br>';	
	
		
			
	?>
	
	<span class="label" for="setaside">Set-Aside:</span>
	<select name="setaside" size="1" id="setaside" form="search_form" tabindex="0">
		<option value="" selected="selected">Please Select One</option>
	    <option value="A6">SBA Certified 8A Program Participant</option>
		<option value="JT">SBA Certified 8A Joint Venture</option>
		<option value="XX">SBA Certified HUBZone Firm</option>
		</select>
	</p>
	<p>
	
		
		<input type="submit">
	  
    </p>		
 
	
	
	</div>

		
	</form>	</center>
</body>
</html>