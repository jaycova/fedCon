<html>
<head>
<TITLE></TITLE>
<link href="../stylesheet.css" rel="stylesheet" type="text/css">
<head>
<style>
body{width:950px;align-content: center;}
}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	
	
	$("#search-box-state").keyup(function(){
		
		$.ajax({
		type: "POST",
		url: "readState.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box-state").css("background","#FFF");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box-state").css("background","#FFF");
		}
		});
	});
});

function selectState(val) {
$("#search-box-state").val(val);
$("#suggesstion-box").hide();
	}
</script>	
	
</head>
<body>
<form action="res.php" method="post">
<div class="frmSearch">
	<center><h1>Federal Contractor Vendor Search</h1></center>
  <input type="text" id="search-box-state" name="state" placeholder="State Name" />
  <input type="text" id="search-box-city" placeholder="City Name" />
<input type="text" id="search-box-zip" placeholder="Zip Code" />
<input type="text" id="search-box-naics" placeholder="NAICS" />
<input type="text" id="search-box-setaside" placeholder="Set-Aside Program" />
	<br><br>
  
	<div id="suggesstion-box"></div><br>
			
	</form>
</div>
	
</body>
</html>