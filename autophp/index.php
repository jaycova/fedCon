<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Autocomplete Textbox using jQuery by CodexWorld</title>
<meta charset="utf-8">
<style>
.container{
	padding: 20px;
}
input{
	height: 25px;
	font-size: 16px;
}
</style>

<!-- Include jQuery library -->
<script src="jquery/jquery.min.js"></script>

<!-- Include jQuery UI library -->
<link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
<script src="jquery-ui/jquery-ui.min.js"></script>

<!-- Initialize autocomplete -->
<script>
$(function() {
    $("#skill_input").autocomplete({
        source: "search.php",
    });
});
</script>
</head>
<body>
<div class="container">
	<h2>Autocomplete Input for Skills Search</h2>
	
	<form method="post" action="submit.php">
		<label>Your Skills:</label>
		<input type="text" id="skill_input" name="skill_input" placeholder="Start typing..."/>
		<input type="submit" name="submit" value="SUBMIT">
	</form>
	
</div>
</body>
</html>