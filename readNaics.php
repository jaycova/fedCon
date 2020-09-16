<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM naics WHERE (code like '" . $_POST["keyword"] . "%' or  description like '" . $_POST["keyword"] . "%')  Group BY code LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="naics-list">
<?php
foreach($result as $naics) {
?>
<li onClick="selectNaics('<?php echo $naics["code"]; ?>');"><?php echo $naics["code"];echo ' | '; echo $naics["description"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>