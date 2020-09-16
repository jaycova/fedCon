<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
#var_dump($_POST);
$state = $_POST["state"];
#echo $state;
#if(empty($state){
 #   echo "Not state";
#}
if(!empty($_POST["keyword"])) {
	$query ="SELECT City FROM ZIPCodes WHERE (State = '$state' and City like '" . $_POST["keyword"] . "%') Group BY City LIMIT 0,6";
	#$query ="SELECT City FROM ZIPCodes WHERE State =  . $_POST["state"] .  Group BY City LIMIT 0,6";
    #$query ="SELECT City FROM ZIPCodes WHERE State =  '$state'  Group BY City LIMIT 0,6";
    #$query ="SELECT City FROM ZIPCodes WHERE ( City like '" . $_POST["keyword"] . "%') Group BY City LIMIT 0,6";

$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="city-list">
<?php
foreach($result as $city) {
?>
<li onClick="selectCity('<?php echo $city["City"]; ?>');"><?php echo $city["City"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>