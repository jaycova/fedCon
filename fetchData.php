<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<?php

include "db_connect.php";

if(isset($_POST['search'])){
 $search = mysqli_real_escape_string($con,$_POST['search']);

 $query = "SELECT City FROM ZIPCodes WHERE City like'%".$search."%'";
 $result = mysqli_query($con,$query);

 $response = array();
 while($row = mysqli_fetch_array($result) ){
   $response[] = array("value"=>$row['id'],"label"=>$row['name']);
 }

 echo json_encode($response);
}
	$( function() {

 // Single Select
 $( "#autocomplete" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "fetchData.php",
    type: 'post',
    dataType: "json",
    data: {
     search: request.term
    },
    success: function( data ) {
     response( data );
    }
   });
  },
  select: function (event, ui) {
   // Set selection
   $('#autocomplete').val(ui.item.label); // display the selected text
   $('#selectuser_id').val(ui.item.value); // save selected id to input
   return false;
  }
 });

 // Multiple select
 $( "#multi_autocomplete" ).autocomplete({
    source: function( request, response ) {
                
      var searchText = extractLast(request.term);
      $.ajax({
         url: "fetchData.php",
         type: 'post',
         dataType: "json",
         data: {
           search: searchText
         },
         success: function( data ) {
           response( data );
         }
       });
    },
    select: function( event, ui ) {
        var terms = split( $('#multi_autocomplete').val() );
                
        terms.pop();
                
        terms.push( ui.item.label );
                
        terms.push( "" );
        $('#multi_autocomplete').val(terms.join( ", " ));

        // Id
        terms = split( $('#selectuser_ids').val() );
                
        terms.pop();
                
        terms.push( ui.item.value );
                
        terms.push( "" );
        $('#selectuser_ids').val(terms.join( ", " ));

        return false;
     }
           
 });

});
function split( val ) {
   return val.split( /,\s*/ );
}
function extractLast( term ) {
   return split( term ).pop();
}

exit;
<body>
</body>
</html>