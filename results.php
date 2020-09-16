<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Search Results</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
	<?php require 'db_connect.php'; ?>
	
	
	<?php 
		
		$State = $_POST['State'];
		echo $_POST["State"];
		
		
		$sql = "select StateAbrv from ZIPCodes where State = '$State' Group by State ASC";
		
		$result = $conn->query($sql);
	
		$row = $result->fetch_assoc();
		
		$StateAbrv =  $row["StateAbrv"];
	
		echo $StateAbrv;
	
		echo '<br>';

		$or = $_POST['or'];
		echo $_POST["or"];
	
		echo '<br>';

		$zipcodes = $_POST['zipcodes'];
		echo $_POST["zipcodes"];
	
		echo '<br>';
	
		$_SERVER['HTTP_USER_AGENT'];
		echo "<B>The User Agent is: </b>";
		echo $_SERVER['HTTP_USER_AGENT'];
	
		echo '<br>';
	
		$_SERVER['SSL_SESSION_ID'];
		echo "<b>The User Session ID is: </b>"; 
		echo $_SERVER['SSL_SESSION_ID'];
	
		echo '<br>';
	
		$_SERVER['REMOTE_ADDR'];
		echo "The User IP Address is: ";
		echo $_SERVER['REMOTE_ADDR'];
	
		echo '<br>';
	
	$int = 0;
	?>
</head>

<body><?php
$sql = "SELECT LEGAL_BUSINESS_NAME, DBA_NAME, PHYSICAL_ADDRESS_LINE_1, PHYSICAL_ADDRESS_LINE_2, PHYSICAL_ADDRESS_CITY, PHYSICAL_ADDRESS_PROVINCE_OR_STATE, PHYSICAL_ADDRESS_ZIP_POSTAL_CODE, PHYSICAL_ADDRESS_ZIP_CODE_PLUS_4, PHYSICAL_ADDRESS_COUNTRY_CODE, CORPORATE_URL, GOVT_BUS_POC_FIRST_NAME, GOVT_BUS_POC_MIDDLE_INITIAL, GOVT_BUS_POC_LAST_NAME, GOVT_BUS_POC_US_PHONE, GOVT_BUS_POC_EMAIL FROM contractors where PHYSICAL_ADDRESS_PROVINCE_OR_STATE='$StateAbrv' ";


	
$result = $conn->query($sql);

$num_rows = mysqli_num_rows($result);
$cost = $num_rows * .15;	
	echo "Record Count is: ";
	echo $num_rows;
	echo "<br>";
	echo "Your cost is: $";
	echo $cost;
	echo "<br>";
	
 
if ($result->num_rows > 0) {
  // output data of each row
                echo "<center><table>";
                echo "<tr>";
                echo "<th>Legal Business Name</th>";
                echo "<th>DBA Name</th>";
                echo "<th>Business Address</th>";
                echo "<th>Website  Address</th>";
				echo "<th>Business Government POC</th>";
                echo "</tr>";
				while($row = $result->fetch_assoc()) {
					if ($int < 10){
					echo  "<tr><td>" . $row["LEGAL_BUSINESS_NAME"]. "</td>";
                echo  "<td>" . $row["DBA_NAME"]. "</td>";
                echo  "<td>" . $row["PHYSICAL_ADDRESS_LINE_1"]. "<br>" . $row["PHYSICAL_ADDRESS_LINE_2"]. "<br>" . $row["PHYSICAL_ADDRESS_CITY"]. ", " . $row["PHYSICAL_ADDRESS_PROVINCE_OR_STATE"]. " " . $row["PHYSICAL_ADDRESS_ZIP_POSTAL_CODE"]. "+" . $row["PHYSICAL_ADDRESS_ZIP_CODE_PLUS_4"]. " " . $row["PHYSICAL_ADDRESS_COUNTRY_CODE"]. "</td>";
                echo  "<td>" . $row["CORPORATE_URL"]. "</td>";
				echo  "<td>" . $row["GOVT_BUS_POC_FIRST_NAME"]. " " . $row["GOVT_BUS_POC_MIDDLE_INITIAL"]. " " . $row["GOVT_BUS_POC_LAST_NAME"]. "<br> P: ". $row["GOVT_BUS_POC_US_PHONE"]. "<br> E: ". $row["GOVT_BUS_POC_EMAIL"]. "</td>";
				echo "</tr>";
				$int = $int + 1;
				
					
				
                }}
                echo "</table>";
			
} else {
  echo "0 results";
}



?>
	



              
</body>
</html>
	