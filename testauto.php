<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.autocomplete.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.menu.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.autocomplete.min.js"></script>
 </head>
<body>
 

<script type="text/javascript">
$(document).ready(function() {
    
	       $("#search-box-state").keyup(function(){
                                          
                                          $.ajax({
                                              type: "POST",
                                              url: "readState.php",
                                              data:'keyword='+$(this).val(),
                                              beforeSend: function() {
                                                $("#search-box-state").css("background","FFF");
                                          }, 
                                            success: function(data){
                                              $("#suggesstion-box").show();
                                              $("#suggesstion-box").html(data);
                                              $("#search-box-state").css("background","FFF");
                                          }
                            });
                });
  });
    function selectState(val){
        $("#search-box-state").val(val);
        $("#suggesstion-box").hide();
    }
$(document).ready(function() {
	       $("#search-box-city").keyup(function(){
                var state = $("#search-box-state").val();
                                          
                                          $.ajax({
                                              type: "POST",
                                              url: "readCity.php",
                                              data:'keyword='+$(this).val()+'&state='+state,
                                              beforeSend: function() {
                                                $("#search-box-city").css("background","FFF");
                                          }, 
                                            success: function(data){
                                              $("#suggesstion-box").show();
                                              $("#suggesstion-box").html(data);
                                              $("#search-box-city").css("background","FFF");
                                          }
                            });
                });
  });
    function selectCity(val){
        $("#search-box-city").val(val);
        $("#suggesstion-box").hide();
    }
  $(document).ready(function() {
	       $("#search-box-zip").keyup(function(){
            var state = $("#search-box-state").val();
            var city = $("#search-box-city").val();
                                          
                                          $.ajax({
                                              type: "POST",
                                              url: "readZip.php",
                                              data:'keyword='+$(this).val()+'&state='+state+'&city='+city,
                                              beforeSend: function() {
                                                $("#search-box-zip").css("background","FFF");
                                          }, 
                                            success: function(data){
                                              $("#suggesstion-box").show();
                                              $("#suggesstion-box").html(data);
                                              $("#search-box-zip").css("background","FFF");
                                          }
                            });
                });
  });
    function selectZip(val){
        $("#search-box-zip").val(val);
        $("#suggesstion-box").hide();
    }
   $(document).ready(function() {
	       $("#search-box-naics").keyup(function(){
                                          
                                          $.ajax({
                                              type: "POST",
                                              url: "readNaics.php",
                                              data:'keyword='+$(this).val(),
                                              beforeSend: function() {
                                                $("#search-box-naics").css("background","FFF");
                                          }, 
                                            success: function(data){
                                              $("#suggesstion-box").show();
                                              $("#suggesstion-box").html(data);
                                              $("#search-box-naics").css("background","FFF");
                                          }
                            });
                });
  });
    function selectNaics(val){
        $("#search-box-naics").val(val);
        $("#suggesstion-box").hide();
    }
  </script>
     <div class="frmSearch">  
    <p>   
    <center><h1>Federal Contractor Vendor List</h1></center>
</p><p>
        
    <input type="text" id="search-box-state" name="State" placeholder="State Name" /> 
    <input type="text" id="search-box-city" name="City" placeholder="City Name" /> 
    <input type="text" id="search-box-zip" name="Zip" placeholder="Zip Code" />
    <input type="text" id="search-box-naics" name="NAICS" placeholder="NAICS Code" />
    <div id="suggesstion-box"></div>
    
    </div>
</body>
</html>