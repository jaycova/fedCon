<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM ZIPCodes WHERE State like '" . $_POST["keyword"] . "%' Group BY State LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="state-list">
<?php
foreach($result as $state) {
?>
<li onClick="selectState('<?php echo $state["State"]; ?>');"><?php echo $state["State"]; ?></li>
<?php } ?>
</ul>

<?php } } ?>